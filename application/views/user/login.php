

<?php
	$attributes=array(
		'class'=>'testform',
		'method'=>'post',
		'id'=>"login");
	echo form_open('User/login',$attributes);
	$opendiv='<div  class="col-md-4 col-md-offset-4" id="login">';
	$closediv='</div>';
	$startDiv='<div class="form-group" >';
      $endDiv='</div>';
      
	echo ($opendiv);
	echo form_fieldset($startDiv);
	echo ("<h1><center>SIGN IN</center></h2>");
	echo '<br>';
	echo form_label('User Name *');
	$text=array(
		'class'=>'testName form-control',
		'name'=>'username',
		'placeholder'=>'username',
		'id'=>'username');
	echo form_input($text);
	echo form_error('username', '<div id="error">', '</div>');
	echo "<div class='errusername' style='display:none;color:red;size:8px'>Username is required</div>";
	echo '<br>';

	echo form_label('Password *');
	$password=array(
		'name'=>'password',
		'class'=>'testPassword form-control',
		'placeholder'=>'password',
		'id'=>'password');
	echo form_password($password);
	echo form_error('password', '<div id="error">', '</div>');
	echo "<div class='errpassword' style='display:none;color:red;size:8px'>Password is required</div>";
	echo '<br>';
	echo '<input type="checkbox" onclick="myFunction()" id="changeType">Show Password';
	echo '<br>';
	$submit=array(
		'value'=>'Submit',
		'class'=>'btn btn-success btn-block');
	echo form_submit($submit);
	
	echo form_fieldset_close($endDiv);
	echo ($closediv);

?>

<div id="forget">
	<a href= "<?php echo base_url('user/forgetpassword')?>">Forget password</a>
</div>

<div id="signup">
	<p >NEW USER</p>
	<a href="<?php echo base_url()?>user/register">SIGN UP/REGISTER</a>
</div>

