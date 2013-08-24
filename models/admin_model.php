<?php class Admin_model extends Model{ function __construct(){ parent::__construct();}
public function AllPages(){$pages = $this->db->select('SELECT * FROM paper ORDER BY st_num');return $pages=(count($pages)==0)?array():$pages;}

public function All_library(){$pages = $this->db->select('SELECT * FROM paper ORDER BY state_sub');return $pages=(count($pages)==0)?array():$pages;}

public function All_Images(){ $images = $this->db->select('SELECT * FROM photos  WHERE flag = 0 ORDER BY date_upload ', array('id_state_link' => $_id)); if(!count($images))array();return $images;}

public function page($_id) { return $this->db->select('SELECT * FROM paper WHERE id_doc = :id_doc', array('id_doc' => $_id));}
public function control_save_translit_name($_name_document_added, $_translit_document_name, $_document_parent_id, $_document_type)
{
    $availability = $this->db->select('SELECT * FROM paper WHERE translit_name = :translit_name', array('translit_name' => $_translit_document_name)); 
    if (count($availability) == 0)
    { echo $this->db->insert('paper', array('translit_name' => $_translit_document_name, 'name_menu' => $_name_document_added, 'seo_title' => $_name_document_added, 'parent_id' => $_document_parent_id, 'st_num' => '0','publish' => '1', 'type_state' => $_document_type)); 
    $last_id = $this->db->lastInsertId(); $pages_is_st = $this->db->select('SELECT id_doc, st_num, parent_id  FROM paper');/* все страницы с id*/
    $st_num_menu  = 0; $st_max = 1;
    $pages_st_big = array(); 
    if($_document_parent_id == -1){
	foreach ($pages_is_st as $key => $value){  $st_max = ($st_max < $value['st_num'])?$value['st_num']:$st_max;} 
	echo $this->db->update('paper',array('st_num' => $st_max+1), ' id_doc ='.$last_id);/*  если в основное меню то просто записываем в него в конец*/
	
    } else {
	foreach ($pages_is_st as $key => $value)/*обходим до конца все элементы меню если нет то берем позицию отца**/
	{ 
	    if($_document_parent_id ==  $value['id_doc']){ $st_num_menu = $st_num_menu<$value['st_num']?$value['st_num']:$st_num_menu ;} 
	    if($_document_parent_id ==  $value['parent_id']){ $st_num_menu = $st_num_menu<$value['st_num']?$value['st_num']:$st_num_menu ;}
	}
	foreach ($pages_is_st as $key => $value){ if($st_num_menu < $value['st_num']){ $pages_st_big[] = $value;}}
	if(count($pages_st_big))
	{
	    foreach ($pages_st_big as $value){ $this->db->update('paper', array('st_num' => ($value['st_num']+1)),' id_doc ='.$value['id_doc']);}
	    $this->db->update('paper', array('st_num' => ($st_num_menu+1)) ,' id_doc ='. $last_id);
	} 
    }
     echo $last_id;
    }else{ echo '-1';}
}

public function delede_page($_id){ return $this->db->delete('paper', array('id_doc' => $_id));}
public function save_photos($_id){ function exit_status($str){ echo json_encode(array('status' => $str)); exit;}
function get_extension($file_name){ $ext = explode('.', $file_name); $ext = array_pop($ext); return strtolower($ext);} if ($_id == -1) { exit_status("$_id");} $upload_dir = 'storage/cache/images/'; $allowed_ext = array('jpg', 'jpeg', 'png', 'gif'); if (strtolower($_SERVER['REQUEST_METHOD']) != 'post'){ exit_status('Ошибка при отправке запроса на сервер!');} if (array_key_exists('pic', $_FILES) && $_FILES['pic']['error'] == 0){ $pic = $_FILES['pic']; $extension = get_extension($pic['name']); if (!in_array(get_extension($pic['name']), $allowed_ext)){ exit_status('Разрешена загрузка следующих форматов: ' . implode(',', $allowed_ext));} $dir_name_photo = uniqid(); if (move_uploaded_file($pic['tmp_name'], $upload_dir . $dir_name_photo . '.' . $extension)){ $name_in_page = current(explode('.', $pic['name'])); $this->db->insert('photos', array('name_photo' => $dir_name_photo . '.' . $extension, 'size' => $pic['size'], 'name_in_page' => $name_in_page)); $insert = $this->db->lastInsertId(); $this->db->insert('state_link_photo', array('id_state_link' => $_id,'id_photo_link' => $insert)); exit_status('ok_! Файл Был успешно загружен!');}} exit_status('Во время загрузки произошли ошибки');}

public function images_load($_id)
{ $images = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE id_state_link = :id_state_link ORDER BY position_image', array('id_state_link' => $_id)); 
if(count($images)){ $arr = ''; $sort = ''; 
foreach ($images as $link => $value){ $sort .= ($sort == '') ? $value['id_photo_link'] : ',' . $value['id_photo_link'];}
foreach ($images as $link => $value){ $arr .= ($arr == '') ? '(' . $value['id_photo_link'] : ',' . $value['id_photo_link'];} $arr .= ')'; 
$images = $this->db->select('SELECT id_photo,name_photo,`size`,date_upload,name_in_page,flag FROM photos WHERE id_photo IN ' . $arr . " ORDER BY FIND_IN_SET(id_photo,'" . $sort . "')");} 
return $images; }

public function images_load_trash()
{ $images = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE id_state_link = :id_state_link', array('id_state_link' => -33)); 
$array_images = array();
foreach ($images as $link => $value){
$image = $this->db->select('SELECT id_photo,name_photo,`size`,date_upload,name_in_page,flag FROM photos WHERE id_photo ='.$value['id_photo_link']); 
$array_images[] = $image[0];}
return $array_images; }


public function lib_last_images()
{
    $images = $this->db->select('SELECT * FROM photos WHERE flag = 1');
    $images = count($images)?$images:array(); return $images;
}

public function lib_unlisted_images()
{
	$images = $this->db->select('SELECT DISTINCT id_photo_link FROM state_link_photo');
	$arr = '';
	foreach ($images as $link => $value){
	$arr .= ($arr == '') ? '(' . $value['id_photo_link'] : ',' . $value['id_photo_link'];}
	$arr .= ')'; 
	$images = $this->db->select('SELECT id_photo,name_photo,`size`,date_upload,name_in_page FROM photos WHERE id_photo NOT IN ' . $arr);
	$images = count($images)?$images:array(); return $images;
}

public function sort_photos_in_album($_id, $_massive_photo){ $count_photos = count($_massive_photo); $order = ''; for ($i = 1; $i <= $count_photos; $i++){ $order .= ($order == '')? $i : ','.$i;} $arr = array(); foreach ($_massive_photo as $key => $value){ $arr[] = $value;} $arra = ''; for ($i = 1; $i <= $count_photos; $i++){ $this->db->update('state_link_photo', array('position_image' => $i), ' (`id_photo_link` ='.$arr[$i-1].' AND `id_state_link` ='.$_id.')');}} 
public function images_load_excluding($_id){
	$images = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE id_state_link = :id_state_link', array('id_state_link' => $_id));
	$arr = '';
	foreach ($images as $link => $value){
	$arr .= ($arr == '') ? '(' . $value['id_photo_link'] : ',' . $value['id_photo_link'];}
	$arr .= ')'; 
	$images = $this->db->select('SELECT id_photo,name_photo,`size`,date_upload,name_in_page FROM photos WHERE id_photo NOT IN ' . $arr);
	return $images;}

public function sort_added_images_coll($_id, $_massive_new, $_massive_have)
{ $ct_albums = count($_massive_have); if($ct_albums != 0){ for ($i = 1; $i <= $ct_albums; $i++)
{ $this->db->update('collection_link_albums', array('position_album' => $i), ' (`id_album_link` ='.$_massive_have[$i-1]['id_doc'].' AND `id_collection_link` ='.$_id.')');}}
	for ($i = 1; $i <= count($_massive_new); $i++){
		$this->db->insert('collection_link_albums', array('id_album_link' => $_massive_new[$i-1], 'id_collection_link' => $_id, 'position_album' => $i+$ct_albums));} echo '1';
}

public function findPhotos($__id, $__name){ $images = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE id_state_link != :id_state_link', array('id_state_link' => $__id)); $arr = ''; foreach ($images as $link => $value){ $arr .= ($arr == '') ? '(' . $value['id_photo_link'] : ',' . $value['id_photo_link'];} $arr .= ')'; $images = $this->db->select('SELECT id_photo,name_photo,`size`,date_upload,name_in_page FROM photos WHERE id_photo IN ' . $arr . ' AND name_in_page REGEXP "' . $__name . '"'); $data = array('images' => $images[0]["id_photo"], 'images' => $images[0]["name_in_page"]); echo json_encode($images); exit;}

public function delete_photo($__id){
	$file_name = $this->db->select('SELECT name_photo FROM photos WHERE id_photo = :id_photo', array('id_photo' => $__id));
	$this->db->delete('state_link_photo', ' id_photo_link = ' . $__id, 20); 
	echo json_encode($__id . 'delete_ok_' . HOST_ROOT . 'uploads/cache/images/' . $file_name);
}

public function lib_delete_photos($array_del_images){
	$arr = '';  $cnt = count($array_del_images);
	foreach ($array_del_images as $value){	$arr .= ($arr == '') ? '('.$value : ','.$value;}$arr .= ')'; /* удаление изображения из списков с альбомами*/
	$this->db->delete_unlim('state_link_photo', ' id_photo_link IN '.$arr );
	/*	из изображений не удалять а только устанавливать флаг -77 тоесть удаление */
		$this->db->update('photos', array('flag' => '-77'), ' id_photo IN '.$arr ); 
	foreach ($array_del_images as $value){
		$this->db->insert('state_link_photo', array('id_state_link' => -33, 'id_photo_link' => $value , 'position_image' => '-77'  ));}
    	echo '1';}
	
	
public function album_delete_photos($_id_album, $array_del_images)
{
	$arr = '';
	$cnt = count($array_del_images);
	foreach ($array_del_images as $value){	$arr .= ($arr == '') ? '('.$value : ','.$value;}$arr .= ')';
		$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr.') AND ( id_state_link ='.$_id_album.')' );
	foreach ($array_del_images as $value){echo $this->db->insert('state_link_photo', array('id_state_link' => -33, 'id_photo_link' => $value, 'position_image' =>  $_id_album ));}
    	echo '1';
}

public function lib_fully_trash_img($array_del_images, $array_images_all_del)/*удаляемые из альбомов и из всех изображений*/
{
	$arr = '';
	$arr_all = '';
	/*удаление простых фото из альбомов*/
	foreach ($array_del_images as $_id){ $arr .= ($arr == '') ? '('.$_id : ','.$_id;}$arr .= ')';
	$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr.') AND ( id_state_link =-33)' );
	/*  удаление из  2 таблиц и кончательное удаление всех изображений из всех*/
	if (count($array_images_all_del)==0){  echo '1';return;}
	foreach ($array_images_all_del as $_id){ $arr_all .= ($arr_all == '') ? '('.$_id : ','.$_id;}$arr_all .= ')';
	$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr_all.') AND ( id_state_link =-33)' );
	/* считываине путей и удаление из директорий */
	foreach ($array_images_all_del as $_id){
	    $file_name = $this->db->select('SELECT name_photo FROM photos WHERE id_photo = :id_photo', array('id_photo' => $_id)); $this->db->delete('photos', ' id_photo = ' . $_id);
	    $this->db->delete_unlim('state_link_photo', ' id_photo_link = ' . $_id);
	    unlink(HOST_ROOT . 'storage/cache/images/' . $file_name[0]['name_photo']); 
	    unlink(HOST_ROOT . 'storage/cache/previews/' . $file_name[0]['name_photo']); 
	    /*echo json_encode($__id . 'delete_ok_' . HOST_ROOT . 'uploads/cache/images/' . $file_name);*/
	}	
    	echo '1';
}

