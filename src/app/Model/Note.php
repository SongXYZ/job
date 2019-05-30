<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Note extends NotORM
{
    /**
     * 添加笔记
     */
      public function addNote($data)
      {
            $orm = $this->getORM();
            $rs = $orm->insert($data);
            if($rs != NULL)
            {
                  return array('code' => '1');
            }else{
                  return array('code' => '0');
            }
      }

    /**
     * 加星笔记
     */
    public function startNote($cid)
    {
        $orm = $this->getORM();
        $data = array('cid' => $cid);
        $rs = $orm->where($data)->update(array('sign' => '1'));
        if($rs === false){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }

    /**
     * 取消加星
     */
    public function delStartNote($cid)
    {
        $orm = $this->getORM();
        $data = array('cid' => $cid);
        $rs = $orm->where($data)->update(array('sign' => '0'));
        if($rs === false){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }

    /**
     * 删除笔记
     */
    public function delNote($cid)
    {
      $orm = $this->getORM();
      $data = array('cid' => $cid);
      $rs = $orm->where($data)->delete();
      if($rs === false){
          return array('code' => '0');
      }else{
          return array('code' => '1');
      }
    }

    /**
     * 修改笔记
     */
    public function updateNote($cid, $data)
    {
        $orm = $this->getORM();
        $rs = $orm->where('cid', $cid)->update($data);
        if($rs === false){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }

    /**
     * 显示笔记
     */
    public function showNote()
    {
      $orm = $this->getORM();
      $rs = $orm->select('title', 'content', 'createtime')->where('uid', $uid)->fetchAll();      
      return $rs;
    }
}