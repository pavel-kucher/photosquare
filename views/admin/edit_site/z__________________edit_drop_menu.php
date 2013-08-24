<div class="col-mid">
	<div class="col-mid-inner">
		<div class="col-top">
			<div class="col-top-inner">
				<h3><i class="icon icon-file icon-white"></i> Редактирование выпадающего списка</h3>
				<div class="buttons">
					<a class="m-btn black" href="#"><i class="icon-question-sign icon-white"></i></a>
				</div>
			</div>
		</div><!-- end .col-top -->
		<div class="col-content">			
			<div class="col-content-inner" id="col-mid" style="padding-top: 40px;">
				<form method="post" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="link_title">Заголовок *</label>
						<div class="controls">
							<input class="span4" type="text" name="link_title">
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<input class="m-btn orange save" type="submit" name="sdfsdfsdfsd" value="Сохранить">
						</div>
					</div>
				</form>
			</div><!-- end .col-content-inner -->
		</div><!-- end .col-content -->
		
		<div class="col-bottom">
			<div class="col-bottom-inner">
				<a class="m-btn black cansel" href="#"><i class="icon-trash icon-white"></i> Удалить выбранные</a>
				<input type="hidden" id="124f1" name="name_album" value="<?=$this->id_page;?>">
			</div><!-- end .col-bottom-inner -->
		</div><!-- end .col-bottom -->
			
	</div><!-- end .col-mid-inner -->
</div><!-- end .col-mid -->


<!-- Сохранение страинцы -->
<script>
function save_page(){	arr = new Array();	arr.push($('input[name=document_header_edit]').val()); arr.push($('select[name=publish_edit]').val()); arr.push($('input[name=name_menu_edit]').val()); arr.push($('textarea[name=doc_text_edit]').val()); arr.push($('input[name=paswd_page_edit]').val()); arr.push($('input[name=seo_title_edit]').val()); arr.push($('textarea[name=seo_description_edit]').val()); arr.push($('textarea[name=seo_keywords_edit]').val()); arr.push($('input[name=id_doc_edit]').val()); 
	var send = '#'+$('input[name=id_doc_edit]').val(); send = $(send);	$.post("<?=URL.'admin/save_document_edits';?>", {mas: arr}, function(data){ if(data == '1'){ send.text($('input[name=name_menu_edit]').val());}});	return false;}
</script>
<!-- Сохранение страинцы -->