<?php
/*
 * Logic Here
 */
$data = array();

//image_get variable defined prior into index.php
if(!$image_get) {
	$data['error'] = _('No image parameter passed. Nothing to show');
}

$image_get = (string) trim(strip_tags($image_get));
$image_get = $db->escape($image_get);

//get image details
$image_details = $db->get_row(sprintf("SELECT imageID, image_name, image_date, image_views, username, userID, image_srv FROM images 
											LEFT JOIN users ON images.image_user = users.userID 
											WHERE image_name = '%s' LIMIT 1", $image_get));
if(count($image_details)) {
	$data['image_details'] = $image_details;
	
	//update image views if not viewed by this guy
	if(!visitor_viewed_image($image_details->imageID)) {
		$db->query(sprintf("UPDATE images SET image_views = image_views+1 WHERE imageID = '%d'", $image_details->imageID));
	}
}

/*
 * Load template
 */
 load_layout('view-image', $data);
