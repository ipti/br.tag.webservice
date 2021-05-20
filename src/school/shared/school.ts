import { Document } from 'mongoose';

export class School extends Document {
  register_type: string;
  inep_id: string;
  manager_cpf: string;
  manager_name: string;
  manager_role: number;
  manager_email: string;
  manager_access_criterion: string;
  manager_contract_type: number;
  situation: number;
  initial_date: string;
  final_date: string;
  name: string;
  latitude: string;
  longitude: string;
  cep: string;
  address: string;
  address_number: string;
  address_complement: string;
  address_neighborhood: string;
  edcenso_uf_fk: number;
  edcenso_city_fk: number;
  edcenso_district_fk: number;
  ddd: string;
  phone_number: string;
  public_phone_number: string;
  other_phone_number: string;
  fax_number: string;
  email: string;
  edcenso_regional_education_organ_fk: string;
  administrative_dependence: number;
  location: number;
  id_difflocation: number;
  linked_mec: boolean;
  linked_army: boolean;
  linked_helth: boolean;
  linked_other: boolean;
  private_school_category: number;
  public_contract: number;
  private_school_business_or_individual: boolean;
  private_school_syndicate_or_association: boolean;
  private_school_ong_or_oscip: boolean;
  private_school_non_profit_institutions: boolean;
  private_school_s_system: boolean;
  private_school_organization_civil_society: boolean;
  private_school_maintainer_cnpj: string;
  private_school_cnpj: string;
  regulation: number;
  regulation_organ: number;
  regulation_organ_federal: boolean;
  regulation_organ_state: boolean;
  regulation_organ_municipal: boolean;
  offer_or_linked_unity: number;
  inep_head_school: string;
  ies_code: string;
  logo_file_name: string;
  logo_file_type: string;
  logo_file_content: string;
  act_of_acknowledgement: string;
}