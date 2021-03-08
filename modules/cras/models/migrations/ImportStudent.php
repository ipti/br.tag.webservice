<?php

namespace app\modules\cras\models\migrations;

use yii\base\Model;
use app\modules\cras\models\Student;
use app\modules\cras\models\Schedule;

class ImportStudent extends Model
{
    public $studentId;
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
    public $classroomSchoolYear;
    public $residenceZone;
    public $responsableCpf;
    public $stage;
    public $type;
    public $vaccined;
    public $frequency;
    public $classroomId;
    public $bought;

    public function loadModel($student){
        $this->studentId           = $student->studentId;
        $this->inepId              = $student->inepId;
        $this->schoolInepId        = $student->schoolInepId;
        $this->classroomId         = $student->classroomId;
        $this->name                = $student->name;
        $this->birthday            = $student->birthday;
        $this->filiation           = $student->filiation;
        $this->filiation1          = $student->filiation1;
        $this->responsableName     = $student->responsableName;
        $this->address             = $student->address;
        $this->city                = $student->city;
        $this->cep                 = $student->cep;
        $this->sex                 = $student->sex;
        $this->colorRace           = $student->colorRace;
        $this->nationality         = $student->nationality;
        $this->edcensoNationFk     = $student->edcensoNationFk;
        $this->deficiency          = $student->deficiency;
        $this->sendYear            = $student->sendYear;
        $this->classroomSchoolYear = $student->classroomSchoolYear;
        $this->residenceZone       = $student->residenceZone;
        $this->responsableCpf      = $student->responsableCpf;
        $this->stage               = $student->stage;
        $this->type                = $student->type;

        if($this->type == 'H'){
            $this->vaccined  = $student->vaccined;
            $this->bought = $student->vaccined;
        }

        if($this->type == 'E'){
            $this->frequency  = $student->frequency;
            $this->bought = $student->frequency >= 75 ? true : false;
        }
    }

    public function validation($stage = "", $type = ""){
      $valid = true;
      if($type != 'E' && $type != 'H'){
          $valid = false;
        }else if($type == 'E' and ($stage < 0 || $stage > 3)){
            $valid = false;
        }else if($type == 'H' and ($stage < 0 || $stage > 2)){
            $valid = false;
        }

        return $valid;
    }

