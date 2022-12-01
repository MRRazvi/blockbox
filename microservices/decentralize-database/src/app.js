import http from 'http'
import express from 'express'
import * as dotenv from 'dotenv'
import api from './api/index.js';
dotenv.config()

let app = express()
app.server = http.createServer(app);

app.use('/api', api())
app.server.listen(process.env.APP_PORT)

export default app;
