<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 11:34
 */

namespace app\home\controller;

use think\Controller;

class Contact extends Controller
{
    public function index()
    {
        return $this->view->fetch('Contact/contact');
    }

    public function contact_list()
    {
        return $this->view->fetch('Contact/contact_list');
    }

}