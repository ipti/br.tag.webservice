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
import { Instructor } from './shared/instructor';
import { InstructorService } from './shared/instructor.service';

@Controller('instructor')
export class InstructorController {
  constructor(private instructorService: InstructorService) {}

  @UseGuards(JwtAuthGuard)
  @Get()
  async getAll(): Promise<Instructor[]> {
    return this.instructorService.getAll();
  }

  @UseGuards(JwtAuthGuard)
  @Get(':id')
  async getById(@Param('id') id: string): Promise<Instructor> {
    return this.instructorService.getById(id);
  }

  @UseGuards(JwtAuthGuard)
  @Post()
  async create(@Body() instructor: Instructor): Promise<Instructor> {
    return this.instructorService.create(instructor);
  }

  @UseGuards(JwtAuthGuard)
  @Put(':id')
  async update(
    @Param('id') id: string,
    @Body() instructor: Instructor,
  ): Promise<Instructor> {
    return this.instructorService.update(id, instructor);
  }

  @UseGuards(JwtAuthGuard)
  @Delete(':id')
  async delete(@Param('id') id: string) {
    this.instructorService.delete(id);
  }
}
