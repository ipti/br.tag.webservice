<?php

namespace app\modules\cras\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use Yii;

class Classroom extends ActiveRecord
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
        return 'classroom';
    }

    public function attributes()
    {
        return [
            '_id',
            'inepId',
            'schoolInepId',
            'name',
            'year',
            'vacancies',
            'modality',
            'classroomId',
            'schoolYear'
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'inepId',
                    'schoolInepId',
                    'name',
                    'year',
                    'modality',
                    'classroomId',
                    'schoolYear'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ],
            [['vacancies'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            ['vacancies', 'integer', 'min' => 0, 'message' => 'Tipo inválido']
        ];
    }

    public function beforeSave($insert){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
            break;
        }
        return true;
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
            break;
        }
        return true;
    }

    public function create($data){
        $this->load($data);

        if($this->save()){
            return true;
        }
        return false;
    }

    public function _update($data){
        $this->load($data);
        if($this->validate()){
            $this->beforeSave($this);
            $collection = Yii::$app->mongodb->getCollection('classroom');
            $update = $this->getAttributes();

            try {
                $collection->update(['_id' => $this->_id],$update);
                return true;
            }
            catch(Exception $e){
                return false;
            }
        }
        return false;
    }

    public function formatData(){
        $data = $this->getAttributes();
        $data['_id'] = (string) $data['_id'];
        return $data;
    }
}
