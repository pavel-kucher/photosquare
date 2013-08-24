<div class="lay-three-col">
	<div id="menu_select_left" class="col-left">
		<div class="col-left-inner">
			<div class="col-top">
				<div class="col-top-inner">
					<h3>Библиотека</h3>
					<div class="dropdown">
						<a class="btn" href="#" data-toggle="dropdown"><i class="icon icon-plus icon-white"></i> Добавить</a>
						<ul class="dropdown-menu dropdown-m" role="menu">
							<li><a href="#ModalAddAlbum" data-toggle="modal"><span class="icon_album"></span>Альбом</a></li>
							<li><a href="#ModalAddCollection" data-toggle="modal"><span class="icon_collection"></span>Кооллекция</a></li>
						</ul>
					</div>
				</div><!-- end .col-top-inner -->
			</div><!-- end .col-top -->

			<div class="col-content">
				<div class="col-content-inner">


					<ul class="all-list library-list">
						<li id="lib_all_images">
							<span class="item">
								<a class="edit_page" href="<?= URL . 'admin/library/lib_all_images'; ?>">
									<span class="album">Все изображения</span>
								</a>
							</span>
						</li>
						<li id="lib_last_upload">
							<span class="item">
								<a class="edit_page" href="<?= URL; ?>admin/library/lib_last_upload">
									<span class="album">Последние загруженные</span>
								</a>
							</span>
						</li>
					</ul>

					<div class="divider-gorisontal"></div>

					<ul id="-1" class="all-list library-list con_Sortable main_sort">
						<?
						$albums = $this->pages;
						foreach ($albums as $key):
							?>
							<? if ($key['publish'] == '1'): ?>
								<? if ($key['type_parent'] != 'collection'): ?>
									<? if ($key['type_state'] == 'collection'): ?>
										<li class="collection_page" id="<?= $key['id_doc']; ?>">
											<span class="item">
												<a class="edit_page" href="<?= URL . 'admin/library/' . $key['type_state'] . '/' . $key['id_doc']; ?>">
													<span id="<?= $key['id_doc']; ?>" class="<?= $key['type_state']; ?>"><?= $key['name_menu']; ?></span>
												</a>
												<a href="#" class="del"></a>
											</span>
											<ul id="<?= $key['id_doc']; ?>"  class="all-list con_Sortable collection_list">
												<? foreach ($albums as $page): ?>
													<? if (($page['parent_id'] == $key['id_doc']) && ($page['type_state'] == 'album') && ($page['publish'] == '1')): ?>
														<li class="lib_drop_album" id="<?= $page['id_doc']; ?>_album">
															<span class="item">
																<a class="edit_page" href="<?= URL . 'admin/library/' . $page['type_state'] . '/' . $page['id_doc']; ?>">
																	<span id="<?= $page['id_doc']; ?>" class="<?= $page['type_state']; ?>"><?= $page['name_menu']; ?></span>
																</a>
																<a href="#" class="del"></a>
															</span>
														</li>
													<? endif; ?>
												<? endforeach; ?>
											</ul>
										</li>
									<? else: ?> 
										<? if ($key['type_state'] == 'album'): ?>
											<li class="lib_drop_album" id="<?= $key['id_doc']; ?>_album">
												<span class="item">
													<a class="edit_page" href="<?= URL . 'admin/library/' . $key['type_state'] . '/' . $key['id_doc']; ?>">
														<span id="<?= $key['id_doc']; ?>" class="<?= $key['type_state']; ?>"><?= $key['name_menu']; ?></span>
													</a>
													<a href="#" class="del"></a>
												</span>
											</li>
										<? endif; ?>
									<? endif; ?>
								<? endif; ?>	
							<? endif; ?>	
						<? endforeach; ?>
					</ul>

				</div><!-- end .col-content-inner -->
			</div><!-- end .col-content -->

			<div class="col-bottom">
				<div class="col-bottom-inner">
					<ul>
						<li id="lib_trash" class="trash">
							<a class="edit_page" href="<?= URL . 'admin/library/lib_trash'; ?>">
								<span>Корзина</span>
							</a>
						</li>
					</ul>
				</div><!-- end .col-bottom-inner -->
			</div><!-- end .col-bottom -->

		</div><!-- end .col-left-inner -->
	</div> <!-- end .col-left -->

	<a href="#ModalDownload" class="btn btn-large btn-orange btn-download" data-toggle="modal">Загрузить изображения</a>

	<div id="edit_page_selected"><!-- редактируемая страница -->