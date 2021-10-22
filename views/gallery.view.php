<?php
!
  include __DIR__ . "/partials/header-doc.part.php";

?>

<!-- Principal Content Start -->
    <div id="gallery">
        <div class="container">
   	        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>Galería</h1>
            <hr>
            <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<?php
                include __DIR__ . "/partials/show-messages.part.php";
			?>
            
            <?php if (("POST" === $_SERVER["REQUEST_METHOD"]) && (empty($errors))):?>
                <a href="<?=$imgUrl?>" target="_blank">Ver imagen</a>
            <?php endif;?>
            
			<form class="form-horizontal" action="/gallery.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-xs-12">
						<label for="image" class="label-control">Imagen</label>
						<input class="form-control-file" type="file" name="image">
					</div>				
                </div>				
				<div class="form-group">
					<div class="col-xs-12">
						<label for="description" class="label-control">Descripción</label>
						<textarea class="form-control" name="description" id="description"><?=$description?></textarea>
						<button class="pull-right btn btn-lg sr-button">Enviar</button>
					</div>
				</div>
			</form>

<?php
    include __DIR__. "/partials/footer-doc.part.php";
?>