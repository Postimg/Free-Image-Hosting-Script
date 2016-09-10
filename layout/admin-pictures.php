<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Pictures Administration') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php
	if(count($pictures)) {
	?>
	<table class="table-bordered table-hover table-striped table-sortable table-condensed" width="100%">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th><?=_('User') ?></th>
				<th><?=_('Date') ?></th>
				<th><?=_('Views') ?></th>
				<th><?=_('Server') ?></th>
				<th><?=_('Remove') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($pictures as $p) {
				$user = ($p->username == NULL) ? 'Guest' : $p->username;
				
				$image_main = $p->image_name;
				$image_path = image_path($p);
				$image_size = getimagesize($image_path);
				
				if($image_size[0] > 124) {
					$thumbnail = str_replace("original", "thumbnail", $image_path);
				}else{
					$thumbnail = $image_path;
				}
				
				?>
				<tr>
					<td>
						<a href="<?=SITE_URL ?>/view-image/<?=$image_main ?>" target="_blank">
							<img src="<?=$thumbnail ?>" alt="" />
						</a>
					</td>
					<td>
						<?php if($user != 'Guest') : ?>
							<a href="<?=SITE_URL ?>/user-gallery/<?=$p->username ?>" target="_blank"><?=$p->username ?></a>
						<?php else: ?>
							Guest
						<?php endif; ?>
					</td>
					<td><?=date("jS F Y", $p->image_date) ?></td>
					<td><?=$p->image_views ?></td>
					<td><?=$p->server ?></td>
					<td><a href="<?=SITE_URL ?>/admin-pictures?remove=<?=$p->imageID ?>"><b class="icon-remove-sign"></b></a></td>
				</tr>
				<?php
			} 
			?>
		</tbody>
	</table>
	<?php
	}else{
		echo _("No pictures yet!");
	}
	?>
	
</div>

<?php require_once 'footer.php'; ?>