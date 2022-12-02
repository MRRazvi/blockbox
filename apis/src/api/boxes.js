import { Router } from 'express';
import { showBox, createBox } from '../controllers/boxController.js';

let auth = () => {
  let api = Router();
  api.get('/boxes/:id', showBox);
  api.post('/boxes', createBox)
  return api;
}

export default auth();
