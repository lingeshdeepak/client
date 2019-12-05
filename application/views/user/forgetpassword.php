<center>
<h2>Forgot Password</h2>
<p>Please enter your email address to reset your password</p>
</center>

<div class="container">

	<div class="col-md-6 col-md-offset-3">
		<?php 
			$fattr = array('class' => 'form-signin',
				'id' => 'forgetpassword');
			echo form_open(site_url().'User/reset_link', $fattr); 
		?>
		<div class="form-group">
			<?php echo form_input(array(
					'name'=>'email', 
					'id'=> 'email', 
					'placeholder'=>'Email', 
					'class'=>'form-control', 
					'value'=> set_value('email'))); ?>
			<?php echo form_error('email') ?>
			<div class='erremail' style='display:none;color:red;size:8px'>Email is required</div>
		</div>
		<?php echo form_submit(array('value'=>'Submit', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
		<a class="btn btn-block btn-success btn-lg" href="<?php echo base_url().'user/login'?>">BACK</a>
		<?php echo form_close(); ?>    
	</div>
</div>

