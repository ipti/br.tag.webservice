<?php

namespace app\modules\migration\controllers;

use app\components\AuthController;
use app\modules\migration\models\Import;
use Yii;

class ImportController extends AuthController
{

    public function actionIndex()
    {
        $import = new Import();
        return $import->run();
    }

}



?>
