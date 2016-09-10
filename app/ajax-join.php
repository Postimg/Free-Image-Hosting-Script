<?php
/*
 * Logic here
 */
//sanitize fields
foreach($_POST as $k=>$v) $_POST[$k] = $db->escape(trim(strip_tags($v)));
$p = (object) $_POST;

$error = '';

//check for valid email address
if(!filter_var($p->email, FILTER_VALIDATE_EMAIL)) { 
    $error .= _('Please enter a valid email');
    $error .= '<br/>';
}

//check for a valid username
if(!preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $p->username)) {
    $error .= _('Please use only A-Z characters, numbers and underscores for username');
	$error .= '<br/>';
}
	
//check for at least 6 characters in password
if(strlen($p->password) < 6) { 
    $error .= _('Please have at least 6 characters for the password.');
	$error .= '<br/>';
}
	
if($error == '')
{
    //if no errors matched, check if user already exists
    $rs = $db->get_row(sprintf("SELECT * FROM users WHERE username = '%s'", $p->username));
    if(count($rs)) die('<div class="alert alert-important">'. _('Username taken, please choose another one') . '</div>');
    
    $rs = $db->get_row(sprintf("SELECT * FROM users WHERE email = '%s'", $p->email));
    if(count($rs)) die('<div class="alert alert-important">'. _('Email taken, please choose another one') . '</div>');
    
    //if all good let's submit register this user
    $rs = $db->query("INSERT INTO users VALUES (null, '".$p->username."', '".$p->email."', '".md5($p->password)."', '".time()."', '')");
    
    $_SESSION['loggedIn']['userID'] = $db->insert_id;
	$_SESSION['loggedIn']['username'] = $p->username;
	$_SESSION['loggedIn']['email'] = $p->email;
                                
    print '<div class="alert alert-success">' . _('You are now registered & logged in as <strong>'.$p->username.'</strong>') . '</div>';
    
    exit;                            
    
}else{
    //print the error
    echo '<div class="alert alert-error">'.$error.'</div>';
}