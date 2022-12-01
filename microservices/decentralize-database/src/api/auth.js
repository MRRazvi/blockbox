import { Router } from 'express';
import login from "../controllers/authController.js";

let auth = () => {
  let api = Router();
  api.get('/login', login);
  return api;
}

export default auth();
