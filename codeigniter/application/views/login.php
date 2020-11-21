
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<html lang="en">
<head>
<title>Login</title>
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
				<div class="col-md-5">
 				 	<?= form_open('test/login'); ?>
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="name" name="username_login" id="username" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="password_login" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Sign In">
							</div>
								 
 						</fieldset>
					</form>	
				</div>
				
</body>
</html>