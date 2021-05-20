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
import { School } from './shared/school';
import { SchoolService } from './shared/school.service';

@Controller('scholl')
export class SchoolController {
  constructor(private schoolService: SchoolService) {}

  @UseGuards(JwtAuthGuard)
  @Get()
  async getAll(): Promise<School[]> {
    return this.schoolService.getAll();
  }

  @UseGuards(JwtAuthGuard)
  @Get(':id')
  async getById(@Param('id') id: string): Promise<School> {
    return this.schoolService.getById(id);
  }

  @UseGuards(JwtAuthGuard)
  @Post()
  async create(@Body() school: School): Promise<School> {
    return this.schoolService.create(school);
  }

  @UseGuards(JwtAuthGuard)
  @Put(':id')
  async update(
    @Param('id') id: string,
    @Body() school: School,
  ): Promise<School> {
    return this.schoolService.update(id, school);
  }

  @UseGuards(JwtAuthGuard)
  @Delete(':id')
  async delete(@Param('id') id: string) {
    this.schoolService.delete(id);
  }
}
