import { Document } from 'mongoose';

export class Instructor extends Document {
  register_type: string;
  school_inep_id_fk: string;
  inep_id: string;
  name: string;
  email: string;
  nis: string;
  birthday_date: string;
  sex: number;
  color_race: number;
  filiation: boolean;
  filiation_1: string;
  filiation_2: string;
  nationality: number;
  edcenso_nation_fk: number;
  edcenso_uf_fk: number;
  edcenso_city_fk: number;
  deficiency: boolean;
  deficiency_type_blindness: boolean;
  deficiency_type_low_vision: boolean;
  deficiency_type_deafness: boolean;
  deficiency_type_disability_hearing: boolean;
  deficiency_type_deafblindness: boolean;
  deficiency_type_phisical_disability: boolean;
  deficiency_type_intelectual_disability: boolean;
  deficiency_type_multiple_disabilities: boolean;
  deficiency_type_autism: boolean;
  deficiency_type_gifted: boolean;
  hash: number;
}
