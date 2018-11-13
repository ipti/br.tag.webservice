<?php

namespace app\modules\migration\models;

use yii\base\Model;
use app\modules\v1\models\AcadSchool;

class School extends Model
{
    use \app\modules\migration\traits\Import;
    public $id_inep;
    public $id_email;
    public $working_status;
    public $start_date;
    public $finish_date;
    public $name;

    public $address;
    public $cep;
    public $id_city;
    public $id_district;
    public $id_difflocation;
    public $street_name;
    public $street_number;
    public $street_complement;
    public $street_neighbor;
    public $street_zone;

    public $phone_ddd;
    public $phone_number;
    public $phone_secondanumber;
    public $id_educationorgan;
    public $id_admindependence;
    public $linked_mec;
    public $linked_army;
    public $linked_helth;
    public $linked_other;

    public $private_school;
    public $id_holdingcnpj;
    public $id_cnpj;
    public $holdind_business;
    public $holdind_syndicate;
    public $holdind_ong;
    public $holdind_ssystem;
    public $holdind_nonprofit;
    public $public_contract;

    public $regulation_status;
    public $regulation_organ;

    public $linked_school;
    public $basicorcollege;
    public $id_headschool;
    public $id_college;

    public $working_location;
    public $building_school;
    public $building_otherschool;
    public $building_barracks;
    public $building_socioeducative;
    public $building_prison;
    public $building_other;
    public $building_occupation;
    public $building_sharing;
    public $code_schoolsharing;

    public $supply_water;
    public $supply_water_public_network;
    public $artesian_well;
    public $well;
    public $river;
    public $supply_water_inexistent;

    public $supply_energy;
    public $supply_energy_public_network;
    public $generator_gas;
    public $generator_alternative;
    public $supply_energy_inexistent;

    public $supply_sewage;
    public $fossa;
    public $supply_sewage_public_network;
    public $fossa_common;
    public $supply_sewage_inexistent;

    public $supply_garbage;
    public $collect;
    public $burn;
    public $sepulcher;
    public $throw_anyarea;
    public $destination_public;

    public $supply_food;

    public $traetment_garbage;
    public $parting_garbage;
    public $resuse;
    public $recycling;
    public $traetment_garbage_inexistent;

    // ==== start dependencies ====

    public $dependencies;
    public $warehouse;
    public $green_area;
    public $auditorium;
    public $bathroom;
    public $bathroom_disabledperson;
    public $bathroom_child;
    public $bathroom_workes;
    public $bathroom_showers;
    public $library;
    public $kitchen;
    public $storeroom;
    public $student_accomodation;
    public $instructor_accomodation;
    public $science_lab;
    public $info_lab;
    public $playground;
    public $covered_patio;
    public $uncovered_patio;
    public $pool;
    public $indoor_sportscourt;
    public $outdoor_sportscourt;
    public $refectory;
    public $aee_room;
    public $arts_room;
    public $music_room;
    public $dance_room;
    public $multiuse_room;
    public $yardzao;
    public $vivarium;
    public $principal_room;
    public $read_room;
    public $instructors_room;
    public $rest_room;
    public $secretary_room;
    public $dependencies_inexistent;
    public $outside_roomspublic;
    public $indoor_roomspublic;
    public $climate_roomspublic;
    public $acessibility_roomspublic;

    // ==== end dependencies ====

    // ==== start acessabilty ====

    public $acessabilty;
    public $handrails_guardrails;
    public $elevator;
    public $tactile_floor;
    public $doors_80cm;
    public $ramps;
    public $sound_signaling;
    public $tactile_singnaling;
    public $visual_signaling;
    public $acessabilty_inexistent;

    // ==== end acessabilty ====

    // ==== start equipaments ====

    public $equipaments;
    public $satellite_dish;
    public $computer;
    public $copier;
    public $printer;
    public $multifunctional_printer;
    public $scanner;
    public $qtd_dvd;
    public $qtd_stereosystem;
    public $qtd_tv;
    public $qtd_blackboard;
    public $qtd_datashow;
    public $qtd_pcstudent;
    public $qtd_notebookstudent;
    public $qtd_tabletstudent;
    public $multimedia_collection;
    public $toys_early;
    public $scientific_materials;
    public $equipment_amplification;
    public $musical_instruments;
    public $educational_games;
    public $material_cultural;
    public $material_sports;
    public $material_teachingindian;
    public $material_teachingethnic;
    public $material_teachingrural;

