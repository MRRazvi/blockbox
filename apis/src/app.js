const http = require('http');
const express = require('express');
const driver = require('bigchaindb-driver');
const bip39 = require('bip39');
const dotenv = require('dotenv');
dotenv.config();

let app = express();

app.server = http.createServer(app);
app.use(express.json());

// middleware
app.use((req, res, next) => {
  const key = req.header('x-key');
  if (!key) {
    res.status(404).json({
      'code': 404,
      'message': 'key not found'
    });
    return;
  }

  next();
});

// all boxes
app.get('/api/v1/boxes', async (req, res) => {
  try {
    const con = new driver.Connection(process.env.DRIVER_PATH);
    const seed = bip39.mnemonicToSeed(req.header('x-key')).slice(0, 32);
    const user = new driver.Ed25519Keypair(seed);
    const assets = await con.listOutputs(user.publicKey, false);

    const txs = [];
    for (const asset of assets) {
      const tx = await con.getTransaction(asset.transaction_id);
      txs.push(tx);
    }

    res.status(200).json(txs);
  } catch (e) {
    res.status(400).json({
      'code': 400,
      'message': 'something goes wrong'
    });
  }
});

// get single box
app.get('/api/v1/boxes/:box', async (req, res) => {
  try {
    const con = new driver.Connection(process.env.DRIVER_PATH);
    const seed = bip39.mnemonicToSeed(req.header('x-key')).slice(0, 32);
    const user = new driver.Ed25519Keypair(seed);
    const tx = await con.getTransaction(req.params.box);

    if (tx.outputs[0].public_keys[0] !== user.publicKey) {
      res.status(403).json({
        'code': 403,
        'message': 'forbidden'
      });
    }

    res.status(200).json(tx);
  } catch (e) {
    res.status(400).json({
      'code': 400,
      'message': 'something goes wrong'
    });
  }
});

// create box
app.post('/api/v1/boxes', async (req, res) => {
  try {
    const con = new driver.Connection(process.env.DRIVER_PATH);
    const seed = bip39.mnemonicToSeed(req.header('x-key')).slice(0, 32);
    const user = new driver.Ed25519Keypair(seed);

    const txCreate = driver.Transaction.makeCreateTransaction(
      req.body.data,
      req.body.metadata,
      [
        driver.Transaction.makeOutput(
          driver.Transaction.makeEd25519Condition(user.publicKey)
        )
      ],
      user.publicKey
    );

    const txSigned = driver.Transaction.signTransaction(txCreate, user.privateKey);
    await con.postTransactionCommit(txSigned);

    res.status(200).json(txSigned);
  } catch (e) {
    res.status(400).json({
      'code': 400,
      'message': 'something goes wrong'
    });
  }
});

// search box
app.get('/api/v1/boxes/search/:search', async (req, res) => {
  try {
    const con = new driver.Connection(process.env.DRIVER_PATH);
    const seed = bip39.mnemonicToSeed(req.header('x-key')).slice(0, 32);
    const user = new driver.Ed25519Keypair(seed);
    const assets = await con.searchAssets(req.params.search);

    const txs = [];
    for (const asset of assets) {
      const tx = await con.getTransaction(asset.id);
      console.log(tx.outputs[0].public_keys[0]);
      if (tx.outputs[0].public_keys[0] === user.publicKey) {
        txs.push(tx);
      }
    }

    res.status(200).json(txs);
  } catch (e) {
    res.status(400).json({
      'code': 400,
      'message': 'something goes wrong'
    });
  }
});

app.server.listen(process.env.APP_PORT);
