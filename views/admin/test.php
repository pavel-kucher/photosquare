
<? //===============================================================================================
// 
        //Подключение к mysql-серверу и выбор базы, тут нет ничего интересного
        mysql_connect("mysql.alwaysdata.com", "betrayer", "*******");
        mysql_select_db("betrayer_test");
        //Выбираем все записи, делая сортировку по полю "order"
        $query = mysql_query("SELECT * FROM `test` ORDER BY `order`");
?>
 

<html>
  <head>
    <link type = "text/css" href = "/css/ui-lightness/jquery-ui-1.8.14.custom.css" rel="stylesheet">
    <style>
      #sortable { list-style-type: none;}
    </style>
    <!-- JQuery -->
    <script type = "text/javascript" src = "/js/jquery-1.5.1.min.js"></script>
    <!-- JQuery UI, в котором содержится наш sortable -->
    <script type = "text/javascript" src = "/js/jquery-ui-1.8.14.custom.min.js"></script>
    <script type = "text/javascript">
      $(document).ready(function()
      {
        $("#sortable").sortable({
          stop: function(event, ui)
          {
            $("#message").show();
            arr = new Array();
            //Проходим по порядку всех детей(после вызова события stop у нас в DOM уже измененный порядок)
            $(this).children().each(function() 
            {
              arr.push(this.id); //и заносим в массив id текущего элемента
            });
            //post-запрос
            $.post("ajax.php", {mas: arr}, function(data)
            {
              $("#message").hide();
            });
          }
        });
      });
    </script>
    
    
  </head>
  <body>
    <div id = "message" style = "display:none">
      Идет перемещение...
    </div>
    <ul id="sortable" style = "width:200">
      <?while($res = mysql_fetch_assoc($query)):?>
      <li class="ui-state-default" id = &#60;?=$res["id"]?>><?=$res["name"]?></li>
      <?endwhile?>
    </ul>
  </body>
</html>


 ajax.php
 
<?
        //Опять подключение к mysql-серверу и выбор БД
        mysql_connect("mysql.alwaysdata.com", "betrayer", "*******");
        mysql_select_db("betrayer_test");
        if(isset($_POST["mas"]))
                $i = 0;
                foreach($_POST["mas"] as $mas)
                {
                        $i++;
                        //Установка order
                        mysql_query("UPDATE `test` SET `order` = " . $i . " WHERE `id` = " . $mas);
                }
?>
  
 
		





<div class="col-mid one-col">

	<div class="col-mid-inner">

		<div class="col-top">
			<div class="col-top-header row-fluid">
				<div class="breadcrumbs">
					<ul>
						<li><a href="/admin/">Главная</a></li><i class="icon icon-breadcr"></i>
						<li><a href="/admin/structure">Структура</a></li><i class="icon icon-breadcr"></i>
						<li>Редактирование альбома</li>
					</ul>
				</div>

				<div class="col-top-actions pull-right">
					<a class="btn btn-small" href="/admin/templates/create-album.php">Добавить новый</a>
					<a class="btn btn-small btn-info" href="#"><i class="icon-question-sign icon-white"></i> Помощь</a>
				</div>
			</div>

			<h3><i class="icon icon-file"></i> Редактирование альбома</h3>
		</div><!-- end .col-top -->

		<div class="col-content">
			<div class="col-content-body">
				<ul id="sortable1" class="grid">
				<? foreach ($this->images as $image): ?>
					 <li id="<?=$image['id_photo'];?>">
						<span class="thumb">
							<input id="<?=$image['id_photo'];?>" type="checkbox" name="<?=$image['id_photo'];?>"  class="id_check"/>
							<label for="<?=$image['id_photo'];?>"><img src="<?=URL.'storage/cache/images/'.$image['name_photo'];?>" alt="<?=$image['name_in_page'];?>"></label>
							<a href="#" class="image_name_change" id="<?=$image['id_photo'];?>" data-type="text" data-pk="1" data-url="<?=URL;?>admin/change_name"
							data-original-title="Название"><?=$image['name_in_page'];?></a><br/>
							<div style="font-size: x-small">
							<text>size-<?=$image['size'];?>b<text/><br/>
							<text>data load-<?=$image['date_upload'];?><text/>
						</span>
					</li>
				<?  endforeach;?>
				</ul>

				<div class="fixed-actions">
					<div class="fixed-actions-inner">
						<input id="Select_all" style="margin: 0; display: none;" type="checkbox" name="set" onclick="setChecked(this);"/>
						<label class="btn btn-small"  data-toggle="button" style="margin: 0; display: inline-block; width: 90px;" for="Select_all"><i class="icon-check"></i> <span id="text">Выбрать</span> все</label>
						<input id="Invert_all" style="margin: 0; display: none;" type="checkbox" name="set2" onclick="invertChecked(this);"/>
						<label class="btn btn-small" data-toggle="button" style="margin: 0; display: inline-block;" for="Invert_all">Инвертировать</label>
						<a class="btn btn-small"  onclick="deleteChecked(this); " href="#"><i class="icon-trash"></i> Удалить выбранные</a>

						<form method="POST" style="float: left; margin-right: 5px;" action="<?=URL;?>admin/edit_album_select_images">
							<input type="hidden" id="124f1" name="name_album" value="<?=$this->id_page;?>">
							<input type="submit" id="submit" style="margin: 0px 30px; display: none;" value="Загрузить фотографии или добавить из библиотеки">
							<label class="btn btn-small" data-toggle="button" for="submit"><i class="icon-download-alt"></i> Загрузить изображения</label>
						</form>
					</div>
				</div>
			</div><!-- end .col-content-body -->
			
			<div class="col-content-box">
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-publish"><i class="icon-sheet"></i> Публикация</a></h3>
					</div>
					<div id="box-publish" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="status">Статус</label>
									<div class="controls">
										<div class="btn-group" data-toggle="buttons-radio">
											<select>
												<option>Опубликовано</option>
												<option>Черновик</option>
											</select>
										</div>
									</div>
								</div>
							</form>

							<div class="row-fluid">
								<div class="pull-left">
									<a class="btn btn-small btn-link" href="#">Удалить</a>
								</div>
								<div class="pull-right">
									<a class="btn btn-small btn-primary" href="#">Обновить</a>
								</div>
							</div>
						</div>
					</div><!-- end.box-head -->
				</div><!-- end.box -->

				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-options"><i class="icon-sheet"></i> Параметры</a></h3>
					</div>
					<div id="box-options" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">
								<div class="control-group">
									<label class="control-label" for="link">Название альбома</label>
									<div class="controls">
										<input name="title" type="text" value="Красота">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="link">Название в меню</label>
									<div class="controls">
										<input name="title" type="text" value="Красота">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="sitedescription">Описание</label>
									<div class="controls">
										<textarea name="sitedescription" type="text"></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="status">Расположение в меню</label>
									<div class="controls">
										<div class="btn-group">
											<select>
												<option>Главное меню</option>
												<option>Портфолио</option>
											</select>
										</div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="status">Обложка альбома</label>
									<div class="controls">
										<div class="fileform">
											<div class="selectbutton">Обзор</div>
											<input id="upload" type="file" name="upload" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->

				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-seo-options"><i class="icon-sheet"></i> SEO параметры</a></h3>
					</div>
					<div id="box-seo-options" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="title">Заголовок</label>
									<div class="controls">
										<input name="title" type="text">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="sitedescription">Описание</label>
									<div class="controls">
										<textarea name="sitedescription" type="text"></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="keywords">Ключевые слова</label>
									<div class="controls">
										<textarea name="keywords" type="text"></textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->
			</div><!-- end .col-content-box -->

		</div><!-- end .col-content -->

	</div><!-- end .col-inner -->

