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
import { EdcensoDiscipline } from './shared/edcensoDiscipline';
import { EdcensoDisciplineService } from './shared/edcensodiscipline.service';

@Controller('edcenso_discipline')
export class EdcensoDisciplineController {
  constructor(private edcensoDisciplineService: EdcensoDisciplineService) {}

  @UseGuards(JwtAuthGuard)
  @Get()
  async getAll(): Promise<EdcensoDiscipline[]> {
    return this.edcensoDisciplineService.getAll();
  }

  @UseGuards(JwtAuthGuard)
  @Get(':id')
  async getById(@Param('id') id: string): Promise<EdcensoDiscipline> {
    return this.edcensoDisciplineService.getById(id);
  }

  @UseGuards(JwtAuthGuard)
  @Post()
  async create(
    @Body() edcensoDiscipline: EdcensoDiscipline,
  ): Promise<EdcensoDiscipline> {
    return this.edcensoDisciplineService.create(edcensoDiscipline);
  }

  @UseGuards(JwtAuthGuard)
  @Put(':id')
  async update(
    @Param('id') id: string,
    @Body() edcensoDiscipline: EdcensoDiscipline,
  ): Promise<EdcensoDiscipline> {
    return this.edcensoDisciplineService.update(id, edcensoDiscipline);
  }

  @UseGuards(JwtAuthGuard)
  @Delete(':id')
  async delete(@Param('id') id: string) {
    this.edcensoDisciplineService.delete(id);
  }
}
