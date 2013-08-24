<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>Вход в панель управления</title>
	<link rel="shortcut icon" href="<?=URL;?>public/images/icon.png">
	
	<link href="<?=URL;?>public/css/bootstrap.css" rel="stylesheet">
	<link href="<?=URL;?>public/css/admin.css" rel="stylesheet">

	<script src="<?=URL;?>public/js/jquery-1.9.1.min.js"></script>
	<script src="<?=URL;?>public/js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?=URL;?>public/js/bootstrap.min.js"></script>
</head>
<body>


<div class="login">
	<div class="login_box">
		<form action="<?=URL?>login/run" method="post" id="loginform">
			<input class="span3" autofocus="autofocus" placeholder="E-mail" name="login" type="text">
			<input class="span3" placeholder="Пароль" name="password" type="password">

			<div class="enter">
				 <input class="btn btn-primary" name="" type="submit" value="Войти">
				<span class="help-inline">
					<a href="login/forgot">Забыли пароль?</a>
				</span>
			</div>
		</form>
	</div><!-- end .login_box -->

	<div class="actions">
		<ul>
			<li><a href="/">&#8592;&nbsp;Назад к сайту</a></li>
		</ul>
	</div><!-- end .actions -->
</div><!-- end .login -->


</body>
</html>