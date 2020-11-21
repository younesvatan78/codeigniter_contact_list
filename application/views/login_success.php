<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login success!</h1>
			</div>
			<p><?php echo $this->session->userdata('username');?>,  You are now logged in.</p>
		</div>
	</div><!-- .row -->
</div><!-- .container -->