    public function find($limit = 500, $offset = 0, $year="", $stage = "", $type = "",  $dataSchedule){

      $report = array();

      switch ($stage) {
          case '1':
            if($type == 'E') {
              $dayStart = date('j', strtotime($dataSchedule['dateStartEducation1']));
              $dayEnd = date('j', strtotime($dataSchedule['dateEndEducation1']));

              $monthStart = date('n', strtotime($dataSchedule['dateStartEducation1']));
              $monthEnd = date('n', strtotime($dataSchedule['dateEndEducation1']));
            }else{
              $dayStart = date('j', strtotime($dataSchedule['dateStartHealth1']));
              $dayEnd = date('j', strtotime($dataSchedule['dateEndHealth1']));

              $monthStart = date('n', strtotime($dataSchedule['dateStartHealth1']));
              $monthEnd = date('n', strtotime($dataSchedule['dateEndHealth1']));
            }
            break;
          case '2':
            if($type == 'E') {
              $dayStart = date('j', strtotime($dataSchedule['dateStartEducation2']));
              $dayEnd = date('j', strtotime($dataSchedule['dateEndEducation2']));

              $monthStart = date('n', strtotime($dataSchedule['dateStartEducation2']));
              $monthEnd = date('n', strtotime($dataSchedule['dateEndEducation2']));
            }else{
              $dayStart = date('j', strtotime($dataSchedule['dateStartHealth2']));
              $dayEnd = date('j', strtotime($dataSchedule['dateEndHealth2']));

              $monthStart = date('n', strtotime($dataSchedule['dateStartHealth2']));
              $monthEnd = date('n', strtotime($dataSchedule['dateEndHealth2']));
            }
            break;
          case '3':
            if($type == 'E') {
              $dayStart = date('j', strtotime($dataSchedule['dateStartEducation3']));
              $dayEnd = date('j', strtotime($dataSchedule['dateEndEducation3']));

              $monthStart = date('n', strtotime($dataSchedule['dateStartEducation3']));
              $monthEnd = date('n', strtotime($dataSchedule['dateEndEducation3']));
            }
            break;
      }

      $subQuery = (new \yii\db\Query())
        ->select('class.classroom_fk, class.month, student_fk, count(*) faults')
        ->from('class_faults cf')
        ->leftJoin('class', 'class.id = class_fk')
        ->groupBy(['student_fk', 'class.month','class.classroom_fk']);

      $result = (new \yii\db\Query())
            ->select([
                'si.name student',
                't.month',
                'count(*) count',
                'cf.faults',
                'si.id as studentId',
                'si.inep_id AS inepId',
                'si.school_inep_id_fk AS schoolInepId',
                'c.id AS classroomId',
                'si.filiation',
                'si.filiation_1 as filiation1',
                'si.responsable_name AS responsableName',
                'si.responsable_cpf AS responsableCpf',
                'si.birthday',
                'si.sex',
                'si.deficiency',
                'si.color_race as colorRace',
                'si.nationality',
                'si.edcenso_nation_fk as edcensoNationFk',
                'si.send_year as sendYear',
                'c.school_year as classroomSchoolYear',
                'sd.cep',
                'sd.address',
                'sd.residence_zone as residenceZone',
                'ec.name AS city'
            ])
            ->from('class t')
            ->leftJoin('classroom c', 'c.id = t.classroom_fk')
            ->leftJoin('student_enrollment se', 'se.classroom_fk = t.classroom_fk')
            ->leftJoin('student_identification si', 'se.student_fk = si.id')
            ->leftJoin('student_documents_and_address sd', 'sd.id = si.id')
            ->leftJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
            ->leftJoin(['cf' => $subQuery], 'c.id = cf.classroom_fk AND se.student_fk = cf.student_fk AND cf.month = t.month')
            ->where(['c.school_year' => $year])
            ->where("t.day >= $dayStart and t.day <= $dayEnd")
            ->where("t.month >= $monthStart and t.month <= $monthEnd")
            ->orderBy('student, t.month')
            ->groupBy(['c.id', 't.month', 'si.id', 'cf.faults'])
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();

      foreach ($result as $v) {
            $student    = $v['studentId'];
            $month      = $v['month'];
            $count      = isset($v['count'])        ? $v['count']       : 0;
            $faults     = isset($v['faults'])       ? $v['faults']      : 0;

            $report[$student]['classes'][$month]  =
                        ($count == 0)
                        ? 0
                        : (floor(
                                (($count-$faults)/$count)*100
                                *100
                            )/100
                            );

            $report[$student]['name']  = $v['student'];
            $report[$student]['classroomId']  = $v['classroomId'];
            $report[$student]['studentId']  = $v['studentId'];
            $report[$student]['inepId']     = $v['inepId'];
            $report[$student]['schoolInepId'] = $v['schoolInepId'];
            $report[$student]['filiation'] = $v['filiation'];
            $report[$student]['filiation1'] = $v['filiation1'];
            $report[$student]['responsableName'] = $v['responsableName'];
            $report[$student]['responsableCpf'] = $v['responsableCpf'];
            $report[$student]['birthday']   = $v['birthday'];
            $report[$student]['sex']   = $v['sex'];
            $report[$student]['deficiency']   = $v['deficiency'];
            $report[$student]['colorRace']   = $v['colorRace'];
            $report[$student]['nationality']   = $v['nationality'];
            $report[$student]['edcensoNationFk']   = $v['edcensoNationFk'];
            $report[$student]['sendYear']   = $v['sendYear'];
            $report[$student]['classroomSchoolYear']   = $v['classroomSchoolYear'];
            $report[$student]['cep']   = $v['cep'];
            $report[$student]['address']   = $v['address'];
            $report[$student]['residenceZone']   = $v['residenceZone'];
            $report[$student]['city']   = $v['city'];
            $report[$student]["stage"] = $stage;
            $report[$student]["type"] = $type;

            if($type == 'H'){
                $report[$student]["type"] = 'H';
                $age = $this->calculateAge($v['birthday']);

                $vaccinesByAge = $this->getIdVaccineByRangeAge($age);
                $ids_vaccines_student = $this->getVaccinesByStudent($student);
                $vaccined = false;

                foreach ($vaccinesByAge as $id) {
                    $vaccined = true;

                    if(!in_array($id, $ids_vaccines_student)){
                        $vaccined = false;
                        break;
                    }
                }

                $report[$student]["vaccined"] = $vaccined;

            }
        }

        if($type == 'E') {

          foreach ($report as $studentID => $data){
            $qtdMonth = count($data['classes']);

            if($qtdMonth > 0) {
                $sum = 0;
              foreach ($data['classes'] as $key => $value) {
                if(is_numeric($value)){
                    $sum += $value;
                  }
                }
                    $report[$studentID]["frequency"] = round($sum/$qtdMonth, 2);
                }else{
                    $report[$studentID]["frequency"] = 0;
                }
            }
        }

        return $report;
    }

