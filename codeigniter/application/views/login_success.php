<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login success!</h1>
			</div>
			<p><?php echo $this->session->userdata('username');?>,  You are now logged in.</p>
		</div>
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone number</th>
                </tr>
            </thead>
            <tbody>
			<?php foreach($this->user_model->list_contacts($this->session->userdata('username')) as $contact){?>

                <tr>
                    <td><?= $contact->id ?></td>
                    <td><?= $contact->firstname ?></td>
                    <td><?= $contact->lastname ?></td>
                    <td><?= $contact->mobile ?></td>
                </tr>
			<?php } ?>
            </tbody>
        </table>
		<div>
		<h3>Add contact</h3>
			<?= form_open('test/add_contact'); ?>
			<fieldset>
				<label for="firstname">First Name</label>
					<input type="text" name="firstname">

				<label for="lastname">Last name</label>
					<input type="text" name="lastname">

				<label for="phone">Phone number</label>
					<input type="tel" name="phone">
					
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



	</div><!-- .row -->
</div><!-- .container -->