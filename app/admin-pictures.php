<?php
/*
 * Logic
 */
 
 if(!is_admin()) {
 	header("Location: /" . SITE_URL . "/admin");
	exit;
 }
 
 
 //remove a picture
 if(isset($_GET['remove'])) {
 	$ID = (int) abs(intval($_GET['remove']));
	 
	//remove file from disk
	$disk_file = $db->get_row(sprintf("SELECT image_name, FROM_UNIXTIME(image_date, '%%d-%%m-%%Y') as img_date, servers.* FROM images, servers 
											WHERE imageID = '%d' AND images.image_srv = servers.serverID", $ID)); 
	
	if(count($disk_file)) {
		if($disk_file->server == "local") {
			$i = $disk_file;
			
			if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name);
			if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name);
			if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name);
		}
	}	
	 
	//remove images from db
	$db->query(sprintf("DELETE FROM images WHERE imageID = '%d'", $ID)); 
	
 }

 $pictures = $db->get_results("SELECT images.*, servers.server, users.username FROM images  
 							  LEFT JOIN users ON users.userID = images.image_user 
 							  LEFT JOIN servers ON servers.serverID = images.image_srv ORDER BY imageID DESC");
 $data['pictures'] = $pictures;

/*
 * Load layout
 */
 load_layout('admin-pictures', $data);
