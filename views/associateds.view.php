<?php
!
  include __DIR__ . "/partials/header-doc.part.php";

?>

<!-- Principal Content Start -->
    <div id="associateds">
        <div class="container">
   	        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>Asociados</h1>
            <hr>
            <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<?php
                include __DIR__ . "/partials/show-messages.part.php";
			?>
            
            <?php if (("POST" === $_SERVER["REQUEST_METHOD"]) && (empty($errors))):?>
                <a href="<?=$logo?>" target="_blank">Ver imagen</a>
            <?php endif;?>
            
			<form class="form-horizontal" action="/associateds.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-xs-12">
						<label for="image" class="label-control">Logo</label>
						<input class="form-control-file" type="file" name="image">
					</div>				
                </div>				
                <div class="form-group">
					<div class="col-xs-12">
						<label for="name" class="label-control">Nombre</label>
						<input class="form-control" type="text" name="name" value="<?=$name?>">
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
            </div>
        </div>
    </div>

<?php
    include __DIR__. "/partials/footer-doc.part.php";
?>