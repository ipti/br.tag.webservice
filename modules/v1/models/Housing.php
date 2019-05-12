<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use app\modules\v1\models\User;
use app\modules\v1\models\Institution;
use \DateTime;
use Yii;

class Housing extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'housing';
    }

    public function attributes()
    {
        return ['_id', 'child', 'sender', 'receiver', 'motive', 'createdAt'];
    }

    public function rules()
    {
        return [
            [['child', 'sender', 'receiver', 'motive', 'createdAt'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
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
            $collection = Yii::$app->mongodb->getCollection('housing');
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
        $data['child'] = People::find()->where(['_id' => new ObjectId($data['child'])])->one();
        $data['receiver'] = People::find()->where(['_id' => new ObjectId($data['receiver'])])->one();
        $data['sender'] = Institution::find()->where(['_id' => new ObjectId($data['sender'])])->one();

        if(is_object($data['createdAt'])){
            $data['createdAt'] = date('d/m/Y H:i:s', (string) $data['createdAt']);
        }

        return $data;
    }

}