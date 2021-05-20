import { InstructorModule } from './instructor/instructor.module';
import { EdCensoDisciplineModule } from './edcensoDiscipline/edcensodiscipline.module';
import { StudentModule } from './student/student.module';
import { SchoolModule } from './school/school.module';
import { AuthModule } from './auth/auth.module';
import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { UsersModule } from './users/users.module';
import { MongooseModule } from '@nestjs/mongoose';

@Module({
  imports: [
    InstructorModule,
    EdCensoDisciplineModule,
    StudentModule,
    SchoolModule,
    MongooseModule.forRoot('mongodb://localhost:27017/teste'),
    AuthModule,
    UsersModule,
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
