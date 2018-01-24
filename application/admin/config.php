<?php
//配置文件
return [
    'view_replace_str'       => [
        '__PUBLIC__'  =>  '/static/admin' ,
    ],
    'AUTH_CONFIG' => [
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'zjb_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'zjb_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'zjb_auth_rule', //权限规则表
        'AUTH_USER' => 'zjb_admin'//用户信息表
    ],
];