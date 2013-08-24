<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>Вход - Photosuqare</title>
	<link rel="shortcut icon" href="<?=URL;?>admins_app/images/icon.png">
	<link href="<?=URL;?>admins_app/css/reset.css" rel="stylesheet">
	<link href="<?=URL;?>admins_app/css/admin.css" rel="stylesheet">

</head>
<body class="sign-in">

<div class="sign-in">
	<form action="<?=URL?>login/run" method="post" id="loginform">
		<input autofocus="autofocus" placeholder="E-mail или Логин" name="login" type="text">
		<input placeholder="Пароль" name="password" type="password">
		<div class="remember">
			 <input name="remember" id="remember" type="checkbox">
			 <label for="remember">Запомнить</label>
		</div>
		<input class="m-btn orange" name="" type="submit" value="Войти">
		<span class="back">
			<a href="/"><span>&#8592;</span> Назад к сайту</a>
		</span>
		<span class="forgotpassword">
			<a href="<?=URL?>login/forgot">Забыли пароль?</a>
		</span>
	</form>
</div><!-- end .sign-in -->

</body>
</html>