<script>


	// if(Touno.Cookie('ACCESS') == ""){
	// 	$('#btnCancel').hide();
	// 	$('#btnEditor').hide();
	// }
	// var editor;

	// function toggleEditor(unSave) {
	// 	var config = { height: '350px' };
	// 	if(!editor) {
	// 		$('#email').hide();
	// 		$('#btnEditor').val('Save');
	// 		$('#contents').hide();
	// 		$('#editor').show();
	// 		$('#btnCancel').show();
	// 		editor = CKEDITOR.appendTo( 'editor', config, $('#contents').html());
	// 	} else {
	// 		$('#email').show();
	// 		$('#contents').show();
	// 		$('#editor').hide();
	// 		$('#btnCancel').hide();
	// 		$('#btnEditor').val('Editor');
	// 		if(!unSave) {
	// 			$('#contents').html(editor.getData());
	// 			$.ajax({
	// 				url: 'action/contant_editor.php',
	// 				data: { title : 'contact', des: editor.getData() },
	// 				type: 'POST',
	// 				dataType:"JSON",
	// 				error: function(){ alert('fail.'); }	
	// 			});
	// 		}
	// 		// Destroy the editor.
	// 		editor.destroy();
	// 		editor = null;
	// 	}
	// }
	
	// function sending() {
	// 	$('#btnSend').prop('disable', true);
	// 	$.ajax({
	// 		url: 'action/sending_email.php',
	// 		data: { 
	// 			name : $('#txtName').val(),
	// 			email : $('#txtEmail').val(),
	// 			subject : $('#txtSubject').val(),
	// 			message : $('#txtMessage').val()
	// 		},
	// 		type: 'POST',
	// 		dataType:"HTML",
	// 		error: function(){ alert('fail.'); },
	// 		success: function(data){ alert(data); $('#btnSend').prop('disable', false); }	
	// 	});
	// }
	// javascript:grecaptcha.reset(reCallback);
var recaptchaAccept = false, recaptchaContact = false;
var recaptchaOnload = function() {
	recaptchaContact = grecaptcha.render('recaptcha', {
		// 'callback' : function(response) { alert(response); },
		'sitekey' : '6Leq_hATAAAAAGlK8bgySwlFsX7RKj3j_5uRpdxV',
		'theme' : 'light'
	});
};

$(function(){

	var editor = CKEDITOR.appendTo('contact-us-editor', {}, $('#contact-us-contents').html());
	editor.on( 'change', function( evt ) {
	    // getData() returns CKEditor's HTML content.
	    console.log( 'Total bytes: ' + evt.editor.getData().length );
	});

	$('#contact-us-contents button[type="reset"]').click(function(event){
    	// event.preventDefault();
    	javascript:grecaptcha.reset(recaptchaContact);
    	$('form#contact-us fieldset div.form-group').attr('class','form-group');
	});
	$('#contact-us-contents').submit(function(event){
		event.preventDefault();
		alert(grecaptcha.getResponse(recaptchaContact));

	});

});
</script>
<div class="container">
	<?php $home = $base->row("SELECT title, description FROM contents WHERE title_id='contact'"); ?>
	<div class="col-lg-12">
        <h2><?php echo $home['title']; ?><i class="fa fa-pencil-square-o fa-event"></i></h2>
<!-- 		<div class="btn-group btn-toolbar">
		  <a id="btnEditor" onclick="toggleEditor();" href="#" class="btn btn-primary">Editor</a>
		  <a id="btnCancel" onclick="toggleEditor(true);" href="#" class="btn btn-default">Cancel</a>
		</div> -->
	</div>
	<div class="col-lg-6 contact-us">
		<div id="contact-us-contents"><?php echo $home['description']; ?></div>
		<div id="contact-us-editor" style="display: none"></div>
	</div>
	<div class="col-lg-6">
		<div class="well bs-component" style="margin-top:10px;">
			<form class="form-horizontal" id="contact-us">
			  <fieldset>
			    <div class="form-group">
			      <label for="txtName" class="col-lg-2 control-label">Name</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control input-sm" id="txtName" placeholder="Name">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="txtEmail" class="col-lg-2 control-label">Email</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control input-sm" id="txtEmail" placeholder="Email">
			      </div>
			    </div>

			    <div class="form-group">
			      <label for="txtSubject" class="col-lg-2 control-label">Subject</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control input-sm" id="txtSubject" placeholder="Subject">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="txtMessage" class="col-lg-2 control-label">Message</label>
			      <div class="col-lg-10">
			        <textarea class="form-control" rows="3" id="txtMessage"></textarea>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="txtMessage" class="col-lg-2 control-label">Captcha</label>
			      <div class="col-lg-10">
			        <div id="recaptcha"></div>
			        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			      </div>
			    </div>

			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Reset</button>
			        <button type="submit" class="btn btn-primary">Send Email</button>
			      </div>
			    </div>
			  </fieldset>
			  <script src="//www.google.com/recaptcha/api.js?onload=recaptchaOnload&render=explicit" async></script>
			</form>
		</div>
	</div>
	<div class="col-lg-12 fix-footer"><hr><div class="icon-hr"></div></div>
</div>