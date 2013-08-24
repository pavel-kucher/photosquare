<script>
	$(document).ready(
			function()
			{
				$('#redactor_content').redactor({
					focus: true,
					imageGetJson: "<?= URL . 'admin/all_images_and_previews'; ?>"
				});
			}
	);
	/* тут сформировать списки изображений для отображения */
</script>
<? /* var_dump($this->page); */ ?>


<div class="col-mid redactor">
	<div class="col-mid-inner">

		<div class="col-top">
			<div class="col-top-inner">
				<h3>Редактирование записи</h3>
				<div class="buttons">
					<a class="btn" href="#ModalSettings" data-toggle="modal"><i class="icon icon-search icon-white"></i> SEO Параметры</a>
					<a class="btn" href="#HelpEditEntry" data-toggle="modal"><i class="icon-question-sign icon-white"></i> Помощь</a>
				</div>
			</div>
		</div><!-- end .col-top -->


		<form action="<?= URL . 'admin/save_page_edits/' . $this->page['id_doc']; ?>" onsubmit="return save_page_edits(this);" method="post">
			<div class="col-content">
				<div class="col-content-inner" id="col-mid">
					<div class="postarea">

						<div class="title-row">
							<div class="title-row-inner">
								<input name="title_edit_page" type="text" value="<?= $this->page['document_header']; ?>" placeholder="Введите заголовок">
							</div>
						</div>

						<textarea id="redactor_content" name="content" placeholder="Начните вводить свой текст здесь...">
							<?= $this->page['doc_text']; ?>
						</textarea>

					</div><!-- end .postarea -->
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->

			<div class="col-bottom">
				<div class="col-bottom-inner">
					<input class="btn btn-large btn-orange pull-right" type="submit" value="Сохранить изменения" name="send" />
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->
		</form>

	</div><!-- end .col-mid-inner -->
</div><!-- end .col-mid -->


<!-- Modal Panel Page Settings -->
<div class="modal panel-modal" id="ModalSettings">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>SEO параметры</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="box">
					<div id="box-seo" class="box-body">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="page_title">Заголовок (Title)</label>
									<div class="controls">
										<input name="page_title" type="text">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="page_descr">Описание (Description)</label>
									<div class="controls">
										<textarea name="page_descr" type="text"></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="page_keywords">Ключевые слова (Keywords)</label>
									<div class="controls">
										<textarea name="page_keywords" type="text"></textarea>
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
					<a class="btn btn-large" data-dismiss="modal">Отменить</a>
					<a class="btn btn-large btn-orange" href="#">Сохранить настройки</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Modal Page Settings -->


<!-- Динамический скролл -->
<script>
	$(function()
	{
		var settings = {
			showArrows: true
		};
		var pane = $('#col-mid')
		pane.jScrollPane(settings);
		var api = pane.data('jsp');
		var i = 1;
		// Every second add some new content...
		setInterval(
				function()
				{
					api.reinitialise();
				},
				100
				);
	});
</script>


<!-- Сохранение страинцы -->
<script>
	function save_page_edits(obj) {
		/*obj.attr("action",$(this).val());*/
		var title = $('input[name=title_edit_page]').val();
		var content = $('#redactor_content').val();
		var send = $(obj).attr("action");
		$.post(send, {title: title, content: content}, function(data) {
			if (data == '1') {
				alert('ok save page');
			}
		});
		return false;

		/* arr = new Array();
		 arr.push($('input[name=document_header_edit]').val());
		 arr.push($('select[name=publish_edit]').val());
		 arr.push($('input[name=name_menu_edit]').val()); 
		 arr.push($('textarea[name=doc_text_edit]').val());
		 arr.push($('input[name=paswd_page_edit]').val()); 
		 arr.push($('input[name=seo_title_edit]').val());
		 arr.push($('textarea[name=seo_description_edit]').val()); 
		 arr.push($('textarea[name=seo_keywords_edit]').val()); 
		 arr.push($('input[name=id_doc_edit]').val()); 
		 var send = '#'+$('input[name=id_doc_edit]').val();
		 send = $(send);*/
		/*$.post("< ?=URL.'admin/save_document_edits';?>", {mas: arr}, function(data){
		 if(data == '1'){ send.text($('input[name=name_menu_edit]').val());}});	return false;*/
	}
</script>
<!-- Сохранение страинцы -->

<!-- Добавление изображений -->	
<script>
	function add_images()
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
		//t.each(function(){ alert('dwd');})
		var id_page = $('input[name="id_doc_edit"]').val();
		$.post("/admin/sort_added_images", {'ar_new': ar_new, 'ar_have': ar_have, 'id_page': id_page}, function(data) {
			if (data == 1) {
				var bl = 0;
				$('#selectable').children().each(function() {
					if ($(this).hasClass('ui-selected')) {
						bl++;
						/*image_name_change*/
						$(this).removeClass('ui-selected');
						/*$(this).find('a').removeClass('ui-selectee');*/
						$(this).find('a').addClass('image_name_ch');
						alert('а');
						var my = $(this).detach();
						my.insertBefore(id_);
					}
				});
				if (bl)
					$('.image_name_ch').editable();
			}
			;
		}), 'json';
		return false;
	}
</script>
<!-- Добавление изображений -->