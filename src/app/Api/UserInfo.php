<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class UserInfo extends Api {
    public function getRules() {
        return array(
            'login' => array(
                'uname' => array('name' => 'uname', 'require' => true),
                'pswd' => array('name' => 'pswd', 'require' => true)
            ),
            'register' => array(
                'uname' => array('name' => 'uname', 'require' => true),
                'number' => array('name' => 'number', 'require' => true),
                'pswd' => array('name' => 'pswd', 'require' => true),
                'gender' => array('name' => 'gender', 'require' => true),
                'comstellation' => array('name' => 'comstellation', 'require' => true),
                'resume' => array('name' => 'resume', 'require' => true),
                'motto' => array('name' => 'motto', 'require' => true),
                'photourl' => array(
                    'name' => 'file',        // 客户端上传的文件字段
                    'type' => 'file', 
                    'require' => true
                )
            )
        );
    }

    /**
     * 注册
     */
    public function register()
    {
        $domain = new \App\Domain\UserInfo();
        $this->pswd = md5($this->pswd);
        $upload = new \App\Api\Examples\Upload();
        $imageurl = $upload->go($this->photourl);
        $rs = $domain->register($this, $imageurl);
        return $rs;
    }

    /**
     * 登录
     */
    public function login()
    {
        $domain = new \App\Domain\UserInfo();
        $this->pswd = md5($this->pswd);
        $rs = $domain->login($this);
        return $rs;
    }

    /**
     * 显示用户信息
     */
    public function showUserInfo()
    {
        $domain = new \App\Domain\UserInfo();
        $rs = $domain->showUserInfo();
        return $rs;
    }
} 
