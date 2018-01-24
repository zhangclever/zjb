<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:15
 */

namespace app\home\controller;

use think\Controller;

class Service extends Controller
{
    public function index()
    {
        return $this->view->fetch('Service/service');
    }
}