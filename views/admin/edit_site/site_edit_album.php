<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3><i class="icon icon-file icon-white"></i> Редактирование альбома</h3>
				<div class="buttons">
					<a class="m-btn black" href="#"><i class="icon-question-sign icon-white"></i></a>
					<a id="ShowPanelSettings" href="#" class="m-btn black"><i class="icon icon-cog icon-white"></i>Изображения альбома</a>
				</div>
			</div>
		</div><!-- end .col-top -->
		<div class="col-content">			
			<div class="col-content-inner" id="col-mid">
				<div class="list list-image">
				
					<ul id="gallery_trash">
					<? foreach ($this->trash_images as $image): ?>
						<li id="<?=$image['id_photo'];?>" class="lib_trush_images <?if($image['flag']==-77) echo 'all_images';?>">
						<img src="<?=URL.'storage/cache/images/'.$image['name_photo'];?>" alt="<?=$image['name_in_page'];?>">
						</li>
					<?  endforeach;?> 
					</ul>	
					
				</div><!-- end .list-image -->
			</div><!-- end .col-content-inner -->
		</div><!-- end .col-content -->

		    
		<div class="col-bottom">
			<div class="col-bottom-inner">
				<button  id="remove_images_trash" class="m-btn black"> <i class="icon-trash icon-white"></i> Удалить выбранные </button>
				<button id="restore_images_trash" class="m-btn orange"> <i class="icon-trash icon-white"></i> Восстановить </button>
				<input type="hidden" id="124f1" name="name_album" value="<?=$this->id_page;?>">
			</div><!-- end .col-bottom-inner -->
		</div><!-- end .col-bottom -->
	
	</div><!-- end .col-mid-inner -->
</div><!-- end .col-mid -->
<script>
var $gallery = $("#gallery_trash");

		
$('#remove_images_trash').mouseup(function remove_images(){
		array_images = new Array();
		array_images_all = new Array();
		$gallery.children('li').each(function()
		{	
		    if($(this).hasClass('selected'))
		    {
			if($(this).hasClass('all_images'))
	    		{ array_images_all.push($(this).attr('id')); }else
			{ array_images.push($(this).attr('id'));  }
		    }
		});
		$.post("<?=URL;?>admin/lib_fully_trash_img",
		{'array_images': array_images, 'array_images_all': array_images_all}, function(data)
		{
		    if(data == '1'){
			$gallery.children('li').each(function()
			{	
			    if($(this).hasClass('selected'))
			    {
				$(this).fadeOut();
			    }
			});

		    alert('удалено успешно'); /*!!!!!! сообщение*/ }
		    
		},'json');
});/*mouseup*/	


$('#restore_images_trash').mouseup(function restore_images(){
		array_images = new Array();
		array_images_all = new Array();
		$gallery.children('li').each(function()
		{	
		    if($(this).hasClass('selected'))
		    {
			if($(this).hasClass('all_images'))
	    		{ array_images_all.push($(this).attr('id')); }else
			{ array_images.push($(this).attr('id'));  }
		    }
		});
		$.post("<?=URL;?>admin/lib_trash_restore_img",
		{'array_images': array_images, 'array_images_all': array_images_all}, function(data)
		{
		    if(data == '1'){
			$gallery.children('li').each(function()
			{	
			    if($(this).hasClass('selected'))
			    {
				$(this).fadeOut();
			    }
			});
		    alert('удалено успешно'); /*!!!!!! сообщение*/ }
		},'json');
});/*mouseup*/	

