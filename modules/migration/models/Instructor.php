<?php

namespace app\modules\migration\models;

use yii\base\Model;
use app\modules\v1\models\GnrPerson;

class Instructor extends Model
{
    use app\modules\migration\traits\Import;
    public $id_hash;
    public $id_inep;
    public $id_cpf;
    public $id_nis;
    public $id_civil_regiter;
    public $id_email;
    public $fullname;
    public $filiation_type;
    public $filiation_1;
    public $filiation_2;
    public $birthday;
    public $birthday_nacionality;
    public $birthday_country;
    public $birthday_city;
    public $gender;
    public $skin_tone;

    /*
        @var address
        @type array
        [
            'street' => '',
            'country' => '',
            'zipcode' => '',
            'city' => '',
            'zone' => '',
            'diff_location' => '',
        ]
    */
    public $address;
    public $street;
    public $country;
    public $zipcode;
    public $city;
    public $zone;
    public $diff_location;
    
    /*
        @var deficiency
        @type array
        [
            'situation' => '',
            'blindness' => '',
            'low_vision' => '',
            'deafness' => '',
            'disability_hearing' => '',
            'deafblindness' => '',
            'phisical_disability' => '',
            'intelectual_disability' => '',
            'multiple_disabilities' => '',
            'autism' => '',
            'gitfed' => '',
            'resource_aid_lector' => '',
            'resource_aid_transcription' => '',
            'resource_interpreter_guide' => '',
            'resource_interpreter_libras' => '',
            'resource_lip_reading' => '',
            'resource_zoomed_test_18' => '',
            'resource_zoomed_test_24' => '',
            'resource_cd_audio' => '',
            'resource_proof_language' => '',
            'resource_video_libras' => '',
            'resource_braille_test' => '',
        ]
    */

    public $deficiency;
    public $situation;
    public $blindness;
    public $low_vision;
    public $deafness;
    public $disability_hearing;
    public $deafblindness;
    public $phisical_disability;
    public $intelectual_disability;
    public $multiple_disabilities;
    public $autism;
    public $gitfed;
    public $resource_aid_lector;
    public $resource_aid_transcription;
    public $resource_interpreter_guide;
    public $resource_interpreter_libras;
    public $resource_lip_reading;
    public $resource_zoomed_test_18;
    public $resource_zoomed_test_24;
    public $resource_cd_audio;
    public $resource_proof_language;
    public $resource_video_libras;
    public $resource_braille_test;
    public $scholarity;
    
    /*
        @var college_details
        @type array
        [
            'high_school_type' => '',
            'id_institution' => '',
            'id_course' => '',
            'degree_year' => '',
            'post_graduation_specialization' => '',
            'post_graduation_master' => '',
            'post_graduation_doctorate' => '',
            'post_graduation_education_manager' => '',
            'other_courses_pre_school' => '',
            'other_courses_basic_education_initial_years' => '',
            'other_courses_basic_education_final_years' => '',
            'other_courses_high_school' => '',
            'other_courses_education_of_youth_and_adults' => '',
            'other_courses_special_education' => '',
            'other_courses_native_education' => '',
            'other_courses_field_education' => '',
            'other_courses_enviromment_education' => '',
            'other_courses_human_rights_education' => '',
            'other_courses_sexual_education' => '',
            'other_courses_child_and_teenage_rights' => '',
            'other_courses_ethnic_education' => '',
            'other_courses_others' => '',
            'id_knowledge_area1' => '',
            'id_knowledge_area2' => '',
            'id_knowledge_area3' => '',
        ]
    */
    public $college_details;
    public $high_school_type;
    public $id_institution;
    public $id_course;
    public $degree_year;
    public $post_graduation_specialization;
    public $post_graduation_master;
    public $post_graduation_doctorate;
    public $post_graduation_education_manager;
    public $other_courses_pre_school;
    public $other_courses_basic_education_initial_years;
    public $other_courses_basic_education_final_years;
    public $other_courses_high_school;
    public $other_courses_education_of_youth_and_adults;
    public $other_courses_special_education;
    public $other_courses_native_education;
    public $other_courses_field_education;
    public $other_courses_enviromment_education;
    public $other_courses_human_rights_education;
    public $other_courses_sexual_education;
    public $other_courses_child_and_teenage_rights;
    public $other_courses_ethnic_education;
    public $other_courses_others;
    public $id_knowledge_area1;
    public $id_knowledge_area2;
    public $id_knowledge_area3;
    public $no_documents_desc;


