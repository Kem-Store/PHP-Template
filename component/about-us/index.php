<script>

	// if(Touno.Cookie('ACCESS') == ""){
	// 	$('#btnCancel').hide();
	// 	$('#btnEditor').hide();
	// }
	// var editor;

	// function toggleEditor(unSave) {
	// 	var config = { height: '600px' };
	// 	if(!editor) {
	// 		$('#btnEditor').val('Save');
	// 		$('#contents').hide();
	// 		$('#editor').show();
	// 		$('#btnCancel').show();
	// 		editor = CKEDITOR.appendTo( 'editor', config, $('#contents').html());
	// 	} else {
	// 		$('#contents').show();
	// 		$('#editor').hide();
	// 		$('#btnCancel').hide();
	// 		$('#btnEditor').val('Editor');
	// 		if(!unSave) {
	// 			$('#contents').html(editor.getData());
	// 			$.ajax({
	// 				url: 'action/contant_editor.php',
	// 				data: { title : 'about', des: editor.getData() },
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

</script>
<div class="container">
	<?php $home = $base->row("SELECT title, description FROM contents WHERE title_id='about'"); ?>
	<div class="col-lg-12">
        <h2><?php echo $home['title']; ?><i class="fa fa-pencil-square-o fa-event"></i></h2>
	</div>
	<div class="col-lg-12 contact-us">
		<div id="contact-us-contents"><?php echo $home['description']; ?></div>
		<div id="contact-us-editor" style="display: none"></div>
	</div>
	<div class="col-lg-12"><hr><div class="icon-hr"></div></div>
</div>