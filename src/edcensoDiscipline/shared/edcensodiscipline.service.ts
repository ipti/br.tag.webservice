import { Injectable } from '@nestjs/common';
import { EdcensoDiscipline } from './edcensoDiscipline';
import { InjectModel } from '@nestjs/mongoose';
import { Model } from 'mongoose';

@Injectable()
export class EdcensoDisciplineService {
  constructor(
    @InjectModel('EdcensoDiscipline')
    private readonly edcensoDisciplineModel: Model<EdcensoDiscipline>,
  ) {}

  async getAll() {
    return await this.edcensoDisciplineModel.find().exec();
  }

  async getById(id: string) {
    return await this.edcensoDisciplineModel.findById(id).exec();
  }

  async create(edcensoDiscipline: EdcensoDiscipline) {
    const creatededcensoDiscipline = new this.edcensoDisciplineModel(
      edcensoDiscipline,
    );
    return await creatededcensoDiscipline.save();
  }

  async update(id: string, edcensoDiscipline: EdcensoDiscipline) {
    await this.edcensoDisciplineModel
      .updateOne({ _id: id }, edcensoDiscipline)
      .exec();
    return this.getById(id);
  }

  async delete(id: string) {
    return await this.edcensoDisciplineModel.deleteOne({ _id: id }).exec();
  }
}
