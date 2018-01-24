<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/20
 * Time: 9:53
 */

namespace app\admin\controller;


use think\Db;

class Auth extends Basic
{
    public function auth_list()
    {
        $rule_list = Db::name('auth_rule')->order(['type','id'=>'asc'])->paginate(10);
        $this->assign('rule_list',$rule_list);
        return view('Auth/auth_list');
    }

    public function auth_add()
    {
        return view('Auth/auth_add');
    }

    public function auth_info_add()
    {
        $data = input();
        $res = Db::name('auth_rule')->insert($data);
        if ($res) {
            $this->success('权限添加成功', 'Auth/auth_list');
        } else {
            $this->error('权限添加失败');
        }

    }

    public function auth_group_list()
    {
        $group_list = Db::name('auth_group')->paginate(10);
        $this->assign('group_list',$group_list);
        return view('Auth/auth_group_list');
    }

    public function auth_group_add()
    {
        return view('Auth/auth_group_add');
    }

    public function auth_group_info_add()
    {
        $data = input();
        $res = Db::name('auth_group')->insert($data);
        if ($res) {
            $this->success('角色添加成功', 'Auth/auth_group_list');
        } else {
            $this->error('角色添加失败');
        }
    }
    public function auth_accredit()
    {

        // echo '授权页面';
        $id = input('id');
        $name = Db::name('auth_group')->where('id',$id)->value('title');
        $this->assign('gname',$name);
        $rule = Db::name('auth_rule')->order(['type','id'=>'asc'])->select();
        $this->assign('rule',$rule);
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
        return view('auth_accredit');
    }

    public function auth_accredit_modify()
    {

    }
}