<?php

namespace console\controllers;

use common\rbac\AuthorRule;
use Yii;
use yii\console\Controller;

class RuleController extends Controller
{
    public function actionAuthor()
    {
        $auth = Yii::$app->authManager;


        $auth->addChild($auth->getRole('admin'), $auth->getPermission('mangePost'));
        

        // $auth->addChild()

    }
}