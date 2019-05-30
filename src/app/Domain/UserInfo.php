<?php
namespace App\Domain;

class UserInfo
{
    /**
     * 注册
     */
    public function register($data, $imageurl)
    {
        // uname pswd
        $model = new \App\Model\UserInfo();
        $data = \App\obj_array($data);  // 对象->数组
        unset($data['photourl']);
        $data['photourl'] = $imageurl;
        // return $data;
        $rs = $model->register($data);
        return $rs;
    }

    /**
     * 登录
     */
    public function login($data)
    {
        // uname pswd
       $model = new \App\Model\UserInfo();
       $data = \App\obj_array($data);
       $rs = $model->login($data);
       return $rs;
    }

    /**
     * 显示用户信息
     */
    public function showUserInfo()
    {
      $model = new \App\Model\UserInfo();
      $rs = $model->showUserInfo();
      return $rs;
    }
}