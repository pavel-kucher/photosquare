<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title><?=(isset($this->title)) ? $this->title : 'фото'; ?></title>
	<link rel="shortcut icon" href="<?=URL;?>views/theme/<?=THEME;?>/images/icon.png">

	<link href="<?=URL;?>views/theme/<?=THEME;?>/css/reset.css" rel="stylesheet">
	<link href="<?=URL;?>views/theme/<?=THEME;?>/css/style.css" rel="stylesheet">

	<script src="<?=URL;?>views/theme/<?=THEME;?>/js/jquery-1.9.1.min.js"></script>
        <?  if (isset($this->js)):?>
            <? foreach ($this->js as $js): ?>
        <script  type="text/javascript" src="<?=URL;?>views/theme/<?=THEME;?>/<?=$js;?>"></script>
            <? endforeach; ?>
        <? endif; ?>
        <script type="text/javascript">
		$(function() {
			$(".rslides").responsiveSlides({
				speed: 1400,
				timeout: 6000,
			});
		});
	</script>
</head>

<body>

<div class="wrapper">
			
	<div id="header">
		<div class="header-top">
			<h2>
				фотограф
			</h2>
			<h1>
				<a href="/">Светлана Федосеева</a>
			</h1>
		</div>
				
		<nav>
                <ul>
                    <? for ($i = 0; $i < count($this->navigation); $i++):?>
<!--
                    <? if ( $this->navigation[$i]['id_doc'] == $this->page[$i]['id_doc']): ?>
                        <? if ( $this->navigation[$i]['type_state'] == 'menu'):  $i++ ?>
                            <li class="wr-propdown">
                            <li><a id="dd" href=""><?=$this->navigation[$i]['name_menu']; $f = $i+1; ?></a></li>
                            <ul class="dropdown">
                            <? while ($this->navigation[$f]['parent_id'] == $this->navigation[$i]['id_doc']):  $f++;?>
                            
                            <? if ( $this->navigation[$f]['id_doc'] == $this->page['id_doc']): ?>
                                <? if ( $this->navigation[$f]['translit_name'] == 'home'): ?>
                                    <li><a href="<?=URL;?>"><?=$this->navigation[$f]['name_menu'];?></a></li>
                                <? else:?>
                                    <li><a href="<?=URL;?><?=$this->navigation[$f]['translit_name'];?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                                <? endif;?>    
                            <? endif;?>
                                
                            <? endwhile; $i = $f; ?>
                            </ul>
                            </li>
                            
                        <? else:?>
                            <li><a class="active" href="<?=URL;?><?=$this->navigation[$i]['translit_name'];?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                        <? endif;?>    
                    <? else:?>
                            

                        <? if ( $this->navigation[$i]['id_doc'] == $this->page['id_doc']): ?>
                            <? if ( $this->navigation[$i]['translit_name'] == 'home'): ?>
                                <li><a class="active" href="<?=URL;?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                            <? else:?>
                                <li><a class="active" href="<?=URL;?><?=$this->navigation[$i]['translit_name'];?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                            <? endif;?>    
                        <? endif;?>

                        <? if ( $this->navigation[$i]['translit_name'] == 'home'): ?>        
                            <li><a href="<?=URL;?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                        <? else:?>
                            <li><a href="<?=URL;?><?=$this->navigation[$i]['translit_name'];?>"><?=$this->navigation[$i]['name_menu'];?></a></li>
                        <? endif;?> 
                    <? endif;?>
                    <? endfor;?>
  -->                          
                            
                          <!--  -->
                            
                            <li><a class="active" href="/">Главная</a></li>
				<li class="wr-propdown">
					<a id="dd" href="#">Портфолио</a>
					<ul class="dropdown">
						<li><a href="#">Nude</a></li>
						<li><a href="#">Famous</a></li>
						<li><a href="#">Лица</a></li>
						<li><a href="#">Ниочем</a></li>
						<li><a href="#">Тестовый</a></li>
					</ul>
				</li>
				<li><a href="#">Красота</a></li>
				<li><a href="#">Семья</a></li>
				<li><a href="#">Makeup</a></li>
				<li><a href="#">Контакты</a></li>
				<li><a href="/storage/themes/maria/page.php">Обо мне</a></li>
                </ul>
		</nav>
		
	</div>