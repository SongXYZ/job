<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class File extends NotORM
{
     /**
     * 添加文件
     */
    public function addFile($data)
    {
      $orm = $this->getORM();
      $rs = $orm->insert($data);
      // $id = $orm->insert_id();
      if($rs != NULL)
      {
            return array('code' => '1');
      }else{
            return array('code' => '0');
      }
    }

    /**
     * 删除
     */
    public function delFile($fid)
    {
      $orm = $this->getORM();
      $rs = $orm->where('fid', $fid)->delete();
      if($rs === false){
          return array('code' => '0');
      }else{
          return array('code' => '1');
      }
    }
}