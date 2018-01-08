<?php
namespace app\admin\validate;

use think\Validate;

class Goods extends Validate{
    protected $rule = [
        'name'  =>  'require',
        'price' =>  'require|number',
        'sales' =>  'require|number|between:0.1,100',
        'setlment' =>  'require|number',
        'integral' =>  'require|number',
        'img' =>  'require',
        ];
    protected $message =[
        'name' => '请填写商品名称' ,
        'price.require' => '价格必须填写' ,
        'price.number' => '价格请填写数字' ,
        'sales.require' => '报销比例必须填写',
        'sales.number' => '报销比例为填写数字',
        'sales.between' => '报销比例应为0.1到100之间',
        'setlment.require' => '实结必须填写',
        'setlment.number' => '实结请填写数字',
        'integral.require' => '积分必须填写',
        'integral.number' => '积分请填写数字',
        'img.require' => '图片必须添加'
    ];
    protected $scene = [
        'goods_add' =>['name','price','sales','setlment','integral'],
        'goods_edit' =>['name','price','sales','setlment','integral'],
        'goods_file' =>['img']
    ];
}