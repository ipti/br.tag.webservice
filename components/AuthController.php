<?php

namespace app\components;

use yii\rest\Controller;
use app\components\CompositeAuth;
use app\components\HttpBasicAuth;
use app\components\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use Yii;

class AuthController extends Controller{

    public static function allowedDomains() {
        return [
            '*'
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
            
            'authenticator' =>  [
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    HttpBasicAuth::className(),
                    HttpBearerAuth::className(),
                    QueryParamAuth::className(),
                ],
            ],
            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                            => static::allowedDomains(),
                    'Access-Control-Request-Method'     => ['POST','OPTIONS','GET','PUT','HEAD','DELETE','PATCH'],
                    'Access-Control-Request-Headers'    => ['*'],
                    'Access-Control-Allow-Headers'      => ['*'],
                    'Access-Control-Expose-Headers'     => ['*'],
                    'Access-Control-Allow-Credentials'  => false,
                    'Access-Control-Max-Age'            => 3600,
                ],
            ],
    
        ]);
    }
}


?>