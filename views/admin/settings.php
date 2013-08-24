<div class="lay-two-col">
	<div class="col-left">
		<div class="col-left-inner">
			<div class="col-top">
				<div class="col-top-inner">
					<h3>Настройки</h3>
				</div><!-- end .col-top-inner -->
			</div><!-- end .col-top -->
			
			<div class="col-content">
				<div class="col-content-inner">
					<ul class="menu-tabs all-list">
						<li class="active">
							<a href="#site" data-toggle="tab">Сайт</a>
						</li>
						<li>
							<a href="#admin" data-toggle="tab">Администратор</a>
						</li>
						<li>
							<a href="#system" data-toggle="tab">Система</a>
						</li>
					</ul>
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
			
		</div><!-- end .col-left-inner -->
	</div> <!-- end .col-left -->
	
	<div class="col-mid">
		<div class="col-mid-inner">
			
			<div class="col-top">
				<div class="col-top-inner">
					<h3>Настройки</h3>
					<div class="buttons">
						<a class="m-btn black" href="#"><i class="icon-question-sign icon-white"></i></a>
					</div>
				</div>
			</div><!-- end .col-top -->
			
			<div class="col-content">
				<div class="col-content-inner">
					<div class="tab-content">
						<div class="tab-pane active" id="site">
							<h1>Сайт</h1>
							<form class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="sitename">Название сайта</label>
									<div class="controls">
										<input class="span6" name="sitename" value="Фотограф Андрей" type="text"> <a href="#example" rel="popover" data-content="Отображается на каждой странице. Если ничего не введено, будет использовано ваше имя"><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
				
								<div class="control-group">
									<label class="control-label" for="tagline">Подзаголовок сайта</label>
									<div class="controls" style="position: relative;">
										<input class="span6" name="tagline" value="запечатлю самые яркие моменты вашей жизни" type="text"> <a href="#example" rel="popover" data-content="Отображается обычно под заголовком сайта. Это может быть слоган или вид вашей деятельности"><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
				
								<div class="control-group">
									<label class="control-label" for="footer_text">Текст в нижней части страницы (copyright)</label>
									<div class="controls">
										<textarea class="span6" name="footer_text" type="text">© 2011–2013 Фотограф Мелёшин Андрей</textarea> <a href="#example" rel="popover" data-content="Этот текст будет отображаться в нижней части страницы."><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="counter_code">Ключ <a target="_blank" href="http://www.google.com/analytics/" rel="tooltip" title="Перейти на сайт для получения ключа">Google Analytics</a></label>
									<div class="controls">
										<input class="span6" name="counter_code" value="UA-12345678-1" type="text" /> <a href="#example" rel="popover" data-content="Google Analytics является бесплатным и мощным инструментом для просмотра статистики и посещаемости вашего сайта."><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="footer_text">Иконка сайта</label>
									<div class="controls">
										<input type="hidden" id="csrf" name="csrf" value=""/>
										<input type="file" id="file" name="file" size="25"/>
										<input type="submit" id="upload_file" name="upload_file" value="Загрузить" class="btn"/> <a href="#example" rel="popover" data-content="Изображение иконки будет автоматически уменьшено до размеров 16px*16px. Поддерживаемые типы изображений JPEG, PNG, GIF и ICO."><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<input class="m-btn orange save" type="submit" value="Сохранить" />
									</div>
								</div>
							</form>
						</div><!-- end #site -->
						
						<div class="tab-pane" id="admin">
							<h1>Администратор</h1>
							<form class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="admin_email">Адрес e-mail</label>
									<div class="controls">
										<input class="span6" name="admin_email" value="melstone@mail.ru" type="text"> <a href="#example" rel="popover" data-content="Укажите адрес электронной почты, которую вы используете чаще всего. На нее будут отправляться уведомления системы."><span><i class="icon-question-sign"></i></span></a>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="first_name">Имя</label>
									<div class="controls controls-row">
										<input class="span3" name="first_name" value="Андрей" type="text">
										<input class="span3" name="last_name"  value="Мелёшин" type="text">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="old_password">Пароль</label>
									<div class="controls controls-row">
										<input class="span2" name="old_password" type="text" placeholder="Старый пароль">
										<input class="span2" name="pass1" type="text" placeholder="Новый пароль">
										<input class="span2" name="pass2" type="text" placeholder="Подтвердить">
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<input class="m-btn orange save" type="submit" value="Сохранить" />
									</div>
								</div>
							</form>
						</div><!-- end #admin -->
						
						<div class="tab-pane" id="system">
							<h1>Система</h1>
							<form class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="sitename">Адрес сайта</label>
									<div class="controls">
										<span class="label"><?=URL?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="sitename">Дисковое пространство</label>
									<div class="controls">
										<span class="label">164Мб / 1000Мб</span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="sitename">Шаблон</label>
									<div class="controls">
										<span class="label">Maria</span>
									</div>
								</div>
							</form>
						</div><!-- end #system -->
						
					</div><!-- end .tab-content -->
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
			
			<div class="col-bottom">
				<div class="col-bottom-inner">
					
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
				
		</div><!-- end .col-mid-inner -->
	</div><!-- end .col-mid -->
</div><!-- end .lay-two-col -->