<?php
/*
 * Logic
 */
 $ADMIN = TRUE;
 
 if(!is_admin()) {
 	
	if(isset($_POST['asb'])) {
		$admin_user = (string) trim(strip_tags($_POST['au']));
		$admin_pass = (string) trim(strip_tags($_POST['ap']));
		
		if($admin_user != "" AND $admin_pass != "") {
			
			if($db->escape($admin_user) == ADMIN_USERNAME AND md5($admin_pass) == md5(ADMIN_PASSWORD)) {
					
				$_SESSION['is_admin'] = TRUE;
				session_regenerate_id();
				header("Location: " . SITE_URL ."/admin");
				exit;
				
			}else{
				$data['login_error'] = do_error(_("Invalid credentials"));
			}
			
		}else{
			$data['login_error'] = do_error(_("Enter credentials"));
		}
	}
	
 	$ADMIN = FALSE;
 }else{
 	
	//get total images
	$img = $db->get_row("SELECT COUNT(*) as totalImages FROM images");
	$data['images'] = $img->totalImages;
	
	//total members
	$usr = $db->get_row("SELECT COUNT(*) as totalUsers FROM users");
	$data['users'] = $usr->totalUsers;
	
	//total servers
	$srv = $db->get_row("SELECT COUNT(*) as totalSrv FROM servers");
	$data['servers'] = $srv->totalSrv;
	
	//images per server
	$img_serv = $db->get_results("select count(*) as tImages, server from images, servers 
								WHERE image_srv =  serverID group by image_srv");
	$data['images_per_server'] = $img_serv;
	
	//images today
	$img_today = $db->get_row(sprintf("SELECT COUNT(*) as images_today FROM images 
									  WHERE FROM_UNIXTIME(image_date,'%%d-%%m-%%y') = '%s'", date("d-m-y")));
	$data['images_today'] = $img_today->images_today;
										  							
 } 
 
 $data['ADMIN'] = $ADMIN;
 
 
 /*
  * Template
  */
  if($ADMIN) {
 	load_layout('admin-main', $data);
  }else{
  	load_layout('admin-login', $data);
  }
