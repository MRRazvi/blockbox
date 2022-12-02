const http = require('http');
const express = require('express');
const driver = require('bigchaindb-driver');
const dotenv = require('dotenv');
dotenv.config();

let app = express();

app.server = http.createServer(app);
app.use(express.json());

app.get('/api/v1/boxes/:box', async (req, res) => {
  const con = new driver.Connection(process.env.DRIVER_PATH);
  const tx = await con.getTransaction(req.params.box);

  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(tx));
});

app.post('/api/v1/boxes', async (req, res) => {
  const con = new driver.Connection(process.env.DRIVER_PATH);
  const user = new driver.Ed25519Keypair();

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
  con.postTransactionCommit(txSigned);

  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(txSigned));
});

app.get('/api/v1/boxes/search/:search', async (req, res) => {
  const con = new driver.Connection(process.env.DRIVER_PATH);
  const assetList = await con.searchAssets(req.params.search);

  const txList = [];
  for (const asset of assetList) {
    const tx = await con.getTransaction(asset.id);
    txList.push(tx);
  }

  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(txList));
});

app.get('/api/v1/boxes/wallet/:wallet', async (req, res) => {
  try {
    const con = new driver.Connection(process.env.DRIVER_PATH);
    const txs = await con.listOutputs(req.params.wallet, false);

    const assets = [];
    for (const item of txs) {
      const tx = await con.getTransaction(item.transaction_id);
      assets.push(tx);
    }

    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(assets));
  } catch (e) {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify({
      'code': 400,
      'message': 'bad request, not found'
    }));
  }
});

app.server.listen(process.env.APP_PORT);
