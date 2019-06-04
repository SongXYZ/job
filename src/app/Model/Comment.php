<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Comment extends NotORM
{
    /**
     * 发表回复
     */
    public function addComment($data)
    {
        $orm = $this->getORM();
        $rs = $orm->insert($data);
        $id = $orm->insert_id();
        if($rs != NULL)
        {
            return array('code' => '1', 'cid' => $id);
        }else{
            return array('code' => '0');
        }
    }

    /**
     * 显示回复
     */
    public function showComment()
    {
        $orm = $this->getORM();
        $sql = 'select u.uname,u.photourl,c.ccontent,c.createtime from comment c join userinfo u on c.uid=u.uid order by c.createtime desc limit 50';
        $rs = $orm->queryAll($sql);
        return $rs;
    }
}