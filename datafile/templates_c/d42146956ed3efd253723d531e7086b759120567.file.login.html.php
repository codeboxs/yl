<?php /* Smarty version Smarty-3.1.13, created on 2017-10-08 03:10:29
         compiled from "/private/var/www/yl/application/views/admin/login.html" */ ?>
<?php /*%%SmartyHeaderCode:112588008759d926a54dcd03-56952445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd42146956ed3efd253723d531e7086b759120567' => 
    array (
      0 => '/private/var/www/yl/application/views/admin/login.html',
      1 => 1506346392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112588008759d926a54dcd03-56952445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59d926a54fa444_89508811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d926a54fa444_89508811')) {function content_59d926a54fa444_89508811($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="/public/drp/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/public/drp/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="/public/drp/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/public/drp/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="/public/drp/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/public/drp/assets/global/plugins/respond.min.js"></script>
<script src="/public/drp/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/public/drp/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/public/drp/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/public/drp/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/public/drp/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/public/drp/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/public/drp/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/public/drp/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/public/drp/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
	$(document).ready(function () {
	    if ($.cookie("remember") == "true") {
	    $("#remember").attr("checked", true);
	    $("#username").val($.cookie("username"));
	    $("#password").val($.cookie("password"));
	    }
	  });

	  //记住用户名密码
	  function Save() {
	    if ($("#remember").attr("checked")) {
	      var str_username = $("#username").val();
	      var str_password = $("#password").val();
	      $.cookie("remember", "true", { expires: 7 }); //存储一个带7天期限的cookie
	      $.cookie("username", str_username, { expires: 7 });
	      $.cookie("password", str_password, { expires: 7 });
	    }
	    else {
	      $.cookie("remember", "false", { expire: -1 });
	      $.cookie("username", "", { expires: -1 });
	      $.cookie("password", "", { expires: -1 });
	    }
	  };


	function loginFormSubmit() {
		var username = $('#username').val();
		var password = $('#password').val();
		var checkcode = $('#checkcode').val();
		if(username && password) {
			$.ajax({
	            url:'/system/ajaxLogin',
	            type:'post',
	            data: encodeURI('username=' + username + '&password=' + password + '&checkcode=' + checkcode),
	            dataType: "json",
	            success:function(msg){
	            	if(msg['result_code'] == 0) {
	            		Save();
	            		$('#topInfo').attr('class', 'alert alert-success');
	            		$('#topInfo').html('登录成功');
	            		window.location.href = "/welcome/index";
	            		//window.location.reload();
	            	} else {
	            		$('#topInfo').attr('class', 'alert alert-danger');
	            		$('#topInfo').html(msg['info']);
	            		$('#imgCode').attr('src', '/system/captcha?'+Math.random());
	            	}
	            },
	            error:function(){

	            }

	         });
		}
	}

	$(document).keyup(function(event){
		  if(event.keyCode ==13){
			  loginFormSubmit();
		  }
	});
</script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#" style="font-size:24px;color:white;">
		中美医疗集团不良事件上报系统
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="/admin/index" method="post">
		<div id="topInfo" class="alert alert-info">
               请输入用户名和密码
        </div>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">用户名</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" id="username" autocomplete="off" placeholder="用户名" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">密码</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" id="password" autocomplete="off" placeholder="密码" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">验证码</label>
			<div class="input-icon">
			 <i class="fa fa-ticket"></i>
				<input class="form-control placeholder-no-fix" style="width:66%;display: inline;" type="text" autocomplete="off" id="checkcode" placeholder="验证码" name="checkcode"/>
				<img id="imgCode" onclick="this.src='/system/captcha?'+Math.random();" style="float:right;display: inline;margin-top:0px;width:30%;height:35px;border:1px solid #6c6c6c;" src="/system/captcha" alt="验证码" />
			</div>

		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" id="remember" name="remember" value="1"/> 记住密码 </label>
			<button type="button" onsubmit="return false" class="btn blue pull-right" onclick="loginFormSubmit();">
			登录 <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2017 &copy; 中美医疗集团不良事件上报系统
</div>
<!-- END COPYRIGHT -->

<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "/public/drp/assets/admin/pages/media/bg/1.jpg",
        "/public/drp/assets/admin/pages/media/bg/2.jpg",
        "/public/drp/assets/admin/pages/media/bg/3.jpg",
        "/public/drp/assets/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html><?php }} ?>