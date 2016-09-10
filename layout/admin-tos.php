<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Administration : Title & TOS') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php if(isset($msg)) echo $msg; ?>
	
	<form method="POST" action="">
		<label>Site Title:</label>
		<input type="text" name="site_title" value="<?=get_option('site_title') ?>" class="input-xlarge" />
		<br/>
		
		<label>Site TOS <span class="muted">HTML Accepted</span></label>
		<textarea name="site_tos" class="input-xxlarge" rows="8"><?=get_option('site_tos') ?></textarea>
		
		<br/>
		<input type="submit" name="sb" value="Save" class="btn"/>	
	</form>
	
</div>

<?php require_once 'footer.php'; ?>