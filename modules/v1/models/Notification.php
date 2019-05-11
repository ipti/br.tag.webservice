<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use app\modules\v1\models\Institution;
use \DateTime;
use Yii;

class Notification extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'notification';
    }

    public function attributes()
    {
        return ['_id', 'notified', 'date', 'time', 'createdAt'];
    }

    public function rules()
    {
        return [
            [['notified', 'date', 'time', 'createdAt'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            ['createdAt', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d H:i:s', 'message' => 'Data inválida'],
            ['date', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d', 'message' => 'Data inválida'],
            ['time', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:H:i', 'message' => 'Hora inválida'],
        ];
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $createdAt = is_null($this->createdAt) ? date('Y-m-d H:i:s'): $this->createdAt;
                $this->createdAt = date('Y-m-d H:i:s', strtotime($createdAt));
                $date = $this->date;
                $this->date = date('Y-m-d', strtotime($date));
            break;
        }
        return true;
    }

    public function beforeSave($insert){

        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $createdAt = new DateTime($this->createdAt);
                $this->createdAt = new UTCDateTime($createdAt->getTimeStamp());
                $date = new DateTime($this->date);
                $this->date = new UTCDateTime($date->getTimeStamp());
                $time = new DateTime($this->time);
                $this->time = new UTCDateTime($time->getTimeStamp());
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
            $collection = Yii::$app->mongodb->getCollection('notification');
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
        $data['notified'] = People::find()->where(['_id' => new ObjectId($data['notified'])])->one();

        if(is_object($data['createdAt'])){
            $data['createdAt'] = date('d/m/Y H:i:s', (string) $data['createdAt']);
        }

        if(is_object($data['date'])){
            $data['date'] = date('d/m/Y', (string) $data['date']);
        }

        if(is_object($data['time'])){
            $data['time'] = date('H:i', (string) $data['time']);
        }

        return $data;
    }

}