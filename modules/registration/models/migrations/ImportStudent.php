<?php

namespace app\modules\registration\models\migrations;

use yii\base\Model;
use app\modules\registration\models\Student;

class ImportStudent extends Model
{
    use \app\modules\registration\traits\Migration;
    public $inepId;         
    public $schoolInepId;   
    public $name;           
    public $birthday;       
    public $filiation;      
    public $filiation1;      
    public $responsableName;
    public $address;        
    public $city;           
    public $cep;            
    public $sex;            
    public $colorRace;            
    public $nationality;            
    public $edcensoNationFk;            
    public $deficiency;            
    public $sendYear;            

    public function loadModel($student){
        $this->inepId            = $student->inepId;
        $this->schoolInepId      = $student->schoolInepId;
        $this->name              = $student->name;
        $this->birthday          = $student->birthday;
        $this->filiation         = $student->filiation;
        $this->filiation1        = $student->filiation1;
        $this->responsableName   = $student->responsableName;
        $this->address           = $student->address;
        $this->city              = $student->city;
        $this->cep               = $student->cep;
        $this->sex               = $student->sex;
        $this->colorRace         = $student->colorRace;
        $this->nationality       = $student->nationality;
        $this->edcensoNationFk   = $student->edcensoNationFk;
        $this->deficiency        = $student->deficiency;
        $this->sendYear         = $student->sendYear;
    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'si.inep_id AS inepId',
                'si.school_inep_id_fk AS schoolInepId',
                'si.name',
                'si.filiation',
                'si.filiation_1 as filiation1',
                'si.responsable_name AS responsableName',
                'si.birthday',
                'si.sex',
                'si.deficiency',
                'si.color_race as colorRace',
                'si.nationality',
                'si.edcenso_nation_fk as edcensoNationFk',
                'si.send_year as sendYear',
                'sd.cep',
                'sd.address',
                'ec.name AS city'
            ])
            ->from('student_identification si')
            ->innerJoin('student_documents_and_address sd', 'si.id=sd.id')
            ->innerJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('student_identification si')
            ->innerJoin('student_documents_and_address sd', 'si.id=sd.id')
            ->innerJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
            ->count();
    }

    public function factory(){
        return new Student(['scenario' => Student::SCENARIO_MIGRATION]);
    }
}