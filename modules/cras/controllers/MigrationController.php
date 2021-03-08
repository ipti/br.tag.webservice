<?php

namespace app\modules\cras\controllers;

use app\components\AuthController;
use app\modules\cras\models\Migration;
use app\modules\cras\models\migrations\ImportStudent;
use Yii;

class MigrationController extends BaseController
{
    public function actionImportstudent($year="", $stage="", $type="")
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new ImportStudent();
        $resultStudent = $import->run($year, $stage, $type);
        return [
            'student' => $resultStudent
        ];

    }

    public function actionImport($year="")
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $import = new Migration();
        return $import->runImport($year);
    }
}



?>
