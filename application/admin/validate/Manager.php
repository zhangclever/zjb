<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 12:02
 */
namespace app\admin\validate;

use think\Validate;
class Manager extends Validate
{
    protected $rule = [
        'mname'  =>  'require|length:6,12',
        'mmobel' =>  ['require','regex'=>'(^1[34578]\d{9}$)|(^[0-9]{3,4}-[0-9]{7,8}$)'],
    ];
    protected $message =[
        'mname.require' => '请填写姓名' ,
        'mname.length' => '姓名别太长了，打字很累;也别太短了，用真名' ,
        'mmobel.require' => '手机号必须填写' ,
        'mmobel.regex' => '请填写正却的手机号格式' ,
    ];
    protected $scene = [
        'member_add' =>['mname','mmobel'],
        'member_edit' =>['mname','mmobel'],
    ];
}