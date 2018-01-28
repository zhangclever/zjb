<?php
namespace app\home\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index(){
    	//新闻列表
    	$article = Db::name('news')->where('status',0)->order('id desc')->limit(1)->select();
    	$this->assign('article',$article);
    	//最新动态
    	$dynamic = Db::name('dynamics')->where('status',0)->order('id desc')->limit(1)->select();
    	$this->assign('dynamic',$dynamic);
    	//公告通知
    	$notice = Db::name('notices')->where('status',0)->order('id desc')->limit(1)->select();
    	$this->assign('notice',$notice);
    	//理赔通知
    	$compensate = Db::name('compensates')->where('status',0)->order('id desc')->limit(8)->select();
    	$this->assign('compensate',$compensate);
    	//产品分类
		$goods_cate = Db::name('goods_cate')->order('id desc')->where('pid=0')->select();
    	$this->assign('goods_cate',$goods_cate);	
    	//产品
    	$goods = Db::name('goods')->limit(8)->select();
    	$this->assign('goods',$goods);
    	//产品总数
    	$goods_c = Db::name('goods')->count();
    	$this->assign('goods_c',$goods_c);
    	//合作伙伴总数
    	$dealer_c = Db::name('dealer')->count();
    	$this->assign('dealer_c',$dealer_c);
    	//视频
    	$video = Db::name('video')->order('id desc')->limit(4)->select();
    	$this->assign('video',$video);
    	//健保专栏--》健康资讯
    	$healthy = Db::name('healthys')->where('state=0')->where('status',0)->order('id desc')->limit(6)->select();
    	$this->assign('healthy',$healthy);

        return view('Index/index');
    }

    // -------------------------------渲染（public）下的页面----------------------------------//
    public function links(){
    	//友情链接 
    	$links = Db::name('links')->where('status',0)->order('id desc')->select();
    	// return $links;
    	return $links;
    }

    //--------------------------------------首页轮播赋值--------------------------------------//
    public function banner(){
    	//首页头部轮播
    	
    }



}
