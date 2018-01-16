<?php

namespace app\admin\controller;


class Index extends Basic
{

    public function index()
    {
        return view('index');
    }

    public function errors()
    {
        //404
        return view('errors');
    }

    public function prohibit()
    {
        //403
        return view('prohibit');
    }

    public function internal()
    {
        //500
        return view('internal');
    }

}
