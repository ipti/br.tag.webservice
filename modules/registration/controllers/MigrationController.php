<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;
use app\modules\registration\models\Migration;
use Yii;

class MigrationController extends AuthController
{
    public $enableCsrfValidation = false;

    
    public static function allowedDomains() {
        return [
            '*'
        ];
    }
    
    public function actionImport()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new Migration();
        return $import->runImport();
    }

    public function actionExport()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new Migration();
        return $import->runExport();
    }
}



?>
