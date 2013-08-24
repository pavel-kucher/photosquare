<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3>Альбом такой-то</h3>
				<div class="buttons">
					<a href="#ModalAlbumSettings" class="btn" data-toggle="modal"><i class="icon icon-cog icon-white"></i> Настройки альбома</a>
					<a class="btn" href="#"><i class="icon icon-question-sign icon-white"></i> Помощь</a>
				</div>
			</div>
		</div><!-- end .col-top -->
		<input type="hidden" id="id_selected_page" value="<?= $this->page['id_doc']; ?>"/>
		<script>
			var $gallery = $("#gallery_album"), $trash = $("#lib_trash");
			var $albums = $(".lib_drop_album");
			var $all_images = $("#lib_all_images");

			$(function() {
				$("#gallery_album")
						.multiselectable();
				$("#gallery_album")
						.sortable({
					items: "> li",
					placeholder: "list-placeholder",
					opacity: 0.8,
					start: function(event, ui)
					{
						//console.log(ui.item.hasClass('selected'));
						//var name = '#'+event.target.id;	var name = $(name);
						array_images = new Array();
						array_img_dom = new Array();
						var id_item = ui.item.attr('id');
						if (ui.item.hasClass('selected'))
						{
							$('#gallery_album').children('li').each(function()
							{
								if ($(this).hasClass('selected'))
								{
									if ($(this).attr('id') == id_item)
									{
										/*alert('айди перетаскиваемого совпадает с новым  перетаскиваемый'+id_item+' новый '+$(this).attr('id'));*/
										array_images.push(-11);
										array_images.push($(this).attr('id'));
									} else {
										/*alert('айди перетаскиваемого не совпадает с новым  перетаскиваемый'+id_item+' новый '+$(this).attr('id'));*/
										array_img_dom.push($(this).detach());
										array_images.push($(this).attr('id'));
									}
								}
							})
							/*console.log(array_img_dom);			*/
						} else {
							ui.item.addClass('selected');
							array_images.push('-11');
							array_images.push(ui.item.attr('id'));
							$('#gallery_album').children('li').each(function()
							{
								if (($(this).hasClass('selected')) && ($(this).attr('id') != id_item))
								{
									$(this).removeClass('selected');
								}
							})
						}
						$("#gallery_album").sortable('refresh');


					},
					sort: function(event, ui) {
					},
					stop: function(event, ui)
					{ /* срабатывает только если обьекты не были перекинуты или удалены  должно быть так*/
						var next_insert = ui.item;/*сначала сам обьект*/
						var b_ = true;
						var item;
						if ($(array_images).length == 0)
							return true;
						while (b_)
						{
							if (array_images.shift() != -11)
							{
								item = array_img_dom.shift();
								/*item.addClass('selected');       */
								next_insert.before(item);
							} else {
								b_ = false;
							}
						}
						array_images.shift();
						b_ = true;
						while (b_)
						{
							if ($(array_images).length != 0)
							{
								array_images.shift();
								item = array_img_dom.pop();
								/* item.addClass('selected'); */
								next_insert.after(item);
							} else {
								b_ = false;
							}
						}
						select_mlt = false;
					}

				});
				/*
				 start: function(event,ui){ 
				 $('.jspContainer').append('<div class="backdrop"></div>');
				 },
				 stop: function(event,ui){	$('.jspContainer').find('.backdrop').remove();}});
				 */

				$trash.droppable({accept: "#gallery_album > li", activeClass: "ui-state-highlight",
					drop: function(event, ui) {
						delete_images(ui.draggable);
					}});

				$albums.droppable({accept: "#gallery_album > li", activeClass: "ui-state-highlight",
					drop: function(event, ui) {
						insert_other_images(event, ui.draggable);
					}});

				$all_images.droppable({accept: "#gallery_album > li", activeClass: "ui-state-highlight",
					drop: function(event, ui) {
						remove_images(event, ui.draggable);
					}});


				function delete_images(picture)
				{
					$gallery.find('#list-placeholder').remove();
					var array_id_images = new Array();
					var array_copy_images = new Array();
					array_copy_images = array_images.slice();
					var item;
					if ($(array_copy_images).length == 0)
						return true;
					while ($(array_copy_images).length != 0) {
						item = array_copy_images.shift();
						if (item != -11)
							array_id_images.push(item);
					}
					var id_album = $('#id_selected_page').val();
					var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
					array_copy_images = array_images.slice();
					array_img_dom = new Array();/*чистим основные*/
					array_images = new Array();


					$.post("<?= URL; ?>admin/album_trash_images",
							{'array_images': array_id_images, 'lib_album': id_album},
					function(data) {
						if (data == '1') {
							picture.remove();
							/*!!!!!! сообщение*/} else {/*!!!!!! сообщение*//* обсудить с андреем возможность удаления совсем*/
							array_img_dom = array_img_dom_copy;
							array_images = array_copy_images;
							var next_insert = picture;/*сначала сам обьект*/
							var b_ = true;
							var item;
							if ($(array_images).length == 0)
								return true;
							while (b_) {
								if (array_images.shift() != -11) {
									item = array_img_dom.shift();
									next_insert.before(item);
								} else {
									b_ = false;
								}
							}
							array_images.shift();
							while ($(array_images).length != 0) {
								array_images.shift();
								item = array_img_dom.pop();
								next_insert.after(item);
							}
							select_mlt = false;
							alert('произошла ошибка при переносе');
						}/*если не удалось перенети*/
					}, 'json');
				}

				function insert_other_images(event, picture) {
					var id_album = $(event.target).attr('id');
					id_album = id_album.substring(0, id_album.indexOf('_album'));
					var id_album_curr = $('#id_selected_page').val()
					if (id_album == id_album_curr) {
						alert('тот же альбом');
						return false;
					}
					var array_id_images = new Array();
					var array_copy_images = new Array();
					array_copy_images = array_images.slice();
					while ($(array_copy_images).length != 0) {
						item = array_copy_images.shift();
						if (item != -11)
							array_id_images.push(item);
					}

					if (event.ctrlKey)  /* если копирование */
					{
						$.post("<?= URL; ?>admin/lib_album_img_add",
								{'array_images': array_id_images, 'lib_album': id_album}, function(data)
						{
							if (data == '1') {
								/*!!!!!! сообщение*/alert('копирование успешно');
							}
						}, 'json');
					} else { /* если перетягивание в другой альбом*/
						var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
						array_copy_images = array_images.slice();
						array_img_dom = new Array();/*чистим основные*/
						array_images = new Array();
						$.post("<?= URL; ?>admin/lib_album_img_trans",
								{'array_images': array_id_images, 'lib_album': id_album_curr, 'lib_new_album': id_album}, function(data)
						{
							if (data == '1') {
								picture.remove();
								/*!!!!!! сообщение*/alert('перенос успешно');
							} else {
								array_img_dom = array_img_dom_copy;
								array_images = array_copy_images;
								var next_insert = picture;/*сначала сам обьект*/
								var b_ = true;
								var item;
								if ($(array_images).length == 0)
									return true;
								while (b_) {
									if (array_images.shift() != -11) {
										item = array_img_dom.shift();
										next_insert.before(item);
									} else {
										b_ = false;
									}
								}
								array_images.shift();
								while ($(array_images).length != 0) {
									array_images.shift();
									item = array_img_dom.pop();
									next_insert.after(item);
								}
								select_mlt = false;
								alert('произошла ошибка при переносе');
							} /*если не удалось перенети*/
						}, 'json');
					}
					$("#gallery_album").sortable('refresh');
				}
				;/*	insert_other_images */

				function remove_images(event, picture)
				{
					$gallery.find('#list-placeholder').remove();
					var array_id_images = new Array();
					var array_copy_images = new Array();
					array_copy_images = array_images.slice();
					var item;
					if ($(array_copy_images).length == 0)
						return true;
					while ($(array_copy_images).length != 0) {
						item = array_copy_images.shift();
						if (item != -11)
							array_id_images.push(item);
					}
					var id_album = $('#id_selected_page').val();
					var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
					array_copy_images = array_images.slice();
					array_img_dom = new Array();/*чистим основные*/
					array_images = new Array();

					$.post("<?= URL; ?>admin/album_images_to_all",
							{'array_images': array_id_images, 'lib_album': id_album},
					function(data) {
						if (data == '1') {
							picture.remove();
							alert('перенос в библиотеку осуществлен успешно');
							/*!!!!!! сообщение*/} else {
							array_img_dom = array_img_dom_copy;
							array_images = array_copy_images;
							var b_ = true;
							var item;
							if ($(array_images).length == 0)
								return true;
							while (b_) {
								if (array_images.shift() != -11) {
									item = array_img_dom.shift();
									picture.before(item);
								} else {
									b_ = false;
								}
							}
							array_images.shift();
							while ($(array_images).length != 0) {
								array_images.shift();
								item = array_img_dom.pop();
								picture.after(item);
							}
							select_mlt = false;
							alert('произошла ошибка при переносе');
						}	/*если не удалось перенети*/
					}, 'json');
				}/* remove_images   */

			});/* обертка*/
		</script>

		<div class="col-content">			
			<div class="col-content-inner" id="col-mid">
				<div class="list">
					<ul id="gallery_album">
