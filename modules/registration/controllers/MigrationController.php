<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Migration;
use Yii;

class MigrationController extends BaseController
{
    public function actionImport($year="")
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new Migration();
        return $import->runImport($year);
    }

    public function actionExport()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new Migration();
        return $import->runExport();
    }
}



?>