</div><!-- end .col-mid -->


<!-- Выбрать/Снять все чекбоксы -->
<script>
function setChecked(obj)
{
   var str = document.getElementById("text").innerHTML;
   str = (str == "Выбрать" ? "Снять" : "Выбрать");
   document.getElementById("text").innerHTML = str;

   //var check = document.getElementsByName('id_check');
   var check = document.getElementsByClassName('id_check');
   for (var i=0; i<check.length; i++)
   {
	   check[i].checked = obj.checked;
   }
}
function invertChecked(obj)
{
   var check = document.getElementsByClassName('id_check');
   for (var i=0; i<check.length; i++)
   {
	   if(check[i].checked == 1)
	   {
		   check[i].checked = 0;
		   //alert(1);
	   } else {
		   check[i].checked = 1;
		   //alert(0);
	   }
   }
}

function deleteChecked(obj)
{
   var check = document.getElementsByClassName('id_check');
   for (var i=check.length-1; i>=0; i--)
   {
		if(check[i].checked == 1)
		{
			//alert($(check[i]).attr('id'));
			$.post('/admin/delete_photo', {'id': $(check[i]).attr('id')}, function(o)
			{
				//console.log(o);
				//$('#ListInserts').append('<div>' + o.text + '<a class="del" rel="' + o.id + '" href="#">X</a></div>');
								
			}, 'json');
			
			
			$(check[i]).parent().parent().remove();
		}
   }
   return false;
}
</script>



<!-- Редактирование имен изображений -->
<script>
$('.image_name_change').editable();
$.fn.editable.defaults.mode = 'inline';
</script>













<!--









<!DOCTYPE html>
02	<html xmlns="http://www.w3.org/1999/xhtml">
03	<head>
04	 
05	<style>p.red { color: red; }</style>
06	 
07	<script type="text/javascript" src="jquery.js"></script>
08	<script type="text/javascript">
09	$( init );
10	 
11	function init() {
12	 
13	  // Назначаем событие click каждому параграфу div
14	  $("#myDiv1>p").click( function() { $(this).toggleClass("red"); } );
15	  $("#myDiv2>p").click( function() { $(this).toggleClass("red"); } );
16	 
17	  // Удаляем и восстанавливаем параграф #myDiv1
18	  var myDiv1Para = $('#myDiv1>p').remove();
19	  myDiv1Para.appendTo('#myDiv1');
20	 
21	  // Удаляем и восстанавливаем параграф #myDiv2
22	  var myDiv2Para = $('#myDiv2>p').detach();
23	  myDiv2Para.appendTo('#myDiv2');
24	}
25	 
26	</script>
27	 
28	</head>
29	<body>
30	 
31	  <div id="myDiv1">
32	    <p>Параграф с текстом</p>
33	  </div>
34	 
35	  <div id="myDiv2">
36	    <p>Другой параграф с текстом</p>
37	  </div>
38	 
39	</body>
40	</html>s


-->
