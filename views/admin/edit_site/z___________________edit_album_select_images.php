<div class="col-mid one-col">
                <?
//                echo '<pre>';
//                var_dump($this->images);
//                echo '<pre/>';
                ?>
    <div class="col-mid-inner">
	
			<div class="col-top">
				<div class="col-top-header row-fluid">
					<div class="breadcrumbs">
						<ul>
							<li><a href="/admin/">Главная</a></li><i class="icon icon-breadcr"></i>
							<li><a href="/admin/structure">Структура</a></li><i class="icon icon-breadcr"></i>
							<li>Добавление фотографий в альбом</li>
						</ul>
					</div>
					
					<div class="col-top-actions pull-right">
						<!--<a class="btn btn-small" href="/admin/templates/create-album.php">Добавить новый</a>-->
						<a class="btn btn-small btn-info" href="#"><i class="icon-question-sign icon-white"></i> Помощь</a>
					</div>
				</div>
				
				<h3><i class="icon icon-file"></i>Добавление фотографий в альбом</h3>
                                <input id="id_album" type="hidden" value="<?=URL.'admin/save_photos/'.$this->id_page;?>" />
                                    <? echo '-- '; ?>
                                <? print_r($this->id_page); ?>
                                <? echo '-- '; ?>
                                
			</div>
                    
                        <div>
                                <!-- Создаем поле в которое мы будим переносить наши файлы -->
                                <div id="dropbox">
                                <!-- Напишем пояснительную записку в которой укажем что файлы необходимо кидать именно сюда -->
                                        <span class="message">Перенесите сюда изображения для загрузки в альбом</span>
                                </div>
               
                        </div>
                        <div class="col-content" style="color: #000">
                            <p> >либо выбирете уже загруженные фото для добавления из общей коллекции</p>
                                <input id="find_photo" name="<?=$this->id_page;?>" type="text" placeholder="имя"/><input class="btn" type="button" value="поиск" onclick="findPhotos();"/>
                            <div id="ListInserts" ></div>
                            <br/>
                        </div>
                        			
			<div class="col-content">
                            
			<div class="col-content-body">
					
			<ul id="sortable1" class="grid">
			<? foreach ($this->images as $image): ?>
                             <li>
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
<!--                                <a class="btn btn-small" href="#"><i class="icon-download-alt"></i> Добавить выбранные фотографии в альбом</a>
                                <input id="check" style="margin: 0; display: none;" type="checkbox" name="set" onclick="setChecked(this)" /> 
                                <label class="btn btn-small"  data-toggle="button" style="margin: 0; 
                                       display: inline-block; width: 90px;" for="check"><i class="icon-ok"></i>
                                        <span id="text">Выбрать</span> все</label>
                                <a class="btn btn-small" href="#"><i class="icon-trash"></i> Удалить выбранные</a>-->
                            <input id="Select_all" style="margin: 0; display: none;" type="checkbox" name="set" onclick="setChecked(this);"/> 
                            <label class="btn btn-small"  data-toggle="button" style="margin: 0; display: inline-block; width: 90px;" for="Select_all"><i class="icon-ok"></i>
                                <span id="text">Выбрать</span> все</label>

                            <input id="Invert_all" style="margin: 0; display: none;" type="checkbox" name="set2" onclick="invertChecked(this);"/> 
                            <label class="btn btn-small"  data-toggle="button" style="margin: 0; display: inline-block; width: 150px;" for="Invert_all">
                                <i class="icon-ok"></i>Инвертировать выбор</label> 
                            <a class="btn btn-small"  onclick="deleteChecked(this); " href="#"><i class="icon-trash"></i> Удалить выбранные из коллекции</a>    
                            <a class="btn btn-small"  onclick="sendFile(); " href="#"><i class="icon-trash"></i> Скачать</a>        
                                
                            </div>
                        </div>
					
			</div><!-- end .col-content-body -->

			</div><!-- end .col-content-box -->
    </div>
		
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
            $.post('/admin/delete_photo_fully', {'id': $(check[i]).attr('id')}, function(o)
            {
                //console.log(o);
            }, 'json');
            
            
            $(check[i]).parent().parent().remove();
        }
   }
   return false;
}

function sendFile()
{
   var check = document.getElementsByClassName('id_check');
   for (var i=check.length-1; i>=0; i--)
   {
        if(check[i].checked == 1)
        {
            //alert($(check[i]).attr('id'));
            $.post('/admin/sendFile', {'id': $(check[i]).attr('id')}, function(o)
            {  }, 'json');
            
        }
   }
   return false;
}


function findPhotos()
{
    var find = document.getElementById('find_photo');

            $.post('/admin/findPhotos', {'name': find.value, 'id': find.name}, function(o)
            {
                console.log(o);
                for (var i = 0; i < o.length; i++)
                {
                    $('#ListInserts').append(
        //                '<input id="'+o[i].id_photo+'" type="checkbox" name="'+o[i].id_photo+'"  class="id_check"/>'+
        //                '<label for="'+o[i].id_photo+'"><img src="/storage/cache/images/'+o[i].name_photo+'" alt="'+o[i].name_in_page+'"></label>'+
                        '<a href="#" class="image_name_change" id="'+o[i].id_photo+'" data-type="text" data-pk="1" data-url="/admin/change_name" '+ 
                        'data-original-title="Название">'+o[i].name_in_page+'</a><br/>'+
                        '<div style="font-size: x-small">'+
                        '<text>size-'+o[i].size+'b<text/><br/>'+
                        '<text>data load-'+o[i].date_upload+'<text/>'
                    );
                }        
            }, 'json');
   return false;
}

</script>


<!-- Сортировка -->
<script>
	$(function() {
		$( "#sortable1, #sortable2" ).sortable({
			revert: true,
			connectWith: "ul"
		});
	});
</script>