public function lib_trash_restore_img($array_images, $array_images_all)/*удаляемые из альбомов и из всех изображений*/
{
	$arr = '';
	$arr_all = '';
	if (count($array_images)>0){
	    foreach ($array_images as $_id){
	    $album_to_restore = $this->db->select('SELECT position_image FROM state_link_photo WHERE  id_photo_link  = '.$_id.' AND ( id_state_link = -33)');
		 foreach ($album_to_restore as $_album_id){
		    echo '           '.$_id.'   ';	    var_dump($_album_id['position_image']); 
		    $this->db->update('state_link_photo', array('id_state_link' => $_album_id['position_image'],'position_image' => '2017'), ' (id_photo_link ='.$_id.') AND ( id_state_link = -33) AND (position_image = '.$_album_id['position_image'].')'); // AND (id_state_link = -33) AND (position_image = '.$album_to_restore[0]['position_image'].')
		 }
	    }
	}
	if (count($array_images_all)==0){  echo '1';return;}
	foreach ($array_images_all as $_id){ $arr_all .= ($arr_all == '') ? '('.$_id : ','.$_id;}$arr_all .= ')';
	$this->db->update('photos', array('flag' => 0), 'id_photo IN ' . $arr_all);
	$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr_all.') AND ( id_state_link =-33)');
    	echo '1';
}

