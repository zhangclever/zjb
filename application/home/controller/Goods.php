<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 11:18
 */

namespace app\home\controller;

use think\Controller;

class Goods extends Controller
{
    public function index()
    {
        return $this->view->fetch('Goods/goods');
    }
}