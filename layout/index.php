<?php require_once 'header.php'; ?>


<div class="bg-container">
	<div class="container" style="padding-top:10px;text-align: center;">
		<h3><?=_('Upload Images') ?></h3>
		
		<a href="#local" data-toggle="tab" class="btn"><?=_('Local File') ?></a>
		<a href="#remote" data-toggle="tab" class="btn"><?=_('Remote File') ?></a>
		
		<hr style="width:600px;margin-left:200px;"/>
		
		<div class="tab-content">
		  <div class="tab-pane active" id="local">
		
		<div class="local-form">	
			
		  <form method="POST" action="<?=SITE_URL?>/ajax-upload" enctype="multipart/form-data" class="form-horizontal" id="form-local">
		  	
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
		  	
		  	Resize Options : 
		  	<select name="user_resize">
		  		<option value="0">Do no resize</option>
		  		<option value="124">124x89 pixels</option>
		  		<option value="640">640px width</option>
		  		<option value="800">800px width</option>
		  		<option value="1024">1024px width</option>
		  		<option value="1280">1280px width</option>
		  		<option value="1600">1600px width</option>
		  	</select>
		  	<br/><br/>
		  	
		  	<input type="submit" name="sb_upload" value="<?=_("Upload Files") ?>" id="sb-local-upload" class="btn btn-large" />
		  	
		  	<br/><br/>
		  	
		  	<input style="margin-top:-3px;" type="radio" name="terms" value="yes" /> 
		  	<?= _("I agree to the ") ?> <a href="<?php SITE_URL ?>/tos"><?= _("Terms of Service") ?></a>
		  	
		  </div>
		  </form>
		
		  <script type="text/javascript">
		  	SI.Files.stylizeAll();
		  </script>
		  		  			
		  </div>
		  
		  <div id="local-loader" style="display:none;"><img src="<?= SITE_URL ?>/img/loading.gif" alt="" /></div>
		  <div class="local-form-ajax"></div>
		   
		</div><!--local file div-->
		  
	    <div class="tab-pane" id="remote">
	    	
		  <div class="local-form" style="margin-left:210px;">	
		  <form method="POST" action="<?=SITE_URL?>/ajax-upload-remote" enctype="multipart/form-data" class="form-horizontal" id="form-remote">
		  	
		  <!--file 1-->
		  <input type="text" name="remote_1" placeholder="<?=_('Enter file URL') ?>" class="input-xxlarge" style="float:left;" id="remote_filename"/>  
		  
		  <!--file 2-->
		  <div class="input-hidden" id="remote_file_2">
		  	<br/><br/>
		  	<input type="text" name="remote_2" placeholder="<?=_('Enter file URL') ?>" class="input-xxlarge" style="float:left;" id="remote_filename_2"/>
		  </div>
		  
		  <!--file 3-->
		  <div class="input-hidden" id="remote_file_3">
		  	<br/><br/>
		  	<input type="text" name="remote_3" placeholder="<?=_('Enter file URL') ?>" class="input-xxlarge" style="float:left;" id="remote_filename_3"/>
		  </div>
		  
		  <!--file 4-->
		  <div class="input-hidden" id="remote_file_4">
		  	<br/><br/>
		  	<input type="text" name="remote_4" placeholder="<?=_('Enter file URL') ?>" class="input-xxlarge" style="float:left;" id="remote_filename_4"/>
		  </div>
		  
		  <!--file 5-->
		  <div class="input-hidden" id="remote_file_5">
		  	<br/><br/>
		  	<input type="text" name="remote_5" placeholder="<?=_('Enter file URL') ?>" class="input-xxlarge" style="float:left;" id="remote_filename_5"/>
		  </div>
		  
		  <div style="clear:both;width:300px;margin-left:150px;">
		  	<br/>
		  	
		  	Resize Options : 
		  	<select name="user_resize">
		  		<option value="0">Do no resize</option>
		  		<option value="124">124x89 pixels</option>
		  		<option value="640">640px width</option>
		  		<option value="800">800px width</option>
		  		<option value="1024">1024px width</option>
		  		<option value="1280">1280px width</option>
		  		<option value="1600">1600px width</option>
		  	</select>
		  	<br/><br/>
		  	
		  	<input type="submit" name="sb_upload" value="<?=_("Upload Files") ?>" class="btn btn-large" />
		  	
		  	<br/><br/>
		  	
		  	<input style="margin-top:-3px;" type="radio" name="terms" value="yes" /> 
		  	<?= _("I agree to the ") ?> <a href="<?php SITE_URL ?>/tos"><?= _("Terms of Service") ?></a>
		  	
		  </div>
		  </form>
		  </div>
		
		  <script type="text/javascript">
		  	SI.Files.stylizeAll();
		  </script>
		  
		  <div id="remote-loader" style="display:none;"><img src="<?= SITE_URL ?>/img/loading.gif" alt="" /></div>
		  <div class="remote-form-ajax"></div>
		  
		  </div><!--remote file-->
		  
		</div>
		
	</div>
</div>

<?php require_once 'footer.php'; ?>