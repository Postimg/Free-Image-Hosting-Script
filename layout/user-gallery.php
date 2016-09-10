<?php require_once 'header.php'; ?>

<div class="well" style="margin-top:-10px;">
	<h1><?=$username ."'s " . _('Gallery') ?></h1>
	
	<span style="display:none;" id="user-gallery-id"><?=$userID?></span>

	<?php
	if(!isset($gallery)) {
		echo _("No items in this users's gallery yet!");
	}else{
		foreach($gallery as $image_details) {
			
			$image_main = $image_details->image_name;
			$image_size = getimagesize(image_path($image_details));
			$image_width = ($image_size[0] <= 124) ? 'original' : 'thumbnail';
			
			?>
			<div class="image-thumbnail-gallery" data-id="<?= $image_details->imageID ?>">
				<a href="<?= SITE_URL ?>/view-image/<?= $image_main ?>">
					<img src="<?= image_path($image_details, $image_width, image_server($image_main)) ?>" alt="<?=$image_main ?>" />
				</a>
				<br/>
			</div>
			<?php
		}
		
		echo '<div style="clear:both;" id="inject-before"></div>';
		
		?>
		
		<div class="load_more">
			<div class="more-loading" style="display:none;"><img src="<?=SITE_URL?>/img/loading.gif" alt="loading" /></div>
			<a href="javascript:void(0);" class="btn" id="load-more-user" data-id="<?= $userID ?>"><?=_("Show more images") ?></a>
		</div>
		
		<?php
	}
	?>
</div>

<?php require_once 'footer.php'; ?>