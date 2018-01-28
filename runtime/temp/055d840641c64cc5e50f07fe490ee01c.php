<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\myphp_www\PHPTutorial\WWW\tp5\public/../application/admin\view\login\login.html";i:1516757416;}*/ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Metronic | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="/static/admin/css/login.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="/static/admin/image/favicon.ico" />
</head>
<body class="login">
	<div class="logo">

		<!-- <img src="/static/admin/image/logo-big.png" alt="" />  -->

	</div>

	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->

	<div class="content">

		<!-- BEGIN LOGIN FORM -->

		<form class="form-vertical login-form" method="post" id="form_sample_1" action="<?php echo url('Login/login_inspect'); ?>">

			<h3 class="form-title">管理员登录</h3>

			<div class="alert alert-error hide">

				<button class="close" data-dismiss="alert"></button>

				<span>Enter any username and password.</span>

			</div>

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">账号</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="账号" name="username"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="userpassword"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">验证码</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="验证码" name="captcha"/>
						
					</div>

				</div>

			</div>

				<img style="position:relative;width:80;" src="<?php echo url('Login/captcha'); ?>" alt="">

			<div class="form-actions">

				<!-- <label class="checkbox">

				<input type="checkbox" name="remember" value="1"/> Remember me

				</label> -->

				<button type="submit" class="btn green pull-right">

				登录 <i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>
		</form>


	</div>
	<div class="copyright">
		2013 &copy; Metronic. Admin Dashboard Template.
	</div>
	<script src="/static/admin/js/app.js" type="text/javascript"></script>
	<script src="/static/admin/js/login.js" type="text/javascript"></script>      
	<script src="/static/admin/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="/static/admin/layer/layer.js" type="text/javascript"></script>
	<script src="/static/admin/layer/layer-jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/admin/js/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="/static/admin/js/jquery.form.js"></script>
</body>
<script>
    $('#form_sample_1').submit(function() {         //使用ajax的submit提交方法进行表单提交
        $(this).ajaxSubmit(function(res) {
            if(res.code===1){
                layer.msg(res.msg, {icon: 6, time: 2300}, function () {
                    location.href = res.url;
                })
            }else{
                layer.msg(res.msg, {icon: 2, time: 2300}, function () {
                    location.href = res.url;
                })
            }

        });
        return false; //阻止表单默认提交
    });
</script>
</html>