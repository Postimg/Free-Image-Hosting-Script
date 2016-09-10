<?php require_once 'header.php'; ?>

<div class="bg-container">
	<div class="container" style="padding-top:20px;">
	
	<div class="span7" style="margin-left:0;">		
	<?php
	
	if(isset($error)) {
		echo $error;
	}else{
		
		$how_many = count($just_uploaded);
		if($how_many) {
			
			//show width depending on original width
			$image_main = $just_uploaded[0]->image_name;
			$image_date = $just_uploaded[0]->image_date;
			$image_size = getimagesize(image_path($just_uploaded[0], 'original', $just_uploaded[0]->image_srv));
			$image_width = ($image_size[0] > 640) ? 640 : 'original';
			$hasThumbanil =  ($image_size[0] > 124) ? TRUE : FALSE;
			?>
			
			<img src="<?= image_path($just_uploaded[0], $image_width, image_server($image_main)) ?>" alt="<?=$image_main ?>" />
			
			<?php
			if($how_many > 1) {
				
				$other_uploaded = (object) array_slice($just_uploaded, 1);
					
				echo "<h2>Other images</h2>";
				
				foreach($other_uploaded as $image) {
					$image = (array) $image;
					$image_size = getimagesize(image_path($image, 'original', $image['image_srv']));
					$image_width = ($image_size[0] >= 124) ? 'thumbnail' : 'original';
					
					echo '<div  class="image-thumbnail">';
					echo '<a href="' . SITE_URL . '/view-image/' . $image['image_name'] . '">';
					echo '<img src="'.image_path($image, $image_width, image_server($image['image_name'])).'"  alt="' . $image['image_name'] . '"/>';
					echo '</a>'; 
					echo '</div>';
					
				}
			}
			
			
		}else{
			echo do_error(_('Images were not found in database'));
		}
			

	?>
	</div><!--left span-->
	
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
		<input type="text" value="<?= image_path($just_uploaded[0], 'original', image_server($image_main)) ?>" class="input-large input-focus" />
		
		<br/>
		<?=_('HTML Original Size') ?>
		<input type="text" value="<?php echo htmlentities('<a href="'.image_path($just_uploaded[0], 'original', image_server($image_main)).'"><img src="'.image_path($just_uploaded[0], 'original', image_server($image_main)).'"/>') ?></a>" class="input-large input-focus" />
		
		<?=_('FORUM Original Size') ?>
		<input type="text" value="[IMG]<?= image_path($just_uploaded[0], 'original', image_server($image_main)) ?>[/IMG]" class="input-large input-focus" />
		
		<?php if($hasThumbanil) : ?>
		<br/>
		<?=_('Direct Thumbnail Link') ?>
		<input type="text" value="<?= image_path($just_uploaded[0], 'thumbnail', image_server($image_main)) ?>" class="input-large input-focus" />
		
		<?=_('HTML Thumbnail Size') ?>
		<input type="text" value="<?php echo htmlentities('<a href="'.image_path($just_uploaded[0], 'thumbnail', image_server($image_main)).'"><img src="'.image_path($just_uploaded[0], 'thumbnail', image_server($image_main)).'"/>') ?></a>" class="input-large input-focus" />
		
		<?=_('FORUM Thumbnail Size') ?>
		<input type="text" value="[IMG]<?= image_path($just_uploaded[0], 'thumbnail', image_server($image_main)) ?>[/IMG]" class="input-large input-focus" />
		<?php endif; ?>
		
	</div>
	
	<?php }//if no error ?>
	
	<div style="clear:both;"></div>

</div>
</div>


<?php require_once 'footer.php'; ?>