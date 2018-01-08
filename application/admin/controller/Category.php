<?php
namespace app\admin\controller;

class Category
{
    public function category(){
    	//产品分类
        return view('category');
    }

    public function cate_edit(){
    	//产品分类 编辑
        return view('cate-edit');
    }

}
