<?php
namespace app\home\controller;

use think\Controller;
use think\Db;

class Video extends Controller
{
    public function index(){
        //最新动态
        $state = input('state');
        if($state == NULL){
            $list = Db::table('zjb_video')->where('status',0)->order('id desc')->paginate(3,false);
        }else{
            $list = Db::table('zjb_video')->where('status',0)->where('state',$state)->order('id desc')->paginate(3,false);
        }
        $this->assign('list',$list);
        return view('Video/index');
    }

    public function content(){
        //最新动态单页面
        $id = input('id');
        $res = Db::table('zjb_video')->where('id',$id)->find();

        $this->assign('content',$res);
        return view('Video/content');
    }




}
