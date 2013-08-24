<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>Забыл пароль - Photosuqare</title>
	<link rel="shortcut icon" href="<?=URL;?>admins_app/images/icon.png">
	<link href="<?=URL;?>admins_app/css/reset.css" rel="stylesheet">
	<link href="<?=URL;?>admins_app/css/admin.css" rel="stylesheet">
</head>
<body class="sign-in">

<div class="sign-in">
	<form action="<?=URL?>login/run" method="post" id="loginform">
		<input placeholder="ваш@email.com" name="" type="text">
		<input class="m-btn orange" name="" type="submit" value="Отправить">
		<span class="back">
			<a href="/"><span>&#8592;</span> Назад к сайту</a>
		</span>
		<span class="forgotpassword">
			<a href="<?=URL?>login/">Вход &#8594</a>
		</span>
	</form>
</div><!-- end .sign-in -->

</body>
</html>