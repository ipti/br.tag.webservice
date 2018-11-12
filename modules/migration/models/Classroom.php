<?php

namespace app\modules\migration\models;

use yii\base\Model;
use app\modules\v1\models\AcadClassroom;

class Classroom extends Model{

    use app\modules\migration\traits\Import;
    public $id_schoolinep;
    public $id_inep;
    public $name;
    public $type_pedagogicalmediation;

    public $work_times;
    public $initial_hour;
    public $initial_minute;
    public $final_hour;
    public $final_minute;

    public $work_days;
    public $sunday;
    public $monday;
    public $tuesday;
    public $wednesday;
    public $thursday;
    public $friday;
    public $saturday;

    public $schooling;
    public $aee;
    public $complementary_activies;
    public $diff_location;
    public $modality;
    public $stage;
    public $course;

    public $disciplines;

    public $chemistry;
    public $person;
    public $function;
    public $hiring_regime;

    public $physics;
    public $mathematics;
    public $biology;
    public $science;
    public $portuguese_literature;
    public $language_english;
    public $language_spanish;
    public $language_other;
    public $arts;
    public $physical_education;
    public $history;
    public $geography;
    public $philosophy;
    public $informatics;
    public $professional_disciplines;
    public $libras;
    public $pedagogical;
    public $religious;
    public $native_language;
    public $social_study;
    public $sociology;
    public $language_franch;
    public $language_portuguese;
    public $internship;
    public $others;


    public function load($classroom){
        $this->id_schoolinep = $classroom->id_schoolinep;
        $this->id_inep = $classroom->id_inep;
        $this->name = $classroom->name;
        $this->type_pedagogicalmediation = $classroom->type_pedagogicalmediation;

        $this->initial_hour = $classroom->initial_hour;
        $this->initial_minute = $classroom->initial_minute;
        $this->final_hour = $classroom->final_hour;
        $this->final_minute = $classroom->final_minute;
        $this->work_times = [
            'initial_hour' => $this->initial_hour,
            'initial_minute' => $this->initial_minute,
            'final_hour' => $this->final_hour,
            'final_minute' => $this->final_minute,
        ];

        $this->sunday = $classroom->sunday;
        $this->monday = $classroom->monday;
        $this->tuesday = $classroom->tuesday;
        $this->wednesday = $classroom->wednesday;
        $this->thursday = $classroom->thursday;
        $this->friday = $classroom->friday;
        $this->saturday = $classroom->saturday;
        $this->work_days = [
            'sunday' => $this->sunday,
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,
            'thursday' => $this->thursday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
        ];

        $this->schooling = null;
        $this->aee = false;
        $this->complementary_activies = null;
        $this->diff_location = null;
        $this->modality = $classroom->modality;
        $this->stage = $classroom->stage;
        $this->course = null;

        
        $this->person = null;
        $this->function = null;
        $this->hiring_regime = null;
        $this->chemistry = [
            'person' => $this->person,
            'function' => $this->function,
            'hiring_regime' => $this->hiring_regime,
        ];

        $this->physics = $classroom->physics;
        $this->mathematics = $classroom->mathematics;
        $this->biology = $classroom->biology;
        $this->science = $classroom->science;
        $this->portuguese_literature = $classroom->portuguese_literature;
        $this->language_english = $classroom->language_english;
        $this->language_spanish = $classroom->language_spanish;
        $this->language_other = $classroom->language_other;
        $this->arts = $classroom->arts;
        $this->physical_education = $classroom->physical_education;
        $this->history = $classroom->history;
        $this->geography = $classroom->geography;
        $this->philosophy = $classroom->philosophy;
        $this->informatics = $classroom->informatics;
        $this->professional_disciplines = $classroom->professional_disciplines;
        $this->libras = $classroom->libras;
        $this->pedagogical = $classroom->pedagogical;
        $this->religious = $classroom->religious;
        $this->native_language = $classroom->native_language;
        $this->social_study = $classroom->social_study;
        $this->sociology = $classroom->sociology;
        $this->language_franch = $classroom->language_franch;
        $this->language_portuguese = $classroom->language_portuguese;
        $this->internship = null;
        $this->others = $classroom->others;
        $this->disciplines = [
            'chemistry' => $this->chemistry,
            'physics' => $this->physics,
            'mathematics' => $this->mathematics,
            'biology' => $this->biology,
            'science' => $this->science,
            'portuguese_literature' => $this->portuguese_literature,
            'language_english' => $this->language_english,
            'language_spanish' => $this->language_spanish,
            'language_other' => $this->language_other,
            'arts' => $this->arts,
            'physical_education' => $this->physical_education,
            'history' => $this->history,
            'geography' => $this->geography,
            'philosophy' => $this->philosophy,
            'informatics' => $this->informatics,
            'professional_disciplines' => $this->professional_disciplines,
            'libras' => $this->libras,
            'pedagogical' => $this->pedagogical,
            'religious' => $this->religious,
            'native_language' => $this->native_language,
            'social_study' => $this->social_study,
            'sociology' => $this->sociology,
            'language_franch' => $this->language_franch,
            'language_portuguese' => $this->language_portuguese,
            'internship' => $this->internship,
            'others' => $this->others,
        ];
    }


    public function find($limit = 500, $offset = 0){
        return (new \yii\db\Query())
            ->select([
                'cr.school_inep_fk AS id_schoolinep',
                'cr.inep_id AS id_inep',
                'cr.name',
                'cr.pedagogical_mediation_type AS type_pedagogicalmediation',
                'cr.initial_hour',
                'cr.initial_minute',
                'cr.final_hour',
                'cr.final_minute',
                'cr.week_days_sunday AS sunday',
                'cr.week_days_monday AS monday',
                'cr.week_days_tuesday AS tuesday',
                'cr.week_days_wednesday AS wednesday',
                'cr.week_days_thursday AS thursday',
                'cr.week_days_friday AS friday',
                'cr.week_days_saturday AS saturday',
                'cr.modality',
                'cr.edcenso_stage_vs_modality_fk AS stage',
                'cr.discipline_physics AS physics',
                'cr.discipline_mathematics AS mathematics',
                'cr.discipline_biology AS biology',
                'cr.discipline_science AS science',
                'cr.discipline_language_portuguese_literature AS portuguese_literature',
                'cr.discipline_foreing_language_english AS language_english',
                'cr.discipline_foreing_language_spanish AS language_spanish',
                'cr.discipline_foreing_language_other AS language_other',
                'cr.discipline_arts AS arts',
                'cr.discipline_physical_education AS physical_education',
                'cr.discipline_history AS history',
                'cr.discipline_geography AS geography',
                'cr.discipline_philosophy AS philosophy',
                'cr.discipline_informatics AS informatics',
                'cr.discipline_professional_disciplines AS professional_disciplines',
                'cr.discipline_libras AS libras',
                'cr.discipline_pedagogical AS pedagogical',
                'cr.discipline_religious AS religious',
                'cr.discipline_native_language AS native_language',
                'cr.discipline_social_study AS social_study',
                'cr.discipline_sociology AS sociology',
                'cr.discipline_foreing_language_franch AS language_franch',
                'cr.discipline_language_portuguese_literature AS language_portuguese',
                'cr.discipline_others AS others',
            ])
            ->from('classroom cr')
            ->limit($limit)
            ->offset($offset * $limit)
            ->all();
    }

    public function count(){
        return (new \yii\db\Query())
            ->select('COUNT(*)')
            ->from('classroom cr')
            ->all();
    }

    public function factory(){
        return new AcadClassroom(['scenario' => AcadClassroom::SCENARIO_MIGRATION]);
    }


}