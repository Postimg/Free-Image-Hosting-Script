<?php
/*
 * Logic
 */
 
 if(!is_admin()) {
 	header("Location: /" . SITE_URL . "/admin");
	exit;
 }
 
 if(isset($_POST['sb'])) {
 	
	$banned = (string) trim($_POST['banned']);
	
	if(update_option('banned_ip', $banned)) {
		$data['msg'] = do_error(_("Successfully saved."), "alert alert-warning");
	}else{
		$data['msg'] = do_error(_("Nothing saved."), "alert alert-warning");
	}
	
 }
 

/*
 * Load layout
 */
 load_layout('admin-ban', $data);
