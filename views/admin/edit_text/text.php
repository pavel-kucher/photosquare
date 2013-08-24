<div class="lay-two-col">
	<div class="col-left">
		<div class="col-left-inner">
			<div class="col-top">
				<div class="col-top-inner">
					<h3>Текст</h3>
					<div class="dropdown">
						<a class="btn" href="#" data-toggle="dropdown"><i class="icon icon-plus icon-white"></i> Добавить</a>
						<ul class="dropdown-menu dropdown-m" role="menu">
							<li><a href="#ModalAddPage" data-toggle="modal"><span class="icon_page"></span>Страница</a></li>
							<li><a href="#ModalAddRubric" data-toggle="modal"><span class="icon_rubric"></span>Рубрика</a></li>
						</ul>
					</div>
				</div><!-- end .col-top-inner -->
			</div><!-- end .col-top -->
			
			<div class="col-content">
				<div class="col-content-inner">
					
					<div class="box">
						<div class="box-head">
							<h3><a class="accordion-toggle" href="#box-pages" data-toggle="collapse"><i class="icon-sheet"></i> Страницы</a></h3>
						</div>
						<div id="box-pages" class="box-body collapse in">
							<div class="box-body-inner">
								<ul class="all-list">
									<li class="simple_page" style="opacity: 0.5;" title="Неопубликовано">
										<span class="item">
											<a href="<?=URL;?>admin/text/page">
												<span class="page">Страничка</span>
											</a>
										</span>
									</li>
									<li class="simple_page">
										<span class="item">
											<a href="<?=URL;?>admin/text/page">
												<span class="page">Обо мне</span>
											</a>
										</span>
									</li>
									<li class="simple_page">
										<span class="item">
											<a href="<?=URL;?>admin/text/page">
												<span class="page">Контакты</span>
											</a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- end.box -->
					
					<div class="box">
						<div class="box-head">
							<h3><a class="accordion-toggle" href="#box-rubrics" data-toggle="collapse"><i class="icon-sheet"></i> Рубрики</a></h3>
						</div>
						<div id="box-rubrics" class="box-body collapse in">
							<div class="box-body-inner">
								<ul class="all-list">
									<li class="simple_page">
										<span class="item">
											<a href="<?=URL;?>admin/text/rubric">
												<span class="drop_menu">Блог</span>
											</a>
											<a href="#ModalAddEntry" class="add" data-toggle="modal"></a>
										</span>
									</li>
									<li class="simple_page">
										<span class="item">
											<a href="<?=URL;?>admin/text/rubric">
												<span class="drop_menu">Новости</span>
											</a>
											<a href="#ModalAddEntry" class="add" data-toggle="modal"></a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- end.box -->
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
			
			<div class="col-bottom">
				<div class="col-bottom-inner">
					<ul>
						<li id="lib_trash" class="trash">
							<a class="edit_page" href="<?=URL.'admin/library/lib_trash';?>">
								<span>Корзина</span>
							</a>
						</li>
					</ul>
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->
			
		</div><!-- end .col-left-inner -->
	</div> <!-- end .col-left -->