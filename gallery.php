<?php require_once 'header.php'; ?>

<div class="well" style="margin-top:-10px;">
	<h1><?=_('Gallery') ?></h1>

	<?php
	if(!isset($gallery)) {
		echo _("No items in the gallery yet!");
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
			</div>
			<?php
		}
		
		echo '<div style="clear:both;" id="inject-before"></div>';
		
		?>
		
		<div class="load_more">
			<div class="more-loading" style="display:none;"><img src="<?=SITE_URL?>/img/loading.gif" alt="loading" /></div>
			<a href="javascript:void(0);" class="btn" id="load-more"><?=_("Show more images") ?></a>
		</div>
		
		<?php
	}
	?>
</div>
<center>
 <!-- Begin BidVertiser code -->
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=630136&bid=1580040" type="text/javascript"></SCRIPT>
<noscript><a href="http://www.bidvertiser.com/bdv/BidVertiser/bdv_publisher_toolbar_creator.dbm">custom toolbar</a></noscript>
<!-- End BidVertiser code --> 
</center>

<script type='text/javascript'>
$(document).ready(function() {
$('img#closed').click(function(){
$('#btm_banner').hide(90);
});
});
</script><br />

<script type="text/javascript">var a=navigator,b="userAgent",c="indexOf",f="&m=1",g="(^|&)m=",h="?",i="?m=1";function j(){var d=window.location.href,e=d.split(h);switch(e.length){case 1:return d+i;case 2:return 0<=e[1].search(g)?null:d+f;default:return null}}if(-1!=a[b][c]("Mobile")&&-1!=a[b][c]("WebKit")&&-1==a[b][c]("iPad")||-1!=a[b][c]("Opera Mini")||-1!=a[b][c]("IEMobile")){var k=j();k&&window.location.replace(k)};
</script><script type="text/javascript">
if (window.jstiming) window.jstiming.load.tick('headEnd');
</script><br />
<!--start: floating ads masanwar.com--><br />
<div id="teaser2" style="width:autopx; height:autopx; text-align:left; display:scroll;position:fixed; bottom:0px;left:0px;">
<div>
</a><br />
</div>
<!--Mulai Iklan Kiri--><br />
<script type="text/javascript" src="http://yllix.com/slider.php?section=General&pub=459263&ga=a&side=left"></script>
<!--Akhir Iklan Kiri--><br />
</div>
<div id="teaser3" style="width:autopx; height:autopx; text-align:right; display:scroll;position:fixed; bottom:0px;right:0px;">
<div>
</a><br />
</div>
<!--Mulai Iklan Kanan--><br />
 <!-- Begin BidVertiser code -->
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=630136&bid=1577529" type="text/javascript"></SCRIPT>
<noscript><a href="http://www.bidvertiser.com/bdv/BidVertiser/bdv_publisher_toolbar_creator.dbm">custom toolbar</a></noscript>
<!-- End BidVertiser code --> 
<!--Akhir Iklan Kanan--><br />
</div>


<?php require_once 'footer.php'; ?>