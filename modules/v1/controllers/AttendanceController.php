<?php

namespace app\modules\v1\controllers;

use app\components\AuthController;
use app\modules\v1\models\Attendance;
use MongoDB\BSON\ObjectId;
use yii\data\ActiveDataProvider;
use Yii;

class AttendanceController extends AuthController
{

    public function actionIndex()
    {
        $attendance = new Attendance();
        $attendances = $attendance->getQuantity();
        return ['attendances' => $attendances];
    }

    public function actionCreate()
    {
        $attendance = new Attendance(['scenario' => Attendance::SCENARIO_CREATE]);
        $data['Attendance'] = Yii::$app->request->post();

        if ($attendance->create($data)) {
            return [
                'status' => '1',
                'payload' => ['_id' => (string) $attendance->_id],
                'message' => 'Atendimento cadastrado com sucesso'
            ];
        }

        return [
            'status' => '0',
            'error' => $attendance->getErrors(),
            'message' => 'Erro ao cadastrar Atendimento'
        ];
    }

    public function actionType(){
        $attendance = new Attendance();
        $types = $attendance->getTypes();
        return $types;
    }

}

