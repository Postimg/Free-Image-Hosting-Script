<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Administration : Title & TOS') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php if(isset($msg)) echo $msg; ?>
	
	<form method="POST" action="">
		
		<label>Banned IP's <span class="muted">ONE IP ADDRESS PER LINE</span></label>
		<textarea name="banned" class="input-xxlarge" rows="8"><?=(get_option('banned_ip')) ?></textarea>
		
		<br/>
		<input type="submit" name="sb" value="Save" class="btn"/>	
	</form>
	
</div>

<?php require_once 'footer.php'; ?>