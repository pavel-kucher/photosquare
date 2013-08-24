</div><!-- редактируемая страница edit_page_selected-->
</div><!-- end .lay-two-col -->


<!-- Modal Add New Page -->
<div class="modal" id="ModalAddPage">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Создать страницу</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal"  id="page_add" method="post" onsubmit="return submit_page();" action="/admin/edit_page">
			<div class="control-group">
				<label class="control-label" for="page_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="page_title" name="page_title">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="page_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="page_slug_input" name="page_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?= URL; ?></span>
						<input class="span4 slug-input" id="page_slug" name="page_slug" type="text" disabled>
					</span>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal">Отменить</a>
				<input class="btn btn-large btn-orange" type="submit" value="Создать страницу" name="create_page">
			</div>
		</div>
	</div>
</div><!-- end Modal New Page -->


<!-- Modal Add New Rubric -->
<div class="modal" id="ModalAddRubric">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Создать рубрику</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal"  id="page_add" method="post" onsubmit="return submit_page();" action="/admin/edit_page">
			<div class="control-group">
				<label class="control-label" for="page_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="page_title" name="page_title">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="page_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="page_slug_input" name="page_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?= URL; ?></span>
						<input class="span4 slug-input" id="page_slug" name="page_slug" type="text" disabled>
					</span>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal">Отменить</a>
				<input class="btn btn-large btn-orange" type="submit" value="Создать рубрику" name="create_page">
			</div>
		</div>
	</div>
</div><!-- end Modal New Rubric -->


<!-- Modal Add New Entry -->
<div class="modal" id="ModalAddEntry">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3>Создать запись в рубрике [переменная рубрики]</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal"  id="page_add" method="post" onsubmit="return submit_page();" action="/admin/edit_page">
			<div class="control-group">
				<label class="control-label" for="page_title">Заголовок *</label>
				<div class="controls">
					<input class="span4" type="text" id="page_title" name="page_title">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="page_slug_input">URL</label>
				<div class="controls">
					<input class="span4" id="page_slug_input" name="page_slug_input" type="text">
					<span class="help-block slug-block">
						<span><?= URL; ?></span>
						<input class="span4 slug-input" id="page_slug" name="page_slug" type="text" disabled>
					</span>
				</div>
			</div>
		</form>
	</div><!-- end .modal-body -->
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal">Отменить</a>
				<input class="btn btn-large btn-orange" type="submit" value="Создать запись" name="create_page">
			</div>
		</div>
	</div>
</div><!-- end Modal New Single -->