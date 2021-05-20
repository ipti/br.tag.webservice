import * as mongoose from 'mongoose';

export const EdcensoDisciplineSchema = new mongoose.Schema({
  name: String,
  oldCode: Number,
});
