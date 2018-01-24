<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:85:"F:\myphp_www\PHPTutorial\WWW\zjb\public/../application/admin\view\link\link_list.html";i:1516255254;s:76:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\link-css.html";i:1515743266;s:74:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\header.html";i:1515734283;s:77:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\left-menu.html";i:1516423192;s:74:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\footer.html";i:1516066794;s:77:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\script-js.html";i:1515745143;}*/ ?>
﻿<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>中健保网站后台</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="中健保网站后台" name="description" />
    <meta content="" name="author" />
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/static/admin/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/static/admin/image/favicon.ico" rel="shortcut icon"/><!--网站小图标-->
</head>

<!-- BEGIN BODY -->
    <style type="text/css">
.demo {display: inline-block;*display: inline;*zoom: 1;width: 140px;height: 20px;line-height: 20px;font-size: 12px;overflow: hidden;-ms-text-overflow: ellipsis;text-overflow: ellipsis;white-space: nowrap;}
.demo:hover {height: auto;white-space: normal;}
    </style>

<body class="page-header-fixed">

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="index.html" style="padding: 0;">
                <img src="/static/admin/image/logo.png" alt="logo" width="180" style="padding: 0;"/>
            </a>
            <!-- END LOGO -->
            <ul class="nav pull-right">
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="/static/admin/image/avatar1_small.jpg" />
                        <span class="username"><?php echo \think\Session::get('username'); ?></span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                        <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
                        <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                        <li class="divider"></li>
                        <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li><a href="<?php echo url('Login/logout'); ?>"><i class="icon-key"></i> 退出</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>

<!-- END HEADER -->

<!-- BEGIN CONTAINER -->

<div class="page-container row-fluid">

    <!-- BEGIN SIDEBAR -->

    <div class="page-sidebar nav-collapse collapse">
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="start  ">
            <a href="<?php echo url('Index/index'); ?>">
                <i class="icon-home"></i>
                <span class="title">后台首页</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-archive"></i>
                <span class="title">产品</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Goods/goods_list'); ?>">
                        <i class="icon-list"></i>
                        产品列表</a>
                    <a href="<?php echo url('Goods/goods_cate'); ?>">
                        分类管理</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-user"></i>
                <span class="title">会员</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Manager/manager_list'); ?>">
                        <i class="icon-list"></i>
                        招商经理列表</a>
                    <a href="<?php echo url('Dealer/dealer_list'); ?>">
                        <i class="icon-list"></i>
                        经销商管理</a>
                    <a href="<?php echo url('Member/member_list'); ?>">
                        <i class="icon-list"></i>
                        普通会员列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-file"></i>
                <span class="title">文章</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Article/article_list'); ?>">
                        新闻列表</a>
                    <a href="<?php echo url('Dynamic/dynamic_list'); ?>">
                        最新动态</a>
                    <a href="<?php echo url('Healthy/healthy_list'); ?>">
                        健保专栏</a>
                    <a href="<?php echo url('Notice/notice_list'); ?>">
                        通知公告</a>
                    <a href="<?php echo url('Compensate/compensate_list'); ?>">
                        理赔通知</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class=" icon-film"></i>
                <span class="title">视频</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Video/video_list'); ?>">
                        <i class="icon-list"></i>
                        视频管理</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-gift"></i>
                <span class="title">错误</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Index/errors'); ?>">
                        404 error</a>
                    <a href="<?php echo url('Index/prohibit'); ?>">
                        403 prohibit</a>
                    <a href="<?php echo url('Index/internal'); ?>">
                        500 internal error</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="icon-group"></i>
                <span class="title">管理员</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Admins/admin_list'); ?>">
                        <i class="icon-list"></i>
                        管理员列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">广告</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Advertise/advertise_list'); ?>">
                        广告管理</a>
                    <a href="<?php echo url('Advertise/advertise_type_list'); ?>">
                        广告分类</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class=" icon-cog"></i>
                <span class="title">设置</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo url('Auth/auth_list'); ?>">
                        权限管理</a>
                </li>
                <li>
                    <a href="<?php echo url('Auth/auth_group_list'); ?>">
                        角色管理</a>
                </li>
                <li>
                    <a href="<?php echo url('Link/link_list'); ?>">
                        友情链接</a>
                </li>
            </ul>

        </li>
    </ul>
