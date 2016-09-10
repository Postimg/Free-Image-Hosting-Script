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
if(isset($_FILES) AND count($_FILES)) {
	
	$at_least_one_file = FALSE;
	$_SESSION['file_ids'] = array();
	
	for($i = 0; $i <= 4; $i++) {
		
		foreach($_FILES as $file_array) {
			
			if(isset($file_array['name'][$i]) AND $file_array['error'][$i] == 0) {
					
				//set the file name
				$filename = $file_array['name'][$i];
				$extension = get_file_extension($filename);
				$new_file_name = 'original-' .md5(rand(1000, 9999999) . $filename). '.' . $extension;
				
				
				//first lets check the extension
				if(!extension_check($filename)) 
				{
					echo do_error(_("Error with file extension no #") . ($i+1));
					echo do_error(_(sprintf("Extension <strong>%s</strong> not allowed!", $extension)));
					exit;
				}
				
				//secondly lets check the mime_type
				if(!mimetype_check($file_array['type'][$i])) {
					echo do_error(_("Error with file mimetype no #") . ($i+1));
					echo do_error(_(sprintf("MimeType <strong>%s</strong> not allowed!", $file_array['type'][$i])));
					exit;
				}
				
				
				//thirdly lets check if it's a real image
				$image_size = getimagesize($file_array['tmp_name'][$i]);
				if(!$image_size) {
					echo do_error(_("Error with file no #") . ($i+1));
					echo do_error(_("The image is corrupt or not a valid image file!"));
					exit;
				}
				
				//get upload server
				$srv = get_random_server();
				
				//upload original image
				if($srv->server == "local") {
					//upload to local server
					if(!upload_image($file_array['tmp_name'][$i], $new_file_name)) {
						echo do_error(_("Error with file no #") . ($i+1));
						echo do_error(_("The image could not be uploaded!"));
						exit;	
					}
				}else{
					//upload to FTP => first to a temporary folder 
					$upload_dir = APP_PATH . '/image.uploads/temp';
					
					if(!move_uploaded_file($file_array['tmp_name'][$i], $upload_dir . '/' . $new_file_name)) {
						echo do_error(_("Error with file no #") . ($i+1));
						echo do_error(_("The image could not be uploaded! Check temporary folder image.uploads/temp to be writable"));
						exit;	
					}
					
					if(upload_to_FTP($new_file_name, $upload_dir . '/' . $new_file_name, $srv->server, $srv->username, $srv->password, $srv->server_path) != 'file_uploaded') {
						echo do_error(_("The image could not be uploaded on remote FTP Server"));
						exit;	
					}
					
				}
				
				//resize other user option
				$user_option = (int) trim(strip_tags($_POST['user_resize']));
				$user_option = abs(intval($user_option));
				
				if($image_size[0] > 124) {
					//resize to thumbnail 124x89 for the site
					//local
					if($srv->server == "local") {
						$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
		   				$imageResizeClass->resize(124,89);
		   				$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . str_replace("original", "thumbnail", $new_file_name));
					}else{
						//remote FTP => first to temporary
						$imageResizeClass->load(APP_PATH . '/image.uploads/temp/' . $new_file_name);
		   				$imageResizeClass->resize(124,89);
		   				$imageResizeClass->save(APP_PATH . '/image.uploads/temp/' . str_replace("original", "thumbnail", $new_file_name));
						
						if(upload_to_FTP(str_replace("original", "thumbnail", $new_file_name), APP_PATH . '/image.uploads/temp/' . str_replace("original", "thumbnail", $new_file_name), $srv->server, $srv->username, $srv->password, $srv->server_path) != 'file_uploaded') {
							echo do_error(_("The image could not be uploaded on remote FTP Server"));
							exit;	
						}
						
						//remove temp file
						@unlink(APP_PATH . '/image.uploads/temp/' . str_replace("original", "thumbnail", $new_file_name));
					}
				}
				
				if($image_size[0] > 640) {
					//resize to thumbnail 640 in width for the site
					if($srv->server == "local") {
						$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
		   				$imageResizeClass->resizeToWidth(640);
		   				$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . str_replace("original", 640, $new_file_name));
					}else{
						//remote FTP => first to temporary
						$imageResizeClass->load(APP_PATH . '/image.uploads/temp/' . $new_file_name);
		   				$imageResizeClass->resizeToWidth(640);
		   				$imageResizeClass->save(APP_PATH . '/image.uploads/temp/' . str_replace("original", 640, $new_file_name));
						
						if(upload_to_FTP(str_replace("original", 640, $new_file_name), APP_PATH . '/image.uploads/temp/' . str_replace("original", 640, $new_file_name), $srv->server, $srv->username, $srv->password, $srv->server_path) != 'file_uploaded') {
							echo do_error(_("The image could not be uploaded on remote FTP Server"));
							exit;	
						}
						
						//remove temp file
						@unlink(APP_PATH . '/image.uploads/temp/' . str_replace("original", 640, $new_file_name));
					}
				}
				
				//0 means no resize
				if($user_option > 640) {
					//local
					if($srv->server == "local") {
						$imageResizeClass->load(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
	   					$imageResizeClass->resizeToWidth($user_option);
	   					$imageResizeClass->save(APP_PATH . '/image.uploads/' . date('d-m-Y') .'/' . $new_file_name);
					}else{
						//remote FTP => first to temporary
						$imageResizeClass->load(APP_PATH . '/image.uploads/temp/' . $new_file_name);
	   					$imageResizeClass->resizeToWidth($user_option);
	   					$imageResizeClass->save(APP_PATH . '/image.uploads/temp/' . $new_file_name);
	   					
						if(upload_to_FTP($new_file_name, APP_PATH . '/image.uploads/temp/' . $new_file_name, $srv->server, $srv->username, $srv->password, $srv->server_path) != 'file_uploaded') {
							echo do_error(_("The image could not be uploaded on remote FTP Server"));
							exit;	
						}
						
						//remove temp file
						@unlink(APP_PATH . '/image.uploads/temp/'. $new_file_name);
					}
					
				}

				//remove temporary original file
				@unlink(APP_PATH . '/image.uploads/temp/'. $new_file_name);
				
				//insert into database
				$userID = get_user_ID();
				$only_file_name = str_replace("original-", "", $new_file_name);
				$db->query(sprintf("INSERT INTO images 
									(image_name, image_user, image_date, image_srv) 
									VALUES ('%s', '%d', '%d', '%d')", 
									$db->escape($only_file_name), $userID, time(), $srv->serverID));
				
				//success, we have file uploaded! 
				//let's set this for the redirect
				$at_least_one_file = TRUE;
				
				//append this id to the session
				$_SESSION['file_ids'][] = $db->insert_id;
				
			}elseif(!empty($file_array['name'][$i]) AND $file_array['error'][$i] != 0) {
				echo do_error(_("Error with file ") . ($i+1));
			}
		}
		
	}
	
	if(!$at_least_one_file) exit;
	
	//!SHOW VIEW
	echo "show-view";
	
}else{
	echo do_error(_('Please pick up at least one file'));
	exit;
}


