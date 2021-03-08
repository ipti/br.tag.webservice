<?php

namespace app\modules\cras\models\migrations;

use yii\base\Model;
use app\modules\cras\models\Classroom;

class ImportClassroom extends Model{

    use \app\modules\cras\traits\Migration;
    public $inepId;
    public $schoolInepId;
    public $name;
    public $year;
    public $modality;
    public $vacancies;
    public $classroomId;

    public function loadModel($classroom){
        $this->inepId       = $classroom->inepId;
        $this->schoolInepId = $classroom->schoolInepId;
        $this->name         = $classroom->name;
        $this->year         = $classroom->year;
        $this->modality     = $classroom->modality;
        $this->classroomId  = $classroom->classroomId;
    }

    public function find($limit = 500, $offset = 0, $year=""){
        $year = !empty($year) ? $year : date('Y') - 1;

        return (new \yii\db\Query())
            ->select([
                'cr.id AS classroomId',
                'cr.inep_id AS inepId',
                'cr.school_inep_fk AS schoolInepId',
                'cr.name',
                'cr.modality',
                'cr.school_year AS year'
            ])
            ->from('classroom cr')
            ->where(['school_year' => $year])
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('classroom cr')
            ->count();
    }

    public function factory(){
        return new Classroom(['scenario' => Classroom::SCENARIO_MIGRATION]);
    }


}
