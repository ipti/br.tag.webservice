<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use \DateTime;
use Yii;

class AcadSchool extends ActiveRecord
{
    public const SCENARIO_MIGRATION = 'MIGRATION';
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'acad_school';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return [
            '_id',
            'id_inep',
            'id_email',
            'working_status',
            'start_date',
            'finish_date',
            'name',
            'address',
            'phone_ddd',
            'phone_number',
            'phone_secondnumber',
            'id_educationorgan',
            'id_admindependence',
            'linked_mec',
            'linked_army',
            'linked_helth',
            'linked_other',
            'private_school',
            'regulation_status',
            'regulation_organ',
            'linked_school',
            'working_location',
            'suplly_water',
            'supply_energy',
            'supply_sewage',
            'supply_garbage',
            'supply_food',
            'treatment_garbage',
            'dependencies',
            'acessabilty',
            'equipaments',
            'internet_access',
            'workers',
            'org_teaching',
            'indian_school',
            'idioms',
            'selection_admission',
            'booking_enrollment',
            'website',
            'community_integration',
            'space_schoolenviroment',
            'ppp_updated',
            'board_organ',
        ];
    }
}