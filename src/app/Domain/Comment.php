<?php
namespace App\Domain;

class Comment
{
    /**
     * 发表回复
     */
    public function addComment($data)
    {
        $model = new \App\Model\Comment();
        $data = \App\obj_array($data);  // 对象->数组
        $rs = $model->addComment($data);
        return $rs;
    }

    /**
     * 显示回复
     */
    public function showComment()
    {
        $model = new \App\Model\Comment();
        $rs = $model->showComment();
        return $rs;
    }
}