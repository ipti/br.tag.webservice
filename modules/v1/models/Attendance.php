<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use \DateTime;
use Yii;

class Attendance extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'attendence';
    }

    public function attributes()
    {
        return ['_id', 'type', 'date', 'time', 'place', 'person'];
    }

    public function rules()
    {
        return [
            [['type', 'date', 'time', 'place'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            ['date', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d', 'message' => 'Data inválida'],
            ['time', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:H:i:s', 'message' => 'Hora inválida'],
        ];
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $date = is_null($this->date) ? date('Y-m-d'): $this->date;
                $this->date = date('Y-m-d', strtotime($date));
                $time = is_null($this->time) ? date('H:i:s'): $this->time;
                $this->time = date('H:i:s', strtotime($time));
            break;
        }
        return true;
    }

    public function beforeSave($insert){

        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
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

    public function formatData(){
        $data = $this->getAttributes();
        $data['_id'] = (string) $data['_id'];
        if(!is_null($data['person'])){
            $data['person'] = People::find()->where(['_id' => new ObjectId($data['child'])])->one();
        }

        if(is_object($data['date'])){
            $data['date'] = date('d/m/Y', (string) $data['date']);
        }

        if(is_object($data['time'])){
            $data['time'] = date('H:i:s', (string) $data['time']);
        }

        return $data;
    }

    public function getQuantity(){
        $attendence = Yii::$app->mongodb->createCommand()->count('attendence');
        return $attendence;
    }

    public function getTypes(){
        return [
            ['id' => 1,  'description' => 'Denúncia'],
            ['id' => 2,  'description' => 'Notificação'],
            ['id' => 2,  'description' => 'Ação Alimentos'],
            ['id' => 4,  'description' => 'Registro de Fato'],
            ['id' => 6,  'description' => 'Termo de Abrigamento'],
            ['id' => 7,  'description' => 'Termo de Advertência'],
            ['id' => 9,  'description' => 'Solicitação Serviços'],
            ['id' => 99, 'description' => 'Outros']
        ];
    }

}