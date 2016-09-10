<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Terms Of Service') ?></h1>
	<a href="<?= SITE_URL ?>">&#0187; <?=_('Go back to homepage') ?></a>
	
	<br/>
	
	<?=nl2br(get_option('site_tos')) ?>
</div>

<?php require_once 'footer.php'; ?>