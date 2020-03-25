<?php

namespace app\modules\registration\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use Yii;
use yii\mongodb\Query;

class Registration extends ActiveRecord
{
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_UPDATE_STATUS = 'UPDATE_STATUS';
    public const SCENARIO_READ = 'READ';  
    public $id;

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'registration';
    }

    public function attributes()
    {
        return [
            '_id',
            'studentId',
            'sequence',
            'registrationNumber',
            'classroomId', 
            'confirmed'
        ];
    }

    public function rules()
    {
        return [
            [['studentId', 'classroomId'], 'required', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE], 'message' => 'Campo obrigatório'],
            [['confirmed'], 'required', 'on' => [self::SCENARIO_UPDATE_STATUS], 'message' => 'Campo obrigatório'],
            ['confirmed', 'default', 'value' => null, 'on' => [self::SCENARIO_CREATE]],
            ['confirmed', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true, 'message' => 'Tipo inválido'],
        ];
    }

    public function beforeSave($insert){
        switch ($this->scenario) {
            case self::SCENARIO_CREATE:
                $student = self::findOne(['studentId' => $this->studentId, 'classroomId' => $this->classroomId]);
                if(!is_null($student)){
                    $this->addError("registration", 'O aluno já está matrículado na turma');
                    return false;
                }

                if(!is_null($this->confirmed)){
                    $this->confirmed = null;
                }
                
                $sequence = self::find()->max('sequence');
                $this->sequence = !is_null($sequence) ? $sequence+1 : 1;
                $this->registrationNumber = date('Y').$this->sequence;

            case self::SCENARIO_UPDATE:
                
            break;
            case self::SCENARIO_UPDATE_STATUS:
                $classroom = Classroom::findOne(new ObjectId($this->classroomId));
                if(!is_null($classroom)){
                    if($this->confirmed){
                        $countConfirmed = self::find()->where(['confirmed' => true, 'classroomId' => $this->classroomId])->count();
                        if($countConfirmed == $classroom->vacancies){
                            $this->addError("registration", 'Não há vagas');
                            return false;
                        }
                    }
                }
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
            if($this->beforeSave($this)){
                $collection = Yii::$app->mongodb->getCollection('registration');
                $update = $this->getAttributes();
                try {
                    $collection->update(['_id' => $this->_id],$update);
                    return true;
                }
                catch(Exception $e){
                    return false;
                }
            }
        }
        return false;
    }

    public function getClassroom()
    {
        return $this->hasOne(Classroom::className(), ['_id' => 'classroomId']);
    }

    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['_id' => 'studentId']);
    }

    public function formatData(){
        $data = $this->getAttributes();
        $data['_id'] = (string) $data['_id'];
        
        if(is_object($this->student['birthday'])){
            $this->student['birthday'] = date('Y-m-d H:i:s', (string)$this->student['birthday']);
        }
        
        $data['student'] = $this->student;
        $data['classroom'] = $this->classroom;
        $data['school'] = $this->classroom->school;
        return $data;
    }
    
}
