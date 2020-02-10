<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Classroom;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class ClassroomController extends BaseController
{
    public function actionIndex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $classrooms = [];
        $provider = new ActiveDataProvider([
            'query' => Classroom::find(),
            'pagination' => [
                'pageSize' => 9,
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
            $paginationParam['perPage'] = 9;
            $paginationParam['totalPages'] = 0;
            $paginationParam['totalItens'] = $count;
        }

        $models = $provider->getModels();
        
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $attributes['_id'] = (string) $attributes['_id'];
            $attributes['confirmed'] = $model->registrationConfirmed;
            $attributes['requested'] = $model->registrationRequested;
            $attributes['remaining'] = $model->registrationRemaining;
            $classrooms[] = $attributes;
        }
        return array_merge(['classrooms' => $classrooms], ['pagination' =>$paginationParam]);
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $classroom = new Classroom((['scenario' => Classroom::SCENARIO_CREATE]));
        $data['Classroom'] = Yii::$app->request->post();
        
        if(isset($data)){
            if ($classroom->create($data)) {
               
                return [
                    'status' => '1',
                    'data' => ['_id' => (string) $classroom->_id],
                    'message' => 'Turma cadastrada com sucesso'
                ];
            }
        }

        return [
            'status' => '0',
            'error' =>  $classroom->getErrors(),
            'message' => 'Erro ao cadastrar turma'
        ];
    }

    public function actionView($id){
        
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $classroom = Classroom::findOne($id);
        if(!is_null($classroom)){
            return [
                'status' => '1',
                'data' => $classroom->formatData(),
                'message' => 'Turma carregada com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => ['Turma' => 'Turma não encontrada'],
            'message' => 'Turma não encontrada'
        ];
    }

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $classroom = Classroom::findOne(new ObjectId($id));
        $classroom->scenario = Classroom::SCENARIO_UPDATE;
        $data['Classroom'] = Yii::$app->request->post();
        
        if($classroom->_update($data)){
            return [
                'status' => '1',
                'data' => ['_id' => (string) $classroom->_id],
                'message' => 'Turma editada com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => $classroom->getErrors(),
            'message' => 'Erro ao editar turma'
        ];
    }
}



?>
