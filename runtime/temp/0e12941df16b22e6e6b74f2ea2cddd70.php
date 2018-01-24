<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"F:\myphp_www\PHPTutorial\WWW\zjb\public/../application/admin\view\admins\admin_accredit.html";i:1516255254;}*/ ?>
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
    <link href="/static/admin/css/style-responsivess.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/static/admin/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/static/admin/image/favicon.ico" rel="shortcut icon"/><!--网站小图标-->
</head>
        <div class="page-content">

            <div class="container-fluid">

                <div class="row-fluid">

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
                                            <form action="<?php echo url('Admins/accredit_modify'); ?>" id="form_sample_2" enctype="multipart/form-data" method="post" class="form-horizontal">
                                                <div class="control-group">
                                                    <label class="control-label">文章</label>
                                                    <div class="controls">
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="new_s" value="1" <?php if($data['new_s'] == 1): ?> checked="checked"  <?php endif; ?>/> 新闻列表
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="dynamic_s" value="1" <?php if($data['dynamic_s'] == 1): ?> checked="checked"  <?php endif; ?> /> 最新动态
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="healthy_s" value="1" <?php if($data['healthy_s'] == 1): ?> checked="checked"  <?php endif; ?>/> 建保专栏
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="notice_s" value="1" <?php if($data['notice_s'] == 1): ?> checked="checked"  <?php endif; ?>/> 通知公告
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="compensate_s" value="1" <?php if($data['compensate_s'] == 1): ?> checked="checked"  <?php endif; ?>/> 理赔通知
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="new_add" value="1" <?php if($data['new_add'] == 1): ?> checked="checked"  <?php endif; ?>/> 添加
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="new_del" value="1" <?php if($data['new_del'] == 1): ?> checked="checked"  <?php endif; ?>/> 删除
                                                        </label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="new_edit" value="1" <?php if($data['new_edit'] == 1): ?> checked="checked"  <?php endif; ?>/> 修改
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
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

    </div>

    <div class="footer">



        <div class="footer-tools">

            <span class="go-top">

            <i class="icon-angle-up"></i>

            </span>

        </div>

    </div>
    <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
    <script src="/static/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.blockui.min.js" type="text/javascript"></script>  
    <script src="/static/admin/js/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>
    <script src="/static/admin/layer/layer.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/static/admin/js/app.js" type="text/javascript"></script> 
    <script>

        jQuery(document).ready(function() {   

           // initiate layout and plugins

           App.init();

        });

        $('#form_sample_2').submit(function() {         //使用ajax的submit提交方法进行表单提交
            $(this).ajaxSubmit(function(res) {
                if(res.code ===1){
                    layer.msg(res.msg, {icon: 6, time: 2300}, function () {
                        parent.location.href = res.url;
                    })
                }else{
                    layer.msg(res.msg, {icon: 2, time: 800}, function () {
                         parent.location.href = res.url;
                    })
                }
            });
            return false; //阻止表单默认提交
        });

    </script>

    <!-- END JAVASCRIPTS -->   


<!-- END BODY -->

</html>