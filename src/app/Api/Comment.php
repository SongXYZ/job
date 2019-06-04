<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class Comment extends Api {
    public function getRules() {
        return array(
            'addComment' => array(
                'uid' => array('name' => 'uid', 'require' => true),
                'ccontent' => array('name' => 'ccontent', 'require' => true)
            ),
        );
    }

    /**
     * 发表回复
     */
    public function addComment()
    {
        $domain = new \App\Domain\Comment();
        $rs = $domain->addComment($this);
        return $rs;
    }

    /**
     * 显示回复
     */
    public function showComment()
    {
      $domain = new \App\Domain\Comment();
      $rs = $domain->showComment();
      return $rs;
    }

} 
