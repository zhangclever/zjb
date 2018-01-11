<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:91:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\dynamic\dynamic_list.html";i:1515403495;s:86:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\public\link-css.html";i:1514966966;s:84:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\public\header.html";i:1515574025;s:87:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\public\left-menu.html";i:1515582903;s:84:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\public\footer.html";i:1514459584;s:87:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\public\script-js.html";i:1514964784;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset="utf-8" />

    <title>Metronic | Admin Dashboard Template</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta content="" name="description" />

    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!--<link href="__PUBLIC__/layer/layer.css" rel="stylesheet" type="text/css"/>-->

    <link href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap-fileupload.css" />

    <link href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/style-metro.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/style-responsive.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="__PUBLIC__/css/uniform.default.css" rel="stylesheet" type="text/css"/>


    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="__PUBLIC__/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/daterangepicker.css" rel="stylesheet" type="text/css" />

    <link href="__PUBLIC__/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

    <link href="__PUBLIC__/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

    <link href="__PUBLIC__/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="__PUBLIC__/image/favicon.ico" />

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

            <a class="brand" href="index.html">

                <img src="__PUBLIC__/image/logo.png" alt="logo"/>

            </a>

            <!-- END LOGO -->

            <!-- BEGIN RESPONSIVE MENU TOGGLER -->

            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

                <img src="__PUBLIC__/image/menu-toggler.png" alt="" />

            </a>

            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN TOP NAVIGATION MENU -->

            <ul class="nav pull-right">

                <!-- BEGIN NOTIFICATION DROPDOWN -->

                <!--<li class="dropdown" id="header_notification_bar">-->

                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                        <!--<i class="icon-warning-sign"></i>-->

                        <!--<span class="badge">6</span>-->

                    <!--</a>-->

                    <!--&lt;!&ndash;<ul class="dropdown-menu extended notification">&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<p>You have 14 new notifications</p>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-success"><i class="icon-plus"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;New user registered.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">Just now</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-important"><i class="icon-bolt"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;Server #12 overloaded.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">15 mins</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-warning"><i class="icon-bell"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;Server #2 not respoding.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">22 mins</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-info"><i class="icon-bullhorn"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;Application error.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">40 mins</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-important"><i class="icon-bolt"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;Database overloaded 68%.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">2 hrs</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li>&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="label label-important"><i class="icon-bolt"></i></span>&ndash;&gt;-->

                                <!--&lt;!&ndash;2 user IP blocked.&ndash;&gt;-->

                                <!--&lt;!&ndash;<span class="time">5 hrs</span>&ndash;&gt;-->

                            <!--&lt;!&ndash;</a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                        <!--&lt;!&ndash;<li class="external">&ndash;&gt;-->

                            <!--&lt;!&ndash;<a href="#">See all notifications <i class="m-icon-swapright"></i></a>&ndash;&gt;-->

                        <!--&lt;!&ndash;</li>&ndash;&gt;-->

                    <!--&lt;!&ndash;</ul>&ndash;&gt;-->

                <!--</li>-->

                <!-- END NOTIFICATION DROPDOWN -->

                <!-- BEGIN INBOX DROPDOWN -->

                <!--<li class="dropdown" id="header_inbox_bar">-->

                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                        <!--<i class="icon-envelope"></i>-->

                        <!--<span class="badge">5</span>-->

                    <!--</a>-->

                    <!--<ul class="dropdown-menu extended inbox">-->

                        <!--<li>-->

                            <!--<p>You have 12 new messages</p>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="inbox.html?a=view">-->

                                <!--<span class="photo"><img src="__PUBLIC__/image/avatar2.jpg" alt="" /></span>-->

                                <!--<span class="subject">-->

								<!--<span class="from">Lisa Wong</span>-->

								<!--<span class="time">Just Now</span>-->

								<!--</span>-->

                                <!--<span class="message">-->

								<!--Vivamus sed auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="inbox.html?a=view">-->

                                <!--<span class="photo"><img src="__PUBLIC__/image/avatar3.jpg" alt="" /></span>-->

                                <!--<span class="subject">-->

								<!--<span class="from">Richard Doe</span>-->

								<!--<span class="time">16 mins</span>-->

								<!--</span>-->

                                <!--<span class="message">-->

								<!--Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="inbox.html?a=view">-->

                                <!--<span class="photo"><img src="__PUBLIC__/image/avatar1.jpg" alt="" /></span>-->

                                <!--<span class="subject">-->

								<!--<span class="from">Bob Nilson</span>-->

								<!--<span class="time">2 hrs</span>-->

								<!--</span>-->

                                <!--<span class="message">-->

								<!--Vivamus sed nibh auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li class="external">-->

                            <!--<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>-->

                        <!--</li>-->

                    <!--</ul>-->

                <!--</li>-->

                <!-- END INBOX DROPDOWN -->

                <!-- BEGIN TODO DROPDOWN -->

                <!--<li class="dropdown" id="header_task_bar">-->

                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                        <!--<i class="icon-tasks"></i>-->

                        <!--<span class="badge">5</span>-->

                    <!--</a>-->

                    <!--<ul class="dropdown-menu extended tasks">-->

                        <!--<li>-->

                            <!--<p>You have 12 pending tasks</p>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">New release v1.2</span>-->

								<!--<span class="percent">30%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-success ">-->

								<!--<span style="width: 30%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Application deployment</span>-->

								<!--<span class="percent">65%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-danger progress-striped active">-->

								<!--<span style="width: 65%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Mobile app release</span>-->

								<!--<span class="percent">98%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-success">-->

								<!--<span style="width: 98%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Database migration</span>-->

								<!--<span class="percent">10%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-warning progress-striped">-->

								<!--<span style="width: 10%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Web server upgrade</span>-->

								<!--<span class="percent">58%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-info">-->

								<!--<span style="width: 58%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li>-->

                            <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Mobile development</span>-->

								<!--<span class="percent">85%</span>-->

								<!--</span>-->

                                <!--<span class="progress progress-success">-->

								<!--<span style="width: 85%;" class="bar"></span>-->

								<!--</span>-->

                            <!--</a>-->

                        <!--</li>-->

                        <!--<li class="external">-->

                            <!--<a href="#">See all tasks <i class="m-icon-swapright"></i></a>-->

                        <!--</li>-->

                    <!--</ul>-->

                <!--</li>-->

                <!-- END TODO DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->

                <li class="dropdown user">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img alt="" src="__PUBLIC__/image/avatar1_small.jpg" />

                        <span class="username">Bob Nilson</span>

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

    <!-- BEGIN SIDEBAR MENU -->

    <ul class="page-sidebar-menu">

        <!--<li>-->

            <!--&lt;!&ndash; BEGIN SIDEBAR TOGGLER BUTTON &ndash;&gt;-->

            <!--<div class="sidebar-toggler hidden-phone"></div>-->

            <!--&lt;!&ndash; BEGIN SIDEBAR TOGGLER BUTTON &ndash;&gt;-->

        <!--</li>-->
        <!--active-->
        <li class="start  ">

            <a href="<?php echo url('Index/index'); ?>">

                <i class="icon-home"></i>

                <span class="title">后台首页</span>

                <span class="selected"></span>

            </a>

        </li>


        <li class="">

            <a href="javascript:;">

                <i class="icon-bookmark-empty"></i>

                <span class="title">文章</span>

                <span class="arrow "></span>

            </a>

            <ul class="sub-menu">

                <li >

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

                <i class="icon-table"></i>

                <span class="title">产品</span>

                <span class="arrow "></span>

            </a>

            <ul class="sub-menu">

                <li >

                    <a href="<?php echo url('Goods/goods_list'); ?>">

                        产品列表</a>

                    <a href="<?php echo url('Goods/goods_cate'); ?>">

                        分类管理</a>

                </li>
                <!--<li >-->

                    <!--<a href="<?php echo url('Goods/goods_list'); ?>">-->

                        <!--产品列表</a>-->

                <!--</li>-->


            </ul>

        </li>

        <li class="">

            <a href="javascript:;">

                <i class="icon-briefcase"></i>

                <span class="title">视频</span>

                <span class="arrow "></span>

            </a>

            <ul class="sub-menu">
                <li >
                    <a href="page_timeline.html">
                        <i class="icon-time"></i>
                        Timeline</a>
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

                <li >

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

                <i class="icon-sitemap"></i>

                <span class="title">管理员</span>

                <span class="arrow "></span>

            </a>

            <ul class="sub-menu">

                <li >

                    <a href="<?php echo url('Admins/admin_list'); ?>">

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

                <li >

                    <a href="<?php echo url('Advertise/advertise_list'); ?>">

                        广告管理</a>
                    <a href="<?php echo url('Advertise/advertise_type_list'); ?>">

                        广告分类</a>

                </li>

            </ul>

        </li>

        <li class="">

            <a href="javascript:;">

                <i class="icon-bookmark-empty"></i>

                <span class="title">设置</span>

                <span class="arrow "></span>

            </a>

            <ul class="sub-menu">

                <li >

                    <a href="<?php echo url('Link/link_list'); ?>">

                        友情链接</a>

                </li>

            </ul>

        </li>

    </ul>

    <!-- END SIDEBAR MENU -->

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
                            <div class="caption"><i class="icon-user"></i>最新动态</div>
                            <div class="actions">
                                <a href="<?php echo url('Dynamic/dynamic_add'); ?>" class="btn blue"><i class="icon-pencil"></i>添加动态</a>
                            </div>
                        </div>
                        <label>
                            <form action="<?php echo url('Dynamic/dynamic_search'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                标 题 :
                                <input name="title" type="text" aria-controls="sample_1">
                                <button type="submit" class="btn blue">搜索</button>
                            </form>
                        </label>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th class="hidden-480" style="text-align: center;">ID</th>
                                    <th class="hidden-480" style="text-align: center;">标题</th>
                                    <th class="hidden-480" style="text-align: center;">信息图片</th>
                                    <th class="hidden-480" style="text-align: center;">点击量</th>
                                    <th class="hidden-480" style="text-align: center;">信息联接地址</th>
                                    <!-- <th class="hidden-480" style="text-align: center;">是否推荐</th> -->
                                    <th class="hidden-480" style="text-align: center;">动态类型</th>
                                    <th class="hidden-480" style="text-align: center;">发布时间</th>
                                    <th class="hidden-480"  style="text-align: center;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php if(is_array($list->data) || $list->data instanceof \think\Collection || $list->data instanceof \think\Paginator): $i = 0; $__LIST__ = $list->data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr class="odd gradeX ">
                                    <td style="text-align: center;"><?php echo $vo['id']; ?></td>
                                    <td style="text-align: center;"><?php echo $vo['title']; ?></td>
                                    <td style="text-align: center;"><img src='__PUBLIC__/uploads/<?php echo $vo['images']; ?>' height="80" width="80" ></td>
                                    <td style="text-align: center;"><?php echo $vo['clicks']; ?></td>
                                    <td style="text-align: center;"><?php echo $vo['url']; ?></td>
                                    <!-- <td style="text-align: center;"><?php echo $vo['status']; ?></td> -->
                                    <td style="text-align: center;">
                                                                <?php switch($vo['state']): case "0": ?>最新活动<?php break; case "1": ?>行业动态<?php break; case "2": ?>公告通知<?php break; case "3": ?>公益活动<?php break; case "4": ?>视频播放<?php break; default: ?>default
                                                                <?php endswitch; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $vo['ctimes']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo url('Dynamic/dynamic_see','id='.$vo['id']); ?>"><i class="icon-ban-circle"></i>查看</a>
                                        <a href="javascript:js_status(<?php echo $vo['id']; ?>,<?php echo $vo['status']; ?>)"><i class="icon-ban-circle"></i><?php echo $vo['status']==0?'禁用':'启用'; ?></a>
                                        <a href="<?php echo url('Dynamic/dynamic_edit','id='.$vo['id']); ?>"><i class="icon-pencil"></i>修改</a>
                                        <!-- <a onclick="return remove('<?php echo url('Dynamic/dynamic_delete','id='.$vo['id']); ?>')"><i class="icon-trash"></i>删除</a> -->
                                        <a href="javascript:remove(<?php echo $vo['id']; ?>)"><i class="icon-trash"></i>删除</a>
                                     </td>
                                </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <div class="pagination pagination-right" style="margin-bottom: 0;">
                                <ul>
                                    <li class="active"><?php echo $list->render; ?></li>
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
<<div class="footer">

    <div class="footer-inner">

        2013 &copy; Metronic by keenthemes.Collect from <a href="http://www.cssmoban.com/" title="网站模板" target="_blank">网站模板</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a>

    </div>

    <div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

    </div>

