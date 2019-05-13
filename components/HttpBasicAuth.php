<?php

namespace app\components;;

use Yii;

class HttpBasicAuth extends \yii\filters\auth\HttpBasicAuth
{
    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get('Authorization');

        if ($authHeader !== null && preg_match('/^Bearer\s+(.*?)$/', $authHeader, $matches)) {
            $identity = $user->loginByAccessToken($matches[1], get_class($this));
            if ($identity === null) {
                $this->handleFailure($response);
            }
            return $identity;
        }

        return null;
    }
}