<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 10:39
 */

namespace app\home\controller;

use think\Controller;

class About extends Controller
{
    public function index()
    {
        return view('About/about');
    }

}