</div>
<!-- END FOOTER -->
<script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/layer/layer.js" type="text/javascript"></script>
<script src="__PUBLIC__/layer/layer-jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.form.js"></script>

<!--<script src="__PUBLIC__/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>-->

<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="__PUBLIC__/js/bootstrap.min.js" type="text/javascript"></script>

<!--[if lt IE 9]>

<script src="__PUBLIC__/js/excanvas.min.js"></script>

<script src="__PUBLIC__/js/respond.min.js"></script>

<![endif]-->

<script src="__PUBLIC__/js/jquery.slimscroll.min.js" type="text/javascript"></script>

<!--<script src="__PUBLIC__/js/jquery.blockui.min.js" type="text/javascript"></script>-->

<script src="__PUBLIC__/js/jquery.cookie.min.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/jquery.uniform.min.js" type="text/javascript" ></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="__PUBLIC__/js/jquery.flot.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/jquery.flot.resize.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/jquery.pulsate.min.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/date.js" type="text/javascript"></script>


<!--<script type="text/javascript" src="__PUBLIC__/js/ajaxfileupload.js"></script>-->


<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="__PUBLIC__/js/app.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/index.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/form-components.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>

    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initDashboardDaterange();
        Index.initIntro();
        FormComponents.init();
    });

</script>
</body>
<!-- END BODY -->
<script>
    function js_status (id,status) {
        $.ajax({
            type:"post",
            url:'dynamic_status',
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
                    url:'dynamic_delete',
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