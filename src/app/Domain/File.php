<?php
namespace App\Domain;

class File
{
     /**
     * 添加文件
     */
    public function addFile($data, $imageurl)
    {
        $model = new \App\Model\File();
        $data = \App\obj_array($data);  // 对象->数组
        unset($data['filepath']);
        $data['filepath'] = $imageurl;
        // return $data;
        $rs = $model->addFile($data);
        return $rs;  
    }

    /**
     * 删除
     */
    public function delFile($fid)
    {
      $model = new \App\Model\File();
      $rs = $model->delFile($fid);
      return $rs;  
    }

}