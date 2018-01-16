<?php

namespace app\admin\controller;

class Banner
{
    public function banner_list()
    {
        //轮播管理
        return view('banner_list');
    }

    public function banner_add()
    {
        //轮播管理 添加
        return view('banner_add');
    }

    public function banner_edit()
    {
        //轮播管理 编辑
        return view('banner_edit');
    }

}
