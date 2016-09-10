<?php
/*
 * Logic Here
 */
 
 $user_get = (string) trim(strip_tags($user_get));
 $user_get = $db->escape($user_get);
 
 //get user id & username
 $user_info = $db->get_row(sprintf("SELECT userID, username FROM users WHERE username = '%s'", $user_get));
 if(!count($user_info)) {
 	echo do_error(_('No user with this username found'));
	 exit;
 }
 
 $data['username'] = $user_info->username;
 $data['userID'] = $user_info->userID;
 
 $gallery = $db->get_results(sprintf("SELECT imageID, image_name, image_date, username, userID FROM images 
											LEFT JOIN users ON images.image_user = users.userID 
											WHERE show_in_gallery = 'Y' AND image_user = '%d' ORDER BY imageID DESC LIMIT 0, 24", $user_info->userID));
 
 if(count($gallery)) {
 	$data['gallery'] = $gallery;
 }
 
 /*
  * Load view
  */
  load_layout('user-gallery', $data);
