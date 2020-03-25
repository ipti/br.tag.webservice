<?php

namespace app\modules\registration\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use Yii;
use yii\mongodb\Query;
use MongoDB\BSON\UTCDateTime;
use \DateTime;

class Student extends ActiveRecord
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
        return 'student';
    }

    public function attributes()
    {
        return [
            '_id',
            'studentId', 
            'schoolInepId', 
            'name', 
            'birthday',
            'filiation',
            'filiation1',
            'nationality',
            'responsableName',
            'responsableCpf',
            'sex',
            'colorRace',
            'edcensoNationFk',
            'address',
            'cep',
            'city',
            'newStudent',
            'deficiency',
            'sendYear',
            'residenceZone',
            'fone'
        ];
    }

    public function rules()
    {
        return [
            [['schoolInepId', 'name', 'birthday', 'responsableName', 'sex', 'colorRace', 'residenceZone'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            [['birthday'], 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d', 'message' => 'Data inválida'],
            ['newStudent', 'default', 'value' => true, 'on' => [self::SCENARIO_CREATE]],
            ['newStudent', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true, 'message' => 'Tipo inválido'],
            [
                [
                    'studentId', 
                    'schoolInepId', 
                    'name', 
                    'birthday',
                    'filiation',
                    'filiation1',
                    'nationality',
                    'edcensoNationFk',
                    'responsableName',
                    'responsableCpf',
                    'sex',
                    'colorRace',
                    'deficiency',
                    'address',
                    'cep',
                    'city',
                    'sendYear',
                    'residenceZone'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ]
        ];
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), [inepId => 'schoolInepId']);
    }

    public function beforeSave($insert){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
                if(!is_null($this->birthday)){
                    $birthday = new DateTime($this->birthday);
                    $this->birthday = new UTCDateTime($birthday->getTimeStamp());;
                }
            break;
            case self::SCENARIO_UPDATE:
                $birthday = new DateTime($this->birthday);
                $this->birthday = new UTCDateTime($birthday->getTimeStamp());
            case self::SCENARIO_MIGRATION:
                if(!is_null($this->birthday)){
                    $dateFormat = DateTime::createFromFormat('d/m/Y', $this->birthday);
                    $birthday = new DateTime($dateFormat->format('Y-m-d H:i:s'));
                    $this->birthday = new UTCDateTime($birthday->getTimeStamp());
                }
            break;
            break;
        }
        return true;
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
                $birthday = $this->birthday;
                $this->birthday = date('Y-m-d', strtotime($birthday));
            case self::SCENARIO_UPDATE:
                $birthday = $this->birthday;
                $this->birthday = date('Y-m-d', strtotime($birthday));
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
            $collection = Yii::$app->mongodb->getCollection('student');
            $update = $this->getAttributes();
            if($collection->update(['_id' => $this->_id],$update)){
                return true;
            }
        }
        return false;
    }

    public function formatData(){
        $data = $this->getAttributes();
        $data['_id'] = (string) $data['_id'];
        
        if(is_object($data['birthday'])){
            $data['birthday'] = date('Y-m-d H:i:s', (string)$data['birthday']);
        }

        return $data;
    }
}
