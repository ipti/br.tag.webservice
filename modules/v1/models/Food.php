<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use app\modules\v1\models\Institution;
use \DateTime;
use Yii;

class Food extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'food';
    }

    public function attributes()
    {
        return ['_id', 'personApplicant', 'personRepresentative', 'personRequired', 'reason', 'place', 'date', 'time', 'createdAt'];
    }

    public function rules()
    {
        return [
            [['personApplicant', 'personRepresentative', 'personRequired', 'reason', 'place', 'createdAt'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            ['createdAt', 'date', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'format' => 'php:Y-m-d H:i:s', 'message' => 'Data inválida'],
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
            $collection = Yii::$app->mongodb->getCollection('food');
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
        $data['personApplicant'] = People::find()->where(['_id' => new ObjectId($data['personApplicant'])])->one();
        $data['personRepresentative'] = People::find()->where(['_id' => new ObjectId($data['personRepresentative'])])->one();
        $data['personRequired'] = People::find()->where(['_id' => new ObjectId($data['personRequired'])])->one();

        if(is_object($data['createdAt'])){
            $data['createdAt'] = date('d/m/Y H:i:s', (string) $data['createdAt']);
        }

        return $data;
    }

}