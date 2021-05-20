import { StudentController } from './student.controller';
import { StudentService } from './shared/student.service';
import { Module } from '@nestjs/common';
import { StudentSchema } from './schemas/student.schema';
import { MongooseModule } from '@nestjs/mongoose';

@Module({
  imports: [
    MongooseModule.forFeature([{ name: 'Student', schema: StudentSchema }]),
  ],
  controllers: [StudentController],
  providers: [StudentService],
})
export class StudentModule {}
