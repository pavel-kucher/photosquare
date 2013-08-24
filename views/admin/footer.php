</div><!-- end #main -->

<script>
	/*	подсветка меню при перезагрузке страницы	*/
	back_light_main();
</script>


<!-- Modal Logo -->
<div class="modal" id="Logo">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Photosquare</h3>
	</div>
	<div class="modal-body">
		<p>Version 1.0.0</p>
		<p>Разработчики: Мелёшин Андрей, Кучер Павел</p>
	</div>
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal" aria-hidden="true">Закрыть</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Logo -->


<!-- Modal Profile -->
<div class="modal" id="Profile">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Информация</h3>
	</div>
	<div class="modal-body">
		<p>Тут что-нибудь будет</p>
	</div>
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal" aria-hidden="true">Закрыть</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Profile -->


<!-- Modal Shortcuts -->
<div class="modal" id="Shortcuts">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Горячие клавиши</h3>
	</div>
	<div class="modal-body">
		<p>Тут будут клавиши для быстрых действий</p>
	</div>
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" data-dismiss="modal" aria-hidden="true">Закрыть</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Shortcuts -->

<!-- Modal Exit -->
<div class="modal" id="Exit">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Выйти</h3>
	</div>
	<div class="modal-body">
		<p>Вы уверены, что хотите выйти?</p>
	</div>
	<div class="modal-footer">
		<div class="modal-footer-inner">
			<div class="pull-right">
				<a class="btn btn-large" href="#" data-dismiss="modal">Отменить</a>
				<a class="btn btn-large" href="<?php echo URL; ?>admin/logout">Выйти</a>
			</div>
		</div>
	</div>
</div><!-- end Modal Exit -->



<!-- Автоматический подсчет высоты окна браузера -->
<style id="Style_col-left">
	#col-left { width: 100% !important; height: 600px !important; }
</style>
<style id="Style_col-right">
	#col-right { height: 600px !important; }
</style>
<style id="Style_col-mid">
	#col-mid { width: 100% !important; height: 600px !important; }
</style>
<style id="Style_scroll-panel">
	#scroll-panel { width: 500px !important; height: 600px !important; }
</style>
<style id="Style_scroll-panel-add">
	#scroll-panel-add { width: 100% !important; height: 600px !important; }
</style>


<!-- Автоматический подсчет высоты окна браузера -->
<script>
	$(document).ready(function() {
		function scroll_panel(e) {
			var windowHeight = $(window).height() - 118;
			var b = $(e).html();
			$(e).html(b.replace("height: 600", "height: " + windowHeight))
		}
		scroll_panel('#Style_scroll-panel')

		function scroll_panel_add(f) {
			var windowHeight = $(window).height() - 190;
			var b = $(f).html();
			$(f).html(b.replace("height: 600", "height: " + windowHeight))
		}
		scroll_panel_add('#Style_scroll-panel-add')

		function col_left(c) {
			var windowHeight = $(window).height() - 128; // 144 старое
			var b = $(c).html();
			$(c).html(b.replace("height: 600", "height: " + windowHeight))
		}
		col_left('#Style_col-left')

		function col_right(h) {
			var windowHeight = $(window).height() - 128; // 144 старое
			var b = $(h).html();
			$(h).html(b.replace("height: 600", "height: " + windowHeight))
		}
		col_right('#Style_col-right')

		function col_mid(d) {
			var windowHeight = $(window).height() - 128;
			var b = $(d).html();
			$(d).html(b.replace("height: 600", "height: " + windowHeight))
		}
		col_mid('#Style_col-mid')
	});</script>
<!-- Конец Автоматический подсчет высоты окна браузера -->


<!-- Вертикальный скроллинг -->
<script>
	$(function()
	{
		$('#scroll-panel').jScrollPane();
		$('#scroll-panel-add').jScrollPane();
		$('#col-left').jScrollPane();
		$('#col-right').jScrollPane();
		$('#col-mid').jScrollPane();
	});
</script>
<!-- Конец Вертикальный Скроллинг -->

</body>
</html>