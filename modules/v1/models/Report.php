<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use app\modules\v1\models\Institution;
use \DateTime;
use Yii;

class Report extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'report';
    }

    public function attributes()
    {
        return ['description', 'createdAt', '_id'];
    }

    public function rules()
    {
        return [
            [['description','createdAt'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório']
        ];
    }

    public function beforeValidate(){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
            case self::SCENARIO_UPDATE:
                $createdAt = is_null($this->createdAt) ? date('Y-m-d H:i:s'): $this->createdAt;
                $this->createdAt = date('Y-m-d H:i:s', strtotime($createdAt));
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
            $collection = Yii::$app->mongodb->getCollection('report');
            $update = $this->getAttributes();

            if($collection->update(['_id' => $this->_id],$update)){
                return true;
            }
        }
        return false;
    }

    public function formatData(){
        $data = $this->getAttributes();
        $data['description'] = (string) $data['description'];
        $id = (array)$data['_id'];
        $data['notified'] = (object)['name' => $id['oid']];

        if(is_object($data['createdAt'])){
            $data['date'] = date('d/m/Y', (string) $data['createdAt']);
            $data['time'] = date('H:i', (string) $data['createdAt']);
            $data['createdAt'] = date('d/m/Y H:i:s', (string) $data['createdAt']);
        }

        return $data;
    }

}