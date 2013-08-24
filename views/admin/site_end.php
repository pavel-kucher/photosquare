			</div> <!-- редактируемая страница edit_page_selected-->
		</div><!-- end .lay-two-col -->


<!-- Cортировка в Навигации -->
<script>
$(function()
{
		$( "#main_sort, #sortable2" ).sortable({
			connectWith: ".droptrue",
			revert: true,
			placeholder: "all-list-placeholder",
		});
});

function Send_menu_list(){
	var arr = new Array(); var d = document.getElementById('sortable1'); var elements = d.getElementsByTagName('li');
	for(var i = 0; i < elements.length; i++)
	{ arr.push(elements[i].id); }
	$.post("/admin/save_sortable_structure_site", {'mas': arr}, function(){ second();}),'json';}

function second(){
	var v = $(".menu_page");  var menu = 0;  var arr_submenu = new Array(); var arr2 = new Array();
	for(var i = 0; i < v.length; i++){ menu  = v[i].id;
		arr2 = v[i].getElementsByTagName('li'); arr_submenu = [];
		for(var j = 0; j < arr2.length; j++){ arr_submenu.push(arr2[j].id);}
		$.post("/admin/save_sortable_structured_submenu", {'mas': arr_submenu, 'id_menu': menu}, function(){}),'json';}}
</script>
<!-- Конец Cортировка в Навигации -->




<!-- Modal Add New Album -->
<div class="modal" id="NewAlbum">
	<div class="modal-header">
		<button id="ClosePanelNewAlbum" class="close">×</button>
		<h3 id="myModalLabel">Создать альбом</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" id="album_add" method="post" onsubmit="return submit_album();" action="/admin/edit_album">
			<div class="control-group">
				<label class="control-label" for="album_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" id="album_title" name="album_title" type="text">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="album_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="album_slug_input" name="album_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?=URL;?></span>
						<input class="span4 slug-input" id="album_slug" name="album_slug" type="text" disabled>
					</span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="album_parent">Расположение</label>
				<div class="controls">
					<select id="album_parent_id">
						<option value="-1" selected="selected">Главное меню</option>
						<? $pages = $this->pages;?>
						<?	foreach ($pages as $keys ):?>
							<? if ($keys['type_state'] == 'drop_menu'): ?>
							<option value="<?=$keys['id_doc'];?>"> <?=$keys['name_menu'];?> </option>
							<? endif;?>
						<? endforeach;?>
					</select>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<input id="ClosePanelNewCollection2" class="m-btn black cansel" type="button" value="Отменить">
				<input id="create_album_str" class="m-btn orange save" type="submit" value="Создать альбом" name="create_album">
			</div>
		</div>
	</div><!-- end .modal-footer -->
</div><!-- end Modal New Album -->


<!-- Modal Add New Collection -->
<div class="modal" id="NewCollection">
	<div class="modal-header">
		<button id="ClosePanelNewCollection" class="close">×</button>
		<h3 id="myModalLabel">Создать коллекцию</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" id="collection_add" method="Post" onsubmit="return submit_collection();" action="/admin/edit_collection">
			<div class="control-group">
				<label class="control-label" for="collection_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="collection_title" name="collection_title">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="collection_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="collection_slug_input" name="collection_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?=URL;?></span>
						<input class="span4 slug-input" id="collection_slug" name="collection_slug" type="text" disabled>
					</span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="collection_parent_id">Расположение</label>
				<div class="controls">
					<select id="collection_parent_id">
						<option value="-1" selected="selected">Главное меню</option>
						<?	foreach ($pages as $keys ):?>
							<? if ($keys['type_state'] == 'drop_menu'): ?>
							<option value="<?=$keys['id_doc'];?>"> <?=$keys['name_menu'];?> </option>
							<? endif;?>
						<? endforeach;?>
					</select>
				</div>
			</div>		
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<input id="ClosePanelNewCollection2" class="m-btn black cansel" type="button" value="Отменить">
				<input id="create_collection_str" class="m-btn orange save" type="button" value="Создать коллекцию" name="create_collection">
			</div>
		</div>
	</div><!-- end .modal-footer -->
</div><!-- end Modal New Collection -->


