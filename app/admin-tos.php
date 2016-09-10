<?php
/*
 * Logic
 */
 
 if(!is_admin()) {
 	header("Location: /" . SITE_URL . "/admin");
	exit;
 }
 
 if(isset($_POST['sb'])) {
 	$title = (string) trim(strip_tags($_POST['site_title']));
	$TOS = (string) trim($_POST['site_tos']);
	
	if(update_option('site_title', $title) && update_option('site_tos', $TOS)) {
		$data['msg'] = do_error(_("Successfully saved."), "alert alert-warning");
	}else{
		$data['msg'] = do_error(_("Nothing saved."), "alert alert-warning");
	}
	
 }
 

/*
 * Load layout
 */
 load_layout('admin-tos', $data);
