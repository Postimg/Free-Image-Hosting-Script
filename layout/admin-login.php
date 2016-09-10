<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Please login') ?></h1>
	
	<?php if(isset($login_error)) echo $login_error; ?>
	
	<form method="post" action="<?=SITE_URL ?>/admin" class="form-horizontal">
		<input type="text" name="au" placeholder="username"/>
		<input type="password" name="ap" placeholder="********"/>
		<input type="submit" name="asb" class="btn" value="Login" />
	</form>
	
</div>

<?php require_once 'footer.php'; ?>