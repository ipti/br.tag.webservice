<?php

namespace app\modules\migration\models;

use yii\base\Model;
use app\modules\v1\models\GnrPerson;

class Student extends Model
{
    use \app\modules\migration\traits\Import;
    public $id_hash;
    public $id_inep;
    public $id_cpf;
    public $id_nis;
    public $id_civil_register;
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
            'gifted' => '',
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
    public $gifted;
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
            'other_courses_environment_education' => '',
            'other_courses_human_rights_education' => '',
            'other_courses_sexual_education' => '',
            'other_courses_child_and_teenage_rights' => '',
            'other_courses_ethnic_education' => '',
            'other_courses_other' => '',
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
    public $other_courses_environment_education;
    public $other_courses_human_rights_education;
    public $other_courses_sexual_education;
    public $other_courses_child_and_teenage_rights;
    public $other_courses_ethnic_education;
    public $other_courses_other;
    public $id_knowledge_area1;
    public $id_knowledge_area2;
    public $id_knowledge_area3;
    public $no_documents_desc;


    public function loadModel($student){
        $this->id_hash = $student->id_hash;
        $this->id_inep = $student->id_inep;
        $this->id_cpf = $student->id_cpf;
        $this->id_nis = $student->id_nis;
        $this->id_civil_register = $student->id_civil_register;
        $this->id_email = null;
        $this->filiation_type = $student->filiation_type;
        $this->filiation_1 = $student->filiation_1;
        $this->filiation_2 = $student->filiation_2;
        $this->birthday = $student->birthday;
        $this->birthday_nacionality = null;
        $this->birthday_country = null;
        $this->birthday_city = null;
        $this->gender = $student->gender;
        $this->skin_tone = $student->skin_tone;
        $this->street = $student->street;
        $this->country = null;
        $this->zipcode = $student->zipcode;
        $this->city = $student->city;
        $this->zone = $student->zone;
        $this->diff_location = null;
        $this->address = [
            'street' => $this->street,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'zone' => $this->zone,
            'diff_location' => $this->diff_location,
        ];
        $this->situation = boolval($student->situation);
        $this->blindness = boolval($student->blindness);
        $this->low_vision = boolval($student->low_vision);
        $this->deafness = boolval($student->deafness);
        $this->disability_hearing = boolval($student->disability_hearing);
        $this->deafblindness = boolval($student->deafblindness);
        $this->phisical_disability = boolval($student->phisical_disability);
        $this->intelectual_disability = boolval($student->intelectual_disability);
        $this->multiple_disabilities = boolval($student->multiple_disabilities);
        $this->autism = boolval($student->autism);
        $this->gifted = false;
        $this->resource_aid_lector = $student->resource_aid_lector;
        $this->resource_aid_transcription = $student->resource_aid_transcription;
        $this->resource_interpreter_guide = $student->resource_interpreter_guide;
        $this->resource_interpreter_libras = $student->resource_interpreter_libras;
        $this->resource_lip_reading = $student->resource_lip_reading;
        $this->resource_zoomed_test_18 = false;
        $this->resource_zoomed_test_24 = $student->resource_zoomed_test_24;
        $this->resource_cd_audio = false;
        $this->resource_proof_language = false;
        $this->resource_video_libras = false;
        $this->resource_braille_test = $student->resource_braille_test;
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
            'gifted' => $this->gifted,
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
        $this->scholarity = null;
        $this->high_school_type = null;
        $this->id_institution = null;
        $this->id_course = null;
        $this->degree_year = null;
        $this->post_graduation_specialization = false;
        $this->post_graduation_master = false;
        $this->post_graduation_doctorate = false;
        $this->post_graduation_education_manager = false;
        $this->other_courses_pre_school = false;
        $this->other_courses_basic_education_initial_years = false;
        $this->other_courses_basic_education_final_years = false;
        $this->other_courses_high_school = false;
        $this->other_courses_education_of_youth_and_adults = false;
        $this->other_courses_special_education = false;
        $this->other_courses_native_education = false;
        $this->other_courses_field_education = false;
        $this->other_courses_environment_education = false;
        $this->other_courses_human_rights_education = false;
        $this->other_courses_sexual_education = false;
        $this->other_courses_child_and_teenage_rights = false;
        $this->other_courses_ethnic_education = false;
        $this->other_courses_other = false;
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
                'si.hash AS id_hash', 
                'si.inep_id AS id_inep', 
                'sd.cpf AS id_cpf',
                'sd.nis AS id_nis',
                'sd.civil_certification AS id_civil_register',
                'si.name AS fullname',
                'si.filiation AS filiation_type',
                'si.filiation_1 AS filiation_1',
                'si.filiation_2 AS filiation_2',
                'si.birthday AS birthday',
                'si.sex AS gender',
                'si.color_race AS skin_tone',
                'sd.address AS street',
                'sd.cep AS zipcode',
                'sd.edcenso_city_fk AS city',
                'sd.edcenso_uf_fk AS zone',
                'si.deficiency AS situation',
                'si.deficiency_type_blindness AS blindness',
                'si.deficiency_type_low_vision AS low_vision',
                'si.deficiency_type_deafness AS deafness',
                'si.deficiency_type_disability_hearing AS disability_hearing',
                'si.deficiency_type_deafblindness AS deafblindness',
                'si.deficiency_type_phisical_disability AS phisical_disability',
                'si.deficiency_type_intelectual_disability AS intelectual_disability',
                'si.deficiency_type_multiple_disabilities AS multiple_disabilities',
                'si.deficiency_type_autism AS autism',
                'si.resource_aid_lector',
                'si.resource_aid_transcription',
                'si.resource_interpreter_guide',
                'si.resource_interpreter_libras',
                'si.resource_lip_reading',
                'si.resource_zoomed_test_24',
                'si.resource_braille_test',
            ])
            ->from('student_identification si')
            ->innerJoin('student_documents_and_address sd', 'si.hash = sd.hash')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('student_identification si')
            ->innerJoin('student_documents_and_address sd', 'si.hash = sd.hash')
            ->count();
    }

    public function factory(){
        return new GnrPerson(['scenario' => GnrPerson::SCENARIO_MIGRATION]);
    }
    
}