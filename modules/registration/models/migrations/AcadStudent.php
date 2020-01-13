<?php

namespace app\modules\registration\models\migrations;

use yii\db\ActiveRecord;
use Yii;

class AcadStudent extends ActiveRecord
{
    public const SCENARIO_MIGRATION = 'MIGRATION';
    public $id;
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'student_identification';
    }

    public function attributes()
    {
        return [
            'id',
            'school_inep_id_fk', 
            'name', 
            'birthday',
            'filiation',
            'filiation_1',
            'responsable_name',
            'sex',
            'color_race',
            'nationality',
            'edcenso_nation_fk',
            'deficiency',
            'send_year'
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'school_inep_id_fk', 
                    'name', 
                    'birthday',
                    'filiation',
                    'filiation_1',
                    'responsable_name',
                    'sex',
                    'color_race',
                    'nationality',
                    'edcenso_nation_fk',
                    'deficiency',
                    'send_year'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ]
        ];
    }
    
}
