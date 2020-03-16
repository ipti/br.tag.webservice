<?php

namespace app\modules\registration\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use Yii;
use yii\mongodb\Query;

class School extends ActiveRecord
{
    public const SCENARIO_MIGRATION = 'MIGRATION';
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';
    public $id;

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'school';
    }

    public function attributes()
    {
        return [
            '_id',
            'inepId', 
            'name',
            'managerName',
            'address', 
            'cep',
            'city',
            'administrative_dependence'
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'inepId', 
                    'name',
                    'managerName',
                    'address', 
                    'cep',
                    'city',
                    'administrative_dependence'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ]
        ];
    }

    public function getClassrooms()
    {
        return $this->hasMany(Classroom::className(), ['schoolInepId' => 'inepId']);
    }

    public function formatData(){
        $data = $this->getAttributes();
        $data['_id'] = (string) $data['_id'];
        return $data;
    }
}