    public function calculateAge($birthday){
        list($day, $month, $year) = explode('/', $birthday);
        $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $born_day = mktime( 0, 0, 0, $month, $day, $year);

        return floor((((($today - $born_day) / 60) / 60) / 24) / 365.25);
    }

    public function getIdVaccineByRangeAge($age){

        if($age <= 1){
            $vacancies = [
                'BCG ID',
                'Hepatite B',
                'Tríplice bacteriana (DTPw ou DTPa)',
                'Haemophilus influenzae b',
                'Poliomielite (vírus inativados)',
                'Rotavírus',
                'Pneumocócicas conjugadas',
                'Meningocócicas conjugadas ACWY/C',
                'Meningocócica B',
                'Influenza (gripe)',
                'Poliomielite oral (vírus vivos atenuados)',
                'Febre amarela',
                'Hepatite A',
                'Tríplice viral (sarampo, caxumba e rubéola)',
                'Varicela (catapora)'
            ];

        }else if($age > 1 && $age < 4){
            $vacancies = [
                'Tríplice bacteriana (DTPw ou DTPa)',
                'Haemophilus influenzae b',
                'Poliomielite (vírus inativados)',
                'Pneumocócicas conjugadas',
                'Meningocócicas conjugadas ACWY/C',
                'Meningocócica B',
                'Influenza (gripe)',
                'Poliomielite oral (vírus vivos atenuados)',
                'Hepatite A',
                'Tríplice viral (sarampo, caxumba e rubéola)',
                'Varicela (catapora)'
            ];
        }else if($age >= 4 && $age <= 6){
            $vacancies = [
                'Tríplice bacteriana (DTPw ou DTPa)',
                'Poliomielite (vírus inativados)',
                'Meningocócicas conjugadas ACWY/C',
                'Meningocócica B',
                'Influenza (gripe)',
                'Poliomielite oral (vírus vivos atenuados)',
                'Febre amarela'
            ];
        }

        if(isset($vacancies)){
           $get_vaccinies = (new \yii\db\Query())
            ->select('id')
            ->from('vaccine')
            ->where(['name' => $vacancies])
            ->all();

            return array_map(function($vaccine){ return $vaccine['id']; }, $get_vaccinies);
        }

        return array();
    }

    public function getVaccinesByStudent($student_id){
        $vaccines_student = (new \yii\db\Query())
        ->select('vaccine_id')
        ->from('student_vaccine')
        ->where(['student_id' => $student_id])
        ->all();

        return array_map(function($vaccine){ return $vaccine['vaccine_id']; }, $vaccines_student);
    }

    public function run($year, $stage, $type){
        if(!$this->validation($stage, $type)){
            return [
                'status' => '0',
                'message' => 'Etapa ou tipo não existe'
            ];
        }

        $schedule = Schedule::findOne(['year' => $year]);

        if(is_null($schedule)){
            return [
            'status' => '0',
            'message' => 'Calendário não existe'
            ];
        }

        $dataSchedule = $schedule->formatData();

        $batchSize = 200;
        $quantity = $this->count($year);
        $interations = ceil($quantity / $batchSize);
        $actualInteration = 0;

        while ($actualInteration < $interations) {
            if($actualInteration == 1000) exit;
            $data = $this->find($batchSize, $actualInteration, $year, $stage, $type, $dataSchedule);

            foreach ($data as $key => $item) {
                $this->loadModel((object) $item);
                $instance = $this->factory();
                $type = get_class($instance);
                $pos = strrpos($type, '\\') + 1;
                $type = substr($type, $pos);
                $dataModel = [$type => $this->getAttributes()];
                $instance->load($dataModel);
                $instance->save(false);
            }

            ++$actualInteration;
        }

        return $quantity;
    }

    public function count($year){
        return (new \yii\db\Query())->from('class t')
        ->leftJoin('classroom c', 'c.id = t.classroom_fk')
        ->leftJoin('student_enrollment se', 'se.classroom_fk = t.classroom_fk')
        ->leftJoin('student_identification si', 'se.student_fk = si.id')
        ->leftJoin('student_documents_and_address sd', 'sd.id = si.id')
        ->leftJoin('edcenso_city ec', 'ec.id=si.edcenso_city_fk')
        ->where(['c.school_year' => $year])
        ->orderBy('student, t.month')
        ->count();
    }

    public function factory(){
        return new Student(['scenario' => Student::SCENARIO_MIGRATION]);
    }
}
