<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use \DateTime;
use Yii;

class AcadEnrollment extends ActiveRecord
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
        return 'acad_enrollment';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return [
            '_id',
            'id_hashperson',
            'id_hashclassroom',
            'multi',
            'aee',
            'another_space',
            'public_transport',
        ];
    }

    public function rules()
    {
        return [
            // Scenario Migration
            [
                [
                    'id_hashperson',
                    'id_hashclassroom',
                    'multi',
                    'aee',
                    'another_space',
                    'public_transport'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ]
        ];
    }
}