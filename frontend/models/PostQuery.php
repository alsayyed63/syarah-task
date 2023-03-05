<?php

namespace frontend\models;

use Yii;

/**
 * This is the ActiveQuery class for [[Post]].
 *
 * @see Post
 */
class PostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Post[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * {@inheritdoc}
     * @return Post|array|null
     */
    public function getOwnPosts()
    {
        return Yii::$app->user->can('mangePost')?$this:$this->andWhere(['=','user_id',Yii::$app->user->id]);
    }
}
