<?php
/*
 * Logic
 */
 
 //check logged in
 if(!get_user_ID()) die(_("You need to login to view this page."));
 
 if(isset($_POST['id'])) {
 	
	//validate the id
	$id = (int) abs(intval($_POST['id']));
	$id = $db->escape($id); 
	 
	if($id < 1) die(_("Invalid ID"));
	
	//validate the owner
	$rs = $db->get_row(sprintf("SELECT image_user, image_name, FROM_UNIXTIME(image_date, '%%d-%%m-%%Y') as img_date, servers.* FROM images, servers 
											WHERE imageID = '%d' AND images.image_srv = servers.serverID", $id)); 
	
	if(count($rs)) {
		
		if($rs->image_user == get_user_ID() and $rs->image_user != 0) {
			
			
			//delete file from disk
			$disk_file = $rs;
			if($disk_file->server == "local") {
				$i = $disk_file;
				
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/original-' . $i->image_name);
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/thumbnail-' . $i->image_name);
				if(file_exists(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name)) unlink(APP_PATH .'/image.uploads/' . $i->img_date .'/' . $i->image_name);
			}
			
			$db->query(sprintf("DELETE FROM images WHERE imageID = '%d'", $id));
			
			echo _("Image removed");
			
			
		}else{
			echo _('You cannot delete an image which is not yours');	
		}
		
	} else{
		echo _('No image with this ID');
	}
	
 }
