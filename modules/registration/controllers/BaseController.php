<?php

namespace app\modules\registration\controllers;

use app\components\AuthController;

class BaseController extends AuthController
{
    public $enableCsrfValidation = false;

    
    public static function allowedDomains() {
        return [
            '*'
        ];
    }

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ];
    }
}



?>
