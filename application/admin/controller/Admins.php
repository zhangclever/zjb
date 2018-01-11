<?php
namespace app\admin\controller;

use think\Controller;
use think\lib\Page;
use think\Db;

class Admins extends Basic{

    public function admin_list(){
    	//管理员列表
        $list = Db::table('zjb_admins')->select();
        $arr = new Page($list,10);
        $this->assign(['list'=>$arr]);

        return view('admin_list');
    }

    public function admin_search(){
        // 搜索框
        $name = input('name');
        if(!empty($name)){
            $list = Db::table('zjb_admins')->where('name','like','%'.$name.'%')->select();
            $arr = new Page($list,10);
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Admin/admin_list')."';</script>");
        }
        $this->assign(['list'=>$arr]);

        return view('admin_list');
    }

    public function admin_add(){
    	//添加页面
        return view('admin_add');
    }

    public function admin_insert(){
        //执行添加
        $data = input();
        $data['userpassword'] = sha1($data['userpassword']);
        $res = Db::table('zjb_admins')->insert($data);
        if($res){
            $this->success('添加成功','Admins/admin_list');
        }else{
            $this->error('添加失败','Admins/admin_list');
        }
    }

    public function admin_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_admins')->where('id',$id)->find();

        $this->assign('admins',$res);
        return view('admin_edit');
    }

    public function admin_modify(){
        //执行修改
        $data = input();
        $id = input('id');
        $data['userpassword'] = sha1($data['userpassword']);
        $res = Db::table('zjb_admins')->where('id', $id)->update($data);
        if($res){
            $this->success('修改成功','Admins/admin_list');
        }else{
            $this->error('修改失败','Admins/admin_list');
        } 
    }

    public function admin_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_admins')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','Admins/admin_list');
        }else{
            $this->error('删除失败','Admins/admin_list');
        } 
    }

    public function admin_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_admins')->where('id',$id)->find();

        $this->assign('admins',$res);
        return view('admin_see');
    }


}
