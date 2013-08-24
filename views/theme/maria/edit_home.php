
	<div class="col-mid redactor">
		<div class="col-mid-inner">

			<div class="col-top">
				<div class="col-top-inner">
					<h3><i class="icon icon-home icon-white"></i> Главная</h3>
					<div class="buttons">
						<a class="m-btn black" href="#"><i class="icon-question-sign icon-white"></i></a>
						<a id="ShowPanelSettings" href="#" class="m-btn black"><i class="icon icon-cog icon-white"></i> Настройки главной</a>
					</div>
				</div>
			</div><!-- end .col-top -->
			
			<div class="col-content">			
				<div class="col-content-inner" id="col-mid">
					
					<div id="edit-area">
						<div class="wrapper">
						
							<div class="header">
								<div class="logo component">
									Логотип
								</div>	
								<div class="menu component">
									Меню
								</div>
							</div><!-- end .header -->
							
							<div class="content">
								<div class="slider component">
									
										<div class="component-title">Слайдер <a id="ShowPanelAdd" href="#"><i class="icon icon-pencil icon-white"></i></a></div>
									<ul class="rslides">
										<li><img src="/storage/cache/001.jpg" alt=""></li>
										<li><img src="/storage/cache/002.jpg" alt=""></li>
										<li><img src="/storage/cache/003.jpg" alt=""></li>
									</ul>
								</div>
							</div><!-- end .content -->
							
							<div class="footer component">
								&copy; Copyright
							</div>
						</div><!-- end .wrapper -->
					</div><!-- end #edit-area -->
					
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
			
			<div class="col-bottom">
				<div class="col-bottom-inner">
					<input class="m-btn orange save pull-right" type="submit" value="Сохранить изменения" name="send" />
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->
				
		</div><!-- end .col-mid-inner -->
	</div><!-- end .col-mid -->
</div><!-- end .lay-two-col -->


		
<!-- Modal Panel Settings -->
<div class="modal panel-modal" id="panel-settings">
	<div class="modal-header">
		<button id="ClosePanelSettings" class="close">×</button>
		<h3>Настройки</h3>
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
									<label class="control-label" for="home_link_name">Текст ссылки в меню</label>
									<div class="controls">
										<input name="home_link_name" type="text" value="Главная">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="collection_description">Ссылка на страницу</label>
									<div class="controls">
										<textarea name="collection_description" type="text" readonly="readonly">http://fedoseeva-foto.ru/</textarea>
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


<!-- Modal Panel Slider -->
<div class="modal panel-modal add-images" id="PanelAdd">
	<div class="modal-header">
		<button id="ClosePanelAdd" class="close">×</button>
		<h3>Слайдер</h3>
	</div>
	
	<div class="modal-body">
		<div id="scroll-panel-add" class="scroll-content">
			<div class="scroll-content-inner">
				
				<ul class="menu-tabs">
					<li><a href="#edit-images" data-toggle="tab"><i class="icon icon-picture icon-white"></i> Редактировать изображения</a></li>
					<li><a href="#add-images" data-toggle="tab"><i class="icon icon-plus icon-white"></i> Добавить изображения</a></li>
					<li class="active"><a href="#download-images" data-toggle="tab"><i class="icon icon-download icon-white"></i> Загрузить с компьютера</a></li>
				</ul>
				
				
				<div class="tab-content">
					<div class="tab-pane" id="edit-images">
						<div class="list list-image list-image">
							<ul id="sortable">
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/001.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">001</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/002.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">002</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/003.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">003</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
							</ul>
							<!-- Сортировка -->
							<script>
								$(function(){
									$("#sortable")
									.sortable({ handle: ".handle", revert: true, items: "li:not(.btn-add)", placeholder: "list-placeholder", stop: function(event, ui){ $("#message").show();
									arr = new Array();
									$(this).children().each(function(){	arr.push(this.id);});
									var id_page = $('input[name="name_album"]').val();
									$.post("/admin/sort_photos_in_album", {'mas': arr, 'id_page': id_page }, function(o){ $("#message").hide();}),'json';}})
									.selectable({ cancel: ".btn-add, .name" })
									.find( "li" )
								});
							</script>
						</div><!-- end .list-album -->
					</div><!-- end .tab-pane#edit-images -->
					
					<div class="tab-pane" id="add-images">
						<div class="list list-image list-image2">
							<ul id="selectable">
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a5a92c61e59.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a5a92c61e59</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a431c822810.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a431c822810</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a431ca1132c.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a431ca1132c</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a431ce799a4.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a431ce799a4</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a431d4aeaac.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a431d4aeaac</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
								<li>
								   <span class="grid-data">
									   <span class="content">
											<span class="image">
												<img src="/storage/cache/images/51a431d0263a1.jpg" alt="">
											</span>
											<span class="caption">
												<span class="name">
													<a href="#">51a431d0263a1</a>
												</span>
											</span>
									   </span>
									   <div class="action">
											<a href="#" class="handle"></a>
										</div>
								   </span>
								</li>
							</ul>
							<script>
							  $(function() {
								$( "#selectable" ).selectable({ cancel: ".btn-add, .name" });
							  });
							</script>
						</div><!-- end .list-album -->
					</div><!-- end .tab-pane#add-images -->
					
					<div class="tab-pane active" id="download-images">
						<div class="drop-area-wrap">
							<div class="drop-area">
								<h4>Перетащите сюда изображения и отпустите</h4>
							</div>
							<p>или</p>
							<a href="#" class="m-btn orange save">Выберите с компьютера</a>
						</div>
					</div><!-- end #admin -->
					
				</div><!-- end .tab-content -->
			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->
		
		<div class="modal-footer">
			<div class="modal-footer-inner">
				<div class="pull-left">
					<a class="m-btn black cansel" href="#">Удалить выбранные</a>
					<a class="m-btn black cansel" href="#">Добавить</a>
				</div>
				<div class="pull-right">
					<a class="m-btn orange save" href="#">Сохранить изменения</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Modal Panel Add Images -->


<!-- Инициализация всплывающего окна -->
<script>
	form_show('panel-settings', 'ShowPanelSettings', 'ClosePanelSettings', 'ClosePanelSettings2');
	form_show('PanelAdd', 'ShowPanelAdd', 'ClosePanelAdd');
</script>