public function album_images_to_all($_id_album, $array_del_images)
{
	$arr = '';
	$cnt = count($array_del_images);
	foreach ($array_del_images as $value){	$arr .= ($arr == '') ? '('.$value : ','.$value;}$arr .= ')';
		$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr.') AND ( id_state_link ='.$_id_album.')' );
	echo '1';
}

public function lib_images_toAlbum($id_album, $array_images)/* добавляет новые изображения в альбом*/
{
	$ct_images = count($array_images);
	$images_have = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE  id_state_link = '.$id_album);
	$array_new_images = array();
	foreach ($images_have as $key =>$image){for ($i = 0; $i <$ct_images; $i++){if($image['id_photo_link']==$array_images[$i]){$array_images[$i]= -11;	break;}}}
	for ($i = 0; $i <$ct_images; $i++){	if($array_images[$i] != -11){$array_new_images[]= $array_images[$i];}}
	$ct_images = count($array_new_images);
	$max_st = $this->db->select('SELECT MAX(position_image) FROM state_link_photo WHERE  id_state_link = '.$id_album);
	$_position = (int)$max_st[0]['MAX(position_image)'];
	for ($i = 1; $i <= $ct_images; $i++){
		$this->db->update('photos', array('flag' => '0'), ' id_photo = '.$array_new_images[$i-1] ); 
		$this->db->insert('state_link_photo', array('id_photo_link' => $array_new_images[$i-1], 'id_state_link' => $id_album,'position_image' => $i+$_position));
	}
	echo '1';
}


