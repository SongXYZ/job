<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 笔记
 */
class Note extends Api {
    public function getRules() {
        return array(
            'addNote' => array(
                'uid' => array('name' => 'uid', 'require' => true),
                'title' => array('name' => 'title', 'require' => true),
                'content' => array('name' => 'content', 'require' => true)
            ),
            'startNote' => array(
                'cid' => array('name' => 'cid', 'require' => true),
            ),
            'delStartNote' => array(
              'cid' => array('name' => 'cid', 'require' => true),
            ),
            'delNote' => array(
                  'cid' => array('name' => 'cid', 'require' => true),
            ),
            'updateNote' => array(
                  'cid' => array('name' => 'cid', 'require' => true),
                  'title' => array('name' => 'title', 'require' => true),
                  'content' => array('name' => 'content', 'require' => true)
            ),
            'showNote' => array(
                  'uid' => array('name' => 'uid', 'require' => true),
            ),
        );
    }

    /**
     * 添加笔记
     */
    public function addNote()
    {
        $domain = new \App\Domain\Note();
        $rs = $domain->addNote($this);
        return $rs;
    }

    /**
     * 加星笔记
     */
    public function startNote()
    {
      $domain = new \App\Domain\Note();
      $rs = $domain->startNote($this->cid);
      return $rs;
    }

    /**
     * 取消加星
     */
    public function delStartNote()
    {
      $domain = new \App\Domain\Note();
      $rs = $domain->delStartNote($this->cid);
      return $rs;
    }

    /**
     * 删除笔记
     */
    public function delNote()
    {
      $domain = new \App\Domain\Note();
      $rs = $domain->delNote($this->cid);
      return $rs;
    }

    /**
     * 修改笔记
     */
    public function updateNote()
    {
      $domain = new \App\Domain\Note();
      $rs = $domain->updateNote($this);
      return $rs;
    }

    /**
     * 显示笔记
     */
    public function showNote()
    {
      $domain = new \App\Domain\Note();
      $rs = $domain->showNote($this->uid);
      return $rs;
    }
} 
