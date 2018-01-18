<?php
namespace app\home\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $res = Db::name('advertise_type')->where('typename','头部一')->find();
        $this->assign('aOne',$res);
        $res = Db::name('advertises')->where('tid',27)->where('status',0)->select();
        $this->assign('cOne',$res);
        return view('Index/index');
    }

//    public function al()
//    {
//
//        return view('index');
//    }
}
