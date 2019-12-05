
<h1>Change Password</h1>
<div class="container">
<div class="row ">
<div class="col-md-4">

<?php
$attributes=array(
  'id'=>'resetpassword'
);
echo form_open('User/update_password',$attributes);

  echo form_label(' New Password *');
	$password=array(
		'name'=>'password',
		'class'=>'form-control',
		'placeholder'=>'password',
		'id'=>'password');
	echo form_password($password);
	echo form_error('password', '<div id="error">', '</div>');
	echo "<div class='errpassword' style='display:none;color:red;size:8px'>Password is required</div>";
	echo '<br>';
    
  echo form_label('Confirm Password *');
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
  echo '<button type="submit" class="btn btn-success">Submit</button>';
  echo '</div>';

echo form_close();
?>
</div>
</div>
</div>
