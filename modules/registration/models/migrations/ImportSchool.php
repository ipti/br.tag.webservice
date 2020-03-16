<?php

namespace app\modules\registration\models\migrations;

use yii\base\Model;
use app\modules\registration\models\School;

class ImportSchool extends Model
{
    use \app\modules\registration\traits\Migration;
    public $inepId;
    public $name;
    public $managerName;
    public $address;
    public $cep;
    public $city;
    public $administrative_dependence;

    public function loadModel($school){
        $this->inepId                    = $school->inepId;
        $this->name                      = $school->name;
        $this->managerName               = $school->managerName;
        $this->address                   = $school->address;
        $this->cep                       = $school->cep;
        $this->city                      = $school->city;
        $this->administrative_dependence = $school->administrative_dependence;
    }


    public function find($limit = 500, $offset = 0, $year=""){
        return (new \yii\db\Query())
            ->select([
                'si.inep_id AS inepId',
                'si.name',
                'si.manager_name AS managerName',
                'si.cep',
                'si.address',
                'ec.name AS city',
                'si.administrative_dependence'
            ])
            ->from('school_identification si')
            ->innerJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('school_identification si')
            ->innerJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
            ->count();
    }

    public function factory(){
        return new School(['scenario' => School::SCENARIO_MIGRATION]);
    }



    
}