<?php
namespace app\admin\controller;

use think\Controller;
use lib\Page;
use think\Db;

class Article extends Basic{

    public function article_list(){
    	//文章列表
        $list = Db::table('zjb_news')->select();
        $arr = new Page($list,10);
        $this->assign(['list'=>$arr]);
        return view('article_list');
    }

    public function article_search(){
        // 搜索框
        $title = input('title');
        if(!empty($title)){
            $list = Db::table('zjb_news')->where('title','like','%'.$title.'%')->select();
            $arr = new Page($list,10);
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Article/article_list')."';</script>");
        }
        $this->assign(['list'=>$arr]);
        return view('article_list');
    }

    public function article_add(){
    	//添加页面
        return view('article_add');
    }

    public function article_insert(){
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
        $res = Db::table('zjb_news')->insert($data);
        if($res){
            $this->success('添加成功','Article/article_list');
        }else{
             $this->error('添加失败','Article/article_list');
        }
    }

    public function article_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_news')->where('id',$id)->find();
        $this->assign('articles',$res);
        return view('article_edit');
    }

    public function article_modify(){
        //执行修改
        $data = input();
        $id = input('id');
        $file = request()->file('images');
        var_dump($data);die;
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

        $res = Db::table('zjb_news')->where('id', $id)->update($data);
        if($res){
            $this->success('修改成功','Article/article_list');
        }else{
            $this->error('修改失败','Article/article_list');
        }
    }

    public function article_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_news')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','Article/article_list');
        }else{
            $this->error('删除失败','Article/article_list');
        }
    }

    public function article_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_news')->where('id',$id)->find();

        $this->assign('articles',$res);
        return view('article_see');
    }

    public function article_status($id,$status){
        //启用禁用  
        if($status == 0){
            $res = Db::name('news')->where('id',$id)->setField('status',1);
        }else{
            $res = Db::name('news')->where('id',$id)->setField('status',0);
        }
        if($res){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }


}
