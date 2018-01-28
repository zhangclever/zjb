<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:42
 */

namespace app\home\controller;

use think\Controller;

class News extends Controller
{
    public function index()
    {
        return $this->view->fetch('News/news');
    }

    public function news()
    {
        return $this->view->fetch('News/news-single');
    }
}