    public function load($instructor){
        $this->id_hash = $instructor->hash;
        $this->id_inep = $instructor->inep_id;
        $this->id_cpf = $instructor->cpf;
        $this->id_nis = $instructor->nis;
        $this->id_civil_register = null;
        $this->id_email = $instructor->id_email;
        $this->filiation_type = $instructor->filiation;
        $this->filiation_1 = $instructor->filiation_1;
        $this->filiation_2 = $instructor->filiation_2;
        $this->birthday = $instructor->birthday;
        $this->birthday_nacionality = null;
        $this->birthday_country = null;
        $this->birthday_city = null;
        $this->gender = $instructor->sex;
        $this->skin_tone = $instructor->color_race;
        $this->street = $instructor->address;
        $this->country = null;
        $this->zipcode = $instructor->cep;
        $this->city = $instructor->edcenso_city_fk;
        $this->zone = $instructor->edcenso_uf_fk;
        $this->diff_location = null;
        $this->address = [
            'street' => $this->street,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'zone' => $this->zone,
            'diff_location' => $this->diff_location,
        ];
        $this->situation = boolval($this->deficiency);
        $this->blindness = boolval($this->deficiency_type_blindness);
        $this->low_vision = boolval($this->deficiency_type_low_vision);
        $this->deafness = boolval($this->deficiency_type_deafness);
        $this->disabilty_hearing = boolval($this->deficiency_type_disabilty_hearing);
        $this->deafblindness = boolval($this->deficiency_type_deafblindness);
        $this->phisical_disability = boolval($this->deficiency_type_phisical_disability);
        $this->intelectual_disability = boolval($this->deficiency_type_intelectual_disability);
        $this->multiple_disabilities = boolval($this->deficiency_type_multiple_disabilities);
        $this->autism = false;
        $this->gifted = false;
        $this->resource_aid_lector = false;
        $this->resource_aid_transcription = false;
        $this->resource_interpreter_guide = false;
        $this->resource_interpreter_libras = false;
        $this->resource_lip_reading = false;
        $this->resource_zoomed_18 = false;
        $this->resource_zoomed_24 = false;
        $this->resource_cd_audio = false;
        $this->resource_proof_language = false;
        $this->resource_video_libras = false;
        $this->resource_braille_test = false;
        $this->deficiency =[
            'situation' => $this->situation,
            'blindness' => $this->blindness,
            'low_vision' => $this->low_vision,
            'deafness' => $this->deafness,
            'disability_hearing' => $this->disability_hearing,
            'deafblindness' => $this->deafblindness,
            'phisical_disability' => $this->phisical_disability,
            'intelectual_disability' => $this->intelectual_disability,
            'multiple_disabilities' => $this->multiple_disabilities,
            'autism' => $this->autism,
            'gitfed' => $this->gitfed,
            'resource_aid_lector' => $this->resource_aid_lector,
            'resource_aid_transcription' => $this->resource_aid_transcription,
            'resource_interpreter_guide' => $this->resource_interpreter_guide,
            'resource_interpreter_libras' => $this->resource_interpreter_libras,
            'resource_lip_reading' => $this->resource_lip_reading,
            'resource_zoomed_test_18' => $this->resource_zoomed_test_18,
            'resource_zoomed_test_24' => $this->resource_zoomed_test_24,
            'resource_cd_audio' => $this->resource_cd_audio,
            'resource_proof_language' => $this->resource_proof_language,
            'resource_video_libras' => $this->resource_video_libras,
            'resource_braille_test' => $this->resource_braille_test,
        ];
        $this->scholarity = $instructor->schorality;
        $this->high_school_type = null;
        $this->id_institution = null;
        $this->id_course = null;
        $this->degree_year = null;
        $this->post_graduation_specialization = $instructor->post_graduation_specialization;
        $this->post_graduation_master = $instructor->post_graduation_master;
        $this->post_graduation_doctorate = $instructor->post_graduation_doctorate;
        $this->post_graduation_education_manager = false;
        $this->other_courses_pre_school = $instructor->other_courses_pre_school;
        $this->other_courses_basic_education_initial_years = $instructor->other_courses_basic_education_initial_years;
        $this->other_courses_basic_education_final_years = $instructor->other_courses_basic_education_final_years;
        $this->other_courses_high_school = $instructor->other_courses_high_school;
        $this->other_courses_education_of_youth_and_adults = $instructor->other_courses_education_of_youth_and_adults;
        $this->other_courses_special_education = $instructor->other_courses_special_education;
        $this->other_courses_native_education = $instructor->other_courses_native_education;
        $this->other_courses_field_education = $instructor->other_courses_field_education;
        $this->other_courses_enviroment_education = $instructor->other_courses_enviroment_education;
        $this->other_courses_human_rights_education = $instructor->other_courses_human_rights_education;
        $this->other_courses_sexual_education = $instructor->other_courses_sexual_education;
        $this->other_courses_child_and_teenage_rights = $instructor->other_courses_child_and_teenage_rights;
        $this->other_courses_ethnic_education = $instructor->other_courses_ethnic_educatio;
        $this->other_courses_other = $instructor->other_courses_other;
        $this->id_knowledge_area1 = null;
        $this->id_knowledge_area2 = null;
        $this->id_knowledge_area3 = null;
        $this->college_details = [
            "high_school_type" => $this->high_school_type ,
            "id_institution" => $this->id_institution,
            "id_course" => $this->id_course,
            "degree_year" => $this->degree_year,
            "post_graduation_specialization" => $this->post_graduation_specialization,
            "post_graduation_master" => $this->post_graduation_master,
            "post_graduation_doctorate" => $this->post_graduation_doctorate,
            "post_graduation_education_manager" => $this->post_graduation_education_manager,
            "other_courses_pre_school" => $this->other_courses_pre_school,
            "other_courses_basic_education_initial_years" => $this->other_courses_basic_education_initial_years,
            "other_courses_basic_education_final_years" => $this->other_courses_basic_education_final_years,
            "other_courses_high_school" => $this->other_courses_high_school,
            "other_courses_education_of_youth_and_adults" => $this->other_courses_education_of_youth_and_adults,
            "other_courses_special_education" => $this->other_courses_special_education,
            "other_courses_native_education" => $this->other_courses_native_education,
            "other_courses_field_education" => $this->other_courses_field_education,
            "other_courses_environment_education" => $this->other_courses_environment_education,
            "other_courses_human_rights_education" => $this->other_courses_human_rights_education,
            "other_courses_sexual_education" => $this->other_courses_sexual_education,
            "other_courses_child_and_teenage_rights" => $this->other_courses_child_and_teenage_rights,
            "other_courses_ethnic_education" => $this->other_courses_ethnic_education,
            "other_courses_other" => $this->other_courses_other,
            "id_knowledge _area1" => $this->id_knowledge_area1,
            "id_knowledge _area2" => $this->id_knowledge_area2,
            "id_knowledge _area3" => $this->id_knowledge_area3
        ];
        $this->no_documents_desc = null;

    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'ii.hash AS id_hash', 
                'ii.inep_id AS id_inep', 
                'ida.cpf AS id_cpf',
                'ii.nis AS id_nis',
                'ii.email AS id_email',
                'ii.name AS fullname',
                'ii.filiation AS filiation_type',
                'ii.filiation_1 AS filiation_1',
                'ii.filiation_2 AS filiation_1',
                'ii.birthday_date AS birthday',
                'ii.sex AS gender',
                'ii.color_race AS skin_tone',
                'ida.address AS street',
                'ida.cep AS zipcode',
                'ida.edcenso_city_fk AS city',
                'ida.edcenso_uf_fk AS zone',
                'ii.deficiency AS situation',
                'ii.deficiency_type_blindness AS blindness',
                'ii.deficiency_type_low_vision AS low_vision',
                'ii.deficiency_type_deafness AS deafness',
                'ii.deficiency_type_disability_hearing AS disability_hearing',
                'ii.deficiency_type_deafblindness AS deafblindness',
                'ii.deficiency_type_phisical_disability AS phisical_disability',
                'ii.deficiency_type_intelectual_disability AS intelectual_disability',
                'ii.deficiency_type_multiple_disabilities AS multiple_disabilities',
                'ivd.post_graduation_specialization',
                'ivd.post_graduation_master',
                'ivd.post_graduation_doctorate',
                'ivd.other_courses_pre_school',
                'ivd.other_courses_basic_education_initial_years',
                'ivd.other_courses_basic_education_final_years',
                'ivd.other_courses_high_school',
                'ivd.other_courses_education_of_youth_and_adults',
                'ivd.other_courses_special_education',
                'ivd.other_courses_native_education',
                'ivd.other_courses_field_education',
                'ivd.other_courses_environment_education',
                'ivd.other_courses_human_rights_education',
                'ivd.other_courses_sexual_education',
                'ivd.other_courses_child_and_teenage_rights',
                'ivd.other_courses_ethnic_education',
                'ivd.other_courses_other',
            ])
            ->from('instructor_identification ii')
            ->innerJoin('instructor_documents_and_address ida', 'ii.hash = ida.hash')
            ->innerJoin('instructor_variable_data ivd', 'ii.hash = ivd.hash')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->select('COUNT(*)')
            ->from('instructor_identification ii')
            ->innerJoin('instructor_documents_and_address ida', 'ii.hash = ida.hash')
            ->innerJoin('instructor_variable_data ivd', 'ii.hash = ivd.hash')
            ->all();
    }

    public function factory(){
        return new GnrPerson(['scenario' => GnrPerson::SCENARIO_MIGRATION]);
    }
    
}