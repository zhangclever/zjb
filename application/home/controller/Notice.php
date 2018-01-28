<?php
namespace app\home\controller;

use think\Controller;
use think\Db;

class Notice extends Controller
{
    public function index(){
        //最新动态
        $state = input('state');
        if($state == NULL){
            $list = Db::table('zjb_notices')->where('status',0)->order('id desc')->paginate(3,false);
        }else{
            $list = Db::table('zjb_notices')->where('status',0)->where('state',$state)->order('id desc')->paginate(3,false);
        }
        $this->assign('list',$list);
        return view('Notice/index');
    }

    public function content(){
        //最新动态单页面
        $id = input('id');
        $res = Db::table('zjb_notices')->where('id',$id)->find();
        // 点击量 + 1
        $clicks = $res['clicks'] + 1;
        $arrayClicks = array('clicks' => $clicks);
        $data = Db::table('zjb_notices')->where('id', $id)->update($arrayClicks);

        $this->assign('content',$res);
        return view('Notice/content');
    }




}
