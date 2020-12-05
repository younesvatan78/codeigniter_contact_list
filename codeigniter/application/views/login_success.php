<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
<head>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="generator" content="Codeply">
  <title>Codeply simple HTML/CSS/JS preview</title>
  <base target="_self"> 

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">  
  

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sidebar.css"></link>
</head>

<body>
	


	


	
	<!-- contacts card -->
	
	<div id="contact_show" style="display:none">

		<h3>Add contact</h3>
		<?= form_open_multipart('test/add_contact'); ?>
		<fieldset >
			<label for="firstname">First Name</label>
			<input type="text" name="firstname">
			
			<label for="lastname">Last name</label>
			<input type="text" name="lastname">
			
			<label for="phone">Phone number</label>
			<input type="tel" name="phone">
			
			<label for="userfile">Upload pic</label>
			<input type="file" name="userfile" size="20" />
			
		
			<label for="phone">email</label>
				<input type="email" name="email">

				

				
				<input type="submit" value="Add Contact">
		</fieldset>
		</form>
	</div>

	<!-- Edit contact -->
	<div style="display:none">
		
		<?= form_open('test/update_contact'); ?>
			<fieldset>
				<label for="id_edit">ID</label>
						<input type="number" name="id_edit">

					<label for="firstname_edit">First Name</label>
						<input type="text" name="firstname_edit">

					<label for="lastname_edit">Last name</label>
						<input type="text" name="lastname_edit">


					<label for="phone_edit">Phone number</label>
						<input type="tel" name="phone_edit">

						<input type="submit" onclick="update_contact()" value="Update Contact">
			</fieldset>
		</form>
	</div>	
	
	<!-- Delete Contact -->
	<div style="display:none">
		<h3>Delete contact</h3>
		<?= form_open('test/delete_contact'); ?>
		<fieldset>
		<label for="id_del">ID</label>
				<input type="number" name="id_del">

			
				<input type="submit" value="Delete Contact">
		</fieldset>
		</form>
	</div>
	<?= form_open('test/logout'); ?>
				<input type="submit" value="Log out">
	</form>

	



	</div>
	
</body>









<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li  class="active">
                        <a href="#" onclick="display_contact()">Contact list</a>
                    </li>
                    <li ">
                        <a href="#" onclick="add_contact()">Add contact</a>
                    </li>
                    
                    <li >
                        <a href="#" >Portfolio</a>
                    </li>
                    <li id="items-nav">
                        <a href="#">Contact</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
		</nav>
		

        <!-- Page Content  -->
        <div id="list-contact" class="p-4 p-md-5">




			<ul class="list-group pull-down" id="contact-list" ">
				<?php
				$count=0;
				foreach($this->user_model->list_contacts($this->session->userdata('username')) as $contact)
				{
				$count= $count + 1;
?>
					<li class="list-group-item">
						<div class="row w-100">
							<div class="col-12 col-sm-6 col-md-3 px-0">
								<img src="<?= base_url().'upload/'.$contact->user.'/'.$contact->url ?>" 	class="rounded-circle mx-auto d-block img-fluid">
							</div>



							<div id="update-contact-<?php echo $count; ?>" style="display:none;">


								<?= form_open('test/update_contact'); ?>

									<div class="form-group row">

										<div class="col-sm-10">
										    <input type="text" style="width:35%!important;" class="form-control 	form-control-sm" id="colFormLabelSm name="firstname_edit" 	placeholder="First Name" value="">
										</div>

										<div class="col-sm-10">
										    <input type="text" style="width:35%!important;" class="margin-input 	form-control form-control-sm" id="colFormLabelSm name="lastname_edit" 	placeholder="Last Name">
										</div>

										<div class="col-sm-10">

										    <input type="text" style="width:35%!important;" class="margin-input 	form-control form-control-sm" id="colFormLabelSm name="email_edit" 	placeholder="Email">
										</div>

										<div class="col-sm-10">										
										    <input type="tel" style="width:35%!important;" class="margin-input 	form-control form-control-sm" id="colFormLabelSm name="phone_edit" 	placeholder="Phone">
										</div>
									</div>
									<input type="submit" class="btn btn-success" value="Update">
								</form>


									
									
							</div>



							<div class="col-12 col-sm-6 col-md-9 text-center text-sm-left" >
								<span class="fa fa-mobile fa-2x text-success float-right pulse" title="online 	now">
								</span>
								<label class="name lead"><?php echo $contact->firstname.' '.$contact->lastname ?></label>
								<br>
								<span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" 	data-original-title="<?= $contact->mobile ?>"></span>
								<span class="text-muted small"><?= $contact->mobile ?></span>
								<br>
								<span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" 	data-original-title="" title=""></span>
								<span class="text-muted small text-truncate"><?= $contact->email ?></span>
							</div>
							
						</div>
						<button type="button" class="btn btn-danger float-right vertical-center">Delete</button>
						<button type="button" id="edit_<?=$count?>" class="btn btn-success float-right vertical-center" style="right:100px!important;">Edit</button>
					</li>
				<?php } ?>

			</ul>
		</div>
		<div id="add_content" style="display:none;" class="p-4 p-md-5">
		
			<?= form_open_multipart('test/add_contact'); ?>
  				<div class="form-row">
				  <div class="col-md-4 mb-3">
      					<label for="validationServer01">First name</label>
						  <input type="text" name="firstname" class="form-control" id="validationServer01" placeholder="First name" value="<?php echo $contact->firstname ?>">
						  
					</div>
					
    				<div class="col-md-4 mb-3">
    				  <label for="validationServer02">Last name</label>
    				  <input type="text" name="lastname"class="form-control" id="validationServer02" placeholder="Last name" >
    				  
					</div>
					<div class="col-md-4 mb-3">
    				  <label for="validationServer02">Email</label>
    				  <input type="email" name="email"class="form-control" id="validationServer02" placeholder="Email" >
    				  
    				</div>
  				</div>
  				<div class="form-group">
  				  <label for="phone">Enter your phone number:</label>
  				  <input type="tel" name="phone" class="form-control" id="phone">
  				</div>
  				<div class="form-group">
				  <div class="custom-file">
					  <input type="file" name="userfile" class="custom-file-input" id="customFile">
					  <label class="custom-file-label" for="userfile">Select a photo for contact</label>
  				  </div>
				  
  				</div>
  				
  				
  				<button type="submit" class="btn btn-primary">Add contact</button>
			</form>
		</div>
		


    </div>

	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
</body>












</html>
		

