<div class="lay-two-col">
	<div class="col-left">
		<div class="col-left-inner">
			<div class="col-top">
				<div class="col-top-inner">
					<h3 style="float: left;">Навигация</h3>
					<div class="dropdown">
						<a class="m-btn black" href="#" data-toggle="dropdown"><i class="icon icon-plus icon-white"></i> Добавить</a>
						<ul class="dropdown-menu dropdown-m" role="menu" aria-labelledby="dLabel">
							<li><a id="ShowPanelNewAlbum" href="#"><span class="icon_album"></span>Альбом</a></li>
							<li><a id="ShowPanelNewCollection" href="#"><span class="icon_collection"></span>Кооллекция</a></li>
							<li><a id="ShowPanelNewPage" href="#"><span class="icon_page"></span>Страница</a></li>
							<li><a id="ShowPanelNewLink" href="#"><span class="icon_link"></span>Ссылка</a></li>
							<li><a id="ShowPanelNewDropDownMenu" href="#"><span class="icon_dropdown"></span>Выпадающий список</a></li>
							<li><a id="ShowPanelNewCalendar" href="#"><span class="icon_calendar"></span>Календарь</a></li>
						</ul>
					</div>
				</div><!-- end .col-top-inner -->
			</div><!-- end .col-top -->
			
			<div class="col-content">
				<div class="col-content-inner" id="col-left">
					<ul id="main_sort" class="droptrue all-list">
						<?  $pages = $this->pages;
						foreach ($pages as $key ):?>
						<? if($key['parent_id'] == '-1'): ?>
							<? if ($key['type_state'] == 'drop_menu'): ?>
								<li class="menu_page" id="<?=$key['id_doc'];?>">
									<span class="item">
										<a class="edit_page" href="<?=URL.'admin/structure/'.$key['type_state'].'/'.$key['id_doc'];?>">
											<span id="<?=$key['id_doc'];?>" class="<?=$key['type_state'];?>"><?=$key['name_menu'];?></span>
										</a>
										<a href="#" class="del"></a>
									</span>
									<ul id="sortable2" class="droptrue all-list">
										<? foreach ($pages as $page): ?>
											<? if ($page[parent_id] == $key[id_doc]):?>
											<li class="simple_page" id="<?=$page['id_doc'];?>">
												<span class="item">
													<a class="edit_page" href="<?=URL.'admin/structure/'.$page['type_state'].'/'.$page['id_doc'];?>">
														<span id="<?=$page['id_doc'];?>" class="<?=$page['type_state'];?>"><?=$page['name_menu'];?></span>
													</a>
													<a href="#" class="del"></a>
												</span>
											</li>
											<? endif; ?>
										<? endforeach;  ?>
									</ul>
								</li>
							<? else: ?>        
							<li class="simple_page" id="<?=$key['id_doc'];?>">
								<span class="item">
									<a class="edit_page" href="<?=URL.'admin/structure/'.$key['type_state'].'/'.$key['id_doc'];?>">
										<span id="<?=$key['id_doc'];?>" class="<?=$key['type_state'];?>"><?=$key['name_menu'];?></span>
									</a>
									<a href="#" class="del"></a>
								</span>
							</li>	
							<? endif;?>
						<? endif;?>		
						<? endforeach;?>
					</ul>
				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->
			
			<div class="col-bottom">
				<div class="col-bottom-inner">
					<input type="button" class="m-btn orange save" onclick="Send_menu_list();" value="Сохранить порядок" />
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->
			
		</div><!-- end .col-left-inner -->
	</div> <!-- end .col-left -->
	
	<div id="edit_page_selected"><!-- редактируемая страница -->