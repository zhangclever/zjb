<?php
namespace app\admin\controller;

use think\Controller;
use lib\Page;
use think\Db;

class Login extends Controller{

    public function login(){
    	//登录页面
    	return view('login');
    }

    public function logout(){  
        session(null);//退出清空session  
        return $this->success('退出成功','Login/login');
    } 

    public function login_inspect(){
    	//执行登录
    	$data = input();
    	$admin = Db::name('admins')->where('username','=',$data['username'])->find();  
    	// var_dump($admin);die;
        if($admin){  
            if($admin['userpassword'] === sha1($data['userpassword'])){  
                //将登录id和名称存入session  
                \think\Session::set('id',$admin['id']);  
                \think\Session::set('username',$admin['username']);  
                $this->success('登录成功','Index/index'); 
            }else{  
                $this->error('密码错误','Login/login');  
            }  
        }else{  
            $this->error('账号不对','Login/login'); 
        }
    }

}
