<?php
namespace app\home\controller;

use think\Controller;
use think\Db;

class Article extends Controller
{
    public function index(){
        //新闻列表
        $state = input('state');
        if($state == NULL){
            $list = Db::table('zjb_news')->where('status',0)->order('id desc')->paginate(3,false);
        }else{
            $list = Db::table('zjb_news')->where('status',0)->where('state',$state)->order('id desc')->paginate(3,false);
        }
        $this->assign('list',$list);
        return view('Article/index');
    }

    public function content(){
        //新闻列表
        $id = input('id');
        $res = Db::table('zjb_news')->where('id',$id)->find();
        // 点击量 + 1
        $clicks = $res['clicks'] + 1;
        $arrayClicks = array('clicks' => $clicks);
        $data = Db::table('zjb_news')->where('id', $id)->update($arrayClicks);

        $this->assign('content',$res);
        return view('Article/content');
    }




}
