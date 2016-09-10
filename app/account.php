<?php
/*
 * Logic 
 */
 
 //process login
 if(isset($_POST['sbLogin'])) {
 	$user = (string) trim(strip_tags($_POST['uname']));
	$pass = (string) trim(strip_tags($_POST['upwd']));
	
	if(strlen($user) >= 1 AND strlen($pass) >= 1) {
		$user = $db->escape($user);
		$pass = $db->escape(md5($pass));
		
		//check login user/pass
		$rs = $db->get_row(sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'", $user, $pass), ARRAY_A);
		
		if($db->num_rows > 0) {
			$_SESSION['loggedIn'] = $rs;
			header("Location: " . SITE_URL . "/my-account");
			exit;
		} else{
			$form_message = do_error(_('Incorrect login credentials'));	
		}
	}else{
		$form_message = do_error(_('Please enter login credentials'));
	}
 }
 
 if(isset($form_message)) $data['login_message'] = $form_message;
 
/*
 * Template
 */
 load_layout('account', $data);
