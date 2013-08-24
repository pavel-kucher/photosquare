<input id="t_page" type="hidden" value="все изобажения"/>

<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<div class="buttons-left">
					<div class="dropdown">
						<a class="btn" href="#" data-toggle="dropdown"><i class="icon icon-filter icon-white"></i> Фильтр</a>
						<ul class="dropdown-menu" role="menu">
							<li class="active"><a href="#">Все изображения</a></li>
							<li><a href="#">Опубликованные изображения</a></li>
							<li><a href="#">Непубликованные изображения</a></li>
							<li><a href="#">Последние загруженные изображения</a></li>
						</ul>
					</div>
				</div>
				<h3>Все изображения</h3>
				<div class="buttons">
					<a id="test_upload_lib" class="btn" href="#"><i class="icon icon-question-sign icon-white"></i> Помощь</a>
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
						<? foreach ($this->all_images as $image): ?>
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
		var $gallery = $("#gallery_all"), $trash = $("#lib_trash"),
				$albums = $(".lib_drop_album"), $th = $("#lib_trash");

		$("li", $gallery).draggable({
			cancel: "a.ui-icon", // clicking an icon won't initiate dragging
			revert: "invalid", //если не перемещен в куда либо возвращается обратно 
			containment: "document",
			helper: "clone",
			cursor: "move",
			start: function(event, ui) {
				array_images = new Array();
				var name = '#' + event.target.id;
				var name = $(name);
				if (!name.hasClass('selected')) {
					$('#gallery_all').children('li').each(function() {
						$(this).removeClass('selected');
					});
					name.addClass('selected');
				}/*добавили класс выбранному если небыл выбран деселектим остальные*/
				$('#gallery_all').children('li').each(function()
				{	/*if((event.target.id != $(this).attr('id'))&&($(this).attr('id') != undefined)&&($(this).hasClass('selected')))*/
					if (($(this).attr('id') != undefined) && ($(this).hasClass('selected')))
						array_images.push($(this).attr('id'));
				});
				ui.helper.find('span.image').append('<div class=count_images>' + (array_images.length) + '</div>');
				if (array_images.length > 1)
					ui.helper.find('span.image').append('<span class="library-drag-image1"> </span>');
				if (array_images.length > 2)
					ui.helper.find('span.image').append('<span class="library-drag-image2"> </span>');
				$('.jspContainer').append('<div class="backdrop"></div>');
				//ui.helper.append('<div class=lib_draggable_images></div>');
			},
			stop: function(event, ui) {
				$('.jspContainer').find('.backdrop').remove();
			}
		});

		$trash.droppable({accept: "#gallery_all > li", activeClass: "ui-state-highlight",
			drop: function(event, ui) {
				delete_images(ui.draggable);
			}});

		$albums.droppable({accept: "#gallery_all > li", activeClass: "ui-state-highlight",
			drop: function(event, ui) {
				insert_all_images(event, ui);
			}});


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

		function insert_all_images(event, ui) {
			var id_album = $(event.target).attr('id');
			id_album = id_album.substring(0, id_album.indexOf('_album'));
			$.post("<?= URL; ?>admin/lib_album_img_add", {'array_images': array_images, 'lib_album': id_album}, function(data)
			{
				if (data == '1') { /*!!!!!! сообщение*/
				}
			}, 'json');
		}


	});
</script>