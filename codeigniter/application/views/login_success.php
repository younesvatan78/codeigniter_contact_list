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

  <style></style>
</head>

<body>
	



	<div style="width:900px!important;margin-left: initial;" class="container">
	    <!-- contacts card -->
	    <div class="card card-default" id="card_contacts">
	        <div id="contacts" class="panel-collapse collapse show" aria-expanded="true" style="">
	            <ul class="list-group pull-down" id="contact-list">
				<?php foreach($this->user_model->list_contacts($this->session->userdata('username')) as $contact){?>

	                <li class="list-group-item">
	                    <div class="row w-100">
	                        <div class="col-12 col-sm-6 col-md-3 px-0">
	                            <img src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="Mike Anamendolla" class="rounded-circle mx-auto d-block img-fluid">
							</div>
							
	                        <div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">
	                            <span class="fa fa-mobile fa-2x text-success float-right pulse" title="online now"></span>
	                            <label class="name lead"><?php echo $contact->firstname.' '.$contact->lastname ?></label>
	                            <br>
	                            <span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="<?= $contact->mobile ?>"></span>
	                            <span class="text-muted small"><?= $contact->mobile ?></span>
	                            <br>
	                            <span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" data-original-title="" title=""></span>
	                            <span class="text-muted small text-truncate"><?= $contact->email ?></span>
	                        </div>
	                    </div>
					</li>
					<?php } ?>

	            </ul>
	            <!--/contacts list-->
	        </div>
		</div>
			<h3>Add contact</h3>
			<?= form_open_multipart('test/add_contact'); ?>
			<fieldset>
				<label for="firstname">First Name</label>
					<input type="text" name="firstname">

				<label for="lastname">Last name</label>
					<input type="text" name="lastname">

				<label for="phone">Phone number</label>
					<input type="tel" name="phone">
					<label for="phone">email</label>
					<input type="email" name="email">
					<input type="file" name="userfile" size="20" />

					
					<input type="submit" value="Add Contact">
			</fieldset>
			</form>
		</div>

		<div>
			<h3>Edit contact</h3>
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
					
					<input type="submit" value="Update Contact">
			</fieldset>
			</form>
		</div>	
		
		<div>
			<h3>Delete contact</h3>
			<?= form_open('test/delete_contact'); ?>
			<fieldset>
			<label for="id_del">ID</label>
					<input type="number" name="id_del">

				
					<input type="submit" value="Delete Contact">
			</fieldset>
			</form>
		</div>			
	</div>
</body>
</html>
		

