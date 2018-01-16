<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 12:02
 */
namespace app\admin\validate;

use think\Validate;
class Member extends Validate
{
    protected $rule = [
        'username'  =>  'require',
        'cardnum' => ['require','regex'=>'(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{2}[0-9Xx]$)'],
        'mobel' =>  ['require','regex'=>'(^1[34578]\d{9}$)|(^[0-9]{3,4}-[0-9]{7,8}$)'],

    ];
    protected $message =[
        'username' => '请填写会员姓名' ,
        'cardnum.require' => '身份证号必须填写' ,
        'cardnum.regex' => '请填写正确的身份证号' ,
        'mobel.require' => '手机号必须填写' ,
        'mobel.regex' => '请填写正却的手机号格式' ,
    ];
    protected $scene = [
        'member_add' =>['username','cardnum','mobel'],
        'member_edit' =>['username','cardnum','mobel'],
    ];
}