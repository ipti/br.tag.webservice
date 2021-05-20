import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Post,
  Put,
  UseGuards,
} from '@nestjs/common';
import { JwtAuthGuard } from 'src/auth/shared/jwt-auth.guard';
import { Student } from './shared/student';
import { StudentService } from './shared/student.service';

@Controller('students')
export class StudentController {
  constructor(private studentService: StudentService) {}

  @UseGuards(JwtAuthGuard)
  @Get()
  async getAll(): Promise<Student[]> {
    return this.studentService.getAll();
  }

  @UseGuards(JwtAuthGuard)
  @Get(':id')
  async getById(@Param('id') id: string): Promise<Student> {
    return this.studentService.getById(id);
  }

  @UseGuards(JwtAuthGuard)
  @Post()
  async create(@Body() student: Student): Promise<Student> {
    return this.studentService.create(student);
  }

  @UseGuards(JwtAuthGuard)
  @Put(':id')
  async update(
    @Param('id') id: string,
    @Body() student: Student,
  ): Promise<Student> {
    return this.studentService.update(id, student);
  }

  @UseGuards(JwtAuthGuard)
  @Delete(':id')
  async delete(@Param('id') id: string) {
    this.studentService.delete(id);
  }
}
