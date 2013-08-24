<?

class Admin extends Controller {

	public function __construct() {
		parent::__construct();
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function index($url_edit = '', $url_id = -1) {
		Auth::handleLogin();
		$this->view->pages = $this->model->AllPages();
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			if ($url_edit == '') {
				$this->view->albums		 = $this->model->AllPages();
				$this->view->all_images	 = $this->model->All_Images();
				$this->view->render('admin/edit_library/library', TRUE);
				$this->view->render('admin/edit_library/lib_edit_all_images', TRUE);
				$this->view->render('admin/edit_library/library_footer', TRUE);
			} elseif ($url_edit != '') {
				switch ($url_edit) {
					case 'lib_all_images': $this->lib_all_images();
						break;
					case 'lib_last_upload': $this->lib_last_upload();
						break;
					case '': $this->lib_all_images();
						break;
					case 'collection': $this->lib_collection($url_id);
						break;
					case 'album': $this->lib_album($url_id);
						break;
					case 'lib_trash': $this->lib_trash();
						break;
					default: echo 'error not found page';
						break;
				}
			}
		} else { /* не pajx */
			$this->view->albums = $this->model->AllPages();
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/edit_library/library', TRUE);
			switch ($url_edit) {
				case 'lib_all_images': $this->lib_all_images();
					break;
				case 'lib_last_upload': $this->lib_last_upload();
					break;
				case '': $this->lib_all_images();
					break;
				case 'collection': $this->lib_collection($url_id);
					break;
				case 'album': $this->lib_album($url_id);
					break;
				case 'lib_trash': $this->lib_trash();
					break;
				default: echo 'error not found page';
					break;
			}
			$this->view->render('admin/edit_library/library_footer', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function site($url_edit = '', $url_id = -1) {
		Auth::handleLogin();
		$this->view->pages = $this->model->AllPages();
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			if (($url_edit == '') or ($url_edit == '')) {
				$this->view->render('admin/edit_site/site', TRUE);
				$this->view->render('admin/edit_site/site_index', TRUE);
				$this->view->render('admin/edit_site/site_footer', TRUE);
			} elseif (($url_edit != '') and ($url_id > -1)) {
				switch ($url_edit) {
					case 'album': $this->web_edit_album($url_id);
						break;
					case 'page': $this->web_edit_page($url_id);
						break;
					case 'drop_menu': $this->web_edit_drop_menu($url_id);
						break;
					case 'collection': $this->web_edit_collection($url_id);
						break;
					case 'link': $this->web_edit_link($url_id);
						break;
					case 'home': $this->web_edit_home($url_id);
						break;
					default: echo 'error not found';
						break;
				}
			}
		} else {
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/edit_site/site', TRUE);
			if (($url_edit == '') or ($url_edit == 'home')) {
				$this->view->render('admin/edit_site/site_index', TRUE);
			} elseif (($url_edit != '') and ($url_id > -1)) {
				switch ($url_edit) {
					case 'album': $this->web_edit_album($url_id);
						break;
					case 'page': $this->web_edit_page($url_id);
						break;
					case 'post': $this->web_edit_post($url_id);
						break;
					case 'collection': $this->web_edit_collection($url_id);
						break;
					case 'home': $this->web_edit_home($url_id);
						break;
					default: echo 'error not found';
						break;
				}
			}
			$this->view->render('admin/edit_site/site_footer', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	function web_edit_album() {
		$this->view->render('admin/edit_site/site_edit_album', TRUE);
	}

	function web_edit_page() {
		$this->view->render('admin/edit_site/site_edit_page', TRUE);
	}

	function web_edit_collection() {
		$this->view->render('admin/edit_site/site_edit_collection', TRUE);
	}

	function web_edit_post() {
		$this->view->render('admin/edit_site/site_edit_post', TRUE);
	}

	function web_edit_home() {
		$this->view->render('admin/edit_site/site_edit_home', TRUE);
	}

	function edit_drop_menu($_id = -1) {
		$this->view->title	 = 'редактирование меню';
		$this->view->page	 = $this->model->page($_id);
		$this->view->render('admin/edit_states/edit_drop_menu', TRUE);
	}

	/* function edit_collection($_id = -1){ Auth::handleLogin(); $this->view->title = 'Edit collection'; $_id = (int)$_id; $page_info = $this->model->page($_id); $this->view->page = $page_info[0]; $this->view->collections = $this->model->albums_load($_id); $this->view->collections_nload = $this->model->albums_load_excluding($_id); $this->view->render('admin/edit_states/edit_collection', TRUE);} */

	function edit_link($_id = -1) {
		Auth::handleLogin();
		$this->view->title	 = 'Edit link';
		$this->view->page	 = $this->model->page($_id);
		$this->view->render('admin/edit_states/edit_link', TRUE);
	}

	function edit_home($_id = -1) {
		Auth::handleLogin();
		$this->view->title	 = 'Edit link';
		$this->view->page	 = $this->model->page($_id);
		$this->view->render('theme/' . THEME . '/edit_home', TRUE);
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function lib_all_images() {
		$this->view->all_images = $this->model->All_Images();
		$this->view->render('admin/edit_library/lib_edit_all_images', TRUE);
	}

	function lib_last_upload() {
		$this->view->lib_last_upload = $this->model->lib_last_images();
		$this->view->render('admin/edit_library/lib_last_upload', TRUE);
	}

	function lib_collection($_id = -1) {
		Auth::handleLogin();
		$this->view->title				 = 'Edit collection';
		$_id							 = (int) $_id;
		$page_info						 = $this->model->page($_id);
		$this->view->page				 = $page_info[0];
		$this->view->collections		 = $this->model->albums_load($_id);
		$this->view->collections_nload	 = $this->model->albums_load_excluding($_id);
		$this->view->render('admin/edit_library/lib_edit_collection', TRUE);
	}

	function lib_album($_id_album = -1) {
		$this->view->lib_album_images	 = (($_id_album != '') && ($_id_album > -1)) ? $this->model->images_load($_id_album) : array();
		$page_info						 = $this->model->page($_id_album);
		$this->view->page				 = $page_info[0];
		$this->view->render('admin/edit_library/lib_edit_album', TRUE);
	}

	function lib_trash() {
		$this->view->trash_images = $this->model->images_load_trash();
		$this->view->render('admin/edit_library/lib_edit_trash', TRUE);
	}

	/**  не используемые но реализованные * */
	/*
	  function lib_unlisted_images(){$this->view->lib_unlisted_images = $this->model->lib_unlisted_images();
	  $this->view->render('admin/edit_library/lib_unlisted_images', TRUE);}
	 */

	function library($url_edit = '', $url_id = -1) {
		Auth::handleLogin();
		$this->view->pages = $this->model->All_library();
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			if ($url_edit == '') {
				$this->view->albums		 = $this->model->All_library();
				$this->view->all_images	 = $this->model->All_Images();
				$this->view->render('admin/edit_library/library', TRUE);
				$this->view->render('admin/edit_library/lib_edit_all_images', TRUE);
				$this->view->render('admin/edit_library/library_footer', TRUE);
			} elseif ($url_edit != '') {
				switch ($url_edit) {
					case 'lib_all_images': $this->lib_all_images();
						break;
					case 'lib_last_upload': $this->lib_last_upload();
						break;
					case '': $this->lib_all_images();
						break;
					case 'collection': $this->lib_collection($url_id);
						break;
					case 'album': $this->lib_album($url_id);
						break;
					case 'lib_trash': $this->lib_trash();
						break;
					default: echo 'error not found page';
						break;
				}
			}
		} else { /* не pajx */
			$this->view->albums = $this->model->All_library();
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/edit_library/library', TRUE);
			switch ($url_edit) {
				case 'lib_all_images': $this->lib_all_images();
					break;
				case 'lib_last_upload': $this->lib_last_upload();
					break;
				case '': $this->lib_all_images();
					break;
				case 'collection': $this->lib_collection($url_id);
					break;
				case 'album': $this->lib_album($url_id);
					break;
				case 'lib_trash': $this->lib_trash();
					break;
				default: echo 'error not found page';
					break;
			}
			$this->view->render('admin/edit_library/library_footer', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function txt_edit_page($_id = -1) {
		Auth::handleLogin();
		$pg					 = ($_id == -1) ? $this->model->page($_id) : array();
		$this->view->page	 = $pg[0];
		$this->view->render('admin/edit_text/txt_edit_page', TRUE);
	}

	/*   переписать */

	function txt_edit_rubric($_id = -1) {
		Auth::handleLogin();
		$pg					 = ($_id == -1) ? $this->model->page($_id) : array();
		$this->view->page	 = $pg[0];
		$this->view->render('admin/edit_text/txt_edit_rubric', TRUE);
	}

	function txt_edit_entry($_id = -1) {
		Auth::handleLogin();
		$pg					 = ($_id == -1) ? $this->model->page($_id) : array();
		$this->view->page	 = $pg[0];
		$this->view->render('admin/edit_text/txt_edit_entry', TRUE);
	}

	function text($url_edit = '', $url_id = -1) {
		Auth::handleLogin();
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			if ($url_edit == '') {
				$this->view->albums		 = $this->model->AllPages();
				$this->view->all_images	 = $this->model->All_Images();
				$this->view->render('admin/edit_text/text', TRUE);
				$this->view->render('admin/edit_text/txt_index', TRUE);
				$this->view->render('admin/edit_text/text_footer', TRUE);
			} elseif ($url_edit != '') {
				switch ($url_edit) {
					case 'page': $this->txt_edit_page($url_id);
						break;
					case 'rubric': $this->txt_edit_rubric();
						break;
					case 'entry': $this->txt_edit_entry();
						break;
					case '': $this->view->render('admin/edit_text/txt_index', TRUE);
						break;
					default: echo 'error not found';
						break;
				}
			}
		} else { /* не pajx */
			$this->view->albums = $this->model->AllPages();
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/edit_text/text', TRUE);
			switch ($url_edit) {
				case 'page': $this->txt_edit_page($url_id);
					break;
				case 'rubric': $this->txt_edit_rubric();
					break;
				case 'entry': $this->txt_edit_entry();
					break;
				case '': $this->view->render('admin/edit_text/txt_index', TRUE);
					break;
				default: echo 'error not found';
					break;
			}
			$this->view->render('admin/edit_text/text_footer', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function logout() {
		Auth::handleLogin();
		Session::destroy();
		header('location: ' . URL);
		exit();
	}

	function settings() {
		Auth::handleLogin();
		$this->view->title = 'settings';
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			$this->view->render('admin/settings', TRUE);
		} else {
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/settings', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	function statistics() {
		Auth::handleLogin();
		$this->view->title = 'statistics';
		if (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true') {
			$this->view->render('admin/statistics', TRUE);
		} else {
			$this->view->render('admin/header', TRUE);
			$this->view->render('admin/statistics', TRUE);
			$this->view->render('admin/footer', TRUE);
		}
	}

	/*	 * ************************************************************************************************************************************** */
	/*	 * ************************************************************************************************************************************* */
	/*	 * ************************************	    												******************************************* */
	/*	 * *********************************************************************************************************************************** */
	/*	 * ********************************************************************************************************************************** */

	function lib_trash_images() {
		$array_del_images = $_POST['array_images'];
		if (count($array_del_images) > 0)
			$this->model->lib_delete_photos($array_del_images);
	}

	function album_trash_images() /* удаление из альбома изображений но из остальных не удаляет */ {
		$array_del_images	 = $_POST['array_images'];
		$id_album			 = (int) $_POST['lib_album'];
		if (count($array_del_images) > 0)
			$this->model->album_delete_photos($id_album, $array_del_images);
	}

	function lib_album_img_trans() {
		$array_images	 = $_POST['array_images'];
		$id_album_curr	 = (int) $_POST['lib_album'];
		$id_album		 = (int) $_POST['lib_new_album'];
		if (count($array_images) > 0)
			$this->model->lib_album_img_trans($id_album, $id_album_curr, $array_images);
	}

	/* полнрое удаление из корзины фото */

	function lib_fully_trash_img() {
		$array_del_images		 = $_POST['array_images'];
		$array_images_all_del	 = $_POST['array_images_all'];
		if ((count($array_del_images) > 0) || (count($array_images_all_del) > 0))
			$this->model->lib_fully_trash_img($array_del_images, $array_images_all_del);
	}

	/* полнрое удаление из корзины фото */

	function lib_trash_restore_img() {
		$array_images		 = $_POST['array_images'];
		$array_images_all	 = $_POST['array_images_all'];
		if ((count($array_images) > 0) || (count($array_images_all) > 0))
			$this->model->lib_trash_restore_img($array_images, $array_images_all);
	}

	function album_images_to_all() /* удаление из альбома изображений но из остальных не удаляет */ {
		$array_del_images	 = $_POST['array_images'];
		$id_album			 = (int) $_POST['lib_album'];
		if (count($array_del_images) > 0)
			$this->model->album_images_to_all($id_album, $array_del_images);
	}

	function lib_album_img_add() {
		$array_images	 = $_POST['array_images'];
		$id_album		 = (int) $_POST['lib_album'];
		if (count($array_images) > 0)
			$this->model->lib_images_toAlbum($id_album, $array_images);
	}

	function save_sortable_structure_library() {
		$massive_id_parents	 = array();
		$massive_id_elements = array();
		foreach ($_POST['mass_sub'] as $mas) {
			$massive_id_parents[] = (int) $mas;
		}
		foreach ($_POST['mas_stek'] as $mas) {
			$massive_id_elements[] = (int) $mas;
		}
		if ((count($massive_id_parents) > 0) && (count($massive_id_parents) > 0)) {
			$this->model->lib_save_sortable_structure_library($massive_id_elements, $massive_id_parents);
		}
		else
			echo 'Error 112';
	}

	function edit_album_select_images() {
		Auth::handleLogin();
		$this->view->title	 = 'Add photos';
		$this->view->js		 = array('js/jquery.filedrop.js');
		$this->view->css	 = array('css/upload_photo.css');
		$this->view->js_end	 = array('js/admin_js/upload.js');
		$_id				 = $_POST['name_album'];
		$this->view->id_page = $_id;
		$images				 = $this->model->images_load_excluding($_id);
		$this->view->images	 = $images;
		$this->view->render('admin/header', TRUE);
		$this->view->render('admin/edit_states/edit_album_select_images', TRUE);
		$this->view->render('admin/footer', TRUE);
	}

	function save_document_edits() {
		$_mass_states = array();
		foreach ($_POST["mas"] as $mas) {
			$_mass_states[] = $mas;
		}
		if (count($_mass_states) == 9) {
			echo $this->model->save_document_edits($_mass_states);
		} elseif (count($_mass_states) == 7) {
			echo $this->model->save_document_page_edits($_mass_states);
		} else {
			echo 'error';
		}
	}

	function save_sortable_structure_site($_id = -1) {
		$_mass_states = array();
		foreach ($_POST["mas"] as $mas) {
			$_mass_states[] = $mas;
		} $this->model->save_sortable_structure_site($_mass_states);
	}

	function save_sortable_structured_submenu($_id = -1) {
		$_mass_states	 = array();
		$count_states	 = count($_POST["mas"]);
		if ($count_states > 0) {
			foreach ($_POST["mas"] as $mas) {
				$_mass_states[] = $mas;
			} $_id_menu = (int) $_POST["id_menu"];
			$this->model->save_sortable_structured_submenu($_id_menu, $_mass_states);
		}
		else
			echo 'not list for pages '; die();
	}

	function control_translit_name() {
		$_translit_document_name = (string) $_POST['document_slug'];
		$_name_document_added	 = (string) $_POST['document_name'];
		$_document_parent_id	 = (int) $_POST['document_parent_id'];
		$_document_type			 = (string) $_POST['document_type'];
		if (($_translit_document_name != '') && ($_name_document_added != '') && ( $_document_parent_id != '')) {
			$this->model->control_save_translit_name($_name_document_added, $_translit_document_name, $_document_parent_id, $_document_type);
		} else {
			echo 'error void string';
		}
	}

	function delete_page($_id) {
		$this->model->delete_page($_id);
	}

	function change_name() {
		$__id	 = (int) $_POST['name'];
		$_name	 = (string) $_POST['value'];
		$this->model->change_name($__id, $_name);
	}

	function delete_photo() {
		$__id = (int) $_POST['id'];
		$this->model->delete_photo($__id);
	}

	function delete_photo_fully() {
		$__id = (int) $_POST['id'];
		$this->model->delete_photo_fully($__id);
	}

	function sendFile() {
		$__id = (int) $_POST['id'];
		$this->model->sendFile($__id);
	}

	function save_photos($_id = -1) {
		$this->model->save_photos($_id);
	}

	function sort_photos_in_album($_id = -1) {
		$_massive_photo = array();
		foreach ($_POST["mas"] as $mas) {
			$_massive_photo[] = $mas;
		} $_id = (int) $_POST["id_page"];
		$this->model->sort_photos_in_album($_id, $_massive_photo);
	}

	function sort_albums_in_collection($_id = -1) {
		$_massive_albums = array();
		foreach ($_POST["mas"] as $mas) {
			$_massive_albums[] = $mas;
		} $_id = (int) $_POST["id_page"];
		$this->model->sort_albums_in_collection($_id, $_massive_albums);
	}

	function sort_added_albums($_id = -1) {
		$_massive_new = array();
		if (count($_POST["ar_new"]) == 0)
			exit('error not new albums'); foreach ($_POST["ar_new"] as $mas) {
			$_massive_new[] = $mas;
		} $_massive_have = array();
		if (count($_POST["ar_have"]) != 0) {
			foreach ($_POST["ar_have"] as $mas) {
				$_massive_have[] = $mas;
			}
		} else {
			$_massive_have = array();
		} $_id = (int) $_POST["id_page"];
		$this->model->sort_added_albums_coll($_id, $_massive_new, $_massive_have);
	}

	function sort_added_images($_id = -1) {
		$_massive_new = array();
		if (count($_POST["ar_new"]) == 0)
			exit('error not new albums');foreach ($_POST["ar_new"] as $mas) {
			$_massive_new[] = $mas;
		}
		$_massive_have = array();
		if (count($_POST["ar_have"]) != 0) {
			foreach ($_POST["ar_have"] as $mas) {
				$_massive_have[] = $mas;
			}
		} else {
			$_massive_have = array();
		}$_id = (int) $_POST["id_page"];
		$this->model->sort_added_images_alb($_id, $_massive_new, $_massive_have);
	}

	function save_page_edits($_id = -1) {
		$_id = (int) $_id;
		if ($_id >= 0) {
			$content = stripslashes($_POST['content']);
			$title	 = stripslashes($_POST['title']);
			$this->model->save_page_edits($_id, $title, $content);
		} else {
			echo 'error 140';
		}
	}

	function all_images_and_previews() {
		$_images = $this->model->all_images_sort_date();
		$_albums = $this->model->all_albums();
		$_links	 = $this->model->all_links_images();
		$albums	 = array();
		foreach ($_albums as $key => $album) {
			$albums[$album['id_doc']] = $album['name_menu'];
		}$photos = array();
		foreach ($_images as $key => $photo) {
			$photos[$photo['id_photo']]['name_str']	 = $photo['name_photo'];
			$photos[$photo['id_photo']]['preview']	 = $photo['preview_photo'];
			$photos[$photo['id_photo']]['name_page'] = $photo['name_in_page'];
		} $arr = array();
		$i	 = 0;
		foreach ($photos as $photo) {
			$arr[$i]['thumb']	 = URL . STORAGE_PREVIEW . $photo['name_str'];
			$arr[$i]['image']	 = URL . STORAGE_PHOTO . $photo['preview'];
			$arr[$i]['title']	 = $photo['name_page'];
			$arr[$i]['folder']	 = 'all photos';
			$i++;
		}
		foreach ($_links as $key => $link) {
			$arr[$i]['thumb']	 = URL . STORAGE_PREVIEW . $photos[$link['id_photo_link']]['name_str'];
			$arr[$i]['image']	 = URL . STORAGE_PHOTO . $photos[$link['id_photo_link']]['preview'];
			$arr[$i]['title']	 = $photos[$link['id_photo_link']]['name_page'];
			$arr[$i]['folder']	 = $albums[$link['id_state_link']];
			$i++;
		}echo str_replace('\/', '/', json_encode($arr));
	}

}

;
?>