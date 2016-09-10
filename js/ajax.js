$(function() {
	
	//file 1 => 2
	$('#up_file').change(function(e){
	  $("#up_filename").val(($(this).val()));
	  $("#file_2").show();
	});
	
	//file 2 => 3
	$('#up_file_2').change(function(e){
	  $("#up_filename_2").val(($(this).val()));
	  $("#file_3").show();
	});
	
	//file 3 => 4
	$('#up_file_3').change(function(e){
	  $("#up_filename_3").val(($(this).val()));
	  $("#file_4").show();
	});
	
	//file 4 => 5
	$('#up_file_4').change(function(e){
	  $("#up_filename_4").val(($(this).val()));
	  $("#file_5").show();
	});
	
	//file 5
	$('#up_file_5').change(function(e){
	  $("#up_filename_5").val(($(this).val()));
	});
	
	//local form ajaxify
	var options = { 
        target:        '.local-form-ajax',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
    }; 
 
    // bind form using 'ajaxForm' 
    $("#sb-local-upload").click(function() {
    	$("#local-loader").show();	 
    });
    
    $('#form-local').ajaxForm(options); 
    
    // pre-submit callback 
	function showRequest(formData, jqForm, options) { 
	    $("#local-loader").show();	 
	} 
	 
	// post-submit callback 
	function showResponse(responseText, statusText, xhr, $form)  {
		if(responseText == 'show-view') {
			document.location.href = 'just-uploaded';
		} 
	    $("#local-loader").hide(); 
	} 
	
	//remote form ajaxify
	var options = { 
        target:        '.remote-form-ajax',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#form-remote').ajaxForm(options); 
    
    // pre-submit callback 
	function showRequest(formData, jqForm, options) { 
	    $("#remote-loader").show();	 
	} 
	 
	// post-submit callback 
	function showResponse(responseText, statusText, xhr, $form)  {
		if(responseText == 'show-view') {
			document.location.href = 'just-uploaded';
		} 
	    $("#remote-loader").hide(); 
	} 
	
	//show second field for remote
	$("#remote_filename").focus(function() {
		$("#remote_file_2").show('slow');
	});
	
	//show third
	$("#remote_filename_2").focus(function() {
		$("#remote_file_3").show('slow');
	});
	
	//show fourth
	$("#remote_filename_3").focus(function() {
		$("#remote_file_4").show('slow');
	});
	
	//show fifth
	$("#remote_filename_4").focus(function() {
		$("#remote_file_5").show('slow');
	});
	
	//load more GALLERY images button
	$("#load-more").on('click', function() {
		
		$('.more-loading').show();
		
		var btn = $(this);
		var last = $('div.image-thumbnail-gallery').last();
		var ID = last.attr("data-id");
		
		$.post("ajax-gallery", {lastID : ID}, function(data) {
			if(data != 'xyz') {
				$("#inject-before").before(data);
			}else{
				btn.hide();
				btn.before("No more images");
			}
			
			$('.more-loading').hide();
		});
		
	});
	
	//load more USER GALLERY images button
	$("#load-more-user").on('click', function() {
		
		$('.more-loading').show();
		
		var btn = $(this);
		var last = $('div.image-thumbnail-gallery').last();
		var ID = last.attr("data-id");
		var uID = $("#user-gallery-id").html();
		
		$.post(SITE_URL + "/ajax-user-gallery", {lastID : ID, userID : uID}, function(data) {
			if(data != 'xyz') {
				$("#inject-before").before(data);
			}else{
				btn.hide();
				btn.before("No more images");
			}
			
			$('.more-loading').hide();
		});
		
	});
	
	//signup ajax
	$("#signup-form").ajaxForm({target:'#signup_output_div'});
	
	//remove an image
	$(".btn-remove").click(function() {
		var theid = $(this).attr("data-id");
		
		$.post(SITE_URL + "/ajax-delete", {id : theid}, function(data) {
			alert(data);
		});
		
	});
	
});
