<?php
/*
 * Logic
 */
 
 if(!get_user_ID()) {
 	 header("Location: /account");
	 exit;
 }
 
 if(isset($_POST['sbacc'])) {
 	
	$password = (string) trim(strip_tags($_POST['password']));
	 
	if(strlen($password) < 6) {
		$message = do_error(_("Password must be at least 6 characters long."));
	}else{
		$db->query(sprintf("UPDATE users SET password = '%s'", $db->escape(md5($password))));
		$message = do_error(_("Changes saved."), 'alert alert-success');
	}
	
	$data['message'] = $message;
	
 }
 
 

 
 
/*
 * Load template
 */
 load_layout('my-account', $data);
