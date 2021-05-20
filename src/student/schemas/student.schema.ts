import * as mongoose from 'mongoose';

export const StudentSchema = new mongoose.Schema({
  register_type: String,
  school_inep_id_fk: String,
  inep_id: String,
  name: String,
  birthday: String,
  sex: Number,
  color_race: Number,
  filiation: Number,
  filiation_1: String,
  filiation_2: String,
  nationality: Number,
  no_document_desc: Number,
  scholarity: Number,
  id_email: String,
  edcenso_nation_fk: Number,
  edcenso_uf_fk: Number,
  edcenso_city_fk: Number,
  deficiency: Boolean,
  deficiency_type_blindness: Boolean,
  deficiency_type_low_vision: Boolean,
  deficiency_type_deafness: Boolean,
  deficiency_type_disability_hearing: Boolean,
  deficiency_type_deafblindness: Boolean,
  deficiency_type_phisical_disability: Boolean,
  deficiency_type_intelectual_disability: Boolean,
  deficiency_type_multiple_disabilities: Boolean,
  deficiency_type_autism: Boolean,
  deficiency_type_aspenger_syndrome: Boolean,
  deficiency_type_rett_syndrome: Boolean,
  deficiency_type_childhood_disintegrative_disorder: Boolean,
  deficiency_type_gifted: Boolean,
  resource_aid_lector: Boolean,
  resource_aid_transcription: Boolean,
  resource_interpreter_guide: Boolean,
  resource_interpreter_libras: Boolean,
  resource_lip_reading: Boolean,
  resource_zoomed_test_16: Boolean,
  resource_zoomed_test_18: Boolean,
  resource_zoomed_test_20: Boolean,
  resource_zoomed_test_24: Boolean,
  resource_cd_audio: Boolean,
  resource_proof_language: Boolean,
  resource_video_libras: Boolean,
  resource_braille_test: Boolean,
  resource_none: Boolean,
  send_year: Number,
  last_change: Date,
  responsable: Number,
  responsable_name: String,
  responsable_rg: String,
  responsable_cpf: String,
  responsable_scholarity: Number,
  responsable_job: String,
  bf_participator: Boolean,
  food_restrictions: String,
  responsable_telephone: String,
  hash: Number,
  filiation_1_rg: String,
  filiation_1_cpf: String,
  filiation_1_scholarity: Number,
  filiation_1_job: String,
  filiation_2_rg: String,
  filiation_2_cpf: String,
  filiation_2_scholarity: Number,
  filiation_2_job: String,
});