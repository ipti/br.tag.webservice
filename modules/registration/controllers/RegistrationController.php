<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Registration;
use app\modules\registration\models\School;
use app\modules\registration\models\Student;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class RegistrationController extends BaseController
{
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $registrations = [];
        $provider = new ActiveDataProvider([
            'query' => Registration::find(),
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
            $registrations[] = $attributes;
        }

        return array_merge(['registrations' => $registrations], ['pagination' =>$paginationParam]);
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $registration = Registration::findOne(new ObjectId($id));

        if(!is_null($registration)){
            return [
                'status' => '1',
                'data' => $registration->formatData(),
                'message' => 'Matrícula carregada com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => ['registration' => 'Matrícula não encontrada'],
            'message' => 'Matrícula não encontrada'
        ];
        
    }

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $registration = Registration::findOne(new ObjectId($id));
        $registration->scenario = Registration::SCENARIO_UPDATE;
        $data['Registration'] = Yii::$app->request->post();
        
        if($registration->_update($data)){
            return [
                'status' => '1',
                'data' => ['_id' => (string) $registration->_id],
                'message' => 'Matrícula editada com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => $registration->getErrors(),
            'message' => 'Erro ao editar matrícula'
        ];
    }

    public function actionStatus($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $registration = Registration::findOne(new ObjectId($id));
        $registration->scenario = Registration::SCENARIO_UPDATE_STATUS;
        $data['Registration'] = Yii::$app->request->post();
        
        if($registration->_update($data)){
            return [
                'status' => '1',
                'data' => ['_id' => (string) $registration->_id],
                'message' => 'Matrícula editada com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => $registration->getErrors(),
            'message' => 'Erro ao editar matrícula'
        ];
    }
}



?>
