<?
if (isset($this->js_edit)) {
	foreach ($this->js_edit as $js) {
		echo '<script  type="text/javascript" src="' . URL . 'admins_app/' . $js . '"></script>' . "\n";
	}
}
if (isset($this->css_edit)) {
	foreach ($this->css_edit as $css) {
		echo '<link rel="stylesheet" href="' . URL . 'admins_app/' . $css . '" />' . "\n";
	}
}
?>

<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3>Коллекция</h3>
				<div class="buttons">
					<a class="btn" href="#ModalCollectionSettings" data-toggle="modal"><i class="icon icon-cog icon-white"></i> Настройки коллекции</a>
					<a class="btn" href="#"><i class="icon icon-question-sign icon-white"></i> Помощь</a>
				</div>
			</div>
		</div><!-- end .col-top -->

		<div class="col-content">
			<div class="col-content-inner" id="col-mid">
				<div class="list list-album">
					<ul id="sortable">
						<? foreach ($this->collections as $collection): ?>
							<li id="<?= $collection['id_doc']; ?>">
								<span class="grid-data">
									<span class="content">
										<span class="image">
											<img src="<?= URL . 'storage/cache/previews/' . $collection['preview_img']; ?>" alt="<?= $collection['name_menu']; ?>">
										</span>
										<span class="caption">
											<span class="name"><?= $collection['name_menu']; ?></span>
										</span>
									</span>
								</span>
							</li>
						<? endforeach; ?>
					</ul>
				</div><!-- end .list -->

				<script>
					$(function() {
						$("#sortable").sortable({placeholder: "placeholder"});
					});
				</script>
			</div><!-- end .col-content-inner -->
		</div><!-- end .col-content -->

		<div class="col-bottom">
			<div class="col-bottom-inner">
				<input type="hidden" name="id_doc_edit" value="<?= $this->page['id_doc']; ?>"/>
			</div><!-- end .col-bottom-inner -->
		</div><!-- end .col-bottom -->

	</div><!-- end .col-mid-inner -->
</div><!-- end .col-mid -->


<!-- Modal Panel Settings -->
<div class="modal panel-modal" id="panel-settings">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Настройки коллекции</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" href="#box-main" data-toggle="collapse"><i class="icon-sheet"></i> Основные параметры</a></h3>
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
									<label class="control-label" for="status">Статус</label>
									<div class="controls">
										<select name="publish_edit">
											<option value="1">Опубликовано</option>
											<? if ($this->page['publish'] == 1): ?><option value="0"><? else: ?><option value="0" selected="selected"><? endif; ?>Черновик</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="name_menu_edit">Текст ссылки в меню</label>
									<div class="controls">
										<input name="name_menu_edit" type="text" value="<?= $this->page['name_menu']; ?>">
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
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-access"><i class="icon-sheet"></i> Доступ</a></h3>
					</div>
					<div id="box-access" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">	
								<div class="control-group">
									<label class="control-label" for="paswd_page_edit">Пароль</label>
									<div class="controls">
										<input name="paswd_page_edit" type="password" value="<?= $this->page['paswd_page']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="translit_name_edit">Ссылка на страницу</label>
									<div class="controls">
										<textarea name="translit_name_edit" type="text" readonly="readonly"><?= URL . $this->page['translit_name'] . ''; ?></textarea>
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
										<input name="seo_title_edit" type="text"  value="<?= $this->page['seo_title']; ?>">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="seo_description_edit">Описание (Description)</label>
									<div class="controls">
										<textarea name="seo_description_edit" type="text"><?= $this->page['seo_description']; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="collection_keywords">Ключевые слова (Keywords)</label>
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
				<div class="row-fluid">
					<div class="pull-right">
						<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
						<a class="btn btn-large btn-orange" href="#" onclick="return save_page();">Сохранить настройки</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end .panel-settings-body -->

</div><!-- end Modal2 panel-settings -->



<!-- Modal Panel Add Albums -->
<div class="modal add-images" id="panel-add-images">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Добавить альбомы</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel-add" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="list list-album2">
					<ul id="selectable">
						<? foreach ($this->collections_nload as $collection): ?>
							<li id="<?= $collection['id_doc']; ?>">
								<span class="grid-data">
									<span class="content">
										<span class="image">
											<img src="<?= URL . 'storage/cache/previews/' . $collection['preview_img']; ?>" alt="<?= $collection['name_menu']; ?>"></span>
										<span class="caption">
											<span class="name"><?= $collection['name_menu']; ?></span>
										</span>
									</span>
									<div class="action">
										<a href="#" class="handle"></a>
									</div>
								</span>
							</li>
						<? endforeach; ?>	
					</ul>

					<script>
					$(function() {
						$("#selectable").selectable();
					});
					</script>
				</div><!-- end .list-album -->
			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->

		<div class="modal-footer">
			<div class="modal-footer-inner">
				<div class="pull-right">
					<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
					<a onclick="return add_album();" class="m-btn orange save" href="#">Добавить альбомы</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Panel Add Albums -->


<!-- Modal Collection Settings -->
<div class="modal panel-modal" id="ModalCollectionSettings">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Настройки коллекции</h3>
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
										<input name="seo_title_edit" type="text"  value="<?= $this->page['seo_title']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="collection_keywords">Ключевые слова (Keywords)</label>
									<div class="controls">
										<textarea name="seo_keywords_edit" type="text"><?= $this->page['seo_keywords']; ?></textarea>
										<input type="hidden" name="id_doc_edit" value="<?= $this->page['id_doc']; ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="seo_description_edit">Описание (Description)</label>
									<div class="controls">
										<textarea name="seo_description_edit" type="text"><?= $this->page['seo_description']; ?></textarea>
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
				<div class="row-fluid">
					<div class="pull-right">
						<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
						<a class="btn btn-orange btn-large" href="#" onclick="return save_page();">Сохранить настройки</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end .panel-settings-body -->
</div><!-- end Modal Collection Settings -->


<script>
					function add_album()
					{
						var select = $('#selectable');
						var sort = $('#sortable');
						var id_ = $('#-777');
						var ar_new = Array();
						var ar_have = Array();

						$('#sortable').children().each(function()
						{
							if (this.id != -777) {
								ar_have.push(this.id);
							}
						});
						$('#selectable').children().each(function() {
							if ($(this).hasClass('ui-selected')) {
								ar_new.push(this.id);
							}
						});

						var id_page = $('input[name="id_doc_edit"]').val();
						$.post("/admin/sort_added_albums", {'ar_new': ar_new, 'ar_have': ar_have, 'id_page': id_page}, function(data) {
							if (data == 1) {
								$('#selectable').children().each(function() {
									if ($(this).hasClass('ui-selected')) {
										$(this).removeClass('ui-selected ui-selectee');
										var my = $(this).detach();
										my.insertBefore(id_);
									}
								});
							}
							;
						}), 'json';
						return false;
					}
</script>



<!-- сохранение -->	
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