<!-- Modal Add New Page -->
<div class="modal" id="NewPage">
	<div class="modal-header">
		<button id="ClosePanelNewPage" class="close">×</button>
		<h3 id="myModalLabel">Создать страницу</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal"  id="page_add" method="post" onsubmit="return submit_page();" action="/admin/edit_page">
			<div class="control-group">
				<label class="control-label" for="page_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="page_title" name="page_title">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="page_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="page_slug_input" name="page_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?=URL;?></span>
						<input class="span4 slug-input" id="page_slug" name="page_slug" type="text" disabled>
					</span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="page_parent">Расположение</label>
				<div class="controls">
					<select id="page_parent_id">
						<option value="-1" selected="selected">Главное меню</option>
						<?	foreach ($pages as $keys ):?>
							<? if ($keys['type_state'] == 'drop_menu'): ?>
							<option value="<?=$keys['id_doc'];?>"> <?=$keys['name_menu'];?> </option>
							<? endif;?>
						<? endforeach;?>
					</select>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<input id="ClosePanelNewCollection2" class="m-btn black cansel" type="button" value="Отменить">
				<input id="create_page_str" class="m-btn orange save" type="button" value="Создать страницу" name="create_collection">
			</div>
		</div>
	</div>
</div><!-- end Modal New Page -->


<!-- Modal Add New Link -->
<div class="modal" id="NewLink">
	<div class="modal-header">
		<button id="ClosePanelNewLink" class="close">×</button>
		<h3 id="myModalLabel">Создать ссылку</h3>
	</div>
	<div class="modal-body">
		<form method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="link_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" name="link_title">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="link_parent">Расположение</label>
				<div class="controls">
					<select name="link_parent">
						<option value="">Главное меню</option>
						<option value="">Выпадающий список</option>
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="link_url">URL</label>
				<div class="controls">
					<input class="span4" type="text" name="link_url">
					<span class="help-block">http://fedoseeva-foto.ru/</span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="open_new_tab">В новом окне</label>
				<div class="controls">
					<input class="checkbox inline" type="checkbox" name="open_new_tab">
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a id="ClosePanelNewLink2" class="m-btn black cansel" href="#">Отменить</a>
				<a class="m-btn orange save" href="#">Создать ссылку</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Add New Link -->


<!-- Modal Add New Dropdown Menu -->
<div class="modal" id="NewDropDownMenu">
	<div class="modal-header">
		<button id="ClosePanelNewDropDownMenu" class="close">×</button>
		<h3 id="myModalLabel">Создать выпадающий список</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal"  id="dropmenu_add" method="post" onsubmit="return submit_dropmenu();" action="/admin/edit_menu">
			<div class="control-group">
				<label class="control-label" for="dropmenu_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="dropmenu_title" name="dropmenu_title">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="dropmenu_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="dropmenu_slug_input" name="dropmenu_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?=URL;?></span>
						<input class="span4 slug-input" id="dropmenu_slug" name="dropmenu_slug" type="text" disabled>
					</span>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<input id="ClosePanelNewDropDownMenu2" class="m-btn black cansel" type="button" value="Отменить">
				<input id="create_dropmenu_str" class="m-btn orange save" type="button" value="Создать выпадающее меню" name="create_collection">
			</div>
		</div>
	</div>
</div><!-- end Modal Add New Dropdown Menu -->




<!-- Modal Add New Calendar -->
<div class="modal" id="NewCalendar">
	<div class="modal-header">
		<button id="ClosePanelNewCalendar" class="close">×</button>
		<h3 id="myModalLabel">Создать календарь</h3>
	</div>
	<div class="modal-body">
		<form method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="dropdown_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" name="dropdown_title">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="dropdown_parent">Расположение</label>
				<div class="controls">
					<select name="dropdown_parent">
						<option value="">Главное меню</option>
						<option value="">Выпадающий список</option>
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="dropdown_url">URL</label>
				<div class="controls">
					<input class="span4" type="text" name="dropdown_url">
					<span class="help-block">http://fedoseeva-foto.ru/</span>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a id="ClosePanelNewCalendar2" class="m-btn black cansel">Отменить</a>
				<a class="m-btn orange save" href="#">Создать выпадающее меню</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Add New Calendar -->


<script>
	form_show('NewAlbum', 'ShowPanelNewAlbum', 'ClosePanelNewAlbum', 'ClosePanelNewAlbum2');
	form_show('NewCollection', 'ShowPanelNewCollection', 'ClosePanelNewCollection', 'ClosePanelNewCollection2');
	form_show('NewPage', 'ShowPanelNewPage', 'ClosePanelNewPage', 'ClosePanelNewPage2');
	form_show('NewLink', 'ShowPanelNewLink', 'ClosePanelNewLink', 'ClosePanelNewLink2');
	form_show('NewDropDownMenu', 'ShowPanelNewDropDownMenu', 'ClosePanelNewDropDownMenu', 'ClosePanelNewDropDownMenu2');
	form_show('NewCalendar', 'ShowPanelNewCalendar', 'ClosePanelNewCalendar', 'ClosePanelNewCalendar2');
	
	$('#album_title').syncTranslit({destination: 'album_slug', destination_input: 'album_slug_input' });
	$('#collection_title').syncTranslit({destination: 'collection_slug', destination_input: 'collection_slug_input' });
	$('#page_title').syncTranslit({destination: 'page_slug', destination_input: 'page_slug_input' });
	$('#dropmenu_title').syncTranslit({destination: 'dropmenu_slug', destination_input: 'dropmenu_slug_input' });
	
	$('#create_album_str').mouseup(function(){submit_album();});
	$('#create_collection_str').mouseup(function(){submit_collection();});
	$('#create_page_str').mouseup(function(){submit_page();});
	$('#create_dropmenu_str').mouseup(function(){submit_dropmenu();});

