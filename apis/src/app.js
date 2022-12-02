const http = require('http');
const express = require('express');
const driver = require('bigchaindb-driver');
const dotenv = require('dotenv');
dotenv.config();

let app = express();

app.server = http.createServer(app);
app.use(express.json());

app.post('/api/v1/boxes', (req, res) => {
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

  console.log(req.body)
  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(txSigned));
});

app.server.listen(process.env.APP_PORT);
