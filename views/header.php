<? Session::init(); ?>
<script>
// XMLHttpR
var xmlHttp;
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function CallServer(url)
{
    xmlHttpj = getXmlHttp();
    //alert(url);
    var the_object;
    var id;
    
   xmlHttpj.open( "POST", url, true );
    // SПередать запрос
    xmlHttpj.send("id = 2");
    // Установить функцию для сервера, которая выполнится после его ответа
    xmlHttpj.onreadystatechange = function ()
    {
    if ( xmlHttpj.readyState == 4 )
        {
            if ( xmlHttpj.status == 200 )
            {
                //alert(JSON.parse(xmlHttpj.responseText));
                //var new_input=document.createElement('div');
                document.getElementById("text_in").innerHTML = JSON.parse(xmlHttpj.responseText);  
            } else {
                alert( "There was a problem with the URL." + xmlHttpj.statusText );
            }
            xmlHttpj = null;
        }
    };     
}
    
window.onload = function(){
    var a = document.getElementsByClassName('hrf');
    i = a.length;
    while(i--){
        a[i].onclick = (function()
        {
            return function()
            {
               //alert(this.href);
               CallServer(this.href);
               
                return false;
            };
        })();
    }
};
</script>

<!--
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title><?=(isset($this->title)) ? $this->title : 'фото'; ?></title>
	<link rel="shortcut icon" href="<?=URL;?>public/images/icon.png">

	<link href="<?=URL;?>public/css/reset.css" rel="stylesheet">
	<link href="<?=URL;?>public/css/style.css" rel="stylesheet">

	<script src="<?=URL;?>public/js/jquery-1.9.1.min.js"></script>
        <?  if (isset($this->js)):?>
            <? foreach ($this->js as $js): ?>
        <script  type="text/javascript" src="<?=URL;?>views/<?=$js;?>"></script>
            <? endforeach; ?>
        <? endif; ?>
</head>
<body>
    
<div class="wrapper">
			
	<div id="header">
		<div class="header-top">
			<h2>
				sussex, england
			</h2>
			<h1>
				<a href="/">sebastian pinehurst</a>
			</h1>
		</div>
				
		<nav>
			<ul>
				<li><a href="/">Главная</a></li>
				<li class="wr-propdown">
					<a id="dd"   class="hrf" href="<?=URL;?>test/all_creatures">Животное</a>
					<ul class="dropdown">
                                            <li><a  class="hrf" href="<?=URL;?>test/xhrHorse">Лошадь</a></li>
                                            <li><a  class="hrf" href="<?=URL;?>test/xhrLion">Лев</a></li>
                                            <li><a  class="hrf" href="<?=URL;?>test/xhrBadger">Барсук</a></li>
					</ul>
				</li>
				<li><a href="#">Красота</a></li>
				<li><a href="#">Семья</a></li>
				<li><a href="#">Makeup</a></li>
				<li><a href="contacts">Контакты</a></li>
				<li><a class="active" href="about_me">Обо мне</a></li>
                                <?php if (Session::get('loggedIn') == true):?>
                                    <?php if (Session::get('role') == 'owner'):?>
                                        <li><a href="<?php echo URL; ?>dashboard/logout">Logout</a></li>	
                                    <?php else: ?>
                                        <li><a href="<?php echo URL; ?>login">Login</a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
			</ul>
		</nav>
	</div>    -->        