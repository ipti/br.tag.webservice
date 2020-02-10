<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Schedule;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class ScheduleController extends BaseController
{
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $schedule = [];
        $provider = new ActiveDataProvider([
            'query' => Schedule::find(),
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
            $schedule[] = $model->formatData();;
        }

        return array_merge(['schedules' => $schedule], ['pagination' =>$paginationParam]);
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $schedule = Schedule::findOne(new ObjectId($id));
        
        if(!is_null($schedule)){
            return [
                'status' => '1',
                'data' => $schedule->formatData(),
                'message' => 'Cronograma carregado com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => ['schedule' => 'Cronograma não encontrado'],
            'message' => 'Cronograma não encontrado'
        ];
        
    }
    
  
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $schedule = new Schedule((['scenario' => Schedule::SCENARIO_CREATE]));
        $data['Schedule'] = Yii::$app->request->post();
        
        if(isset($data)){
            if ($schedule->create($data)) {
               
                return [
                    'status' => '1',
                    'data' => ['_id' => (string) $schedule->_id],
                    'message' => 'Cronograma cadastrado com sucesso'
                ];
            }
        }

        return [
            'status' => '0',
            'error' =>  $schedule->getErrors(),
            'message' => 'Erro ao cadastrar cronograma'
        ];
    }

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $schedule = Schedule::findOne(new ObjectId($id));
        $schedule->scenario = Schedule::SCENARIO_UPDATE;
        $data['Schedule'] = Yii::$app->request->post();

        if($schedule->_update($data)){
             
            return [
                'status' => '1',
                'data' => ['_id' => (string) $schedule->_id],
                'message' => 'Cronograma editado com sucesso'
            ];
        }
        
        return [
            'status' => '0',
            'error' => $schedule->getErrors(),
            'message' => 'Erro ao editar cronograma'
        ];
    }

     public function actionDelete($id)
    {
        $schedule = Schedule::findOne(new ObjectId($id));
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if (!is_null($schedule) && $schedule->delete()) {
            return [
                'status' => '1',
                'data' => ['_id' => $id],
                'message' => 'Cronograma excluído com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => $schedule->getErrors(),
            'message' => 'Erro ao excluir cronograma'
        ];
    }

}



?>
