<?php
/*
 * Function to load layout files
 */
 function load_layout($layout, $data = array()) {
 	
	if(is_array($data)) {	
 		extract($data);
	}
	
	$template_file = APP_PATH . '/layout/' . $layout . '.php';
	
	if(file_exists($template_file)) {
 		require_once $template_file;
	}else{
		require_once APP_PATH .'/layout/layout-error.php';
	}
	
 }

 
/*
 * Function to print errors/success/info messages
 */
 function do_error($string, $div_type = 'alert alert-error') {
 
 	 return '<div class="'.$div_type.'">'.($string).'</div>';
	 
 }

 
 /*
  * Check file extension
  */
  function extension_check($filename) {
  	  
	  $allowed = array("jpg", "jpeg", "pjpeg", "png", "gif");	
		
  	  $extension = get_file_extension($filename);
	  
	  return in_array($extension, $allowed);
	  
  } 
  
  /*
  * Check mime-type
  */
  function mimetype_check($file_mimetype) {
  	  
	  $allowed = array("image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/gif");	
	  $file_mimetype = strtolower($file_mimetype);
	  	
	  return in_array($file_mimetype, $allowed);
	  
  } 
  
  /*
   * Get file extension
   */
 function get_file_extension($filename) {
 	  
	  if(!stristr($filename, ".")) {
	  		return false;
	  } 
	  
 	  $extension = explode(".", $filename);
	  $extension = end($extension);
	  $extension = strtolower($extension);
	  
	  return $extension;
 } 
 
 /*
  * Upload image
  */
  function upload_image($image, $name) {
  	   $upload_dir = APP_PATH . '/image.uploads';
  	   //check for directory rights
  	   if(!is_writable($upload_dir)) {
  	   	  echo do_error(_('Folder image.uploads is not writeable'));
		  exit;
  	   }
	   
	   //check if there's a directory for today uploads
	   $today = date("d-m-Y");
	   
	   if(!is_dir($upload_dir .'/' . $today)) {
	   	    if(!mkdir($upload_dir .'/' . $today, 0777)) {
	   	  		echo do_error(_(sprintf('Folder <strong>image.uploads/%s</strong> could not be created. Please check permissions to be 0777.', $today)));
		  		exit;  	
	   	    }
	   }
	   
	   $upload_path = $upload_dir .'/' . $today;
	   
	   return move_uploaded_file($image, $upload_path .'/'. $name);
	   
  } 
  
  /*
  * Upload image remote
  */
  function upload_image_remote($image, $name) {
  	   $upload_dir = APP_PATH . '/image.uploads';
  	   //check for directory rights
  	   if(!is_writable($upload_dir)) {
  	   	  echo do_error(_('Folder image.uploads is not writeable'));
		  exit;
  	   }
	   
	   //check if there's a directory for today uploads
	   $today = date("d-m-Y");
	   
	   if(!is_dir($upload_dir .'/' . $today)) {
	   	    if(!mkdir($upload_dir .'/' . $today, 0777)) {
	   	  		echo do_error(_(sprintf('Folder <strong>image.uploads/%s</strong> could not be created. Please check permissions to be 0777.', $today)));
		  		exit;  	
	   	    }
	   }
	   
	   $upload_path = $upload_dir .'/' . $today;
	   
	   return copy($image, $upload_path .'/'. $name);
	   
  } 
  
  /*
   * Filename from get string
   */
 function file_from_get_param($string) {
	 if(stristr($string, 'jpg')) return str_replace("jpg", ".jpg", $string);
	 if(stristr($string, 'jpeg')) return str_replace("jpeg", ".jpeg", $string);
	 if(stristr($string, 'png')) return str_replace("png", ".png", $string);
	 if(stristr($string, 'gif')) return str_replace("gif", ".gif", $string);
 } 
 
 /*
  * Get logged in user ID
  */
  function get_user_ID() {
  	
  	  if(isset($_SESSION['loggedIn']['userID'])) {
  	  	 return (int) abs(intval($_SESSION['loggedIn']['userID']));
  	  }
	  
	  return (int) 0;
	  
  } 
  
  /*
   * Set cookie for already viewed image
   */
 function visitor_viewed_image($imageID) {
 	  if(isset($_COOKIE[ip2long($_SERVER['REMOTE_ADDR']) . "_" . $imageID])) {
 	  	  return TRUE;
 	  }else{
 	  	setcookie(ip2long($_SERVER['REMOTE_ADDR']) . "_" . $imageID, 'viewed', time()+(3600*24)*31);
		   return FALSE;
 	  }
 } 
 
  /*
   * Build image path
   */
   function image_path($image = array(), $type = 'original', $server = 'local') {
   	    
		$image = (array) $image;
		
		
		if($server == 'local')  {
			$url = SITE_URL;
		}else{
			$url = image_server($image['image_name']);
		}
	
		$image_name = $image['image_name'];
		$image_date = $image['image_date'];
		
		$path = $url . '/image.uploads/' . date("d-m-Y", $image_date) . '/' . $type . '-'  . $image_name;
		
		return $path;
	
   } 
   
   /*
    * Get image server
    */
  function image_server($image_name, $imageID = null) {
  	   global $db;
	
  	   if($imageID != null) {
  	   		$i = $db->get_row(sprintf("SELECT server_url FROM servers WHERE 
  	   								serverID = (SELECT image_srv FROM images WHERE imageID = '%d')", $db->escape($imageID)));
									
			return (!empty($i->server_url) ? $i->server_url : SITE_URL);
  	   }
	   
	   $i = $db->get_row(sprintf("SELECT server_url FROM servers WHERE 
  	   								serverID = (SELECT image_srv FROM images WHERE image_name = '%s')", $db->escape($image_name)));								
	   return (!empty($i->server_url) ? $i->server_url : SITE_URL);
	   
	   
  } 
  
  /*
   * IS ADMIN?
   */
 function is_admin() {
 	return isset($_SESSION['is_admin']);
 } 
 
 /*
  * Get Option FROM DB
  */
  function get_option($option_name) {
  	global $db;
	
	$option = $db->get_row(sprintf("SELECT option_value FROM the_options WHERE option_name = '%s'", $db->escape($option_name)));
	
	if(count($option)) {
		if(!empty($option->option_value)) {
			return $option->option_value;
		}
		
		return TRUE;
	}
	
	return FALSE;
  }
  
  /*
   * Update Option
   */
   function update_option($option_name, $option_value) {
   	  global $db;
	  
	  if(!get_option($option_name)) {
	  	  $db->query(sprintf("INSERT INTO the_options (option_name, option_value) 
	  	  					VALUES ('%s', '%s')", $db->escape($option_name), $db->escape($option_value)));				
	  }else{
	  	  $db->query(sprintf("UPDATE the_options SET option_value = '%s' WHERE option_name = '%s'", 
	  	  					$db->escape($option_value), $db->escape($option_name)));			
	  }
	  
	  return $db->rows_affected;
	  
   }
   
   /*
    * Get upload random server
    */
    function get_random_server() {
    	global $db;
		
		$srv = $db->get_row("SELECT * FROM servers ORDER BY RAND() LIMIT 1");
		
		return $srv;
    }
	
	/*
	 * Connect & upload on remote server
	 */
  function upload_to_FTP($remote_file, $local_file, $server_address, $server_user, $server_pass, $server_path) {
  	
  	$conn_id = ftp_connect($server_address); 

	// login with username and password
	$login_result = ftp_login($conn_id, $server_user, $server_pass); 
	
	// check connection
	if ((!$conn_id) || (!$login_result)) {
	    die("FTP connection has failed !");
	}
	
	// try to change the directory to somedir
	if (ftp_chdir($conn_id, $server_path)) {
	    
		$contents = ftp_nlist($conn_id, ".");
		
		if(!in_array(date("d-m-Y"), $contents)) {		
	    	ftp_mkdir($conn_id, date("d-m-Y"));
		}
		
		ftp_chdir($conn_id, date("d-m-Y"));	
		
		if(ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY)) {
			
			return "file_uploaded";	
			
		}else{
			return "file_failed";
		}
		
	} else { 
	    die("Couldn't change directory\n");
	}
	
	// close the connection
	ftp_close($conn_id);
  }
  
  /*
   * Is user banned
   */
   function is_user_banned() {
   	   $ip = getRealIpAddr();
	   
	   global $db;
	   
	   $rs = $db->get_row("SELECT option_value FROM the_options WHERE option_name = 'banned_ip' LIMIT 1");
	   
	   if(count($rs)) {
	   		return stristr($rs->option_value, $ip);
	   }
	   
	   return false;
	   
   }
   
   function getRealIpAddr()
	{
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
