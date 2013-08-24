<? Session::init(); ?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<meta name="keywords" content="keywords" /> 
	<meta name="description" content="description" /> 
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />


	<title>Photosquare</title>

	<link href="<?= URL; ?>admins_app/images/icon.png" rel="shortcut icon">
	<link href="<?= URL; ?>admins_app/css/reset.css" rel="stylesheet">
	<link href="<?= URL; ?>admins_app/css/admin.css" rel="stylesheet">
	<link href="<?= URL; ?>admins_app/app/jscrollpane/css/jquery.jscrollpane.css" rel="stylesheet" />
	<link href="<?= URL; ?>admins_app/app/redactor/redactor.css" rel="stylesheet"/>


	<script src="<?= URL; ?>admins_app/js/jquery-1.9.1.min.js"></script>
	<script src="<?= URL; ?>admins_app/js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?= URL; ?>admins_app/js/bootstrap.min.js"></script>
	<script src="<?= URL; ?>admins_app/js/bootstrap-editable.min.js"></script>
	<script src="<?= URL; ?>admins_app/js/jquery.pjax.js"></script>
	<script src="<?= URL; ?>admins_app/js/jquery.synctranslit.min.js"></script>
	<script src="<?= URL; ?>admins_app/app/jscrollpane/js/jquery.mousewheel.js"></script>
	<script src="<?= URL; ?>admins_app/app/jscrollpane/js/jquery.jscrollpane.min.js"></script>


	<script src="<?= URL; ?>admins_app/app/redactor/redactor.min.js"></script>
	<script src="<?= URL; ?>admins_app/js/multisortable.js"></script>
	<script src="<?= URL; ?>admins_app/js/classie.js"></script>

	<!-- загрузка фото -->
	<script src="<?= URL; ?>admins_app/js/admin_js/jquery_plus_jqyery.fileupload.js"></script>
	<script src="<?= URL; ?>admins_app/js/admin_js/upload.js"></script>



	<script>

		$(document).pjax('a.header_menu', '#main');
		/*pjax.connect({ 'container': 'content','beforeSend': function(){console.log("before send");},	'complete': function(){console.log("done!");}});*/
		$(document).pjax('a.edit_page', '#edit_page_selected');



		$(document).on('pjax:end', function(event)
		{
			if (event.target.id == 'edit_page_selected')
			{
				$('#menu_select_left').find('a.edit_page').removeClass('active');
				$(event.relatedTarget).addClass('active');
				/*	заголовок    */
				$(document).attr('title', $('#t_page').val());
				/*	анимация    */
				$('#edit_page_selected').addClass('display');
			}
			;
			if (event.target.id == 'main')
			{
				$('#header_menu').find('a.header_menu').removeClass('active');
				$(event.relatedTarget).addClass('active');
//				console.log($('#header_menu').find('a.header_menu'));
//				console.log(event.relatedTarget);
			}
			;
		});

		$(document).on('pjax:send', function()/*  сюда можно вставить типа анимацию замены*/
		{
			$('#edit_page_selected').removeClass('display');
		})

		function back_light_sub()
		{
			var el = $('a.edit_page'); //ищем наш div в DOM
			var url = document.location.href; //палим текущий урл
			for (var i = 0; i < el.length; i++)
				if (url == el[i].href)
				{
					$(el[i]).addClass('active'); //если урл==текущий, добавляем класс
				}
		}
		function back_light_main()
		{
			var el = $('a.header_menu'); //ищем наш div в DOM
			var url = document.location.href; //палим текущий урл
			for (var i = 0; i < el.length; i++)
				if (url.indexOf(el[i].href) != -1)
				{
					$(el[i]).addClass('active'); //если урл==текущий, добавляем класс
				}
		}


	</script>



</head>
<body>
	<div class="header">
		<div class="container" style="width: auto; padding: 0 10px;">
			<a href="#Logo" class="logo" data-toggle="modal"></a>
			<div class="nav-collapse">
				<ul id="header_menu" class="menu">
					<li><a class="header_menu" href="<?php echo URL; ?>admin/library">Библиотека</a></li>
					<li><a class="header_menu" href="<?php echo URL; ?>admin/text">Текст</a></li>
					<li><a class="header_menu" href="<?php echo URL; ?>admin/site">Сайт</a></li>
					<li><a class="header_menu" href="<?php echo URL; ?>admin/design">Старый Дизайн</a></li>
					<li><a class="header_menu" href="<?php echo URL; ?>admin/settings">Настройки</a></li>
					<li><a class="header_menu" href="<?php echo URL; ?>admin/statistics">Статистика</a></li>
				</ul>
				<ul class="menu hr-links">
					<li><a target="_blank" href="/">Посмотреть сайт</a></li>
					<li class="divider-vertical"/>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Иванов Иван
						</a>
						<ul class="dropdown-menu">
							<li><a href="#Profile" data-toggle="modal"><i class="icon icon-user icon-white"></i> Профиль</a></li>
							<li><a href="#Shortcuts" data-toggle="modal"><i class="icon icon-th icon-white"></i> Горячие клавиши</a></li>
							<li><a href="#"><i class="icon icon-question-sign icon-white"></i> Помощь</a></li>
							<li class="divider"></li>
							<li><a href="#Exit" data-toggle="modal"><i class="icon icon-off icon-white"></i> Выйти</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end .header -->

	<div id="main">