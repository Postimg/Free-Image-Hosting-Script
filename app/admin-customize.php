<?php
/*
 * Logic
 */
 if(isset($_POST['sbOptions'])) {
 	
	unset($_POST['sbOptions']);
	 
	$updated = 0;
	 
	foreach($_POST as $k=>$v) {
		$option = trim(strip_tags($v));
		
		if($option != "") {
			if(update_option($k, $option)) {
				$updated += 1;
			}
		}
	}
	
	$data['updated'] = $updated;
	 
 }
 
 
 /*
  * Template
  */
  load_layout('admin-customize', $data);
