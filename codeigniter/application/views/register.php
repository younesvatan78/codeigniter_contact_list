


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!---*************welcome this is my simple empty strap by John Niro Yumang ******************* -->

<!DOCTYPE html>
<html lang="en">

	<title>Sign up facundo farm & resort</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<script src="jquery/jquery.min.js"></script>
		<!---- jquery link local dont forget to place this in first than other script or link or may not work ---->
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!---- boostrap.min link local ----->
		
		<link rel="stylesheet" href="css/style.css">
		<!---- boostrap.min link local ----->

		<script src="js/bootstrap.min.js"></script>
		<!---- Boostrap js link local ----->
		
		<link rel="icon" href="images/icon.png" type="image/x-icon" />
		<!---- Icon link local ----->
        <style type="text/css">
            body {background-color:#eee;}
            .container-fluid {padding:50px;}
            .container{background-color:white;padding:50px;   }
            #title{font-family: 'Lobster', cursive;;}
        </style>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<!---- Font awesom link local ----->
	</head>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Facundo farm and Resort</h2>
			 <p class="text-center">
				<small id="passwordHelpInline" class="text-muted"> Developer: follow me on facebook <a href="https://www.facebook.com/JheanYu"> John niro yumang</a> inspired from <a href="https://p.w3layouts.com/">https://p.w3layouts.com/</a>.</small>
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
				
				<?php echo validation_errors(); ?>
				
				<?= form_open('test/register') ?>
						<fieldset>					
						<?php echo $this->session->flashdata('usernameerror');
							  echo $this->session->flashdata('success');
						?>		
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username">
							</div>

							
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
								
 							<div>
 									  <input type="submit" name="register" class="btn btn-lg btn-primary   value="Register">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				
				
			</div>
		</div>
		<p class="text-center">
			<small id="passwordHelpInline" class="text-muted"> Developer:<a href="http://www.psau.edu.ph/"> Pampanga state agricultural university ?</a> BS. Information and technology students @2017 Credits: <a href="https://v4-alpha.getbootstrap.com/">boostrap v4.</a></small>
		</p>
	</div>
	</body>
	 

</html>