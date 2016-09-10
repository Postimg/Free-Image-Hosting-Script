<?php
require_once 'db.php';

/*
 * Site URL
 */
define('SITE_URL', 'http://imgtube.ml');

/*
 * App PATH
 */
define("APP_PATH", getcwd());

/*
 * Require APP Library
 */
require_once 'app/library/library.php';

$data = array();

/*
 * Admin details
 */
define("ADMIN_USERNAME", "admin");
define("ADMIN_PASSWORD", "scripteen#");

/*
 * Require Image Resize Class
 */
require_once 'app/library/class.imageResize.php';
$imageResizeClass = new SimpleImage;

/*
 * Disable magic quotes
 */
if (get_magic_quotes_gpc()) {
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) {
			unset($process[$key][$k]);
			if (is_array($v)) {
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}

/*
 * Banned IP
 */
 if(is_user_banned()) exit;
?>