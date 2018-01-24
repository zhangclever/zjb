<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/17
 * Time: 10:40
 */

namespace app\admin\controller;

use lib\Page;
use think\Db;

class Manager extends Basic
{
    public function manager_list()
    {
        $mname = input('mname');
        $search = ['query'=>[]];
        $search['query']['mname'] = $mname;
        $list = Db::table('zjb_manager')->where('mname','like','%'.$mname.'%')->order('id desc')->paginate(10,false,$search);
        
        $this->assign('list',$list);
        $this->assign('mname',$mname);
        return view('Manager/manager_list');
    }

    public function manager_add()
    {
        return view('Manager/manager_add');
    }

    public function manager_info_add()
    {
        $data = input();
        $result = $this->validate($data,'Manager.manager_edit');
        if (true !== $result) {
            $this->error($result, 'Manager/manager_add');
        }
        $res = Db::name('manager')->insertGetId($data);
        if ($res){
            $this->success('招商经理添加成功编号为'.$res,'Manager/manager_list');
        }else{
            $this->error('添加失败');
        }
    }

    public function manager_edit()
    {
        $id =input();
        $mInfo = Db::name('manager')->find($id);
        $this->assign('manager_info',$mInfo);
        return view('Manager/manager_edit');
    }

    public function manager_info_edit()
    {
        $data = input();
        $result = $this->validate($data,'Manager.manager_edit');
        if (true !== $result) {
            $this->error($result, 'Manager/manager_add');
        }
        $res = Db::name('manager')->update($data);
        if ($res){
            $this->success('信息修改成功','Manager/manager_list');
        }else{
            $this->error('修改失败');
        }
    }

    public function manager_del()
    {
        $id = input();
        $res = Db::name('manager')->delete($id);
        if ($res){
            $this->success('删除成功','Manager/manager_list');
        }else{
            $this->error('删除失败');
        }
    }
}