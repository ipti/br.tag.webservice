import { Injectable } from '@nestjs/common';
import { School } from './school';
import { InjectModel } from '@nestjs/mongoose';
import { Model } from 'mongoose';

@Injectable()
export class SchoolService {
  constructor(
    @InjectModel('School') private readonly schoolModel: Model<School>,
  ) {}

  async getAll() {
    return await this.schoolModel.find().exec();
  }

  async getById(id: string) {
    return await this.schoolModel.findById(id).exec();
  }

  async create(task: School) {
    const createdTask = new this.schoolModel(task);
    return await createdTask.save();
  }

  async update(id: string, task: School) {
    await this.schoolModel.updateOne({ _id: id }, task).exec();
    return this.getById(id);
  }

  async delete(id: string) {
    return await this.schoolModel.deleteOne({ _id: id }).exec();
  }
}