</script>


<!-- всплывающие Окна для всех форм -->
<script>

	function show_tooltip_( obj, text, color) {
		obj.tooltip('destroy');
		var rid = 'tlt_' + parseInt(new Date().getTime());
		var marker = '<div id="'+rid+'"</div>';
		obj.tooltip({title: text+marker, html: true, trigger: 'manual', placement: 'bottom'});
		obj.tooltip('show');
		$('#'+rid).parent().css({'background-color': color});
		$('#'+rid).parent().prev().css({'border-right-color': color});/**/
	}
	function show_ok_toolTip_( obj , text){show_tooltip_( obj, text, 'green');}  
	function show_err_toolTip_( obj, text){show_tooltip_( obj, text, 'black');}  
	function hide_tooltip(obj){	obj.tooltip('destroy');}
	function check_field_input(obj, text){	if (obj.val() == ''){show_ok_toolTip_(obj, text); return 1;}else hide_tooltip(obj); return 0; }
	
</script>
<!-- Конец Транслитерация Для Всех Форм -->


<!-- Добавление Нового Альбома -->
<script>
	function submit_album(){
		var g = check_field_input( $('#album_title'), 'Введите заголовок');
		g += check_field_input( $('#album_slug_input'), 'Введите URL');
		if(g) return false;
		var album = $('input[name=album_slug_input]');
		var page; 
	$.ajax({ type: 'POST', url: "/admin/control_translit_name", 
		data: { document_name: $('#album_title').val(), document_slug: $('#album_slug').val(), 
			document_parent_id: $('#album_parent_id').val(), document_type: 'album' }
			,async:false }).done( function ( data ){  page = data;});
			(page);
		if( page == -1)
		{
		    show_ok_toolTip_(  $('#album_slug_input') , 'Такой адрес уже занят');
		    return false;
		}   else {
		    
			$('#NewAlbum').removeClass('open');
			var parent = $('#album_parent_id').val();
			if(parent == -1)
			{
			   $('#main_sort').append("<li class='simple_page' id='"+page+"'>"
				    +"<span class='item'>"  
					+"<a class='edit_page' href='/admin/structure/album/"+page+"'><span id='"+page+"' class='album'>"+$('#album_title').val()+"</span></a>"
					+" <a href='#' id='"+page+"' class='del'></a>"
	    			    +"</span>"
				+"</li>");   
			//    console.log();                 ///.click();
			var page = $('#main_sort').find("#"+page).find("a.edit_page");
			page.click();

			}else{
			    $('#main_sort').find("#"+parent).find('ul').append("<li class='simple_page' id='"+page+"'>"
				+"<span class='item'>"  
					+"<a class='edit_page' href='/admin/structure/album/"+page+"'><span id='"+page+"' class='album'>"+$('#album_title').val()+"</span></a>"
					+" <a href='#' id='"+page+"' class='del'></a>"
	    			    +"</span>"
			    +"</li>");
			    var page = $('#main_sort').find("#"+page).find("a.edit_page");
			    page.click();
			}
			return false;
		}
	};

	function submit_collection()
	{
		
		var g = check_field_input( $('#collection_title'), 'Введите заголовок');
		g += check_field_input( $('#collection_slug_input'), 'Введите URL');
		if(g) return false;
				    		 
		var collection = $('input[name=collection_slug_input]');
		var c_page; 
		$.ajax({ type: 'POST', url: "/admin/control_translit_name", 
		data: { document_name: $('#collection_title').val(), document_slug: $('#collection_slug').val(), 
			document_parent_id: $('#collection_parent_id').val(), document_type: 'collection' }
			,async:false }).done( function ( data ){ c_page = data;});
		(c_page);
		if( c_page == -1)
		{
			collection = $('#collection_slug_input');
			show_ok_toolTip_( collection , 'Такой адрес уже занят');
			return false;
		} else {
			$('#NewCollection').removeClass('open');
			var parent = $('#collection_parent_id').val();
			if(parent == -1)
			{
			   $('#main_sort').append("<li class='simple_page' id='"+c_page+"'>"
				    +"<span class='item'>"  
					+"<a class='edit_page' href='/admin/structure/collection/"+c_page+"'><span id='"+c_page+"' class='collection'>"+$('#collection_title').val()+"</span></a>"
					+" <a href='#' id='"+c_page+"' class='del'></a>"
	    			    +"</span>"
				+"</li>");   
			//    console.log();                 ///.click();
			var page = $('#main_sort').find("#"+c_page).find("a.edit_page");
			page.click();
			}else{
			    $('#main_sort').find("#"+parent).find('ul').append("<li class='simple_page' id='"+c_page+"'>"
				    +"<span class='item'>"
					+"<a class='edit_page' href='/admin/structure/collection/"+c_page+"'><span id='"+c_page+"' class='collection'>"+$('#collection_title').val()+"</span></a>"
					+" <a href='#' id='"+c_page+"' class='del'></a>"
	    			    +"</span>"
			    +"</li>");
			    var page = $('#main_sort').find("#"+c_page).find("a.edit_page");
			    page.click();
			}
			return false;
    
		}
	};
	
	function submit_page()
	{	var g = check_field_input( $('#page_title'), 'Введите заголовок'); g += check_field_input( $('#page_slug_input'), 'Введите URL');
		if(g) return false; var page = $('input[name=page_slug_input]'); var npage; 
		$.ajax({ type: 'POST', url: "/admin/control_translit_name", 
		data: { document_name: $('#page_title').val(), document_slug: $('#page_slug').val(), 
			document_parent_id: $('#page_parent_id').val(), document_type: 'page' }
			,async:false }).done( function ( data ){ npage = data;});
		(npage);
		if( npage == -1){
		    collection = $('#page_slug_input');
		    show_ok_toolTip_( page , 'Такой адрес уже занят'); return false;
		}else
		{
			$('#NewPage').removeClass('open');
			var parent = $('#page_parent_id').val();
			if(parent == -1)
			{
			   $('#main_sort').append("<li class='simple_page' id='"+npage+"'>"
				    +"<span class='item'>"  
					+"<a class='edit_page' href='/admin/structure/page/"+npage+"'><span id='"+npage+"' class='page'>"+$('#page_title').val()+"</span></a>"
					+" <a href='#' id='"+npage+"' class='del'></a>"
	    			    +"</span>"
				+"</li>");   
			    //    console.log();                 ///.click();
			    var page = $('#main_sort').find("#"+npage).find("a.edit_page");
			    page.click();
			}else{
			    $('#main_sort').find("#"+parent).find('ul').append("<li class='simple_page' id='"+npage+"'>"
				    +"<span class='item'>"
					+"<a class='edit_page' href='/admin/structure/page/"+npage+"'><span id='"+npage+"' class='page'>"+$('#page_title').val()+"</span></a>"
					+" <a href='#' id='"+npage+"' class='del'></a>"
	    			    +"</span>"
			    +"</li>");
			    var page = $('#main_sort').find("#"+npage).find("a.edit_page");
			    page.click();
			}
			return false;		    
		}
	};
	
	
	
	function submit_dropmenu()
	{	var g = check_field_input( $('#dropmenu_title'), 'Введите заголовок'); g += check_field_input( $('#dropmenu_slug_input'), 'Введите URL');
		if(g) return false; var dropmenu = $('input[name=dropmenu_slug_input]'); var dpage; 
		$.ajax({ type: 'POST', url: "/admin/control_translit_name", 
		data: { document_name: $('#dropmenu_title').val(), document_slug: $('#dropmenu_slug').val(), 
			document_parent_id: -1, document_type: 'drop_menu' }
			,async:false }).done( function ( data ){ dpage = data;});
		(dpage);
		if( dpage == -1){
		    collection = $('#collection_slug_input');
		    show_ok_toolTip_( dropmenu , 'Такой адрес уже занят'); return false;
		}else
		{
			$('#NewDropDownMenu').removeClass('open');
			var parent = $('#page_parent_id').val();
			   $('#main_sort').append("<li class='menu_page' id='"+dpage+"'>"
				    +"<span class='item'>"  
					+"<a class='edit_page' href='/admin/structure/drop_menu/"+dpage+"'><span id='"+dpage+"' class='drop_menu'>"+$('#dropmenu_title').val()+"</span></a>"
					+" <a href='#' id='"+dpage+"' class='del'></a>"
	    			    +"</span>"
				    +"<ul id='sortable2'  class='droptrue all-list'> </ul>"
				+"</li>");   
			    //    console.log();                 ///.click();
			    var page = $('#main_sort').find("#"+dpage).find("a.edit_page");
			    page.click();
			return true;		    
		}
	};
	
</script>
<!-- Конец Добавление Нового Альбома -->

