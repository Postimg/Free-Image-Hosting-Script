<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('My Account') ?></h1>
	
	<form method="post" action="" accept-charset="UTF-8">
		<label>
			<?=_('Username') ?>:
		</label>
		<input type="text" name="username" class="required" readonly="readonly" value="<?=$_SESSION['loggedIn']['username'] ?>"/>
		
		<br/>
		
		<label>
			<?=_('Email') ?>:
		</label>
		<input type="email" name="email" value="<?=$_SESSION['loggedIn']['email'] ?>" class="required" readonly="readonly"/>
		
		<br/>
		
		<label>
			<?=_('Password') ?>:<span class="muted">(<?= _('enter current or a new one') ?>)</span>
		</label>
		<input type="password" name="password" placeholder="****" class="required" />
		
		<br/>
		
		<input type="submit" name="sbacc" value="<?=_('Update Password') ?>" class="btn"/>
	
	</form>
	
	<?php 
	if(isset($message)) echo $message;
	?>
	
</div>

<?php require_once 'footer.php'; ?>