<?php
/*
 * Logic first
 */
if(!isset($_SESSION['file_ids']) or !count($_SESSION['file_ids'])) {
	$data['error'] = do_error(_('You accessed this page in error!'));
	$just_uploaded = array();
} 


//get the files from db
$image_ids = implode(",", $_SESSION['file_ids']);
$image_ids = $db->escape($image_ids);

if(!isset($just_uploaded)) {
	$just_uploaded = $db->get_results(sprintf("SELECT image_name, image_date, image_srv FROM images WHERE imageID IN (%s)", $image_ids));
	$data['just_uploaded'] = $just_uploaded;
} 

/*
 * Load Just Uploaded Page
 */
load_layout('just-uploaded', $data);
