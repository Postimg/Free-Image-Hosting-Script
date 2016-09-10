<?php
session_start();

/*
 * Set content type
 */
header("Content-type: text/html;charset=utf-8");


//translation file
require_once 'translation.php';

//start output
ob_start();

//include bootstrap
require_once 'bootstrap.php';

/*CRON STARTS*/
if(isset($_GET['cron'])) {
	exit;
}
/*CRON ENDS*/

//require the page
if(isset($_GET['page'])) {
		
	// $page can only contain letters, numbers and '_'/'-'/'.'
	$page = (string) trim(strip_tags($_GET['page']));
	$page = preg_replace('/[^a-zA-Z0-9_\-\/\.]/', '', $page);
	
	
	if(file_exists(getcwd() . '/app/' . $page . '.php')) {
		require_once getcwd() . '/app/' . $page . '.php';
	}elseif(stristr($page, "view-image/")) {
		
		$image = explode("/", $page);
		$image_get = end($image);
		
		$page = 'view-image';
		require_once getcwd() . '/app/' . $page . '.php';
		
	}elseif(stristr($page, "user-gallery/")) {
			
		$user = explode("/", $page);
		$user_get = end($user);
		
		$page = 'user-gallery';
		require_once getcwd() . '/app/' . $page . '.php';
		
	}else{
		header("Location: " . SITE_URL . "/404");
		exit;
	}
	
}else{
	
	//load the default page
	$page = 'index';
	
	if(file_exists(getcwd() . '/app/' . $page . '.php')) {
		require_once getcwd() . '/app/' . $page . '.php';
	}else{
		header("Location: " . SITE_URL . "/404");
		exit;
	}
	
}
 
?>