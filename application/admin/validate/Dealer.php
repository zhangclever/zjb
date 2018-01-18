<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 12:02
 */
namespace app\admin\validate;

use think\Validate;
class Dealer extends Validate
{
    protected $rule = [
        'dname'  =>  'require|length:6,12',
        'dcardnum' => ['require','regex'=>'(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{2}[0-9Xx]$)'],
        'dmobel' =>  ['require','regex'=>'(^1[34578]\d{9}$)|(^[0-9]{3,4}-[0-9]{7,8}$)'],
        'dpassword' =>  'require|length:6,12',
    ];
    protected $message =[
        'dname.require' => '请填写会员姓名' ,
        'dname.length' => '姓名别太长了，打字很累' ,
        'dcardnum.require' => '身份证号必须填写' ,
        'dcardnum.regex' => '请填写正确的身份证号' ,
        'dmobel.require' => '手机号必须填写' ,
        'dmobel.regex' => '请填写正却的手机号格式' ,
        'dpassword.require' => '经销商密码必须填写' ,
        'dpassword.length' => '密码长度为6到12之间,' ,
    ];
    protected $scene = [
        'member_add' =>['dname','dcardnum','dmobel','dpassword'],
        'member_edit' =>['dname','dcardnum','dmobel','dpassword'],
    ];
}