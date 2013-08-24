	<div class="col-mid redactor">
		<div class="col-mid-inner">

			<div class="col-top">
				<div class="col-top-inner">
					<div class="buttons-left">
						<div class="dropdown">
							<a class="btn black" href="#" data-toggle="dropdown"><i class="icon icon-filter icon-white"></i> Сортировать</a>
							<ul class="dropdown-menu" role="menu">
								<li class="active"><a href="#">По алфавиту</a></li>
								<li><a href="#">По дате создания <span>&#8593;</span></a></li>
								<li><a href="#">По дате создания <span>&#8595;</span></a></li>
							</ul>
						</div>
					</div>
					<h3>Рубрика [Название рубрики]</h3>
					<div class="buttons">
						<a class="btn" href="#ModalSettings" data-toggle="modal"><i class="icon icon-cog icon-white"></i> Настройки рубрики</a>
						<a class="btn" href="#HelpRubric" data-toggle="modal"><i class="icon-question-sign icon-white"></i></a>
					</div>
				</div>
			</div><!-- end .col-top -->

			<div class="col-content">
				<div class="col-content-inner" id="col-mid">
					<ul class="entry-list">
						<li>
							<span class="date">
								<span class="day">22</span>
								<span class="my">Янв 2011</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Я начал вести блог! Всем привет!</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
						<li>
							<span class="date">
								<span class="day">12</span>
								<span class="my">Дек 2010</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Уже 10 записей в блоге! Суперрр</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
						<li>
							<span class="date">
								<span class="day">08</span>
								<span class="my">Дек 2010</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Как я провел лето в деревне...</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
						<li>
							<span class="date">
								<span class="day">29</span>
								<span class="my">Ноб 2010</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Давай поговорим на тему баб</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
						<li>
							<span class="date">
								<span class="day">22</span>
								<span class="my">Янв 2011</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Как похудеть</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
						<li>
							<span class="date">
								<span class="day">12</span>
								<span class="my">Дек 2010</span>
							</span>
							<span class="title"><a href="<?=URL;?>admin/text/entry">Как накачать себе попец</a></span>
							<span class="delete"><a href="#"></a></span>
						</li>
					</ul>
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->

			<div class="col-bottom">
				<div class="col-bottom-inner">
					
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->
			
		</div><!-- end .col-mid-inner -->
	</div><!-- end .col-mid -->


<!-- Modal Panel Rubric Settings -->
<div class="modal panel-modal" id="ModalSettings">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Настройки рубрики</h3>
	</div>
	<div class="modal-body">
		<div id="scroll-panel" class="scroll-content">
			<div class="scroll-content-inner">
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-toggle="collapse" href="#box-main"><i class="icon-sheet"></i> Основные параметры</a></h3>
					</div>
					<div id="box-main" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical" style="margin: 0;">	
								<div class="control-group">
									<label class="control-label" for="rubric_title">Название</label>
									<div class="controls">
										<input name="rubric_title" type="text" value="Новости">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="posts_per_page">Кол-во записей на странице</label>
									<div class="controls">
										<input name="posts_per_page" class="span1" value="10" id="Title" size="16" type="number">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="use_excerpt">Отображать</label>
									<div class="controls">
										<select name="use_excerpt">
											<option value="use">Анонс</option>
											<option value="no-use">Полный текст</option>
										</select>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- end.box -->

				<div class="divider-gorisontal"></div>
				
				<div class="box">
					<div class="box-head">
						<a class="accordion-toggle" data-toggle="collapse" href="#box-seo"><i class="icon-sheet"></i> SEO параметры</a></h3>
					</div>
					<div id="box-seo" class="box-body collapse in">
						<div class="box-body-inner">
							<form class="form-vertical">
								<div class="control-group">
									<label class="control-label" for="rubric_title">Заголовок (Title)</label>
									<div class="controls">
										<input name="rubric_title" type="text">
									</div>
								</div>
										
								<div class="control-group">
									<label class="control-label" for="rubric_descr">Описание (Description)</label>
									<div class="controls">
										<textarea name="rubric_descr" type="text"></textarea>
									</div>
								</div>
										
								<div class="control-group">
									<label class="control-label" for="rubric_keywords">Ключевые слова (Keywords)</label>
									<div class="controls">
										<textarea name="rubric_keywords" type="text"></textarea>
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
					<a class="btn btn-large" data-dismiss="modal" aria-hidden="true">Отменить</a>
					<a class="btn btn-large btn-orange" href="#">Сохранить настройки</a>
				</div>
			</div>
		</div>
	</div><!-- end .modal-body -->
</div><!-- end Modal Rubric Settings -->


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
