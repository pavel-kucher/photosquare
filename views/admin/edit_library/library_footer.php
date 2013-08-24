</div><!-- end edit_page_selected-->


<script>
	/*	подсветка подменю при перезагрузке страницы	*/
	back_light_sub();
</script>


<div class="col-right">
	<div class="col-right-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3>Инспектор</h3>
			</div><!-- end .col-top-inner -->
		</div><!-- end .col-top -->

		<div class="col-content">
			<div class="col-content-inner" id="col-right">
				<div class="lib-insector-image">
					<a href="#"><img src="/storage/cache/images/51a431ca1132c.jpg" alt="" /></a>
				</div>

				<div class="divider-gorisontal"></div>

				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-property"><i class="icon-sheet"></i> Свойства</a></h3>
					</div>
					<div id="box-property" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">	
								<div class="control-group">
									<label class="control-label" for="image_title">Заголовок</label>
									<div class="controls">
										<input name="image_title" type="text" value="51a431ca1132c">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="image_caption">Описание</label>
									<div class="controls">
										<textarea name="image_caption" type="text"></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="resolution">Разрешение</label>
									<div class="controls">
										<span class="label">1920 x 1200 px</span>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="resolution">Загружено</label>
									<div class="controls">
										<span class="label">7.31.2013 19:09</span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->
			</div><!-- end .col-content-inner -->
		</div><!-- end .col-content -->

		<div class="col-bottom">
			<div class="col-bottom-inner">

			</div><!-- end .col-bottom-inner -->
		</div><!-- end .col-bottom -->

	</div><!-- end .col-right-inner -->
</div> <!-- end .col-right -->

</div><!-- end .lay-three-col -->




<!-- Cортировка в Навигации -->
<script>

	$(function()
	{
		$(".main_sort, .collection_list").sortable({
			items: 'li',
			revert: true,
			placeholder: "all-list-placeholder",
			connectWith: ".con_Sortable",
			receive: function(event, ui) {
				console.log(event);
				console.log(ui);
				alert($(ui.item).parent("ul").attr("class"));
				if (($(ui.item).parent("ul").attr("class") == 'all-list con_Sortable collection_list ui-sortable') && ($(ui.item).attr("class") == 'collection_page'))
				{
					$(ui.sender).sortable('cancel');
				}
			},
			stop: function(event, ui)
			{
				var arr_elments = new Array();
				var arr_id_parent = new Array();
				var elements = $('ul.main_sort li');
				for (var i = 0; i < elements.length; i++) {
					arr_elments.push(elements[i].id);
					arr_id_parent.push($(elements[i]).parent('ul').attr("id"));
				}
				$.post("/admin/save_sortable_structure_library", {'mas_stek': arr_elments, 'mass_sub': arr_id_parent}, function() {
				}), 'json';
			}
		});
	});

</script>
<!-- Конец Cортировка в Навигации -->	






<!-- Modal Download Images -->
<div class="modal add-images" id="ModalDownload">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Загрузка изображений</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel-add" class="scroll-content">
			<div class="scroll-content-inner">
				<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					<div class="fileupload-buttonbar">
						<div class="fileupload-buttons">
							<!-- The fileinput-button span is used to style the file input field as button -->

							<div class="row">
								<div class="btn-file btn btn-large btn-orange pull-left">
									Загрузить изображения
									<input type="file" name="files[]" multiple>
								</div>

								<div class="pull-right">
									<button class="btn btn-orange btn-large start" type="submit">Начать загрузку</button>
									<button class="btn btn-black btn-large cancel" type="reset">Отменить загрузку</button>
									<button class="btn btn-black btn-large delete" type="button"><i class="icon icon-remove icon-white"></i> Удалить</button>
									<label class="btn btn-black btn-large">
										<input style="margin: 1px 0 0;" type="checkbox" class="toggle">
										Выделить все
									</label>
								</div>
							</div>

							<span class="fileupload-loading"></span>
						</div>
						<!-- The global progress information -->
						<div class="fileupload-progress fade" style="display:none">
							<!-- The global progress bar -->
							<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							<!-- The extended global progress information -->
							<div class="progress-extended">&nbsp;</div>
						</div>
					</div>
					<!-- The table listing the files available for upload/download -->
					<table class="download-list" role="presentation"><tbody class="files"></tbody></table>
				</form>

				<!-- The template to display files available for upload -->
				<script id="template-upload" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
					<tr class="template-upload fade" style="display:none">
					<td>
					<span class="preview"></span>
					</td>
					<td>
					<p class="name">{%=file.name%}</p>
					{% if (file.error) { %}
					<div><span class="error">Error:</span> {%=file.error%}</div>
					{% } %}
					</td>
					<td>
					<p style="float: left" class="size">{%=o.formatFileSize(file.size)%}</p>
					<div style="float: right; width: 100px;">
					{% if (!o.files.error) { %}
					<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
					{% } %}
					</div>
					</td>
					<td>
					{% if (!o.files.error && !i && !o.options.autoUpload) { %}
					<button class="btn small btn-orange start">Загрузить</button>
					{% } %}
					{% if (!i) { %}
					<button class="btn btn-black cancel">Отменить</button>
					{% } %}
					</td>
					</tr>
					{% } %}
				</script>
				<!-- The template to display files available for download -->
				<script id="template-download" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
					<tr class="template-download fade" style="display:none">
					<td>
					<span class="preview">
					{% if (file.previewsUrl) { %}
					<img src="{%=file.previewsUrl%}">
					{% } %}
					</span>
					</td>
					<td>
					<p class="name">
					<a href="#" name='dd' title="{%=file.name%}" {%=file.previewsUrl?'data-gallery':''%}>{%=file.name%}</a>
					</p>
					{% if (file.error) { %}
					<div><span class="error">Error</span> {%=file.error%}</div>
					{% } %}
					</td>
					<td>
					<span class="size">{%=o.formatFileSize(file.size)%}</span>
					</td>

					<td>
					<button class="btn btn-black delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button>
					<input type="checkbox" name="delete" value="1" class="toggle">
					</td>
					</tr>
					{% } %}
				</script>
			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<button type="button" class="btn btn-large" href="#" data-dismiss="modal">Отменить</button>
				<button type="button" id="lib_upload_images" class="btn btn-large btn-orange">Добавить изображения</button>
			</div>
		</div>
	</div>
