<?php

namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\helpers\VarDumper;

class AddUserIdToPostBeforeSaveBehavior extends AttributeBehavior
{
    const BEHAVIOR_NAME="AddUserIdToPostBeforeSaveBehavior";

    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_VALIDATE=>['user_id'],
            ];
        }
    }

    protected function getValue($event)
    {
        if ($event->sender->getIsNewRecord()) {
            return Yii::$app->user->id;
        }

        return parent::getValue($event);
    }
}