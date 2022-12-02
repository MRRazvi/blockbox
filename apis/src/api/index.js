import { Router } from 'express';
import auth from './auth.js';
import boxes from './boxes.js';

export default () => {
  let api = Router();
  api.use('/auth', auth);
  api.use('/boxes', boxes);
  return api;
}
