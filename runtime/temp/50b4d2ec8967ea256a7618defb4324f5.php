<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"F:\myphp_www\PHPTutorial\WWW\zjb\public/../application/admin\view\auth\auth_accredit.html";i:1516443468;s:76:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\link-css.html";i:1515743266;s:74:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\footer.html";i:1516066794;s:77:"F:\myphp_www\PHPTutorial\WWW\zjb\application\admin\view\Public\script-js.html";i:1515745143;}*/ ?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
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

<link href="/static/admin/css/style-responsivess.css" rel="stylesheet" type="text/css"/>
<div class="page-content">
    <div class="container-fluid">
        <div class="span12">
            <h4>正在为 <span style=";font-size:2em;color: orangered;"><?php echo $gname; ?></span>分配权限</h4>
        </div>
        <div class="span12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue tabbable">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i>
                        <span class="hidden-480">授权</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="tabbable portlet-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#portlet_tab1" data-toggle="tab">授权</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                                <!-- BEGIN FORM-->
                                <form action="<?php echo url('Auth/auth_accredit_modify'); ?>" id="form_sample_2"
                                      enctype="multipart/form-data" method="post" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls" style="margin-left: 70px;">
                                            <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <p style="margin-left:<?php echo $vo['type']*20; ?>px;<?php echo $vo['type']==3?'float:left;':''; ?>">
                                                <label class="checkbox">
                                                    <?php switch($vo['type']): case "1": ?><input type="checkbox" name="name" value="{vo.id}" checked/>[项目]<?php echo $vo['title']; break; case "2": ?><input type="checkbox" name="name" value="{vo.id}" />[模块]<?php echo $vo['title']; break; case "3": ?><input type="checkbox" name="name" value="{vo.id}" /><?php echo $vo['title']; break; endswitch; ?>
                                                </label>
                                            </p>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $rule[0]['id']; ?>">
                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> 确认授权</button>
                                        <!-- <button type="button" class="btn">Cancel</button> -->
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
</div>

</div>
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
<script>
    $('#form_sample_2').submit(function () {         //使用ajax的submit提交方法进行表单提交
        $(this).ajaxSubmit(function (res) {
            if (res.code === 1) {
                layer.msg(res.msg, {icon: 6, time: 2300}, function () {
                    parent.location.href = res.url;
                })
            } else {
                layer.msg(res.msg, {icon: 2, time: 800}, function () {
                    parent.location.href = res.url;
                })
            }
        });
        return false; //阻止表单默认提交
    });
</script>
</html>