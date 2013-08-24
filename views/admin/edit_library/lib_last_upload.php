<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3>Последние загруженные</h3>
				<div class="buttons">
					<a class="btn" href="#"><i class="icon icon-question-sign icon-white"></i> Помощь</a>
				</div>
			</div>
		</div><!-- end .col-top -->

		<script>
			$(function() {
				$("#gallery_all").multiselectable({click: function(event, elem) {
					}});
			});
		</script>
		<div class="col-content">			
			<div class="col-content-inner" id="col-mid">
				<div class="list">
					<ul id="gallery_all">
						<? foreach ($this->lib_last_upload as $image): ?>
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


<script>
	$(function()
	{
		var $gallery = $("#gallery_all"), $trash = $("#lib_trash");
		var $albums = $(".lib_drop_album"), $th = $("#lib_trash");


		$("#gallery_all").multiselectable();

		$("#gallery_all").sortable({
			items: "> li",
			placeholder: "list-placeholder",
			opacity: 0.8,
			start: function(event, ui)
			{
				array_images = new Array();
				array_img_dom = new Array();
				var id_item = ui.item.attr('id');
				if (ui.item.hasClass('selected'))
				{
					$('#gallery_all').children('li').each(function()
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
					$('#gallery_all').children('li').each(function()
					{
						if (($(this).hasClass('selected')) && ($(this).attr('id') != id_item))
						{
							$(this).removeClass('selected');
						}
					})
				}
				$("#gallery_all").sortable('refresh');


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



		$trash.droppable({accept: "#gallery_all > li", activeClass: "ui-state-highlight",
			drop: function(event, ui) {
				delete_images(ui.draggable);
			}
		});

		$albums.droppable({accept: "#gallery_all > li", activeClass: "ui-state-highlight",
			drop: function(event, ui) {
				insert_other_images(event, ui.draggable);
			}
		});






		function insert_other_images(event, picture) {
			var id_album = $(event.target).attr('id');
			id_album = id_album.substring(0, id_album.indexOf('_album'));
			var id_album_curr = $('#id_selected_page').val();
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

			/* если перетягивание в другой альбом*/
			var array_img_dom_copy = array_img_dom.slice();/*копируем оба массива*/
			array_copy_images = array_images.slice();
			array_img_dom = new Array();/*чистим основные*/
			array_images = new Array();
			alert('dwddwd');

			var id_album = $(event.target).attr('id');
			id_album = id_album.substring(0, id_album.indexOf('_album'));
			console.log(id_album);
			console.log(id_album);
			$.post("<?= URL; ?>admin/lib_album_img_add", {'array_images': array_id_images, 'lib_album': id_album}, function(data)
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
					while (b_)
					{
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
					/*!!!!!! сообщение*/}
			}, 'json');
			$("#gallery_album").sortable('refresh');
		}
		;/*	insert_other_images */



		function delete_images($item) {
			$.post("<?= URL; ?>admin/lib_trash_images", {'array_images': array_images}, function(data)
			{
				if (data == '1') {
					$(array_images).each(function() {
						$('#' + this).fadeOut(); /*!!!!!! сообщение*/
					});
				}
			}, 'json');/* отсылаем удаленные картинки id шники*/
		}


	});
</script>