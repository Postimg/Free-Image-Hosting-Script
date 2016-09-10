<?php
/*
 * Logic Here
 */
 
 $gallery = $db->get_results("SELECT imageID, image_name, image_date, username, userID FROM images 
											LEFT JOIN users ON images.image_user = users.userID 
											WHERE show_in_gallery = 'Y' ORDER BY imageID DESC LIMIT 0, 24");
 
 if(count($gallery)) {
 	$data['gallery'] = $gallery;
 }
 
 /*
  * Load view
  */
  load_layout('gallery', $data);