</div><!-- end Modal Panel Add Images -->








<!-- Modal Add New Album -->
<div class="modal" id="ModalAddAlbum">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
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
						<span><?= URL; ?></span>
						<input class="span4 slug-input" id="album_slug" name="album_slug" type="text" disabled>
					</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="album_parent">Расположение</label>
				<div class="controls">
					<select id="album_parent_id">
						<option value="-1" selected="selected">Главное меню</option>
						<? $pages = $this->pages; ?>
						<? foreach ($pages as $keys): ?>
							<? if ($keys['type_state'] == 'drop_menu'): ?>
								<option value="<?= $keys['id_doc']; ?>"> <?= $keys['name_menu']; ?> </option>
							<? endif; ?>
						<? endforeach; ?>
					</select>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
				<input id="create_album_str" class="btn btn-orange btn-large" type="submit" value="Создать альбом" name="create_album">
			</div>
		</div>
	</div><!-- end .modal-footer -->
</div><!-- end Modal New Album -->


<!-- Modal Add New Collection -->
<div class="modal" id="ModalAddAlbum">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Создать коллекцию</h3>
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
						<span><?= URL; ?></span>
						<input class="span4 slug-input" id="collection_slug" name="collection_slug" type="text" disabled>
					</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="collection_parent_id">Расположение</label>
				<div class="controls">
					<select id="collection_parent_id">
						<option value="-1" selected="selected">Главное меню</option>
						<? foreach ($pages as $keys): ?>
							<? if ($keys['type_state'] == 'drop_menu'): ?>
								<option value="<?= $keys['id_doc']; ?>"> <?= $keys['name_menu']; ?> </option>
							<? endif; ?>
						<? endforeach; ?>
					</select>
				</div>
			</div>		
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
				<input id="create_collection_str" class="btn btn-orange btn-large" type="button" value="Создать коллекцию" name="create_collection">
			</div>
		</div>
	</div><!-- end .modal-footer -->
</div><!-- end Modal New Collection -->






<script>

	$('#album_title').syncTranslit({destination: 'album_slug', destination_input: 'album_slug_input'});
	$('#collection_title').syncTranslit({destination: 'collection_slug', destination_input: 'collection_slug_input'});

	$('#create_album_str').mouseup(function() {
		submit_album();
	});
	$('#create_collection_str').mouseup(function() {
		submit_collection();
	});
</script>

<!-- всплывающие Окна для всех форм -->
<script>

	function show_tooltip_(obj, text, color) {
		obj.tooltip('destroy');
		var rid = 'tlt_' + parseInt(new Date().getTime());
		var marker = '<div id="' + rid + '"</div>';
		obj.tooltip({title: text + marker, html: true, trigger: 'manual', placement: 'bottom'});
		obj.tooltip('show');
		$('#' + rid).parent().css({'background-color': color});
		$('#' + rid).parent().prev().css({'border-right-color': color});/**/
	}
	function show_ok_toolTip_(obj, text) {
		show_tooltip_(obj, text, 'green');
	}
	function show_err_toolTip_(obj, text) {
		show_tooltip_(obj, text, 'black');
	}
	function hide_tooltip(obj) {
		obj.tooltip('destroy');
	}
	function check_field_input(obj, text) {
		if (obj.val() == '') {
			show_ok_toolTip_(obj, text);
			return 1;
		} else
			hide_tooltip(obj);
		return 0;
	}

</script>
<!-- Конец Транслитерация Для Всех Форм -->




