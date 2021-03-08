<?php

namespace app\modules\cras\controllers;

use yii\web\Controller;
use app\modules\cras\models\User;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class UserController extends Controller
{
    public $enableCsrfValidation = false;


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

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST','OPTIONS','GET','PUT','HEAD','DELETE','PATCH'],
                    'Access-Control-Request-Headers'    => ['*'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionLogin()
    {
        $data = Yii::$app->request->post();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (isset($data['username']) && isset($data['password'])) {
            $user = User::findByUsername($data['username']);
            if($user !== null && $user->validatePassword($data['password']) && $user->active){
                $token = $user->generateAccessToken();
                return [
                    'status' => '1',
                    'data' => [
                        '_id' => (string) $user->_id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'access_token' => $token,
                    ],
                    'message' => 'Login efetuado com sucesso'
                ];
            }

        }

        return [
            'status' => '0',
            'error' => ['login' => 'Credencial invalída'],
            'message' => 'Credencial invalída'
        ];
    }

    public function actionLogout()
    {
        $data = Yii::$app->request->post();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (isset($data['token'])) {
            $user = User::findIdentityByAccessToken($data['token']);
            if($user !== null){
                $user->destroyAccessToken();
                return [
                    'status' => '1',
                    'data' => [],
                    'message' => 'Logout efetuado com sucesso'
                ];
            }

        }

        return [
            'status' => '0',
            'error' => [],
            'message' => 'Erro ao efetuar logout'
        ];
    }

    public function actionSignup()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $errors = [];

        if($data['credential']['password'] == ''){
            $errors['password'] = "Campo senha é obrigatório";
        }

        if($data['credential']['username'] == ''){
            $errors['username'] = "Campo username é obrigatório";
        }

        if($data['email'] == ''){
            $errors['email'] = "Campo username é obrigatório";
        }

        if(count($errors) > 0){
            return [
                'status' => '0',
                'error' =>  $errors,
                'message' => 'Erro ao cadastrar usuário'
            ];
        }

        $findUser = User::find()
          ->where(['email' => $data['email']])
          ->orWhere(['credential.username' => $data['credential']['username']])
          ->count();

        if($findUser > 0){
            return [
                'status' => '0',
                'error' =>  ["Usuário ou e-mail já existe"],
                'message' => 'Erro ao cadastrar usuário'
            ];
        }

        $user = new User((['scenario' => User::SCENARIO_CREATE]));

        $data['credential']['password'] = password_hash($data['credential']['password'], PASSWORD_BCRYPT, ['cost' => 10]);

        $dataCreate = ['User' => $data];

        if(isset($dataCreate)){
            if ($user->create($dataCreate)) {
                return [
                    'status' => '1',
                    'data' => ['_id' => (string) $user->_id],
                    'message' => 'Usuário cadastrado, aguarde a aprovação do administrador do sistema.'
                ];
            }
        }

        return [
            'status' => '0',
            'error' =>  $user->getErrors(),
            'message' => 'Erro ao cadastrar usuário'
        ];
    }
}

?>
