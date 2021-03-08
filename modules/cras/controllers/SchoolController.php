<?php

namespace app\modules\cras\controllers;

use app\components\AuthController;
use app\modules\cras\models\School;
use app\modules\cras\models\Classroom;
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
        ]);

        $models = $provider->getModels();

        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $attributes['_id'] = (string) $attributes['_id'];
            $schools[] = $attributes;
        }

        return ['schools' => $schools];
    }
}



?>
