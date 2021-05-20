import { Module } from '@nestjs/common';
import { EdcensoDisciplineSchema } from './schemas/edcensoDiscipline.schema';
import { MongooseModule } from '@nestjs/mongoose';
import { EdcensoDisciplineService } from './shared/edcensodiscipline.service';
import { EdcensoDisciplineController } from './edcensodiscipline.controller';
@Module({
  imports: [
    MongooseModule.forFeature([
      { name: 'EdcensoDiscipline', schema: EdcensoDisciplineSchema },
    ]),
  ],
  controllers: [EdcensoDisciplineController],
  providers: [EdcensoDisciplineService],
})
export class EdCensoDisciplineModule {}
