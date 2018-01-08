<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Paginator;

class Link extends Controller{

    public function link_list(){
    	//文章列表
        // 查询状态为1的用户数据 并且每页显示10条数据
        $list = Db::table('zjb_links')->paginate(10);
        $page = $list->render();

        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('link_list');
    }

    public function link_search(){
        // 搜索框
        $name = input('name');
        if(!empty($name)){
                $list = Db::table('zjb_links')->where('name','like','%'.$name.'%')->paginate(10);
                $page = $list->render();
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Link/link_list')."';</script>");
        }
        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('link_list');
    }

    public function link_add(){
    	//添加页面
        return view('link_add');
    }

    public function link_insert(){
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
        $res = Db::table('zjb_links')->insert($data);
         if($res){
            die("<script>alert('添加成功');window.location.href='".url('Link/link_list')."';</script>");
        }else{
            die("<script>alert('添加失败');window.location.href='".url('Link/link_list')."';</script>");
         }
    }

    public function link_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_links')->where('id',$id)->find();

        $this->assign('links',$res);
        return view('link_edit');
    }

    public function link_modify(){
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

        $res = Db::table('zjb_links')->where('id', $id)->update($data);
        if($res){
            die("<script>alert('11');window.location.href='".url('Link/link_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Link/link_list')."';</script>");
        } 
    }

    public function link_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_links')->where('id',$id)->delete();
        if($res){
            die("<script>alert('11');window.location.href='".url('Link/link_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Link/link_list')."';</script>");
        } 
    }

    public function link_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_links')->where('id',$id)->find();

        $this->assign('links',$res);
        return view('link_see');
    }

    public function link_status(){
        //启用--
        $id = input('id');
        $data =  Db::table('zjb_links')->where('id', $id)->find();

        if($data['status'] == 0){
            $res = Db::table('zjb_links')->where('id', $id)->update(['status' => '1']);
        }else{
            $res = Db::table('zjb_links')->where('id', $id)->update(['status' => '0']);
        }

        if($res){
            die("<script>;window.location.href='".url('Link/link_list')."';</script>");
        }else{
            die("<script>alert('启用失败');window.location.href='".url('Link/link_list')."';</script>");
        } 
    }


}
