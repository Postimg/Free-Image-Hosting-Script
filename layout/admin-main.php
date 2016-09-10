<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Administration : Dashboard') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<span class="span4">
	<?php
	echo '<h3>' . _('Total Images : ') . $images . '</h3>';
	echo '<h3>' . _('Uploaded Today : ') . $images_today . '</h3>';
	
	echo '<h3>' . _('Total Members: ') . $users . '</h3>';
	
	?>
	</span>
	<span class="span4">
	
	<?php
	echo '<h3>' . _('Total Servers : ') . $servers . '</h3>';
	echo '<h3>' . _('Images / Server : ') . '</h3>';
	
	if(count($images_per_server)) {
		foreach($images_per_server as $srv) {
			echo _('Server : ' ) . $srv->server . ' => ' . $srv->tImages . _(' images') . '<br />';
		}
	} 
	?>
	</span>
	
	<div style="clear:both;"></div>
	
</div>

<?php require_once 'footer.php'; ?>