public function lib_album_img_trans($id_album = -1, $id_album_curr = -1 , $array_images )/* добавляет новые изображения в альбом*/
{
	$ct_images = count($array_images);
	/* удаляет изображения  из альбома */
	foreach ($array_images as $value){	$arr .= ($arr == '') ? '('.$value : ','.$value;}$arr .= ')';
	$this->db->delete_unlim('state_link_photo', '(id_photo_link IN '.$arr.') AND ( id_state_link ='.$id_album_curr.')' );
	
	$images_have = $this->db->select('SELECT id_photo_link FROM state_link_photo WHERE  id_state_link = '.$id_album);
	$array_new_images = array();
	foreach ($images_have as $key =>$image){for ($i = 0; $i <$ct_images; $i++){if($image['id_photo_link']==$array_images[$i]){$array_images[$i]= -11;	break;}}}
	for ($i = 0; $i <$ct_images; $i++){if($array_images[$i] != -11){$array_new_images[]= $array_images[$i];}}
	$ct_images = count($array_new_images);
	$max_st = $this->db->select('SELECT MAX(position_image) FROM state_link_photo WHERE  id_state_link = '.$id_album);
	$_position = (int)$max_st[0]['MAX(position_image)'];
	for ($i = 1; $i <= $ct_images; $i++){
		$this->db->insert('state_link_photo', array('id_photo_link' => $array_new_images[$i-1], 'id_state_link' => $id_album,'position_image' => $i+$_position));}
	echo '1';
}

