<?php

namespace app\modules\registration\models\migrations;

use yii\base\Model;
use app\modules\registration\models\migrations\AcadStudent;

class ExportStudent extends Model
{
    use \app\modules\registration\traits\Migration;
    public $school_inep_id_fk;   
    public $name;           
    public $birthday;       
    public $filiation;      
    public $filiation_1;      
    public $responsable_name;
    public $sex;        
    public $color_race;  
    public $nationality;
    public $edcenso_nation_fk;
    public $deficiency;
    public $send_year;

    public function loadModel($student){
        $this->school_inep_id_fk = $student->schoolInepId;
        $this->name              = $student->name;
        $this->birthday          = $student->birthday;
        $this->filiation_1       = $student->filiation1;
        $this->filiation         = $student->filiation;
        $this->responsable_name  = $student->responsableName;
        $this->sex               = $student->sex;
        $this->color_race        = $student->colorRace;
        $this->nationality       = $student->nationality;
        $this->edcenso_nation_fk = $student->edcensoNationFk;
        $this->deficiency        = $student->deficiency;
        $this->send_year         = $student->sendYear;
    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\mongodb\Query())
            ->select(['schoolInepId', 
                'name', 
                'birthday', 
                'filiation',
                'filiation1',
                'responsableName',
                'sex',
                'colorRace',
                'nationality',
                'edcensoNationFk',
                'deficiency',
                'sendYear'
            ])
            ->from('student')
            ->where(['newStudent' => true])
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\mongodb\Query())
            ->from('student')
            ->count();
    }

    public function factory(){
        return new AcadStudent(['scenario' => AcadStudent::SCENARIO_MIGRATION]);
    }
}