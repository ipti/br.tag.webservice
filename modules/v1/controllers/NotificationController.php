<?php

namespace app\modules\v1\controllers;

use app\components\AuthController;
use app\modules\v1\models\Notification;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class NotificationController extends AuthController
{

    public function actionIndex()
    {

        $data = Yii::$app->request->get();
        $query = Notification::find();
        $queryCondition = [];

        if(isset($data['notifier'])){
            $queryCondition['notifier'] = ['$regex' => '/^'.$data['notifier'].'/'];
        }

        if(isset($data['createAt'])){

            $createAt = date('Y-m-d', strtotime($data['createAt']));
            $createAt = new DateTime($createAt);
            $createAt = new UTCDateTime($createAt->getTimeStamp());

            $queryCondition['createAt'] = $createAt;
        }

        if(count($queryCondition) > 0){
            $query->where($queryCondition);
        }

        $query->orderBy('notifier');

        $notifications = [];
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
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

        foreach($models as $model){
            $notifications[] = $model->formatData();
        }
        return array_merge(['notifications' => $notifications], ['pagination' =>$paginationParam]);
    }

    public function actionCreate()
    {
        $people = new Notification(['scenario' => Notification::SCENARIO_CREATE]);
        $data['Notification'] = Yii::$app->request->post();

        if ($people->create($data)) {
            return [
                'status' => '1',
                'payload' => ['_id' => (string) $people->_id],
                'message' => 'Notificação cadastrada com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => $people->getErrors(),
            'message' => 'Erro ao cadastrar notificação'
        ];
    }

    public function actionGet($id){
        $people = Notification::findOne($id);
        if(!is_null($people)){
            return $people->formatData();
        }
        return [];
    }

    public function actionUpdate($id)
    {
        $people = Notification::findOne(new ObjectId($id));
        $people->scenario = Notification::SCENARIO_UPDATE;
        $data = ['Notification' => Yii::$app->request->post()];

        if ($people->_update($data)) {
            return [
                'status' => '1',
                'data' => ['_id' => (string) $people->_id],
                'message' => 'Notificação atualizada com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => $people->getErrors(),
            'message' => 'Erro ao atualizar notificação'
        ];
    }

}