</div>

    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE -->

    <div class="page-content">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <div id="portlet-config" class="modal hide">

            <div class="modal-header">

                <button data-dismiss="modal" class="close" type="button"></button>

                <h3>Widget Settings</h3>

            </div>

            <div class="modal-body">

                <p>Here will be a configuration form</p>

            </div>

        </div>

        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <div class="container-fluid text-center">

            <div class="row-fluid ">

                <div class="" data-tablet="span12 fix-offset" data-desktop="span6">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div class="portlet box grey ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-user"></i>友情链接</div>
                            <div class="actions">
                                <a href="<?php echo url('Link/link_add'); ?>" class="btn blue"><i class="icon-pencil"></i>添加友情</a>
                            </div>
                        </div>
                        <label>
                            <form action="<?php echo url('Link/link_list'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                链 接 名 :
                                <input name="name" value="<?php echo $name; ?>" type="text" aria-controls="sample_1">
                                <button type="submit" class="btn blue">搜索</button>
                            </form>
                        </label>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th class="hidden-480" style="text-align: center;">ID</th>
                                    <th class="hidden-480" style="text-align: center;">链接名</th>
                                    <th class="hidden-480" style="text-align: center;">信息联接地址</th>
                                    <th class="hidden-480" style="text-align: center;">发布时间</th>
                                    <th class="hidden-480"  style="text-align: center;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr class="odd gradeX ">
                                    <td style="text-align: center;"><?php echo $vo['id']; ?></td>
                                    <td style="text-align: center;"><?php echo $vo['name']; ?></td>
                                    <td style="text-align: center;"><?php echo $vo['url']; ?></td>
                                    <td style="text-align: center;"><?php echo $vo['ctimes']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo url('Link/link_see','id='.$vo['id']); ?>"><i class="icon-ban-circle"></i>查看</a>
                                        <a href="javascript:js_status(<?php echo $vo['id']; ?>,<?php echo $vo['status']; ?>)"><i class="icon-ban-circle"></i><?php echo $vo['status']==0?'禁用':'启用'; ?></a>
                                        <a href="<?php echo url('Link/link_edit','id='.$vo['id']); ?>"><i class="icon-pencil"></i>修改</a>
                                        <a href="javascript:remove(<?php echo $vo['id']; ?>)"><i class="icon-trash"></i>删除</a>
                                     </td>
                                </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <div class="pagination pagination-right" style="margin-bottom: 0;">
                                <ul>
                                    <li class="active"><?php echo $list; ?></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- BEGIN PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer " >
    <div class="footer-inner">
        2017 &copy; <a href="http://www.zhongjianbao.com/" title="网站模板" target="_blank">中健保</a> - More Templates <a href="http://www.zhongjianbao.com/" target="_blank" title="中健保">中健保</a>
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
    </div>
</div>

<!-- END FOOTER -->
<script src="/static/admin/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/static/admin/layer/layer.js" type="text/javascript"></script>
<script src="/static/admin/layer/layer-jquery.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery.form.js" type="text/javascript"></script>
<script src="/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/static/admin/js/excanvas.min.js"></script>
<script src="/static/admin/js/respond.min.js"></script>
<![endif]-->
<script src="/static/admin/js/app.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
    });
</script>
</body>
<!-- END BODY -->
<script>
    function js_status (id,status) {
        $.ajax({
            type:"post",
            url:'link_status',
            data:{"id":id,"status":status},
            success:function (data) {
                if (data.code===1){
                    layer.msg(data.msg,{icon:6,time:2000},function () {
                        location.reload();
                    })
                }else{
                    layer.msg(data.msg,{icon:2,time:2000})
                }
            }
        })
    }
    function remove(id){
        layer.confirm('确定删除么？',{icon:3,title:'提示'},function (index) {
                $.ajax({
                    type:"post",
                    url:'link_delete',
                    data:{"id":id},
                    success:function (data) {
                        if (data.code===1){
                            layer.msg(data.msg,{icon:6,time:2000},function () {
                                location.reload();
                            })
                        }else{
                            layer.msg(data.msg,{icon:2,time:2000})
                        }
                    }
                })
            layer.close(index);
        })
    }
</script>
</html>