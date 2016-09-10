<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Users Administration') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php
	if(count($users)) {
	?>
	<table class="table-bordered table-hover table-striped table-sortable table-condensed" width="100%">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?=_('Email') ?></th>
				<th><?=_('Username') ?></th>
				<th><?=_('Uploads') ?></th>
				<th><?=_('Remove') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($users as $u) {
				?>
				<tr>
					<td><?=$u->userID ?></td>
					<td><?=$u->email ?></td>
					<td><a href="<?=SITE_URL?>/user-gallery/<?=$u->username ?>" target="_blank"><?=$u->username ?></a></td>
					<td><?=$u->upImages ?> <?=_('images') ?></td>
					<td><a href="<?=SITE_URL ?>/admin-users?remove=<?=$u->userID ?>"><b class="icon-remove-sign"></b></a></td>
				</tr>
				<?php
			} 
			?>
		</tbody>
	</table>
	<?php
	}else{
		echo _("No members yet!");
	}
	?>
	
</div>

<?php require_once 'footer.php'; ?>