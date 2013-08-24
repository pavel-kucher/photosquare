<!-- Modal Add Links -->
<div class="modal panel-modal add-links" id="ModalAddLinks">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Добавить ссылку</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel-add" class="scroll-content">
			<div class="scroll-content-inner">
				Тут будет список имеющегося материала
			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->
		<div class="modal-footer">
			<div class="modal-footer-inner">
				<div class="pull-right">
					<a class="btn btn-large btn-orange" onclick="return add_images();" href="#">Готово</a>
				</div>
			</div>
		</div>
	</div><!-- end .panel-settings-body -->
</div><!-- end Modal Add Links -->


<!-- Modal Edit Component -->
<div class="modal edit-component in" id="EditComponent">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Настройка слайдера</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel-add" class="scroll-content">
			<div class="scroll-content-inner">
				<p align="center">Выберите какой альбом будет отображаться в слайдере</p>
				
				<div class="divider-gorisontal"></div>
				
				<div class="box">
					<div class="box-head">
						<h3><a class="accordion-toggle" href="#box-albums" data-toggle="collapse"><i class="icon-sheet"></i> Альбомы</a></h3>
					</div>
					<div id="box-albums" class="box-body collapse in">
						<div class="box-body-inner">
							<ul class="all-list">
								<li class="simple_page">
									<span class="preview">
										
									</span>
									<span class="info">
										
									</span>
									
									<span class="toggle">
										<a class="btn" href="#">Добавить</a>
									</span>
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="home">Главная</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="album">Faces</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="album">Wedding</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="collection">Коллекция</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="page">Обо мне</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="page">Контакты</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li class="simple_page">
									<span class="item">
										<a href="<?=URL;?>admin/text/page">
											<span class="link">Группа вконтакте</span>
										</a>
										<a href="#" class="del"></a> 
									</span>
								</li>
								<li>
									<span class="item">
										<a class="btn-add-link black" href="#ModalAddLinks" data-toggle="modal"><i class="icon icon-plus icon-white"></i> Добавить</a>
									</span>
								</li>
							</ul>
							
						</div>
					</div>
				</div><!-- end.box -->
				
				<ul class="list grid">
					<li>
						<span class="grid-data">
							<span class="content">
								<span class="image">
									<input id="pic-001" type="radio" name="id[]" />
									<label for="pic-001"><img src="/storage/cache/previews/51a5a92c61e59.jpg" alt=""></label>
								</span>
								<span class="caption">
									<span class="name">51a5a92c61e59</span>
								</span>
							</span>
						</span>
					</li>
					<li>
						<span class="grid-data">
							<span class="content">
								<span class="image">
									<input id="pic-002" type="radio" name="id[]" />
									<label for="pic-002"><img src="/storage/cache/previews/51a431c822810.jpg" alt=""></label>
								</span>
								<span class="caption">
									<span class="name">51a431c822810</span>
								</span>
							</span>
						</span>
					</li>
					<li>
						<span class="grid-data">
							<span class="content">
								<span class="image">
									<input id="pic-004" type="radio" name="id[]" />
									<label for="pic-004"><img src="/storage/cache/previews/51a431ce799a4.jpg" alt=""></label>
								</span>
								<span class="caption">
									<span class="name">51a5a92c61e59</span>
								</span>
							</span>
						</span>
					</li>
					<li>
						<span class="grid-data">
							<span class="content">
								<span class="image">
									<input id="pic-005" type="radio" name="id[]" />
									<label for="pic-005"><img src="/storage/cache/previews/51a5a92c61e59.jpg" alt=""></label>
								</span>
								<span class="caption">
									<span class="name">51a5a92c61e59</span>
								</span>
							</span>
						</span>
					</li>
				</ul>
				
			</div><!-- end .scroll-content-inner -->
		</div><!-- end .scroll-content -->
	</div><!-- end .panel-settings-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
				<a class="btn btn-large btn-orange" href="#" onclick="return add_images();">Сохранить</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Add Links -->