<?php

namespace app\modules\registration\models;

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
            'isActive', 
            'internalTransferDateStart',
            'internalTransferDateEnd',
            'newStudentDateStart',
            'newStudentDateEnd'
        ];
    }

    public function rules()
    {
        return [
            [['year', 'isActive', 'internalTransferDateStart', 'internalTransferDateEnd', 'newStudentDateStart', 'newStudentDateEnd'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            [['internalTransferDateStart', 'internalTransferDateEnd', 'newStudentDateStart', 'newStudentDateEnd'], 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d H:i:s', 'message' => 'Data inválida'],
            ['isActive', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true, 'message' => 'Tipo inválido'],
            ['year', 'integer', 'min' => 0, 'message' => 'Tipo inválido']
        ];
    }
   

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $internalTransferDateStart = is_null($this->internalTransferDateStart) ? date('Y-m-d H:i:s'): $this->internalTransferDateStart;
                $this->internalTransferDateStart = date('Y-m-d H:i:s', strtotime($internalTransferDateStart));
                
                $internalTransferDateEnd = is_null($this->internalTransferDateEnd) ? date('Y-m-d H:i:s'): $this->internalTransferDateEnd;
                $this->internalTransferDateEnd = date('Y-m-d H:i:s', strtotime($internalTransferDateEnd));
                
                $newStudentDateStart = is_null($this->newStudentDateStart) ? date('Y-m-d H:i:s'): $this->newStudentDateStart;
                $this->newStudentDateStart = date('Y-m-d H:i:s', strtotime($newStudentDateStart));
                
                $newStudentDateEnd = is_null($this->newStudentDateEnd) ? date('Y-m-d H:i:s'): $this->newStudentDateEnd;
                $this->newStudentDateEnd = date('Y-m-d H:i:s', strtotime($newStudentDateEnd));
            break;
        }
        return true;
    }

    public function beforeSave($insert){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
                if($this->isActive){
                    self::updateAll(['isActive' => false]);
                }

            case self::SCENARIO_UPDATE:
                
                if($this->isActive){
                    self::updateAll(['isActive' => false], ['and', ['!=', '_id', $this->_id]]);
                }

                $internalTransferDateStart = new DateTime($this->internalTransferDateStart);
                $this->internalTransferDateStart = new UTCDateTime($internalTransferDateStart->getTimeStamp());

                $internalTransferDateEnd = new DateTime($this->internalTransferDateEnd);
                $this->internalTransferDateEnd = new UTCDateTime($internalTransferDateEnd->getTimeStamp());

                $newStudentDateStart = new DateTime($this->newStudentDateStart);
                $this->newStudentDateStart = new UTCDateTime($newStudentDateStart->getTimeStamp());
                
                $newStudentDateEnd = new DateTime($this->newStudentDateEnd);
                $this->newStudentDateEnd = new UTCDateTime($newStudentDateEnd->getTimeStamp());
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

        if(is_object($data['internalTransferDateStart'])){
            $data['internalTransferDateStart'] = date('d/m/Y', (string)$data['internalTransferDateStart']);
        }

        if(is_object($data['internalTransferDateEnd'])){
            $data['internalTransferDateEnd'] = date('d/m/Y', (string) $data['internalTransferDateEnd']);
        }
        
        if(is_object($data['newStudentDateStart'])){
            $data['newStudentDateStart'] = date('d/m/Y', (string) $data['newStudentDateStart']);
        }

        if(is_object($data['newStudentDateEnd'])){
            $data['newStudentDateEnd'] = date('d/m/Y', (string) $data['newStudentDateEnd']);
        }

        return $data;
    }


}
