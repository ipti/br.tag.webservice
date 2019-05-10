<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use app\modules\v1\models\Institution;
use \DateTime;
use Yii;

class People extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'people';
    }

    public function attributes()
    {
        return ['_id', 'name', 'birthday', 'father', 'mother', 'nickname', 'sex', 'rg', 'cpf', 'civilStatus', 'nacionality', 'placeBirthday', 'profession', 'scholarity', 'address'];
    }

    public function rules()
    {
        return [
            // Scenarios Create and Update
            [['name', 'birthday', 'mother'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            ['birthday', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d', 'message' => 'Data inválida'],

            
            [['father', 'nickname', 'sex', 'rg', 'cpf', 'civilStatus', 'nacionality', 'placeBirthday', 'profession', 'scholarity', 'address'], 'safe'],
        ];
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $birthday = $this->birthday;
                $this->birthday = date('Y-m-d', strtotime($birthday));
            break;
        }
        return true;
    }

    public function beforeSave($insert){

        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $birthday = new DateTime($this->birthday);
                $this->birthday = new UTCDateTime($birthday->getTimeStamp());
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
            $collection = Yii::$app->mongodb->getCollection('people');
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
            $data['birthday'] = date('d/m/Y', (string) $data['birthday']);
        }

        return $data;
    }

}