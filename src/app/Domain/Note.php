<?php
namespace App\Domain;

class Note
{
    /**
     * 添加笔记
     */
    public function addNote($data)
    {
        $model = new \App\Model\Note();
        $data = \App\obj_array($data);  // 对象->数组
        $rs = $model->addNote($data);
        return $rs;
    }

    /**
     * 加星笔记
     */
    public function startNote($cid)
    {
        $model = new \App\Model\Note();
        $rs = $model->startNote($cid);
        return $rs;
    }

    /**
     * 取消加星
     */
    public function delStartNote($cid)
    {
        $model = new \App\Model\Note();
        $rs = $model->delStartNote($cid);
        return $rs;
    }

    /**
     * 删除笔记
     */
    public function delNote($cid)
    {
      $model = new \App\Model\Note();
      $rs = $model->delNote($cid);
      return $rs;
    }

    /**
     * 修改笔记
     */
    public function updateNote($data)
    {
        // cid title content
        $model = new \App\Model\Note();
        $data = \App\obj_array($data);  // 对象->数组
        $cid = $data['cid'];
        unset($data['cid']);
        $rs = $model->updateNote($cid, $data);
        return $rs;

    }

    /**
     * 显示笔记
     */
    public function showNote($uid)
    {
      $model = new \App\Model\Note();
      $rs = $model->delNote($uid);
      return $rs;
    }
}