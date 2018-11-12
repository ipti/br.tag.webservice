<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use \DateTime;
use Yii;

class AcadClassroom extends ActiveRecord
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
        return 'acad_classroom';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return [
            '_id',
            'id_schoolinep',
            'id_inep',
            'name',
            'type_pedagogicalmediation',
            'work_time',
            'work_days',
            'schooling',
            'aee',
            'complementary_activies',
            'diff_location',
            'modality',
            'stage',
            'course',
            'disciplines'
        ];
    }
}