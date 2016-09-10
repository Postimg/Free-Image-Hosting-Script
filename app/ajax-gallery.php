<?php
/*
 * AJAX Load more images
 */
 if(isset($_POST['lastID'])) {
 	$lastID = (int) abs(intval($_POST['lastID']));
	
	 $gallery = $db->get_results(sprintf("SELECT imageID, image_name, image_date, username, userID FROM images 
											LEFT JOIN users ON images.image_user = users.userID 
											WHERE show_in_gallery = 'Y' AND imageID < '%d' ORDER BY imageID DESC LIMIT 24", $lastID)); 
	 
	 if($db->num_rows > 0) {
	 	
		foreach($gallery as $image_details) {
			
			$image_main = $image_details->image_name;
			$image_size = getimagesize(image_path($image_details));
			$image_width = ($image_size[0] <= 124) ? 'original' : 'thumbnail';
			
			?>
			<div class="image-thumbnail-gallery" data-id="<?= $image_details->imageID ?>">
				<a href="<?= SITE_URL ?>/view-image/<?= $image_main ?>">
					<img src="<?= image_path($image_details, $image_width, image_server($image_main)) ?>" alt="<?=$image_main ?>" />
				</a>	
			</div>
			<?php
		}
		
	 }else{
	 	echo 'xyz';
	 }
	 
 }