public function lib_save_sortable_structure_library($massive_id_elements,$massive_id_parents)
{
    $count_id = count($massive_id_parents);
    $type_parent = '';
    for ($i = 0; $i < $count_id; $i++){	
	$type_parent = ($massive_id_parents[$i] == -1)?'-1':'collection';
	$this->db->update('paper', array('state_sub' => $i+1, 'type_parent' => (($massive_id_parents[$i] == -1)?'-1':'collection'), 'parent_id' => $massive_id_parents[$i]), ' `id_doc` ='.$massive_id_elements[$i]);}
    echo '1';
}



public function save_sortable_structure_site($_mass_states){ $count_states = count($_mass_states); $order = ''; $arr = array(); if($count_states > 0){ foreach ($_mass_states as $key => $value){ $arr[] = $value;} for ($i = 1; $i <= $count_states; $i++){ $this->db->update('paper', array('st_num' => $i, 'parent_id' => '-1'), ' `id_doc` ='.$arr[$i-1]);} $art = ''; for ($i = 1; $i <= $count_states; $i++){ $art .= 'paper   st_num'.$i.'parent_id  0'.' `id_doc` ='.$arr[$i-1];} echo $art;} else echo 'error not states';}
public function delete_photo_fully($__id){ $file_name = $this->db->select('SELECT name_photo FROM photos WHERE id_photo = :id_photo', array('id_photo' => $__id)); $this->db->delete('photos', ' id_photo = ' . $__id); $this->db->delete_unlim('state_link_photo', ' id_photo_link = ' . $__id); unlink(HOST_ROOT . 'storage/cache/images/' . $file_name[0]['name_photo']); echo json_encode($__id . 'delete_ok_' . HOST_ROOT . 'uploads/cache/images/' . $file_name);}
public function change_name($_id, $_name){ $this->db->update('photos', array('name_in_page' => $_name), 'id_photo=' . $_id); echo json_encode($_id . $_name . '_ok');}
public function save_sortable_structured_submenu($_id_menu, $_mass_states){ $count_states = count($_mass_states); $order = ''; $arrr = array(); if($count_states > 0){ foreach ($_mass_states as $key => $value){ $arrr[] = $value;} $art = ''; for ($i = 1; $i <= $count_states; $i++){ $this->db->update('paper', array('parent_id' => $_id_menu), ' `id_doc` ='.$arrr[$i-1]);} echo $art;} else echo 'error not states';}
public function save_document_edits($_state){ if(!$this->db->update('paper', array('document_header' => $_state[0], 'publish' => $_state[1], 'name_menu' => $_state[2], 'doc_text' => $_state[3], 'paswd_page' => $_state[4], 'seo_title' => $_state[5], 'seo_description' => $_state[6],	'seo_keywords' => $_state[7]), ' `id_doc` ='.$_state[8])) {echo '1';}}
public function save_document_page_edits($_state){if(!$this->db->update('paper', array('publish' => $_state[0], 'name_menu' => $_state[1],'paswd_page' => $_state[2], 'seo_title' => $_state[3], 'seo_description' => $_state[4],	'seo_keywords' => $_state[5]), ' `id_doc` ='.$_state[6])){echo '1';}}

public function sendFile($__id){ $file_name = $this->db->select('SELECT name_photo FROM photos WHERE id_photo = :id_photo', array('id_photo' => $__id)); $file_name = HOST_ROOT . 'storage/cache/images/' . $file_name[0]['name_photo']; if (file_exists($file_name)){ if (ob_get_level()){ ob_end_clean();} header('Content-Description: File Transfer'); header('Content-Type: application/octet-stream'); header('Content-Disposition: attachment; filename=' . basename($file)); header('Content-Transfer-Encoding: binary'); header('Expires: 0'); header('Cache-Control: must-revalidate'); header('Pragma: public'); header('Content-Length: ' . filesize($file)); readfile($file_name); exit;} $data = array('images' => $images[0]["id_photo"], 'images' => $images[0]["name_in_page"]); echo json_encode($images); exit;}

