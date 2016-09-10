<?php require_once 'header.php'; ?>

<div class="well">
	
	<div class="span5">
		
	<h1><?=_("Join Now. It's Free!") ?></h1>	
	 
	<form method="post" action="/ajax-join" id="signup-form" accept-charset="UTF-8">
		<label>
			<?=_('Username') ?>:
		</label>
		<input type="text" name="username" placeholder="username" class="required"/>
		
		<br/>
		
		<label>
			<?=_('Email') ?>:
		</label>
		<input type="email" name="email" placeholder="email" class="required" />
		
		<br/>
		
		<label>
			<?=_('Password') ?>:
		</label>
		<input type="password" name="password" placeholder="****" class="required" />
		
		<br/>
		
		<input type="submit" name="sb_signup" value="<?=_('Join Now') ?>" class="btn"/>
	
	</form>
	
	<div id="signup_output_div"></div>
	
	</div><!--left-->
	
	
	<div class="span4">
		<h1><?=_("Existing Member, Login") ?></h1>
		
		<?php if(isset($login_message)) echo $login_message; ?>
		
		<form method="post" action="" class="form">
			<label><?=_('Username') ?>:</label>
			<input type="text" name="uname" placeholder="username"/><br/>
			
			<label><?=_('Password') ?>:</label>
			<input type="password" name="upwd" placeholder="****"/><br/>
			
			<input type="submit" name="sbLogin" value="<?=_('Login') ?>" class="btn"/>
		</form>
	
	</div><!--right-->
	
	
	<div style="clear:both;"></div>
</div>

<?php require_once 'footer.php'; ?>