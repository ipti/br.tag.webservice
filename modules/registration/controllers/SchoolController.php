<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\School;
use app\modules\registration\models\Classroom;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class SchoolController extends BaseController
{
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $schools = [];
        $provider = new ActiveDataProvider([
            'query' => School::find(),
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
            $schools[] = $attributes;
        }

        return array_merge(['schools' => $schools], ['pagination' =>$paginationParam]);
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $school = School::findOne(new ObjectId($id));
        
        if(!is_null($school)){
            $attributes = $school->getAttributes();
            $attributes['_id'] = (string) $attributes['_id'];
         
            $classrooms = [];
            foreach ($school->classrooms as $classroom) {
                $classroomsAttributes = $classroom->getAttributes();
                $classroomsAttributes['_id'] = (string) $classroomsAttributes['_id'];
                $classroomsAttributes['registrationConfirmed'] = $classroom->registrationConfirmed;
                $classroomsAttributes['registrationRequested'] = $classroom->registrationRequested;
                $classroomsAttributes['registrationRemaining'] = $classroom->registrationRemaining;
                $classroomsAttributes['registrationRefusedCount'] = $classroom->registrationRefusedCount;
                $classrooms[] =  $classroomsAttributes;
            }

            $attributes['classrooms'] = $classrooms;
            return [
                'status' => '1',
                'message' => 'Escola carregada com sucesso',
                'school' => $attributes
            ];
        }

        return [
            'status' => '0',
            'error' => ['school' => 'Escola não encontrada'],
            'message' => 'Escola não encontrada'
        ];
        
    }
}



?>