public function albums_load($_id){ $albums = $this->db->select('SELECT id_album_link FROM collection_link_albums WHERE id_collection_link = :id_collection_link ORDER BY position_album', array('id_collection_link' => $_id)); 
if(count($albums)){ $arr = ''; $sort = '';
foreach ($albums as $link => $value){ $sort .= ($sort == '') ? $value['id_album_link'] : ',' . $value['id_album_link'];} foreach ($albums as $link => $value){ $arr .= ($arr == '') ? '(' . $value['id_album_link'] : ',' . $value['id_album_link'];} $arr .= ')'; $albums = $this->db->select('SELECT id_doc,name_menu,preview_img FROM paper WHERE id_doc IN ' . $arr . " ORDER BY FIND_IN_SET(id_doc,'" . $sort . "')"); return $albums;} return array();}
public function sort_albums_in_collection($_id, $_massive_albums){
	$count_albums = count($_massive_albums);$order = '';
	for ($i = 1; $i <= $count_albums; $i++){ $order .= ($order == '')? $i : ','.$i;}
	$arr = array();
	foreach ($_massive_albums as $key => $value){ $arr[] = $value;}
	$arra = ''; for ($i = 1; $i <= $count_albums; $i++){
		$this->db->update('collection_link_albums', array('position_album' => $i), ' (`id_album_link` ='.$arr[$i-1].' AND `id_collection_link` ='.$_id.')');}} 
		
public function albums_load_excluding($_id){ 
	$albums = $this->db->select('SELECT id_album_link FROM collection_link_albums WHERE id_collection_link = :id_collection_link', array('id_collection_link' => $_id)); 
	$arr = ''; if(count($albums)){
		foreach ($albums as $link => $value)
		{ $arr .= ($arr == '') ? '(' . $value['id_album_link'] : ',' . $value['id_album_link'];} $arr .= ')'; 
		$albums = $this->db->select('SELECT id_doc,name_menu,preview_img FROM paper WHERE (( id_doc NOT IN '.$arr.' ) AND ( type_state = "album" ))'); 
		if(count($albums) == 0)	return array(); return $albums; } else { 
			$albums = $this->db->select('SELECT id_doc,name_menu,preview_img FROM paper WHERE type_state = "album" '); 
			if(count($albums) == 0)	return array(); return $albums; }} 
public function sort_added_albums_coll($_id, $_massive_new, $_massive_have)
{ $ct_albums = count($_massive_have); if($ct_albums != 0){ for ($i = 1; $i <= $ct_albums; $i++)
{ $this->db->update('collection_link_albums', array('position_album' => $i), ' (`id_album_link` ='.$_massive_have[$i-1]['id_doc'].' AND `id_collection_link` ='.$_id.')');}}
	for ($i = 1; $i <= count($_massive_new); $i++){
		$this->db->insert('collection_link_albums', array('id_album_link' => $_massive_new[$i-1], 'id_collection_link' => $_id, 'position_album' => $i+$ct_albums));} echo '1';
}

public function sort_added_images_alb($_id, $_massive_new, $_massive_have){	$ct_images = count($_massive_have);
	if($ct_images != 0){ for ($i = 1; $i <= $ct_images; $i++)
	{ $this->db->update('state_link_photo', array('position_image' => $i), ' (`id_photo_link` ='.$_massive_have[$i-1]['id_doc'].' AND `id_state_link` ='.$_id.')');}}
		for ($i = 1; $i <= count($_massive_new); $i++){
		$this->db->insert('state_link_photo', array('id_photo_link' => $_massive_new[$i-1], 'id_state_link' => $_id, 'position_image' => $i+$ct_images));}
		echo '1';}

public function save_page_edits($_id, $title, $content){if(!$this->db->update('paper', array('document_header' => $title, 'doc_text' => $content), ' `id_doc` ='.$_id)) {echo '1';}}
public function all_images_sort_date(){return $this->db->select('SELECT * FROM photos ORDER BY date_upload');}
public function all_albums(){return $this->db->select('SELECT * FROM paper WHERE type_state = "album" ');}
public function all_links_images(){return $this->db->select('SELECT * FROM state_link_photo ORDER BY id_state_link ');}

} ?>