    // ==== end equipaments ====

    // ==== start internet_access ====
    
    public $internet_access;
    public $administrative;
    public $educative_process;
    public $student;
    public $community;
    public $internet_access_inexistent;
    public $connected_personaldevice;
    public $connected_desktop;
    public $broadband;
    public $local_cable;
    public $local_wireless;
    public $local_inexistet;
    
    // ==== end internet_access ====

    // ==== start workers ====
    
    public $workers;
    public $administrative_assistant;
    public $service_assistant;
    public $librarian;
    public $firefighter;
    public $coordinator_shift;
    public $speech_therapist;
    public $nutritionist;
    public $psychologist;
    public $cooker;
    public $support_professionals;
    public $school_secretary;
    public $security_guards;
    public $monitors;
    
    // ==== end workers ====

    // ==== start org_teaching ====
    
    public $org_teaching;
    public $series_year;
    public $semester_periods;
    public $elementary_cycle;
    public $non_serialgroups;
    public $modules;
    public $regular_alternation;
    
    // ==== end org_teaching ====
    
    public $indian_school;
    
    // ==== start idioms ====
    
    public $idioms;
    public $indian;
    public $portuguese;
    public $indian_code1;
    public $indian_code2;
    public $indian_code3;
    
    // ==== end idioms ====
    
    public $select_adimission;

    // ==== start booking_enrollment ====
    
    public $booking_enrollment;
    public $self_declaredskin;
    public $income;
    public $public_school;
    public $disabled_person;
    public $booking_enrollment_others;
    public $booking_enrollment_inexistent;
    
    // ==== end booking_enrollment ====
    
    public $website;
    public $community_integration;
    public $space_schoolenviroment;
    public $ppp_updated;

    // ==== start board_organ ====
    
    public $board_organ;
    public $association_parent;
    public $association_parentinstructors;
    public $board_school;
    public $student_guild;
    public $board_organ_others;
    public $board_organ_inexistent;
    
    // ==== end board_organ ====


