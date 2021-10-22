<?php
!
  include __DIR__ . "/partials/header-doc.part.php";

?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			  <?php if("POST" === $_SERVER["REQUEST_METHOD"]) :?>

				<div class="alert alert-<?=(empty($errors) ? 'info': 'danger');?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<div><?=$info;?></div>
					<?php  if (!empty($errors)) : ?>
					<ul>
						<?php foreach($errors as $error) : ?>
						<li><?=$error;?></li>
						<?php endforeach;?>
					</ul>
					<?php endif; ?>
				</div>

<?php endif;?>

			<form class="form-horizontal" action="/contact.php" method="POST">
				<div class="form-group">
					<div class="col-xs-6">
						<label for="firstName" class="label-control">First Name</label>
						<input class="form-control <?=($firstNameError ? " has-error":"");?>" type="text" name="firstName" id="firstName" value="<?=$firstName?>">
					</div>
					<div class="col-xs-6">
						<label for="lastName" class="label-control">Last Name</label>
						<input class="form-control" type="text" name="lastName" id="lastName" value="<?=$lastName?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="email" class="label-control">Email</label>
						<input class="form-control <?=($emailError ? " has-error":"");?>" type="text" name="email" id="email" value="<?=$email?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="subject" class="label-control">Subject</label>
						<input class="form-control <?=($subjectError ? " has-error":"");?>" type="text" name="subject" id="subject" value="<?=$subject?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="message" class="label-control">Message</label>
						<textarea class="form-control" name="message" id="message"><?=$message?></textarea>
						<button class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>

	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<!-- Jquery -->
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <!-- Bootstrap core Javascript -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   <!-- Plugins -->
   <script type="text/javascript" src="js/jquery.easing.min.js"></script>
   <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
   <script type="text/javascript" src="js/scrollreveal.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
</body>
</html>