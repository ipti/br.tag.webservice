import { Injectable } from '@nestjs/common';
import { Instructor } from './instructor';
import { InjectModel } from '@nestjs/mongoose';
import { Model } from 'mongoose';

@Injectable()
export class InstructorService {
  constructor(
    @InjectModel('Instructor')
    private readonly instructorModel: Model<Instructor>,
  ) {}

  async getAll() {
    return await this.instructorModel.find().exec();
  }

  async getById(id: string) {
    return await this.instructorModel.findById(id).exec();
  }

  async create(instructor: Instructor) {
    const createdinstructor = new this.instructorModel(instructor);
    return await createdinstructor.save();
  }

  async update(id: string, instructor: Instructor) {
    await this.instructorModel.updateOne({ _id: id }, instructor).exec();
    return this.getById(id);
  }

  async delete(id: string) {
    return await this.instructorModel.deleteOne({ _id: id }).exec();
  }
}