$(function(){
$("#gallery_trash")
.multiselectable();








function delete_images( picture )
{
	$gallery.find('#list-placeholder').remove();
	var array_id_images = new Array(); var array_copy_images = new Array();
	array_copy_images = array_images.slice();
	var item; 
	if($(array_copy_images).length == 0) return true;
	while($(array_copy_images).length != 0){  item = array_copy_images.shift();if(item != -11) array_id_images.push(item);}
	var id_album = $('#id_selected_page').val();
	var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
	array_copy_images = array_images.slice();
	array_img_dom = new Array();/*чистим основные*/
	array_images = new Array();
		
	
	$.post("<?=URL;?>admin/album_trash_images", 
	{'array_images': array_id_images, 'lib_album': id_album },
	function(data){
	    if(data == '1'){
	    picture.remove();
	    /*!!!!!! сообщение*/} else {/*!!!!!! сообщение*//* обсудить с андреем возможность удаления совсем*/
		array_img_dom = array_img_dom_copy;
		array_images = array_copy_images;
		var next_insert = picture;/*сначала сам обьект*/
		var b_ = true; var item;
		if($(array_images).length == 0) return true;
		while(b_){
		    if(array_images.shift() != -11){
			item = array_img_dom.shift(); next_insert.before(item);       
		    } else {   b_ = false;}
		}
		array_images.shift();
		while($(array_images).length != 0){
			array_images.shift();   item = array_img_dom.pop(); next_insert.after(item);}
		select_mlt = false;
		alert('произошла ошибка при переносе');
	    }/*если не удалось перенети*/
	},'json');
}

function insert_other_images( event, picture ){
	var id_album = $(event.target).attr('id');
	id_album = id_album.substring(0,id_album.indexOf('_album'));
	var id_album_curr = $('#id_selected_page').val()
	if(id_album == id_album_curr){  alert('тот же альбом'); return false;}
	var array_id_images = new Array(); var array_copy_images = new Array();
	array_copy_images = array_images.slice();
	while($(array_copy_images).length != 0){  item = array_copy_images.shift();if(item != -11) array_id_images.push(item);}

	if(event.ctrlKey)  /* если копирование */
	{
	    $.post("<?=URL;?>admin/lib_album_img_add",
	    {'array_images': array_id_images, 'lib_album': id_album }, function(data)
	    {
		if(data == '1'){ /*!!!!!! сообщение*/alert('копирование успешно');}
	    },'json');
    	} else { /* если перетягивание в другой альбом*/
	    var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
	    array_copy_images = array_images.slice();
	    array_img_dom = new Array();/*чистим основные*/
	    array_images = new Array();
	    $.post("<?=URL;?>admin/lib_album_img_trans",
	    {'array_images': array_id_images, 'lib_album': id_album_curr, 'lib_new_album': id_album }, function(data)
	    {
		if(data == '1'){ picture.remove(); /*!!!!!! сообщение*/alert('перенос успешно');
		} else {
		    array_img_dom = array_img_dom_copy;
		    array_images = array_copy_images;
		    var next_insert = picture;/*сначала сам обьект*/
		    var b_ = true; var item;
		    if($(array_images).length == 0) return true;
		    while(b_){
			if(array_images.shift() != -11){
			    item = array_img_dom.shift(); next_insert.before(item);       
			} else {   b_ = false;}
		    }
		    array_images.shift();
		    while($(array_images).length != 0){
			    array_images.shift();   item = array_img_dom.pop(); next_insert.after(item);}
		    select_mlt = false;
		    alert('произошла ошибка при переносе');
		} /*если не удалось перенети*/
	    },'json');
	}
	$("#gallery_trash").sortable('refresh');
};/*	insert_other_images */

function remove_images(event, picture )
{
    	$gallery.find('#list-placeholder').remove();
	var array_id_images = new Array(); var array_copy_images = new Array();
	array_copy_images = array_images.slice();
	var item; 
	if($(array_copy_images).length == 0) return true;
	while($(array_copy_images).length != 0){  item = array_copy_images.shift();if(item != -11) array_id_images.push(item);}
	var id_album = $('#id_selected_page').val();
	var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
	array_copy_images = array_images.slice();
	array_img_dom = new Array();/*чистим основные*/
	array_images = new Array();
	
	$.post("<?=URL;?>admin/album_images_to_all", 
	{'array_images': array_id_images, 'lib_album': id_album },
	function(data){
	    if(data == '1'){
	    picture.remove();
	    alert('перенос в библиотеку осуществлен успешно');
	    /*!!!!!! сообщение*/} else {
		array_img_dom = array_img_dom_copy;
		array_images = array_copy_images;
		var b_ = true; var item;
		if($(array_images).length == 0) return true;
		while(b_){
		    if(array_images.shift() != -11){
			item = array_img_dom.shift(); picture.before(item);       
		    } else {   b_ = false;}
		}
		array_images.shift();
		while($(array_images).length != 0){
			array_images.shift();   item = array_img_dom.pop(); picture.after(item);}
		select_mlt = false;
		alert('произошла ошибка при переносе');
	    }	/*если не удалось перенети*/
	},'json');
}/* remove_images   */

});/* обертка*/




	</script>
