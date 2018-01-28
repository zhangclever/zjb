<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:15
 */

namespace app\home\controller;

use think\Controller;
use think\Db;
class Service extends Controller
{
    public function index()
    {
    	//健保专栏 排序21个  7行
    	$healthy = Db::name('healthys')->where('status',0)->order('id desc')->limit(21)->select();
    	
    	$this->assign('healthy',$healthy);
        return view('Service/service');
    }
}