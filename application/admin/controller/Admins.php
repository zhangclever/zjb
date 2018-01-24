<?php
namespace app\admin\controller;

use think\Db;

class Admins extends Basic{

    public function admin_list(){
    	//管理员列表
        $name = input('name');
        $search = ['query'=>[]];
        $search['query']['name'] = $name;
        $list = Db::table('zjb_admins')->where('name','like','%'.$name.'%')->where("id!=1")->order('id desc')->paginate(10,false,$search);

        $this->assign('list',$list);
        $this->assign('name',$name);
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

//    public function admin_accredit(){
//        // echo '授权页面';
//        $id = input('id');
//        //查询是否这个  admin_id这条数据
//        $count = Db::table('zjb_accredits')->where('admin_id',$id)->count();
//        //判断 没有的化，就添加这个数据到权限表zjb_accredits
//        if($count == 0){
//            $admin_id['admin_id'] = $id;
//            $res = Db::table('zjb_accredits')->insert($admin_id);
//        }
//        $data = Db::table('zjb_accredits')->where('admin_id',$id)->find();
//        $this->assign('id',$id);
//        $this->assign('data',$data);
//        return view('admin_accredit');
//    }

    public function accredit_modify()
    {
        // 执行修改权限
        $data = input();
        $id = input('id');
        // var_dump($data);die;
        $res = Db::table('zjb_accredits')->where('admin_id', $id)->update($data);
        if ($res) {
            $this->success('设置权限成功', 'Admins/admin_list');
        } else {
            $this->error('设置权限失败', 'Admins/admin_list');
        }
    }

}
