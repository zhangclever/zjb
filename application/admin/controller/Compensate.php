<?php
namespace app\admin\controller;

use think\Controller;
use think\lib\Page;
use think\Db;

class Compensate extends Basic{

    public function compensate_list(){
    	//文章列表
        $list = Db::table('zjb_compensates')->select();
        $arr = new Page($list,10);
        $this->assign(['list'=>$arr]);

        return view('compensate_list');
    }

    public function compensate_search(){
        // 搜索框
        $name = input('name');
        if(!empty($name)){
            $list = Db::table('zjb_compensates')->where('name','like','%'.$name.'%')->select();
            $arr = new Page($list,10);
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Compensate/compensate_list')."';</script>");
        }
        $this->assign(['list'=>$arr]);

        return view('compensate_list');
    }

    public function compensate_add(){
    	//添加页面
        return view('compensate_add');
    }

    public function compensate_insert(){
        //执行添加
        $data = input();
        $file = request()->file('images');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $imgName = date('YmdHis').rand(10000,99999);
            $info = $file->validate(['size'=>3150000,'ext'=>'jpg,png,gif,rgb'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads'.'/'.date('Ymd'),$imgName);
            if($info){
                 //自定义存储的img名称
                $data['images'] = date('Ymd').'/'.$info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        $res = Db::table('zjb_compensates')->insert($data);
        if($res){
            $this->success('添加成功','Compensate/compensate_list');
        }else{
             $this->error('添加失败','Compensate/compensate_list');
        }
    }

    public function compensate_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_compensates')->where('id',$id)->find();

        $this->assign('compensates',$res);
        return view('compensate_edit');
    }

    public function compensate_modify(){
        //执行修改
        $data = input();
        $id = input('id');

        $file = request()->file('images');
        if($file){
            $imgName = date('YmdHis').rand(10000,99999);
            $info = $file->validate(['size'=>3150000,'ext'=>'jpg,png,gif,rgb'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads'.'/'.date('Ymd'),$imgName);
            if($info){
                 //自定义存储的img名称
                $data['images'] = date('Ymd').'/'.$info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $res = Db::table('zjb_compensates')->where('id', $id)->update($data);
        if($res){
            die("<script>alert('11');window.location.href='".url('Compensate/compensate_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Compensate/compensate_list')."';</script>");
        } 
    }

    public function compensate_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_compensates')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','Compensate/compensate_list');
        }else{
            $this->error('删除失败','Compensate/compensate_list');
        }
    }

    public function compensate_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_compensates')->where('id',$id)->find();

        $this->assign('compensates',$res);
        return view('compensate_see');
    }

    public function compensate_status($id,$status){
        if($status == 0){
            $res = Db::name('compensates')->where('id',$id)->setField('status',1);
        }else{
            $res = Db::name('compensates')->where('id',$id)->setField('status',0);
        }
        if($res){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }


}
