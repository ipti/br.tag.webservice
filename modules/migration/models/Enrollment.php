<?php

namespace app\modules\migration\models;

use yii\base\Model;
use app\modules\v1\models\AcadEnrollment;

class Enrollment extends Model{

    use \app\modules\migration\traits\Import;
    public $id_hashperson;
    public $id_hashclassroom;
    public $multi;

    public $aee;
    public $cognitive_functions;
    public $autonomous_life;
    public $curriculum_enrichment;
    public $accessible_teaching;
    public $libras;
    public $portuguese;
    public $soroban;
    public $braille;
    public $mobility_techniques;
    public $caa;
    public $optical_nonoptical;

    public $another_space;

    public $public_transport;
    public $responsable_government;
    public $vehicle_bike;
    public $vehicle_microbus;
    public $vehicle_bus;
    public $vehicle_van;
    public $vehicle_animal;
    public $vehicle_other;
    public $waterway_boat_5;
    public $waterway_boat_5_15;
    public $waterway_boat_15_35;
    public $waterway_boat_35;


    public function loadModel($enrollment){
        $this->id_hashperson = $enrollment->id_hashperson;
        $this->id_hashclassroom = $enrollment->id_hashclassroom;
        $this->multi = null;

        $this->cognitive_functions = false;
        $this->autonomous_life = false;
        $this->curriculum_enrichment = false;
        $this->accessible_teaching = false;
        $this->libras = false;
        $this->portuguese = false;
        $this->soroban = false;
        $this->braille = false;
        $this->mobility_techniques = false;
        $this->caa = false;
        $this->optical_nonoptical = false;
        $this->aee = [
            'cognitive_functions' => $this->cognitive_functions,
            'autonomous_life' => $this->autonomous_life,
            'curriculum_enrichment' => $this->curriculum_enrichment,
            'accessible_teaching' => $this->accessible_teaching,
            'libras' => $this->libras,
            'portuguese' => $this->portuguese,
            'soroban' => $this->soroban,
            'braille' => $this->braille,
            'mobility_techniques' => $this->mobility_techniques,
            'caa' => $this->caa,
            'optical_nonoptical' => $this->optical_nonoptical, 
        ];

        $this->another_space = null;
        
        $this->responsable_government = $enrollment->responsable_government;
        $this->vehicle_bike = boolval($enrollment->vehicle_bike);
        $this->vehicle_microbus = boolval($enrollment->vehicle_microbus);
        $this->vehicle_bus = boolval($enrollment->vehicle_bus);
        $this->vehicle_van = boolval($enrollment->vehicle_van);
        $this->vehicle_animal = boolval($enrollment->vehicle_animal);
        $this->vehicle_other = boolval($enrollment->vehicle_other);
        $this->waterway_boat_5 = boolval($enrollment->waterway_boat_5);
        $this->waterway_boat_5_15 = boolval($enrollment->waterway_boat_5_15);
        $this->waterway_boat_15_35 = boolval($enrollment->waterway_boat_15_35);
        $this->waterway_boat_35 = boolval($enrollment->waterway_boat_35);
        $this->public_transport = [
            'responsable_government' => $this->responsable_government,
            'vehicle_bike' => $this->vehicle_bike,
            'vehicle_microbus' => $this->vehicle_microbus,
            'vehicle_bus' => $this->vehicle_bus,
            'vehicle_van' => $this->vehicle_van,
            'vehicle_animal' => $this->vehicle_animal,
            'vehicle_other' => $this->vehicle_other,
            'waterway_boat_5' => $this->waterway_boat_5,
            'waterway_boat_5_15' => $this->waterway_boat_5_15,
            'waterway_boat_15_35' => $this->waterway_boat_15_35,
            'waterway_boat_35' => $this->waterway_boat_35,
        ];

    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'se.hash_student AS id_hashperson',
                'se.hash_classroom AS id_hashclassroom',
                'se.hash_classroom AS id_hashclassroom',
                'se.transport_responsable_government AS responsable_government',
                'se.vehicle_type_bike AS vehicle_bike',
                'se.vehicle_type_microbus AS vehicle_microbus',
                'se.vehicle_type_bus AS vehicle_bus',
                'se.vehicle_type_van AS vehicle_van',
                'se.vehicle_type_animal_vehicle AS vehicle_animal',
                'se.vehicle_type_other_vehicle AS vehicle_other',
                'se.vehicle_type_waterway_boat_5 AS waterway_boat_5',
                'se.vehicle_type_waterway_boat_5_15 AS waterway_boat_5_15',
                'se.vehicle_type_waterway_boat_15_35 AS waterway_boat_15_35',
                'se.vehicle_type_waterway_boat_35 AS waterway_boat_35',
            ])
            ->from('student_enrollment se')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('student_enrollment se')
            ->count();
    }

    
    public function factory(){
        return new AcadEnrollment(['scenario' => AcadEnrollment::SCENARIO_MIGRATION]);
    }

    
    
}