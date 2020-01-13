<?php

namespace app\modules\registration\models;

use yii\base\Model;
use app\modules\registration\models\migrations\ImportSchool;
use app\modules\registration\models\migrations\ImportClassroom;
use app\modules\registration\models\migrations\ImportStudent;

use app\modules\registration\models\migrations\ExportStudent;

class Migration extends Model{

    public function runImport(){
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        ignore_user_abort();

        $school = new ImportSchool();
        $resultSchool = $school->run();
        
        $classroom = new ImportClassroom();
        $resultClassroom = $classroom->run();
        
        $student = new ImportStudent();
        $resultStudent = $student->run();

        return [
            'school' => $resultSchool,
            'classroom' => $resultClassroom,
            'student' => $resultStudent
        ];
    }

    public function runExport(){
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        ignore_user_abort();

        $student = new ExportStudent();
        $resultStudent = $student->run();
        
        /*$classroom = new MigrateClassroom();
        $resultClassroom = $classroom->import();*/

        return [
            'student' => $resultStudent
            /* 'classroom' => $resultClassroom,*/
        ];
    }
}