<!-- Добавление Нового Альбома -->
<script>
	function submit_album() {
		alert('wdwd');
		var g = check_field_input($('#album_title'), 'Введите заголовок');
		g += check_field_input($('#album_slug_input'), 'Введите URL');
		if (g)
			return false;
		var album = $('input[name=album_slug_input]');
		var page;
		$.ajax({type: 'POST', url: "/admin/control_translit_name",
			data: {document_name: $('#album_title').val(), document_slug: $('#album_slug').val(),
				document_parent_id: $('#album_parent_id').val(), document_type: 'album'}
			, async: false}).done(function(data) {
			page = data;
		});
		(page);
		if (page == -1)
		{
			show_ok_toolTip_($('#album_slug_input'), 'Такой адрес уже занят');
			return false;
		} else {

			$('#NewAlbum').removeClass('open');
			var parent = $('#album_parent_id').val();
			if (parent == -1)
			{
				$('#main_sort').append("<li class='simple_page' id='" + page + "'>"
						+ "<span class='item'>"
						+ "<a class='edit_page' href='/admin/structure/album/" + page + "'><span id='" + page + "' class='album'>" + $('#album_title').val() + "</span></a>"
						+ " <a href='#' id='" + page + "' class='del'></a>"
						+ "</span>"
						+ "</li>");
				//    console.log();                 ///.click();
				var page = $('#main_sort').find("#" + page).find("a.edit_page");
				page.click();

			} else {
				$('#main_sort').find("#" + parent).find('ul').append("<li class='simple_page' id='" + page + "'>"
						+ "<span class='item'>"
						+ "<a class='edit_page' href='/admin/structure/album/" + page + "'><span id='" + page + "' class='album'>" + $('#album_title').val() + "</span></a>"
						+ " <a href='#' id='" + page + "' class='del'></a>"
						+ "</span>"
						+ "</li>");
				var page = $('#main_sort').find("#" + page).find("a.edit_page");
				page.click();
			}
			return false;
		}
	}
	;

	function submit_collection()
	{
		var g = check_field_input($('#collection_title'), 'Введите заголовок');
		g += check_field_input($('#collection_slug_input'), 'Введите URL');
		if (g)
			return false;

		var collection = $('input[name=collection_slug_input]');
		var c_page;
		$.ajax({type: 'POST', url: "/admin/control_translit_name",
			data: {document_name: $('#collection_title').val(), document_slug: $('#collection_slug').val(),
				document_parent_id: $('#collection_parent_id').val(), document_type: 'collection'}
			, async: false}).done(function(data) {
			c_page = data;
		});
		(c_page);
		if (c_page == -1)
		{
			collection = $('#collection_slug_input');
			show_ok_toolTip_(collection, 'Такой адрес уже занят');
			return false;
		} else {
			$('#NewCollection').removeClass('open');
			var parent = $('#collection_parent_id').val();
			if (parent == -1)
			{
				$('#main_sort').append("<li class='simple_page' id='" + c_page + "'>"
						+ "<span class='item'>"
						+ "<a class='edit_page' href='/admin/structure/collection/" + c_page + "'><span id='" + c_page + "' class='collection'>" + $('#collection_title').val() + "</span></a>"
						+ " <a href='#' id='" + c_page + "' class='del'></a>"
						+ "</span>"
						+ "</li>");
				var page = $('#main_sort').find("#" + c_page).find("a.edit_page");
				page.click();
			} else {
				$('#main_sort').find("#" + parent).find('ul').append("<li class='simple_page' id='" + c_page + "'>"
						+ "<span class='item'>"
						+ "<a class='edit_page' href='/admin/structure/collection/" + c_page + "'><span id='" + c_page + "' class='collection'>" + $('#collection_title').val() + "</span></a>"
						+ " <a href='#' id='" + c_page + "' class='del'></a>"
						+ "</span>"
						+ "</li>");
				var page = $('#main_sort').find("#" + c_page).find("a.edit_page");
				page.click();
			}
			return false;
		}
	}
	;
</script>







<!-- сохранение изображений в текуший альбом или в последние загруженные  -->	
<script>
	$('#lib_upload_images').mouseup(function() {
		save_images_to_lib();
	});

	function save_images_to_lib()
	{
		$.post("<?= URL; ?>upload/save_uploads_images", {}, function(data)
		{
			if (data == '1')
			{
				alert('images save ok'); /*!!!!!! сообщение*/
			}
		}, 'json');
	}
</script>


<!-- сохранение настроек коллекции и альбома	-->	
<script>

	function save_page()
	{
		arr = new Array();
		arr.push($('input[name=document_header_edit]').val());
		arr.push($('select[name=publish_edit]').val());
		arr.push($('input[name=name_menu_edit]').val());
		arr.push($('textarea[name=doc_text_edit]').val());
		arr.push($('input[name=paswd_page_edit]').val());
		arr.push($('input[name=seo_title_edit]').val());
		arr.push($('textarea[name=seo_description_edit]').val());
		arr.push($('textarea[name=seo_keywords_edit]').val());
		arr.push($('input[name=id_doc_edit]').val());
		var send = '#' + $('input[name=id_doc_edit]').val();
		send = $(send);
		$.post("<?= URL . 'admin/save_document_edits'; ?>", {mas: arr}, function(data) {
			if (data == '1') {
				send.text($('input[name=name_menu_edit]').val());
			}
		});
		return false;
	}
</script>