    public function loadModel($school){
        $this->id_inep = $school->id_inep;
        $this->id_email = $school->id_email;
        $this->working_status = null;
        $this->start_date = $school->start_date ;
        $this->finish_date = $school->finish_date;
        $this->name = $school->name;

        $this->cep = $school->cep;
        $this->id_city = $school->id_city;
        $this->id_district = $school->id_district;
        $this->id_difflocation = null;
        $this->street_name = $school->street_name;
        $this->street_number = $school->street_number;
        $this->street_complement = $school->street_complement;
        $this->street_neighbor = $school->street_neighbor;
        $this->street_zone = $school->street_zone;
        $this->address =[
            'cep' => $this->cep,
            'id_city' => $this->id_city,
            'id_district' => $this->id_district,
            'id_difflocation' =>  $this->id_difflocation,
            'street_name' => $this->street_name,
            'street_number' => $this->street_number,
            'street_complement' => $this->street_complement,
            'street_neighbor' => $this->street_neighbor,
            'street_zone' => $this->street_zone,
        ];

        $this->phone_ddd =  $school->phone_ddd;
        $this->phone_number =  $school->phone_number;
        $this->phone_secondanumber = $school->other_phone_number;
        $this->id_educationorgan = $school->id_educationorgan;
        $this->id_admindependence = $school->id_admindependence;
        $this->linked_mec = false;
        $this->linked_army = false;
        $this->linked_helth = false;
        $this->linked_other = false;

        $this->id_holdingcnpj = $school->id_holdingcnpj;
        $this->id_cnpj = $school->id_cnpj;
        $this->holdind_business = $school->holdind_business;
        $this->holdind_syndicate = $school->holdind_syndicate;
        $this->holdind_ong = $school->holdind_ong;
        $this->holdind_ssystem = $school->holdind_ssystem;
        $this->holdind_nonprofit = $school->holdind_nonprofit;
        $this->public_contract =  $school->public_contract;
        
        $this->private_school = [
            'id_holdingcnpj' => $this->id_holdingcnpj,
            'id_cnpj' => $this->id_cnpj,
            'holdind_business' => $this->holdind_business,
            'holdind_syndicate' => $this->holdind_syndicate,
            'holdind_ong' => $this->holdind_ong,
            'holdind_ssystem' => $this->holdind_ssystem,
            'holdind_nonprofit' => $this->holdind_nonprofit,
            'public_contract' => $this->public_contract,
        ];

        $this->regulation_status = $school->regulation_status;
        $this->regulation_organ = null;

        $this->basicorcollege = null;
        $this->id_headschool = null;
        $this->id_college = null;
        $this->linked_school = [
            'basicorcollege' => $this->basicorcollege,
            'id_headschool' => $this->id_headschool,
            'id_college' => $this->id_college,
        ];

        $this->building_school = $school->building_school;
        $this->building_otherschool = null;
        $this->building_barracks = $school->building_barracks;
        $this->building_socioeducative = $school->building_socioeducative;
        $this->building_prison = $school->building_prison;
        $this->building_other = $school->building_other;
        $this->building_occupation = $school->building_occupation;
        $this->building_sharing = $school->building_sharing;
        $this->code_schoolsharing = $school->code_schoolsharing;
        $this->working_location = [
           'building_school' => $this->building_school,
           'building_otherschool' => $this->building_otherschool,
           'building_barracks' => $this->building_barracks,
           'building_socioeducative' => $this->building_socioeducative,
           'building_prison' => $this->building_prison,
           'building_other' => $this->building_other,
           'building_occupation' => $this->building_occupation,
           'building_sharing' => $this->building_sharing,
           'code_schoolsharing' => $this->code_schoolsharing,
        ];
        
        $this->supply_water_public_network = $school->supply_water_public_network;
        $this->artesian_well = $school->artesian_well;
        $this->well = $school->well;
        $this->river = $school->river;
        $this->supply_water_inexistent = $school->supply_water_inexistent;
        $this->supply_water = [
            'public_network' => $this->supply_water_public_network,
            'artesian_well' => $this->artesian_well,
            'well' => $this->well,
            'river' => $this->river,
            'inexistent' => $this->supply_water_inexistent,
        ];

        $this->supply_energy_public_network = $school->supply_energy_public_network;
        $this->generator_gas = $school->generator_gas;
        $this->generator_alternative = null;
        $this->supply_energy_inexistent = $school->supply_energy_inexistent;
        $this->supply_energy = [
            'public_network' => $this->supply_energy_public_network,
            'generator_gas' => $this->generator_gas,
            'generator_alternative' => $this->generator_alternative,
            'supply_energy_inexistent' => $this->supply_energy_inexistent,
        ];

        $this->fossa = $school->fossa;
        $this->supply_sewage_public_network = $school->supply_sewage_public_network;
        $this->fossa_common = null;
        $this->supply_sewage_inexistent = $school->supply_sewage_inexistent;
        $this->supply_sewage = [
            'fossa' => $this->fossa,
            'supply_sewage_public_network' => $this->supply_sewage_public_network,
            'fossa_common' => $this->fossa_common,
            'supply_sewage_inexistent' => $this->supply_sewage_inexistent,
        ];

        $this->collect = $school->collect;
        $this->burn = $school->burn;
        $this->sepulcher = null;
        $this->throw_anyarea = $school->throw_anyarea;
        $this->destination_public = null;
        $this->supply_garbage = [
            'collect' => $this->collect,
            'burn' => $this->burn,
            'sepulcher' => $this->sepulcher,
            'throw_anyarea' => $this->throw_anyarea,
            'destination_public' => $this->destination_public,
        ];
        
        $this->supply_food = null;

        $this->parting_garbage = null;
        $this->resuse = null;
        $this->recycling = $school->recycling;
        $this->traetment_garbage_inexistent = null;
        $this->traetment_garbage = [
            'parting_garbage' => $this->parting_garbage,
            'resuse' => $this->resuse,
            'recycling' => $this->recycling,
            'inexistent' => $this->traetment_garbage_inexistent,
        ];

        // ==== start dependencies ====

        $this->warehouse = $school->warehouse;
        $this->green_area = $school->green_area;
        $this->auditorium = $school->auditorium;
        $this->bathroom = $school->bathroom;
        $this->bathroom_disabledperson = false;
        $this->bathroom_child = $school->bathroom_child;
        $this->bathroom_workes = false;
        $this->bathroom_showers = $school->bathroom_showers;
        $this->library = $school->library;
        $this->kitchen = $school->kitchen;
        $this->storeroom = $school->storeroom;
        $this->student_accomodation = $school->student_accomodation;
        $this->instructor_accomodation = $school->instructor_accomodation;
        $this->science_lab = $school->science_lab;
        $this->info_lab = $school->info_lab;
        $this->playground = $school->playground;
        $this->covered_patio = $school->covered_patio;
        $this->uncovered_patio = $school->uncovered_patio;
        $this->pool = false;
        $this->indoor_sportscourt = $school->indoor_sportscourt;
        $this->outdoor_sportscourt = $school->outdoor_sportscourt;
        $this->refectory = $school->refectory;
        $this->aee_room = $school->aee_room;
        $this->arts_room = false;
        $this->music_room = false;
        $this->dance_room = false;
        $this->multiuse_room = false;
        $this->yardzao = false;
        $this->vivarium = false;
        $this->principal_room = $school->principal_room;
        $this->read_room = $school->read_room;
        $this->instructors_room = $school->instructors_room;
        $this->rest_room = false;
        $this->secretary_room = $school->secretary_room;
        $this->dependencies_inexistent = $school->dependencies_inexistent;
        $this->outside_roomspublic = false;
        $this->indoor_roomspublic = false;
        $this->climate_roomspublic = false;
        $this->acessibility_roomspublic = false;
        $this->dependencies = [
            'warehouse' => $this->warehouse,
            'green_area' => $this->green_area,
            'auditorium' => $this->auditorium,
            'bathroom' => $this->bathroom,
            'bathroom_disabledperson' => $this->bathroom_disabledperson,
            'bathroom_child' => $this->bathroom_child,
            'bathroom_workes' => $this->bathroom_workes,
            'bathroom_showers' => $this->bathroom_showers,
            'library' => $this->library,
            'kitchen' => $this->kitchen,
            'storeroom' => $this->storeroom,
            'student_accomodation' => $this->student_accomodation,
            'instructor_accomodation' => $this->instructor_accomodation,
            'science_lab' => $this->science_lab,
            'info_lab' => $this->info_lab,
            'playground' => $this->playground,
            'covered_patio' => $this->covered_patio,
            'uncovered_patio' => $this->uncovered_patio,
            'pool' => $this->pool,
            'indoor_sportscourt' => $this->indoor_sportscourt,
            'outdoor_sportscourt' => $this->outdoor_sportscourt,
            'refectory' => $this->refectory,
            'aee_room' => $this->aee_room,
            'arts_room' => $this->arts_room,
            'music_room' => $this->music_room,
            'dance_room' => $this->dance_room,
            'multiuse_room' => $this->multiuse_room,
            'yardzao' => $this->yardzao,
            'vivarium' => $this->vivarium,
            'principal_room' => $this->principal_room,
            'read_room' => $this->read_room,
            'instructors_room' => $this->instructors_room,
            'rest_room' => $this->rest_room,
            'secretary_room' => $this->secretary_room,
            'dependencies_inexistent' => $this->dependencies_inexistent,
            'outside_roomspublic' => $this->outside_roomspublic,
            'indoor_roomspublic' => $this->indoor_roomspublic,
            'climate_roomspublic' => $this->climate_roomspublic,
            'acessibility_roomspublic' => $this->acessibility_roomspublic,
        ];

        // ==== end dependencies ====

        // ==== start acessabilty ====

        $this->handrails_guardrails = false;
        $this->elevator = false;
        $this->tactile_floor = false;
        $this->doors_80cm = false;
        $this->ramps = false;
        $this->sound_signaling = false;
        $this->tactile_singnaling = false;
        $this->visual_signaling = false;
        $this->acessabilty_inexistent = false;
        $this->acessabilty = [
            'handrails_guardrails' => $this->handrails_guardrails,
            'elevator' => $this->elevator,
            'tactile_floor' => $this->tactile_floor,
            'doors_80cm' => $this->doors_80cm,
            'ramps' => $this->ramps,
            'sound_signaling' => $this->sound_signaling,
            'tactile_singnaling' => $this->tactile_singnaling,
            'visual_signaling' => $this->visual_signaling,
            'acessabilty_inexistent' => $this->acessabilty_inexistent,
        ];

        // ==== end acessabilty ====

        // ==== start equipaments ====

        $this->satellite_dish = boolval($school->satellite_dish);
        $this->computer = boolval($school->computer);
        $this->copier = boolval($school->copier);
        $this->printer = boolval($school->printer);
        $this->multifunctional_printer = boolval($school->multifunctional_printer);
        $this->scanner = false;
        $this->qtd_dvd = $school->qtd_dvd;
        $this->qtd_stereosystem = $school->qtd_stereosystem;
        $this->qtd_tv = $school->qtd_tv;
        $this->qtd_blackboard = null;
        $this->qtd_datashow = $school->qtd_datashow;
        $this->qtd_pcstudent = $school->qtd_pcstudent;
        $this->qtd_notebookstudent = null;
        $this->qtd_tabletstudent = null;
        $this->multimedia_collection = false;
        $this->toys_early = false;
        $this->scientific_materials = false;
        $this->equipment_amplification = false;
        $this->musical_instruments = false;
        $this->educational_games = false;
        $this->material_cultural = false;
        $this->material_sports = false;
        $this->material_teachingindian = false;
        $this->material_teachingethnic = false;
        $this->material_teachingrural = false;
        $this->equipaments = [
            'satellite_dish' => $this->satellite_dish,
            'computer' => $this->computer,
            'copier' => $this->copier,
            'printer' => $this->printer,
            'multifunctional_printer' => $this->multifunctional_printer,
            'scanner' => $this->scanner,
            'qtd_dvd' => $this->qtd_dvd,
            'qtd_stereosystem' => $this->qtd_stereosystem,
            'qtd_tv' => $this->qtd_tv,
            'qtd_blackboard' => $this->qtd_blackboard,
            'qtd_datashow' => $this->qtd_datashow,
            'qtd_pcstudent' => $this->qtd_pcstudent,
            'qtd_notebookstudent' => $this->qtd_notebookstudent,
            'qtd_tabletstudent' => $this->qtd_tabletstudent,
            'multimedia_collection' => $this->multimedia_collection,
            'toys_early' => $this->toys_early,
            'scientific_materials' => $this->scientific_materials,
            'equipment_amplification' => $this->equipment_amplification,
            'musical_instruments' => $this->musical_instruments,
            'educational_games' => $this->educational_games,
            'material_cultural' => $this->material_cultural,
            'material_sports' => $this->material_sports,
            'material_teachingindian' => $this->material_teachingindian,
            'material_teachingethnic' => $this->material_teachingethnic,
            'material_teachingrural' => $this->material_teachingrural,
        ];

        // ==== end equipaments ====

        // ==== start internet_access ====
        
        $this->administrative = false;
        $this->educative_process = false;
        $this->student = false;
        $this->community = false;
        $this->internet_access_inexistent = false;
        $this->connected_personaldevice = false;
        $this->connected_desktop = false;
        $this->broadband = false;
        $this->local_cable = false;
        $this->local_wireless = false;
        $this->local_inexistet = false;
        $this->internet_access = [
            'administrative' => $this->administrative,
            'educative_process' => $this->educative_process,
            'student' => $this->student,
            'community' => $this->community,
            'inexistent' => $this->internet_access_inexistent,
            'connected_personaldevice' => $this->connected_personaldevice,
            'connected_desktop' => $this->connected_desktop,
            'broadband' => $this->broadband,
            'local_cable' => $this->local_cable,
            'local_wireless' => $this->local_wireless,
            'local_inexistet' => $this->local_inexistet,
        ];
        
        // ==== end internet_access ====

        // ==== start workers ====
        
        $this->administrative_assistant = null;
        $this->service_assistant = null;
        $this->librarian = null;
        $this->firefighter = null;
        $this->coordinator_shift = null;
        $this->speech_therapist = null;
        $this->nutritionist = null;
        $this->psychologist = null;
        $this->cooker = null;
        $this->support_professionals = null;
        $this->school_secretary = null;
        $this->security_guards = null;
        $this->monitors = null;
        $this->workers = [
            'administrative_assistant' => $this->administrative_assistant,
            'service_assistant' => $this->service_assistant,
            'librarian' => $this->librarian,
            'firefighter' => $this->firefighter,
            'coordinator_shift' => $this->coordinator_shift,
            'speech_therapist' => $this->speech_therapist,
            'nutritionist' => $this->nutritionist,
            'psychologist' => $this->psychologist,
            'cooker' => $this->cooker,
            'support_professionals' => $this->support_professionals,
            'school_secretary' => $this->school_secretary,
            'security_guards' => $this->security_guards,
            'monitors' => $this->monitors,
        ];
        
        // ==== end workers ====

        // ==== start org_teaching ====
        
        $this->series_year = false;
        $this->semester_periods = false;
        $this->elementary_cycle = false;
        $this->non_serialgroups = false;
        $this->modules = false;
        $this->regular_alternation = false;
        $this->org_teaching = [
            'series_year' => $this->series_year,
            'semester_periods' => $this->semester_periods,
            'elementary_cycle' => $this->elementary_cycle,
            'non_serialgroups' => $this->non_serialgroups,
            'modules' => $this->modules,
            'regular_alternation' => $this->regular_alternation,
        ];
        
        // ==== end org_teaching ====
        
        $this->indian_school = $school->indian_school;
        
        // ==== start idioms ====
        
        $this->indian = $school->indian;
        $this->portuguese = $school->portuguese ;
        $this->indian_code1 = null;
        $this->indian_code2 = null;
        $this->indian_code3 = null;
        $this->idioms = [
            'indian' => $this->indian,
            'portuguese' => $this->portuguese ,
            'indian_code1' => $this->indian_code1,
            'indian_code2' => $this->indian_code2,
            'indian_code3' => $this->indian_code3,
        ];
        
        // ==== end idioms ====
        
        $this->select_adimission = false;

        // ==== start booking_enrollment ====
        
        $this->self_declaredskin = false;
        $this->income = false;
        $this->public_school = false;
        $this->disabled_person = false;
        $this->booking_enrollment_others = false;
        $this->booking_enrollment_inexistent = false;
        $this->booking_enrollment = [
            'self_declaredskin' => $this->self_declaredskin,
            'income' => $this->income,
            'public_school' => $this->public_school,
            'disabled_person' => $this->disabled_person,
            'others' => $this->booking_enrollment_others,
            'inexistent' => $this->booking_enrollment_inexistent,
        ];
        
        // ==== end booking_enrollment ====
        
        $this->website = false;
        $this->community_integration = false;
        $this->space_schoolenviroment = false;
        $this->ppp_updated = null;

        // ==== start board_organ ====
        
        $this->association_parent = false;
        $this->association_parentinstructors = false;
        $this->board_school = false;
        $this->student_guild = false;
        $this->board_organ_others = false;
        $this->board_organ_inexistent = false;
        $this->board_organ = [
            'association_parent' => $this->association_parent,
            'association_parentinstructors' => $this->association_parentinstructors,
            'board_school' => $this->board_school,
            'student_guild' => $this->student_guild,
            'others' => $this->board_organ_others,
            'inexistent' => $this->board_organ_inexistent,
        ];
    }

    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'si.inep_id AS id_inep',
                'si.email AS id_email',
                'si.initial_date AS start_date',
                'si.final_date AS finish_date',
                'si.name',
                'si.cep',
                'si.edcenso_city_fk AS id_city',
                'si.edcenso_district_fk AS id_district',
                'si.address AS street_name',
                'si.address_number AS street_number',
                'si.address_complement AS street_complement',
                'si.address_neighborhood AS street_neighbor',
                'si.edcenso_uf_fk AS street_zone',
                'si.ddd AS phone_ddd',
                'si.phone_number',
                'si.other_phone_number',
                'si.edcenso_regional_education_organ_fk AS id_educationorgan',
                'si.administrative_dependence AS id_admindependence',
                'si.private_school_maintainer_cnpj AS id_holdingcnpj',
                'si.private_school_cnpj AS id_cnpj',
                'si.private_school_business_or_individual AS holdind_business',
                'si.private_school_syndicate_or_association AS holdind_syndicate',
                'si.private_school_ong_or_oscip AS holdind_ong',
                'si.private_school_s_system AS holdind_ssystem',
                'si.private_school_non_profit_institutions AS holdind_nonprofit',
                'si.public_contract',
                'si.regulation AS regulation_status',
                'ss.operation_location_building AS building_school',
                'ss.operation_location_barracks AS building_barracks',
                'ss.operation_location_socioeducative_unity AS building_socioeducative',
                'ss.operation_location_prison_unity AS building_prison',
                'ss.operation_location_other AS building_other',
                'ss.building_occupation_situation AS building_occupation',
                'ss.shared_building_with_school AS building_sharing',
                'ss.shared_school_inep_id_1 AS code_schoolsharing',
                'ss.water_supply_public AS supply_water_public_network',
                'ss.water_supply_artesian_well AS artesian_well',
                'ss.water_supply_well AS well',
                'ss.water_supply_river AS river',
                'ss.water_supply_inexistent AS supply_water_inexistent',
                'ss.energy_supply_public AS supply_energy_public_network',
                'ss.energy_supply_generator AS generator_gas',
                'ss.energy_supply_inexistent AS supply_energy_inexistent',
                'ss.sewage_fossa AS fossa',
                'ss.sewage_public AS supply_sewage_public_network',
                'ss.sewage_inexistent AS supply_sewage_inexistent',
                'ss.garbage_destination_collect AS collect',
                'ss.garbage_destination_burn AS burn',
                'ss.garbage_destination_throw_away AS throw_anyarea',
                'ss.garbage_destination_recycle AS recycling',
                'ss.dependencies_warehouse AS warehouse',
                'ss.dependencies_green_area AS green_area',
                'ss.dependencies_auditorium AS auditorium',
                'ss.dependencies_inside_bathroom AS bathroom',
                'ss.dependencies_child_bathroom AS bathroom_child',
                'ss.dependencies_bathroom_with_shower AS bathroom_showers',
                'ss.dependencies_library AS library',
                'ss.dependencies_kitchen AS kitchen',
                'ss.dependencies_storeroom AS storeroom',
                'ss.dependencies_student_accomodation AS student_accomodation',
                'ss.dependencies_instructor_accomodation AS instructor_accomodation',
                'ss.dependencies_science_lab AS science_lab',
                'ss.dependencies_info_lab AS info_lab',
                'ss.dependencies_playground AS playground',
                'ss.dependencies_covered_patio AS covered_patio',
                'ss.dependencies_uncovered_patio AS uncovered_patio',
                'ss.dependencies_indoor_sports_court AS indoor_sportscourt',
                'ss.dependencies_outdoor_sports_court AS outdoor_sportscourt',
                'ss.dependencies_refectory AS refectory',
                'ss.dependencies_aee_room AS aee_room',
                'ss.dependencies_principal_room AS principal_room',
                'ss.dependencies_reading_room AS read_room',
                'ss.dependencies_instructors_room AS instructors_room',
                'ss.dependencies_secretary_room AS secretary_room',
                'ss.dependencies_none AS dependencies_inexistent',
                'ss.equipments_satellite_dish AS satellite_dish',
                'ss.equipments_computer AS computer',
                'ss.equipments_copier AS copier',
                'ss.equipments_printer AS printer',
                'ss.equipments_multifunctional_printer AS multifunctional_printer',
                'ss.equipments_stereo_system AS qtd_stereosystem',
                'ss.equipments_tv AS qtd_tv',
                'ss.equipments_dvd AS qtd_dvd',
                'ss.equipments_data_show AS qtd_datashow',
                'ss.student_computers_count AS qtd_pcstudent',
                'ss.native_education AS indian_school',
                'ss.native_education_language_native AS indian',
                'ss.native_education_language_portuguese AS portuguese'
            ])
            ->from('school_identification si')
            ->innerJoin('school_structure ss', 'si.inep_id = ss.school_inep_id_fk')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->from('school_identification si')
            ->innerJoin('school_structure ss', 'si.inep_id = ss.school_inep_id_fk')
            ->count();
    }

    public function factory(){
        return new AcadSchool(['scenario' => AcadSchool::SCENARIO_MIGRATION]);
    }



    
}