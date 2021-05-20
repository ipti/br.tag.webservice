import { SchoolService } from './shared/school.service';
import { SchoolController } from './school.controller';
import { Module } from '@nestjs/common';
import { SchoolSchema } from './schemas/school';
import { MongooseModule } from '@nestjs/mongoose';
@Module({
  imports: [
    MongooseModule.forFeature([{ name: 'School', schema: SchoolSchema }]),
  ],
  controllers: [SchoolController],
  providers: [SchoolService],
})
export class SchoolModule {}
