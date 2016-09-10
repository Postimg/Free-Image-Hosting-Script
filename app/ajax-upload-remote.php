<?php
/*
 * Logic here
 */
 
//check terms
if(!isset($_POST['terms']) OR $_POST['terms'] != 'yes') {
	echo do_error(_('You have to agree to the terms and conditions in order to upload.'));
	exit;
} 


//check files
if(isset($_POST['remote_1']) AND !empty($_POST['remote_1'])) {
	
	$at_least_one_file = FALSE;
	$_SESSION['file_ids'] = array();
	
	for($i = 1; $i <= 5; $i++) {
		
		$file_array = (string) trim(strip_tags($_POST['remote_' . $i]));
		
		if(!empty($file_array) and stristr($file_array, 'http')) {
					
				//set the file name
				$filename = $file_array;
				$extension = get_file_extension($filename);
				
				if(!$extension) {
					echo do_error(_("Could not get file extension for URL #") . ($i));
					exit;
				}
				
				$new_file_name = 'original-' .md5(rand(1000, 9999999) . $filename). '.' . $extension;
				
				
				//first lets check the extension
				if(!extension_check($filename)) 
				{
					echo do_error(_("Error with file extension no #") . ($i));
					echo do_error(_(sprintf("Extension <strong>%s</strong> not allowed!", $extension)));
					exit;
				}
				
				
				//secondly lets check if it's a real image
				$image_size = getimagesize($file_array);
				if(!$image_size) {
					echo do_error(_("Error with file no #") . ($i));
					echo do_error(_("The image is corrupt or not a valid image file!"));
					exit;
				}
				
				
				//upload original image
				if(!upload_image_remote($file_array, $new_file_name)) {
					echo do_error(_("Error with file no #") . ($i));
					echo do_error(_("The image could not be uploaded!"));
					exit;	
				}
				
				//resize other user option
				$user_option = (int) trim(strip_tags($_POST['user_resize']));
				$user_option = abs(intval($user_option));
				
				if($image_size[0] > 124) {
					//resize to thumbnail 124x89 for the site
					$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
	   				$imageResizeClass->resize(124,89);
					$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . str_replace("original", "thumbnail", $new_file_name));
				}
				
				if($image_size[0] > 640) {
					//resize to thumbnail 640 in width for the site
					$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
	   				$imageResizeClass->resizeToWidth(640);
	   				$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . str_replace("original", 640, $new_file_name));
				}
				
				//0 means no resize
				if($user_option > 640) {
					$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
   					$imageResizeClass->resizeToWidth($user_option);
   					$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
				}
				
				//insert into database
				$userID = get_user_ID();
				$only_file_name = str_replace("original-", "", $new_file_name);
				$db->query(sprintf("INSERT INTO images 
									(image_name, image_user, image_date) 
									VALUES ('%s', '%d', '%d')", 
									$db->escape($only_file_name), $userID, time()));
				
				//success, we have file uploaded! 
				//let's set this for the redirect
				$at_least_one_file = TRUE;
				
				//append this id to the session
				$_SESSION['file_ids'][] = $db->insert_id;
				
			}elseif(strlen($file_array) > 1 AND !stristr($file_array, 'http')) {
				echo do_error(_("Error with URL #") . ($i));
			}
		}
	
	if(!$at_least_one_file) exit;
	
	//!SHOW VIEW
	echo "show-view";
	
}else{
	echo do_error(_('Please enter URL for at least one file'));
	exit;
}


