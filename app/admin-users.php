<?php
/*
 * Logic
 */
 
 if(!is_admin()) {
 	header("Location: /" . SITE_URL . "/admin");
	exit;
 }
 
 if(isset($_GET['remove'])) {
 	$ID = (int) abs(intval($_GET['remove']));
	 
	//delete user images from disk
	$user_images = $db->get_results(sprintf("SELECT image_name, FROM_UNIXTIME(image_date, '%%d-%%m-%%Y') as img_date, servers.* FROM images, servers 
											WHERE image_user = '%d' AND images.image_srv = servers.serverID", $ID));
	
	if(count($user_images)) {
		foreach($user_images as $i) {
			if($i->server == "local") {
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name);
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name);
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name);
			}
		}
	}										
	 
	//remove user images from db
	$db->query(sprintf("DELETE FROM images WHERE image_user = '%d'", $ID));
	
	//remove users
	$db->query(sprintf("DELETE FROM users WHERE userID = '%d'", $ID));
 }
 
 //get users from database
 $users = $db->get_results("SELECT users.*, (SELECT COUNT(*) FROM images WHERE images.image_user = users.userID) as upImages FROM users ORDER BY userID DESC");
 $data['users'] = $users;

/*
 * Template
 */
 load_layout('admin-users', $data);