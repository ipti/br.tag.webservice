<?php

namespace app\modules\cras\controllers;

use app\components\AuthController;
use app\modules\cras\models\Classroom;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class ClassroomController extends BaseController
{
    public function actionIndex($id, $year)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $classrooms = [];
        $provider = new ActiveDataProvider([
            'query' => Classroom::find()->where(['schoolInepId' => $id, 'year' => $year])
        ]);

        $models = $provider->getModels();

        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $attributes['_id'] = (string) $attributes['_id'];
            $classrooms[] = $attributes;
        }
        return ['classrooms' => $classrooms];
    }
}



?>
