<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 笔记
 */
class File extends Api {
    public function getRules() {
        return array(
            'addFile' => array(
                'uid' => array('name' => 'uid', 'require' => true),
                'filedes' => array('name' => 'title', 'require' => true),
                'filepath' => array(
                  'name' => 'file',        // 客户端上传的文件字段
                  'type' => 'file', 
                  'require' => true
                  )
            ),
            'delFile' => array(
                'fid' => array('name' => 'fid', 'require' => true),
            )
        );
    }

    /**
     * 添加文件
     */
    public function addFile()
    {
      $domain = new \App\Domain\File();
      $upload = new \App\Api\Examples\Upload();
      $imageurl = $upload->go($this->filepath);
      $rs = $domain->addFile($this, $imageurl);
      return $rs;      
    }

    /**
     * 删除
     */
    public function delFile()
    {
      $domain = new \App\Domain\File();
      $rs = $domain->delFile($this->fid);
      return $rs;      
    }
} 
