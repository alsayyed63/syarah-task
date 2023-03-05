<?php
namespace common\rbac;

use Yii;
use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($user, $item, $params)
    {
        return Yii::$app->user->can('mangePost') || (($params['user_id']??false) && $params['user_id'] == $user);
    }
}