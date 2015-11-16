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
	// 				data: { title : 'home', des: editor.getData() },
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
<div id="main-home">
	RAANNUCH
</div>
<?php
$home = $base->row("SELECT description FROM contents WHERE title_id='home'"); 

$recommend = $base->fetch("SELECT p.product_id, name_en, name_th, price, size, image_path FROM 
(SELECT product_id, COUNT(product_id) FROM billing_detail GROUP BY product_id ORDER BY COUNT(product_id) DESC, product_id ASC LIMIT 1, 6) db 
INNER JOIN product p ON p.product_id = db.product_id");

$new = $base->fetch("SELECT product_id, name_en, name_th, price, size, image_path FROM product ORDER BY product_id DESC LIMIT 1, 6");
?>


<div class="container">
	<div class="col-lg-12">
        <h2>Fast, Friendly Delivery<i class="fa fa-pencil-square-o fa-event"></i></h2>
		<div id="home-contents"><?php echo $home['description']; ?></div>
		<div id="home-editor" style="display: none"></div>
	</div>
	<div class="col-lg-12">
		<h3>Product Recommended</h3>
	</div>
	<?php $loop = 1; foreach($recommend as $dRow): ?>
	<div class="col-lg-4" style="padding:10px 50px;">
		<div>
            <div class="product-th"><?php echo $dRow['name_th'].(trim($dRow['size']) == '' ? '' : ' ('.$dRow['size'].')'); ?></div>
            <div class="product-en"><?php echo $dRow['name_en']; ?></div>
        </div>
		<div style="height: 185px;background:url(<?php echo "//".$_SERVER["HTTP_HOST"]."/".$dRow['image_path']; ?>) center center no-repeat; background-size: contain;"></div>
		<div>
			<div class="form-group product-qty">
			  <div class="input-group">
			    <span class="input-group-addon"><div class="product-price"><i class="fa fa-gbp" style="font-size: 15px;margin-right: 4px;"></i><?php echo $dRow['price']; ?></div></span>
			    <input type="number" min="1" max="99" class="form-control" style="text-align:center;" maxlength="2" value="1">
			    <span class="input-group-btn">
			      <button class="btn btn-default" type="button">Add Cart</button>
			    </span>
			  </div>
			</div>
		</div>
	</div>
	<?php $loop++; endforeach; ?>

	<div class="col-lg-12">
		<h3>Product New</h3>
	</div>
	<?php $loop = 1; foreach($new as $dRow): ?>
	<div class="col-lg-4" style="padding:10px 50px;">
		<div>
            <div class="product-th"><?php echo $dRow['name_th'].(trim($dRow['size']) == '' ? '' : ' ('.$dRow['size'].')'); ?></div>
            <div class="product-en"><?php echo $dRow['name_en']; ?></div>
        </div>
		<div style="height: 185px;background:url(<?php echo "//".$_SERVER["HTTP_HOST"]."/".$dRow['image_path']; ?>) center center no-repeat; background-size: contain;"></div>
		<div>
			<div class="form-group product-qty">
			  <div class="input-group">
			    <span class="input-group-addon"><div class="product-price"><i class="fa fa-gbp" style="font-size: 15px;margin-right: 4px;"></i><?php echo $dRow['price']; ?></div></span>
			    <input type="number" min="1" max="99" class="form-control" style="text-align:center;" maxlength="2" value="1">
			    <span class="input-group-btn">
			      <button class="btn btn-default" type="button">Add Cart</button>
			    </span>
			  </div>
			</div>
		</div>
	</div>
	<?php $loop++; endforeach; ?>
	<div class="col-lg-12 fix-footer"><hr><div class="icon-hr"></div></div>
</div>