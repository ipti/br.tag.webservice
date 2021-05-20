import { Injectable } from '@nestjs/common';
import { Student } from './student';
import { InjectModel } from '@nestjs/mongoose';
import { Model } from 'mongoose';

@Injectable()
export class StudentService {
  constructor(
    @InjectModel('Student') private readonly studentModel: Model<Student>,
  ) {}

  async getAll() {
    return await this.studentModel.find().exec();
  }

  async getById(id: string) {
    return await this.studentModel.findById(id).exec();
  }

  async create(student: Student) {
    const createdstudent = new this.studentModel(student);
    return await createdstudent.save();
  }

  async update(id: string, student: Student) {
    await this.studentModel.updateOne({ _id: id }, student).exec();
    return this.getById(id);
  }

  async delete(id: string) {
    return await this.studentModel.deleteOne({ _id: id }).exec();
  }
}
