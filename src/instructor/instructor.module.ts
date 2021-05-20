import { InstructorController } from './instructor.controller';
import { InstructorService } from './shared/instructor.service';
import { InstructorSchema } from './schemas/instructor.schema';
import { Module } from '@nestjs/common';
import { MongooseModule } from '@nestjs/mongoose';

@Module({
  imports: [
    MongooseModule.forFeature([
      { name: 'Instructor', schema: InstructorSchema },
    ]),
  ],
  controllers: [InstructorController],
  providers: [InstructorService],
})
export class InstructorModule {}
