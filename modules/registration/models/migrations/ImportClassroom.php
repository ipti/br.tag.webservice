<?php

namespace app\modules\registration\models\migrations;

use yii\base\Model;
use app\modules\registration\models\Classroom;

class ImportClassroom extends Model{

    use \app\modules\registration\traits\Migration;
    public $inepId;
    public $schoolInepId;
    public $name;
    public $year;

    public function loadModel($classroom){
        $this->inepId       = $classroom->inepId;
        $this->schoolInepId = $classroom->schoolInepId;
        $this->name         = $classroom->name;
        $this->year         = $classroom->year;
    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'cr.inep_id AS inepId',
                'cr.school_inep_fk AS schoolInepId',
                'cr.name',
                'cr.school_year AS year'
            ])
            ->from('classroom cr')
            ->where(['school_year' => 2019])
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