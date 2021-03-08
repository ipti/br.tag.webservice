<?php

namespace app\modules\cras\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use Yii;
use yii\mongodb\Query;
use \DateTime;

class Schedule extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';    

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'schedule';
    }

    public function attributes()
    {
        return [
            '_id',
            'year', 
            'dateStartHealth1',
            'dateEndHealth1',
            'dateStartHealth2',
            'dateEndHealth2',
            'dateStartEducation1',
            'dateEndEducation1',
            'dateStartEducation2',
            'dateEndEducation2',
            'dateStartEducation3',
            'dateEndEducation3',
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'year',
                    'dateStartHealth1',
                    'dateEndHealth1',
                    'dateStartHealth2',
                    'dateEndHealth2',
                    'dateStartEducation1',
                    'dateEndEducation1',
                    'dateStartEducation2',
                    'dateEndEducation2',
                    'dateStartEducation3',
                    'dateEndEducation3'
                ], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            [
                [
                    'dateStartHealth1',
                    'dateEndHealth1',
                    'dateStartHealth2',
                    'dateEndHealth2',
                    'dateStartEducation1',
                    'dateEndEducation1',
                    'dateStartEducation2',
                    'dateEndEducation2',
                    'dateStartEducation3',
                    'dateEndEducation3'
                ], 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d', 'message' => 'Data inválida'],
            ['year', 'integer', 'min' => 0, 'message' => 'Tipo inválido']
        ];
    }
   

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
            break;
        }
        return true;
    }

    public function beforeSave($insert){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
               
            case self::SCENARIO_UPDATE:

                $dateStartHealth1 = new DateTime($this->dateStartHealth1);
                $this->dateStartHealth1 = new UTCDateTime($dateStartHealth1->getTimeStamp());
                $dateEndHealth1 = new DateTime($this->dateEndHealth1);
                $this->dateEndHealth1 = new UTCDateTime($dateEndHealth1->getTimeStamp());
                $dateStartHealth2 = new DateTime($this->dateStartHealth2);
                $this->dateStartHealth2 = new UTCDateTime($dateStartHealth2->getTimeStamp());
                $dateEndHealth2 = new DateTime($this->dateEndHealth2);
                $this->dateEndHealth2 = new UTCDateTime($dateEndHealth2->getTimeStamp());

                $dateStartEducation1 = new DateTime($this->dateStartEducation1);
                $this->dateStartEducation1 = new UTCDateTime($dateStartEducation1->getTimeStamp());
                $dateEndEducation1 = new DateTime($this->dateEndEducation1);
                $this->dateEndEducation1 = new UTCDateTime($dateEndEducation1->getTimeStamp());
                $dateStartEducation2 = new DateTime($this->dateStartEducation2);
                $this->dateStartEducation2 = new UTCDateTime($dateStartEducation2->getTimeStamp());
                $dateEndEducation2 = new DateTime($this->dateEndEducation2);
                $this->dateEndEducation2 = new UTCDateTime($dateEndEducation2->getTimeStamp());
                $dateStartEducation3 = new DateTime($this->dateStartEducation3);
                $this->dateStartEducation3 = new UTCDateTime($dateStartEducation3->getTimeStamp());
                $dateEndEducation3 = new DateTime($this->dateEndEducation3);
                $this->dateEndEducation3 = new UTCDateTime($dateEndEducation3->getTimeStamp());
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
            $collection = Yii::$app->mongodb->getCollection('schedule');
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

        if(is_object($data['dateStartHealth1'])){
            $data['dateStartHealth1'] = date('Y-m-d', (string)$data['dateStartHealth1']);
        }
        if(is_object($data['dateEndHealth1'])){
            $data['dateEndHealth1'] = date('Y-m-d', (string)$data['dateEndHealth1']);
        }
        if(is_object($data['dateStartHealth2'])){
            $data['dateStartHealth2'] = date('Y-m-d', (string)$data['dateStartHealth2']);
        }
        if(is_object($data['dateEndHealth2'])){
            $data['dateEndHealth2'] = date('Y-m-d', (string)$data['dateEndHealth2']);
        }

        if(is_object($data['dateStartEducation1'])){
            $data['dateStartEducation1'] = date('Y-m-d', (string)$data['dateStartEducation1']);
        }
        if(is_object($data['dateEndEducation1'])){
            $data['dateEndEducation1'] = date('Y-m-d', (string)$data['dateEndEducation1']);
        }

        if(is_object($data['dateStartEducation2'])){
            $data['dateStartEducation2'] = date('Y-m-d', (string)$data['dateStartEducation2']);
        }
        if(is_object($data['dateEndEducation2'])){
            $data['dateEndEducation2'] = date('Y-m-d', (string)$data['dateEndEducation2']);
        }
        if(is_object($data['dateStartEducation3'])){
            $data['dateStartEducation3'] = date('Y-m-d', (string)$data['dateStartEducation3']);
        }
        if(is_object($data['dateEndEducation3'])){
            $data['dateEndEducation3'] = date('Y-m-d', (string)$data['dateEndEducation3']);
        }

        return $data;
    }


}
