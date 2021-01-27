<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
<head>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="generator" content="Codeply">
  <title>Contact form</title>
  <base target="_self"> 

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">  
  

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sidebar.css"></link>
</head>



<body>
<div class="d-flex" style="height: 100%;" >

<nav id="sidebar">
            
            <div style="height:100%;" class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li  class="active">
                        <a href="#" onclick="display_contact()">Contact list</a>
                    </li>
                    <li ">
                        <a href="#" onclick="add_contact()">Add contact</a>
                    </li>
                    <li id="items-nav">
					    <?= form_open('test/logout'); ?>
				            <input type="submit" style="margin-top:20px;" class="btn btn-danger" value="Log out">
	                    </form>
                    </li>
                </ul>

               
            </div>
		</nav>

    <div class="wrapper d-flex align-items-stretch">
        




		

        <!-- Page Content  -->
        <div id="list-contact" class="p-4 p-md-5">
			<ul class="list-group pull-down" id="contact-list" ">
				<?php
				$count=0;
				foreach($this->user_model->list_contacts($this->session->userdata('username')) as $contact)
				{
				$count= $count + 1;?>

					<li class="list-group-item">
						<div class="row w-100">
							<div class="col-12 col-sm-6 col-md-3 px-0">
								<img src="<?= base_url().'upload/'.$contact->user.'/'.$contact->url ?>" 	class="rounded-circle mx-auto d-block img-fluid">
							</div>

							<!-- Edit contact -->
	
							<div id="update-contact-person_<?php echo $count; ?>" style="display:none;">


								<?= form_open('test/update_contact'); ?>

									<div class="form-group row" style="width: 27em" >

										<div class="col-sm-10">
										    <input type="text"  class="form-control 	form-control-sm" name="firstname_edit" 	placeholder="First Name" value="<?=$contact->firstname?>">
										</div>

										<div class="col-sm-10">
										    <input type="text"  class="margin-input	form-control form-control-sm" name="lastname_edit" value="<?=$contact->lastname?>"	placeholder="Last Name">
										</div>
										
										<div class="col-sm-10">										
										    <input type="tel"  class="margin-input 	form-control form-control-sm" id="colFormLabelSm" name="phone_edit" 	placeholder="Phone" value="<?=$contact->mobile?>">
										</div>
										<div class="col-sm-10">

										    <input type="text"  class="margin-input 	form-control form-control-sm" id="colFormLabelSm" name="email_edit" placeholder="Email" value="<?=$contact->email?>">
										</div>

										<!--
										<div class="form-group">
				  							<div class="custom-file">
					  							<input type="file" name="userfile_edit" class="custom-file-input" id="customFile">
					  							<label class="custom-file-label" for="userfile_edit">Select a photo for contact</label>
  				  							</div>
  										</div>
										  -->
										<input type="hidden" name="contact_id" value="<?=$contact->id?>">
									</div>
									<input type="submit" class="btn btn-success" value="Update">
								</form>
									
							</div>



							<div id="contact_info_list_person_<?=$count?>" class="col-12 col-sm-6 col-md-9 text-center text-sm-left" >
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
						<?= form_open('test/delete_contact'); ?>
						<input type="hidden" name="contact_id_delete" value="<?=$contact->id?>">
						<input type="submit" class="btn btn-danger float-right vertical-center" value="Delete">
						</form>

						<button type="button" id="person_<?=$count?>" onclick="edit_button(this.id)" class="btn btn-success float-right vertical-center" style="right:100px!important;">Edit</button>
					</li>
				<?php } ?>

			</ul>
		</div>
		<div id="add_content" style="display:none;" class="p-4 p-md-5">
		
			<?= form_open_multipart('test/add_contact'); ?>
  				<div class="form-row">
				  <div class="col-md-4 mb-3">
      					<label for="validationServer01">First name</label>
						  <input type="text" name="firstname" class="form-control" id="validationServer01" placeholder="First name">
						  
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
	</div>

	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
</body>












</html>
		

