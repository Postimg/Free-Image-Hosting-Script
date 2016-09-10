<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($_REQUEST['page'])) echo ucfirst($_REQUEST['page']) . ' - '; ?><?=get_option('site_title') ?></title>
    <meta name="description" content="Free Image Hosting : Multiple images upload, codes for embeding and sharing plus more.">
    <meta name="author" content="scripteen">

	<!-- Google Fonts-->
	<link href='<?=get_option('google_css') ?>' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	
	<script type="text/javascript">
		var SITE_URL = "<?= SITE_URL ?>";
	</script>

    <!-- Le styles -->
    <link href="<?=SITE_URL ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?=SITE_URL ?>/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="<?=SITE_URL ?>/style.php" type="text/css" rel="stylesheet">
    
    	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
   <script src="<?=SITE_URL ?>/js/bootstrap.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?=SITE_URL ?>/js/si.files.js"></script>
   <script src="<?=SITE_URL ?>/js/jquery.form.js" type="text/javascript"></script>
   <script src="<?=SITE_URL ?>/js/ajax.js" type="text/javascript"></script>
   
	                                   
  </head>

  <body>
  		
  <header>
  	<div class="top-menu">
  		<div class="container">
  			
  		<div class="site-name">
  			<a href="<?= SITE_URL ?>"><?=get_option('site_title') ?></a>
  		</div><!--site name-->
  		<ul>
  			<li<?php if(!isset($_REQUEST['page'])) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>"><?=_('UPLOAD') ?></a></li>
  			<li<?php if(isset($_REQUEST['page']) AND ($_REQUEST['page'] == 'gallery')) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>/gallery"><?=_('GALLERY') ?></a></li>
  			<?php if(!get_user_ID()) { ?>
  				<li<?php if(isset($_REQUEST['page']) AND ($_REQUEST['page'] == 'account')) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>/account"><?=_('LOGIN') ?></a></li>
  				<li<?php if(isset($_REQUEST['page']) AND ($_REQUEST['page'] == 'account')) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>/account"><?=_('SIGNUP') ?></a></li>
  			<?php }else{ ?>
  				<li<?php if(isset($_REQUEST['page']) AND ($_REQUEST['page'] == 'my-account')) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>/my-account"><?=_('MY ACCOUNT') ?></a></li>
  				<li><a href="<?= SITE_URL ?>/logout"><?=_('LOG OUT') ?></a></li>
  			<?php } ?>
  			<li<?php if(isset($_REQUEST['page']) AND ($_REQUEST['page'] == 'tos')) echo ' class="active"'; ?>><a href="<?= SITE_URL ?>/tos"><?=_('TOS') ?></a></li>
  		</ul><!--menu ul-->
  		
  		</div><!--container-->
  	</div><!--top menu-->
  		
  		<div class="top-columns">
  			<div class="container">
  				<div class="span3">
  					<h2><?=_('FREE UPLOAD') ?></h2>
  					<?=_('We dont ask you to SIGN UP for an account to upload.
  					<br/><br/>
  					However registering gives you the option to remove the picture later, find it easier, etc.') ?>
  				</div>
  				<div class="span3">
  					<h2><?=_('EASY TO SHARE') ?></h2>
  					<?=_('We provide you with the codes for embedding and share. <br /><br />
  					HTML Codes, FORUM BB CODES and easy one click to share on Facebook, by email, etc.  ') ?>
  				</div>
  				<div class="span3">
  					<h2><?=_('MORE FEATURES') ?></h2>
  					<?=_('Multiple file upload at once, allowing JPEG, PNG AND GIF files are only a few to mention.
  					<br/><br/>
  					Enjoy using our service and share the word.') ?>
  				</div>
  			</div>
  		</div><!--top 3 columns-->
  		
  </header><!--header containing menu & slider-->
  
  <div class="container">
  <article>
  	
  