<?php require_once 'header.php'; ?>

<?php

if(isset($error)) {
	echo do_error($error);
}else{
	
	if(isset($image_details)) {
		
	$image_main = $image_details->image_name;
	$image_size = getimagesize(image_path($image_details, $type = 'original', $image_details->image_srv));
	
	$image_width = ($image_size[0] > 640) ? 640 : 'original';
	$hasThumbanil =  ($image_size[0] > 124) ? TRUE : FALSE;	
	$user = ($image_details->username == null) ? 'Guest' : '<a href="'.SITE_URL.'/user-gallery/' . $image_details->username . '">' . $image_details->username . '</a>';		
	?>
		
	<div class="bg-container">
	<div class="container" style="padding-top:20px;">
	
	<div class="span7" style="margin-left:0;">
		<?=_('Uploaded by ') . '<em>' . $user . '</em>' . _(' On ') . '<em>' . date("jS F Y", $image_details->image_date) . '</em>' ?>
		
		<?php
		if($image_details->userID == get_user_ID() AND $image_details->userID != 0) {
			echo '<a href="javascript:void();" class="btn btn-medium btn-danger btn-remove" data-id="'.$image_details->imageID.'">' . _('Remove this picture') .'</a>';
		}
		?>
		
		<br/><br/>
		
		<a href="<?= image_path($image_details, 'original', image_server($image_main)) ?>" target="_blank">
			<img src="<?= image_path($image_details, $image_width, image_server($image_main)) ?>" alt="<?=$image_main ?>" />
		</a>	
	</div><!--left-->		
	
	<div class="span3" style="margin-left:0;width:260px;">
		<h3><?=_('Share this image') ?></h3>
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?=SITE_URL ?>/view-image/<?= $image_main ?>">
		<a class="addthis_button_facebook"></a>
		<a class="addthis_button_twitter"></a>
		<a class="addthis_button_pinterest"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5118fa842c662793"></script>
		<!-- AddThis Button END -->
		
		<h3><?=_('Codes to embed') ?></h3>
		<?=_('View Photo Link') ?><br/>
		<input type="text" value="<?=SITE_URL?>/view-image/<?= $image_main ?>" class="input-large input-focus" />
		
		<br/>
		<?=_('Direct Original Link') ?>
		<input type="text" value="<?= image_path($image_details, 'original', image_server($image_main)) ?>" class="input-large input-focus" />
		
		<br/>
		<?=_('HTML Original Size') ?>
		<input type="text" value="<?php echo htmlentities('<a href="'.image_path($image_details, 'original', image_server($image_main)).'"><img src="'.image_path($image_details, 'original', image_server($image_main)).'"/>') ?></a>" class="input-large input-focus" />
		
		<?=_('FORUM Original Size') ?>
		<input type="text" value="[IMG]<?= image_path($image_details, 'original', image_server($image_main)) ?>[/IMG]" class="input-large input-focus" />
		
		<?php if($hasThumbanil) : ?>
		<br/>
		<?=_('Direct Thumbnail Link') ?>
		<input type="text" value="<?= image_path($image_details, 'thumbnail', image_server($image_main)) ?>" class="input-large input-focus" />
		
		<?=_('HTML Thumbnail Size') ?>
		<input type="text" value="<?php echo htmlentities('<a href="'.image_path($image_details, 'thumbnail', image_server($image_main)).'"><img src="'.image_path($image_details, 'thumbnail', image_server($image_main)).'"/>') ?></a>" class="input-large input-focus" />
		
		<?=_('FORUM Thumbnail Size') ?>
		<input type="text" value="[IMG]<?= image_path($image_details, 'thumbnail', image_server($image_main)) ?>[/IMG]" class="input-large input-focus" />
		<?php endif; ?>
		
	</div><!--right-->
	
	<div style="clear: both;border-top:1px solid #efefef;"></div>
		
	<?php
		
	}else{
		echo do_error(_("No Image found with this name"));
	}
	
}
?>


<?php require_once 'footer.php'; ?>