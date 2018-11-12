<?php

namespace app\modules\migration\models;

use yii\base\Model;

class Import extends Model{

    public function run(){
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        ignore_user_abort();

        $student = new Student();
        $resultStudent = $student->import();

        $instructor = new Instructor();
        $resultInstructor = $instructor->import();

        $school = new School();
        $resultSchool = $school->import();

        $classroom = new Classroom();
        $resultClassroom = $classroom->import();

        $enrollment = new Enrollment();
        $resultEnrollment = $enrollment->import();

        return [
            'student' => $resultStudent,
            'instructor' => $resultInstructor,
            'school' => $resultSchool,
            'classroom' => $resultClassroom,
            'enrollment' => $resultEnrollment,
        ];


    }
}