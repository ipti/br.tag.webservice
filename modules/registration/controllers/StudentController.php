<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Student;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class StudentController extends AuthController
{
    public $enableCsrfValidation = false;

    
    public static function allowedDomains() {
        return [
            '*'
        ];
    }
    
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $students = [];
        $provider = new ActiveDataProvider([
            'query' => Student::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $pagination = $provider->getPagination();
        $count = $provider->getCount();
        $paginationParam = [];
        if($pagination){
            $paginationParam['currentPage'] = $pagination->page;
            $paginationParam['perPage'] = $pagination->pageSize;
            $paginationParam['totalPages'] = max($pagination->pageCount, 1);
            $paginationParam['totalItens'] = $pagination->totalCount;
        }
        else{
            $paginationParam['currentPage'] = 0;
            $paginationParam['perPage'] = 10;
            $paginationParam['totalPages'] = 0;
            $paginationParam['totalItens'] = $count;
        }

        $models = $provider->getModels();
        
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $attributes['_id'] = (string) $attributes['_id'];
            $students[] = $attributes;
        }

        return array_merge(['students' => $students], ['pagination' =>$paginationParam]);
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $student = Student::findOne(new ObjectId($id));

        if(!is_null($student)){
            return [
                'status' => '1',
                'data' => $student,
                'message' => 'Aluno(a) carregado(a) com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => ['student' => 'Aluno(a) não encontrado(a)'],
            'message' => 'Aluno(a) não encontrado(a)'
        ];
        
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $student = new Student((['scenario' => Student::SCENARIO_CREATE]));
        $data['Student'] = Yii::$app->request->post();
        
        if(isset($data)){
            if ($student->create($data)) {
               
                return [
                    'status' => '1',
                    'data' => ['_id' => (string) $student->_id],
                    'message' => 'Aluno(a) cadastrado(a) com sucesso'
                ];
            }
        }

        return [
            'status' => '0',
            'error' =>  $student->getErrors(),
            'message' => 'Erro ao cadastrar aluno(a)'
        ];
    }

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $student = Student::findOne(new ObjectId($id));
        $student->scenario = Student::SCENARIO_UPDATE;
        $data['Student'] = Yii::$app->request->post();
        
        if($student->_update($data)){
            return [
                'status' => '1',
                'data' => ['_id' => (string) $student->_id],
                'message' => 'Aluno(a) editado(a) com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => $student->getErrors(),
            'message' => 'Erro ao editar aluno(a)'
        ];
    }
}



?>
