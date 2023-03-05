<?php

use frontend\models\Post;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
// use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var frontend\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'columns' => array_merge(
            [
                'id',
                'title',
                'body:ntext',
            ],
            Yii::$app->user->can('mangePost')?['user_id']:[],
            [
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime', 'php:d/m/Y H:i:s']
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['datetime', 'php:d/m/Y H:i:s']
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                ],
            ]
            ),
    ]); ?>


</div>
