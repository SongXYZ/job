<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class UserInfo extends NotORM
{
    /**
     * 注册
     */
    public function register($data)
    {
        // array('uname'=>'','pswd'=>'')
        $orm = $this->getORM();
        // 判断用户是否存在
        $rs = $orm->select('uid')->where('uname', $data['uname'])->fetchAll();
        if($rs != NULL)
        {
            return array('code' => '0', 'data' => '用户名已注册'); 
        }else{
            $rs = $orm->insert($data);
            $id = $orm->insert_id();
            if($rs != NULL)
            {
                return array('code' => '1', 'uid' => $id);
            }else{
                return array('code' => '0');
            }
        }
    }

    /**
     * 登录
     */
    public function login($data)
    {
        // array('uname'=>'','pswd'=>'')
        $orm = $this->getORM();
        // uname gender constellation resume motto photourl createtime
        $rs = $orm->select('uname', 'number', 'gender', 'comstellation', 'resume', 'motto', 'photourl', 'createtime')->where($data)->fetchOne(); // 没有返回false
        if($rs == false)
        {
            return array('code' => '0');
        }else{
            return array('code' => '1', 'data' => $rs);
        }
    }

    /**
     * 显示用户信息
     */
    public function showUserInfo()
    {
        $orm = $this->getORM();
        $rs = $orm->select('uname', 'number', 'gender', 'comstellation', 'resume', 'motto', 'photourl')->fetchAll(); // 没有返回false
        if($rs == false)
        {
                return array('code' => '0');
        }else{
                return array('code' => '1', 'data' => $rs);
        }
        
    }
}