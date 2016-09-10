<?php
/*
 * Logic
 */
 
 if(!is_admin()) {
 	header("Location: /" . SITE_URL . "/admin");
	exit;
 }
 
 
 //remove a server
 if(isset($_GET['remove'])) {
 	$ID = (int) abs(intval($_GET['remove']));
	 
	 if($ID == 1) {
	 	$data['error_delete'] = do_error(_("Dont remove the main server."));
	 }else{
	 
	 //delete server images from db
	 $db->query(sprintf("DELETE FROM images WHERE image_srv = '%d'", $ID));
	 
	 //delete server
	 $db->query(sprintf("DELETE FROM servers WHERE serverID = '%d'", $ID));
	 
	 }
	 
 }
 
 //add a server 
 if(isset($_POST['sbFTP'])) {
 	
	$error = false;
	 
 	foreach($_POST as $K => $V) 
 	{
 		$_POST[$K] = (string) trim(strip_tags($V));
		
		if($_POST[$K] == "") {
			$data['ftp_error'] = do_error(_("Complete all the fields!"));
			$error = true;
		}
	}
	
	if(!$error) {
		//test FTP details
		
		$ftp_server = $_POST['server'];
		$conn_id = ftp_connect($ftp_server); 

		// login with username and password
		$login_result = ftp_login($conn_id, $_POST['ftp_user'], $_POST['ftp_pass']); 
		
		// check connection
		if ((!$conn_id) || (!$login_result)) {
		    die("FTP connection has failed !");
		}
		
		if (ftp_chdir($conn_id, $_POST['server_path'])) {
    		
			//insert FTP Server
			$db->query(sprintf("INSERT INTO servers VALUES (null, '%s', '%s', '%s', '%s', '%s')",
			                    $_POST['server'], $_POST['ftp_user'], $_POST['ftp_pass'], 
			                    $_POST['server_path'], $_POST['server_url']));
			
			if($db->insert_id) {
				header("Location: " . SITE_URL ."/admin-servers");
				exit;
			}else{
				$data['ftp_error'] = do_error(_("Database ERROR! Cannot insert FTP Server Details!"));
			}
			
		}else{
			die("Could not change directory to : " . $_POST['server_path'] . ". Current directory is : " . ftp_pwd($conn_id));
		}
	}
	 
 }
 
 //get servers list
 $servers = $db->get_results("SELECT servers.*, (SELECT COUNT(*) as i FROM images WHERE image_srv = serverID) AS i FROM servers");
 $data['servers'] = $servers;
 
/*
 * Load template
 */
 load_layout('admin-servers', $data);
