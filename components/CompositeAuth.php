<?php

namespace app\components;

use Yii;

class CompositeAuth extends \yii\filters\auth\CompositeAuth
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if ($this->isPreFligt(Yii::$app->request)) {
            return true;
        }

        return parent::beforeAction($action);
    }

    protected function isPreFligt($request)
    {
        return $request->isOptions;
    }

}