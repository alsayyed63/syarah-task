<?php

namespace frontend\models;

use yii\base\Model;

class PostForm extends Model
{

    public $body;
    public $title;
    public $id;
    public $postModel = null;

    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 20],
            [['title'], 'unique'],
        ];
    }

    public function __construct(Post $post = null)
    {
        parent::__construct();

        $this->postModel = $post ?? new Post();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Post Title',
            'body' => 'Post Body',
        ];
    }

    public function save()
    {
        $this->postModel->title = $this->title;
        $this->postModel->body = $this->body;
        $isSuccess = $this->postModel->save();
        $this->id = $this->postModel->id;
        echo print_r($this->postModel->getErrors(),true);
        return $isSuccess;
    }

    public function read()
    {
        $this->id = $this->postModel->id;
        $this->title = $this->postModel->title;
        $this->body = $this->postModel->body;
    }
}
