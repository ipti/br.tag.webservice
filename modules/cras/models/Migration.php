<?php

namespace app\modules\cras\models;

use yii\base\Model;
use app\modules\cras\models\migrations\ImportSchool;
use app\modules\cras\models\migrations\ImportClassroom;

class Migration extends Model{

    public function runImport($year=""){
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        ignore_user_abort();

        $school = new ImportSchool();
        $resultSchool = $school->run();

        $classroom = new ImportClassroom();
        $resultClassroom = $classroom->run($year);

        return [
            'school' => $resultSchool,
            'classroom' => $resultClassroom,
        ];
    }
}
