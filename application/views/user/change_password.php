<h2>Change Password</h2>
<br>

<div class="col-md-4">

<?php
$attributes=array(
      'id'=>'changepassword'
);
echo form_open('User/changePassword',$attributes);

      echo form_label('New Password *');
	$password=array(
		'name'=>'newpassword',
		'class'=>'form-control',
		'placeholder'=>'newpassword',
		'id'=>'newpassword');
	echo form_password($password);
	echo form_error('password', '<div id="error">', '</div>');
	echo "<div class='errpassword' style='display:none;color:red;size:8px'>Password is required</div>";
      echo '<br>';
      
	echo form_label('ConfirmPassword *');
	$password=array(
		'name'=>'confirmpassword',
		'class'=>'form-control',
		'placeholder'=>'confirmpassword',
		'id'=>'confirmpassword');
	echo form_password($password);
	echo form_error('password', '<div id="error">', '</div>');
      echo "<div class='errconfirmpassword' style='display:none;color:red;size:8px'>Confirm Password is required</div>";
	echo "<div class='errconfirmpassword1' style='display:none;color:red;size:8px'>Confirm Password does not match</div>";
      echo '<br>';
      
	echo '<button class="btn btn-success" type="submit"> UPDATE</button>&nbsp';
	
      echo '<a class="btn btn-info" href=" myaccount">Back</a>';
echo form_close();
?>
</div>
