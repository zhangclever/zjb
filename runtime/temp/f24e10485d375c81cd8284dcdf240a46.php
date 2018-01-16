<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:89:"F:\myphp_www\PHPTutorial\WWW\zjb\public/../application/admin\view\member\member_read.html";i:1516013920;s:76:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\link-css.html";i:1515743266;s:74:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\header.html";i:1515734283;s:77:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\left-menu.html";i:1515832511;s:74:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\footer.html";i:1515740892;s:77:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\script-js.html";i:1515745143;}*/ ?>
<!DOCTYPE html>
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
    <link href="/public/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/public/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/public/static/admin/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/public/static/admin/image/favicon.ico" rel="shortcut icon"/><!--网站小图标-->
</head>

<link rel="stylesheet" type="text/css" href="/public/static/admin/css/bootstrap-fileupload.css"/>
<!--<link href="/public/static/admin/css/main.css" rel="stylesheet">-->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="index.html" style="padding: 0;">
                <img src="/public/static/admin/image/logo.png" alt="logo" width="180" style="padding: 0;"/>
            </a>
            <!-- END LOGO -->
            <ul class="nav pull-right">
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="/public/static/admin/image/avatar1_small.jpg" />
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
                    <a href="<?php echo url('Member/member_list'); ?>">
                        <i class="icon-list"></i>
                        会员列表</a>
                    <!--<a href="<?php echo url('Goods/goods_cate'); ?>">-->
                        <!--分类管理</a>-->
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
                    <a href="#">
                        管理员设置</a>
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
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>会员信息</div>
                            <div class="tools">
                                <a href="<?php echo url('Member/member_list'); ?>" >返回</a>
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form ">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo url('Member/member_info_add'); ?>" id="form_sample_2" method="post"
                                  class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <div class="controls" data-toggle="tooltip">
                                        <label class="control-label">会员姓名<span class="required">*</span></label>
                                        <input type="text" name="username" data-required="1" class="span4 m-wrap"
                                               value="<?php echo $member_info['username']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">性别<span class="required">*</span></label>
                                        <input type="text" name="sex" class="span4 m-wrap" value="<?php echo $member_info['sex']==0?'男' : '女'; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">正面照片<span class="required">*</span></label>
                                        <img src="/public/static/admin/<?php echo $member_info['upath']; ?>/<?php echo $member_info['uimg']; ?>" alt="" width="80"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls" data-toggle="tooltip">
                                        <label class="control-label">身份证号<span class="required">*</span></label>
                                        <input type="text" name="cardnum" data-required="1" class="span4 m-wrap"
                                               value="<?php echo $member_info['cardnum']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">身份证<span class="required">*</span></label>
                                        <img src="/public/static/admin/<?php echo $member_info['upath']; ?>/<?php echo $member_info['ucdimg']; ?>" alt="" width="80" disabled="disabled"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">手机号<span class="required">*</span></label>
                                        <input name="mobel" type="text" class="span4 m-wrap" value="<?php echo $member_info['mobel']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <div class="controls">
                                        <label class="control-label">所属地区<span class="required">*</span></label>
                                        <input type="text" class="span4 m-wrap" value="<?php echo $member_info['province']; ?><?php echo $member_info['city']; ?><?php echo $member_info['district']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">所属经销商<span class="required">*</span></label>
                                        <input type="text" class="span4 m-wrap" value="<?php echo $member_info['did']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">会员等级<span class="required">*</span></label>
                                        <input type="text" class="span4 m-wrap" value="<?php echo $member_info['mleve']; ?>" readonly>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- BEGIN PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
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
</body>
<script src="/public/static/admin/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/public/static/admin/layer/layer.js" type="text/javascript"></script>
<script src="/public/static/admin/layer/layer-jquery.js" type="text/javascript"></script>
<script src="/public/static/admin/js/jquery.form.js" type="text/javascript"></script>
<script src="/public/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/public/static/admin/js/excanvas.min.js"></script>
<script src="/public/static/admin/js/respond.min.js"></script>
<![endif]-->
<script src="/public/static/admin/js/app.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
    });
</script>
</html>