<? foreach ($this->lib_album_images as $image): ?>
							<li id="<?= $image['id_photo']; ?>"  class="lib_drop_album">
								<span class="grid-data">
									<span class="content">
										<span class="image">
											<img src="<?= URL . 'storage/cache/images/' . $image['name_photo']; ?>" alt="<?= $image['name_in_page']; ?>">
										</span>
									</span>
								</span>
							</li>
<? endforeach; ?> 
					</ul>
				</div><!-- end .list-image -->
			</div><!-- end .col-content-inner -->
		</div><!-- end .col-content -->

		<div class="col-bottom">
			<div class="col-bottom-inner">
				<input type="hidden" id="124f1" name="name_album" value="<?= $this->id_page; ?>">
			</div><!-- end .col-bottom-inner -->
		</div><!-- end .col-bottom -->

	</div><!-- end .col-mid-inner -->
</div><!-- end .col-mid -->



<!-- Modal Modal Album Settings -->
<div class="modal panel-modal" id="ModalAlbumSettings">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Настройки альбома</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-main"><i class="icon-sheet"></i> Основные параметры</a></h3>
					</div>
					<div id="box-main" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">	
								<div class="control-group">
									<label class="control-label" for="document_header_edit">Название</label>
									<div class="controls">
										<input name="document_header_edit" type="text" value="<?= $this->page['document_header']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="translit_name_edit">Ссылка на страницу</label>
									<div class="controls">
										<textarea name="translit_name_edit" type="text" readonly="readonly"><?= URL . $this->page['translit_name'] . ''; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="doc_text_edit">Описание</label>
									<div class="controls">
										<textarea name="doc_text_edit" type="text"><?= $this->page['doc_text']; ?></textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->

				<div class="divider-gorisontal"></div>

				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-seo"><i class="icon-sheet"></i> SEO параметры</a></h3>
					</div>
					<div id="box-seo" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="seo_title_edit">Заголовок (Title)</label>
									<div class="controls">
										<input name="seo_title_edit" type="text" value="<?= $this->page['seo_title']; ?>" >
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="seo_description_edit">Описание (Description)</label>
									<div class="controls">
										<textarea name="seo_description_edit" type="text"><?= $this->page['seo_description']; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="seo_keywords_edit">Ключевые слова (Keywords)</label>
									<div class="controls">
										<textarea name="seo_keywords_edit" type="text"><?= $this->page['seo_keywords']; ?></textarea>
										<input type="hidden" name="id_doc_edit" value="<?= $this->page['id_doc']; ?>"/>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->

			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->
		<div class="modal-footer">
			<div class="modal-footer-inner">
				<div class="pull-right">
					<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
					<a class="btn btn-orange btn-large" href="#" onclick="return save_page();">Сохранить настройки</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Modal Album Settings -->	
