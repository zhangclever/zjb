<?php
namespace app\admin\controller;

use lib\Page;
use think\Db;
header('Content-Type: text/html; charset=utf-8');
class Dynamic extends Basic{

    public function dynamic_list(){
    	//文章列表 加搜索
        $title = input('title');
        $search = ['query'=>[]];
        $search['query']['title'] = $title;
        $list = Db::table('zjb_dynamics')->where('title','like','%'.$title.'%')->order('id desc')->paginate(10,false,$search);

        $this->assign('list',$list);
        $this->assign('title',$title);
        return view('dynamic_list');
    }

    public function dynamic_add(){
    	//添加页面
        return view('dynamic_add');
    }

    public function dynamic_insert(){
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
        $res = Db::table('zjb_dynamics')->insert($data);
        if($res){
            $this->success('添加成功','Dynamic/dynamic_list');
        }else{
             $this->error('添加失败','Dynamic/dynamic_list');
        }
    }

    public function dynamic_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_dynamics')->where('id',$id)->find();

        $this->assign('dynamics',$res);
        return view('dynamic_edit');
    }

    public function dynamic_modify(){
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

        $res = Db::table('zjb_dynamics')->where('id', $id)->update($data);
        if($res){
            die("<script>alert('修改成功');window.location.href='".url('Dynamic/dynamic_list')."';</script>");
        }else{
            die("<script>alert('修改失败');window.location.href='".url('Dynamic/dynamic_list')."';</script>");
        } 
    }

    public function dynamic_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_dynamics')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','Dynamic/dynamic_list');
        }else{
            $this->error('删除失败','Dynamic/dynamic_list');
        }
    }

    public function dynamic_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_dynamics')->where('id',$id)->find();

        $this->assign('dynamics',$res);
        return view('dynamic_see');
    }

    public function dynamic_status($id,$status){
        //启用禁用  
        if($status == 0){
            $res = Db::name('dynamics')->where('id',$id)->setField('status',1);
        }else{
            $res = Db::name('dynamics')->where('id',$id)->setField('status',0);
        }
        if($res){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }


}
