	<script> 
		$(document).ready(
			function()
			{
				$('#redactor_content').redactor({
					focus: true,
					imageGetJson: "<?=URL.'admin/all_images_and_previews';?>"  
				});
			}
		);
			/* тут сформировать списки изображений для отображения */
	</script>
	<?/* var_dump($this->page);*/?>


	<div class="col-mid redactor">
		<div class="col-mid-inner">

			<div class="col-top">
				<div class="col-top-inner">
					<h3>Редактирование страницы</h3>
					<div class="buttons">
						<a class="m-btn black" href="#"><i class="icon-question-sign icon-white"></i></a>
						<a id="ShowPanelSettings" href="#" class="m-btn black"><i class="icon icon-cog icon-white"></i> Настройки страницы</a>
					</div>
				</div>
			</div><!-- end .col-top -->
			
			
			<form action="<?=URL.'admin/save_page_edits/'.$this->page['id_doc'];?>" onsubmit="return save_page_edits(this);" method="post">
				<div class="col-content">
					<div class="col-content-inner" id="col-mid">
						<div class="postarea">

							<div class="title-row">
								<div class="title-row-inner">
									<input name="title_edit_page" type="text" value="<?=$this->page['document_header'];?>" placeholder="Введите заголовок">
								</div>
							</div>

							<textarea id="redactor_content" name="content" placeholder="Начните вводить свой текст здесь...">
							<?=$this->page['doc_text'];?>
							</textarea>

						</div><!-- end .postarea -->
					</div><!-- end .col-content-inner -->
				</div><!-- end .col-content -->

				<div class="col-bottom">
					<div class="col-bottom-inner">
						<input class="m-btn orange save pull-right" type="submit" value="Сохранить изменения" name="send" />
					</div><!-- end .col-bottom-inner -->
				</div><!-- end .col-bottom -->
			</form>
			
		</div><!-- end .col-mid-inner -->
	</div><!-- end .col-mid -->

</div><!-- end .lay-two-col -->


<!-- Modal Panel Settings -->
<div class="modal panel-modal" id="panel-settings">
	<div class="modal-header">
		<button id="ClosePanelSettings" class="close">×</button>
		<h3>Настройки страницы</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-properties"><i class="icon-sheet"></i> Свойства</a></h3>
					</div>
					<div id="box-properties" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">	
								<div class="control-group">
									<label class="control-label" for="collection_h1">Название</label>
									<div class="controls">
										<input name="collection_h1" type="text" value="Красота">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="status">Статус</label>
									<div class="controls">
										<select>
											<option>Опубликовано</option>
											<option>Черновик</option>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="collection_link_name">Текст ссылки в меню</label>
									<div class="controls">
										<input name="collection_link_name" type="text" value="Красота">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="collection_description">Описание</label>
									<div class="controls">
										<textarea name="collection_description" type="text" readonly="readonly">dfgdfgdfgdfg</textarea>
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
									<label class="control-label" for="collection_h1">Пароль</label>
									<div class="controls">
										<input name="collection_h1" type="password" value="">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="collection_description">Ссылка на страницу</label>
									<div class="controls">
										<textarea name="collection_description" type="text" readonly="readonly">http://fedoseeva-foto.ru/krasota/</textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->
				
				<div class="divider-gorisontal"></div>
				
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#box-seo-options"><i class="icon-sheet"></i> SEO параметры</a></h3>
					</div>
					<div id="box-seo-options" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="collection_title">Заголовок (Title)</label>
									<div class="controls">
										<input name="collection_title" type="text">
									</div>
								</div>
										
								<div class="control-group">
									<label class="control-label" for="collection_descr">Описание (Description)</label>
									<div class="controls">
										<textarea name="collection_descr" type="text"></textarea>
									</div>
								</div>
										
								<div class="control-group">
									<label class="control-label" for="collection_keywords">Ключевые слова (Keywords)</label>
									<div class="controls">
										<textarea name="collection_keywords" type="text"></textarea>
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
					<a id="ClosePanelSettings2" class="m-btn black cansel" href="#">Отменить</a>
					<a class="m-btn orange save" href="#">Сохранить настройки</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Modal2 panel-settings -->


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
function save_page_edits(obj){	
/*obj.attr("action",$(this).val());*/
var title = $('input[name=title_edit_page]').val();
var content = $('#redactor_content').val();
var send = $(obj).attr("action");
$.post(send, {title: title, content: content}, function(data){
	if(data == '1'){ alert('ok save page');  }});
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
			{ if(this.id != -777){ ar_have.push(this.id);}});
			$('#selectable').children().each(function(){ if($(this).hasClass('ui-selected')){ ar_new.push(this.id);}});
			//t.each(function(){ alert('dwd');})
			var id_page = $('input[name="id_doc_edit"]').val();
			$.post("/admin/sort_added_images", {'ar_new': ar_new, 'ar_have': ar_have, 'id_page': id_page }, function(data){	if(data == 1){ 
						var bl=0;
						$('#selectable').children().each(function(){
						if($(this).hasClass('ui-selected')){
							bl++;
							/*image_name_change*/
							$(this).removeClass('ui-selected');
							/*$(this).find('a').removeClass('ui-selectee');*/
							$(this).find('a').addClass('image_name_ch');
							alert('а');
							var my = $(this).detach();
							my.insertBefore(id_);}
							});	
							if(bl)$('.image_name_ch').editable();
				};
			}),'json';
			return false;
		}
	</script>
<!-- Добавление изображений -->


<!-- Инициализация всплывающего окна -->
<script>
	form_show('panel-settings', 'ShowPanelSettings', 'ClosePanelSettings', 'ClosePanelSettings2');
	form_show('PanelAdd', 'ShowPanelAdd', 'ClosePanelAdd', 'ClosePanelAdd2');
</script>