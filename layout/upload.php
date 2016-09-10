<?php require_once 'header.php'; ?>


<div style="width:994px;min-height: 350px;background:url('img/bg.png') no-repeat;">
	<div class="container" style="padding-top:10px;text-align: center;">
		<h3><?=_('Upload Images') ?></h3>
		
		<a href="#local" data-toggle="tab" class="btn"><?=_('Local File') ?></a>
		<a href="#remote" data-toggle="tab" class="btn"><?=_('Remote File') ?></a>
		
		<hr style="width:600px;margin-left:200px;"/>
		
		<div class="tab-content">
		  <div class="tab-pane active" id="local">
		
		<div class="local-form">
		  <form method="POST" action="<?=SITE_URL?>/ajax-upload" enctype="multipart/form-data" class="form-horizontal">
		  	
		  <!--file 1-->
		  <input type="text" name="filename[]" placeholder="<?=_('Choose files from your computer') ?>" class="input-xxlarge" style="float:left;" id="up_filename"/>  
		  <label class="cabinet" style="float:left;margin-top:-2px;"> 
			  <input type="file" class="file" name="up_file[]" id="up_file"/>
		  </label>
		  
		  <!--file 2-->
		  <div class="input-hidden" id="file_2">
		  <input type="text" name="filename[]" placeholder="<?=_('Choose files from your computer') ?>" class="input-xxlarge" style="float:left;" id="up_filename_2"/>  
		  <label class="cabinet" style="float:left;margin-top:-2px;"> 
			  <input type="file" class="file" name="up_file[]" id="up_file_2"/>
		  </label>
		  </div>
		  
		  <!--file 3-->
		  <div class="input-hidden" id="file_3">
		  <input type="text" name="filename[]" placeholder="<?=_('Choose files from your computer') ?>" class="input-xxlarge" style="float:left;" id="up_filename_3"/>  
		  <label class="cabinet" style="float:left;margin-top:-2px;"> 
			  <input type="file" class="file" name="up_file[]" id="up_file_3"/>
		  </label>
		  </div>
		  
		  <!--file 4-->
		  <div class="input-hidden" id="file_4">
		  <input type="text" name="filename[]" placeholder="<?=_('Choose files from your computer') ?>" class="input-xxlarge" style="float:left;" id="up_filename_4"/>  
		  <label class="cabinet" style="float:left;margin-top:-2px;"> 
			  <input type="file" class="file" name="up_file[]" id="up_file_4"/>
		  </label>
		  </div>
		  
		  <!--file 5-->
		  <div class="input-hidden" id="file_5">
		  <input type="text" name="filename[]" placeholder="<?=_('Choose files from your computer') ?>" class="input-xxlarge" style="float:left;" id="up_filename_5"/>  
		  <label class="cabinet" style="float:left;margin-top:-2px;"> 
			  <input type="file" class="file" name="up_file[]" id="up_file_5"/>
		  </label>
		  </div>
		  
		  <div style="clear:both;width:300px;margin-left:150px;">
		  	<br/>
		  	<input type="submit" name="sb_upload" value="<?=_("Upload Files") ?>" class="btn btn-large btn-success" />
		  	
		  	<br/><br/>
		  	
		  	<input style="margin-top:-3px;" type="radio" name="terms" value="yes" /> 
		  	<?= _("I agree to the ") ?> <a href="<?php SITE_URL ?>/tos"><?= _("Terms of Service") ?></a>
		  	
		  </div>
		  </form>
		
		  <script type="text/javascript">
		  	SI.Files.stylizeAll();
		  </script>
		  		  			
		  </div>
		  
		   
		</div><!--local file div-->
		  
		  <div class="tab-pane" id="remote">
		  	Remote file upload
		  </div><!--remote file-->
		  
		</div>
		
	</div>
</div>

<?php require_once 'footer.php'; ?>