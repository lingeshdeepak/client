
<?php
	$attributes=array(
		'class'=>'testform',
		'method'=>'post',
		'id'=>"register");
	echo form_open('User/register',$attributes);
	$opendiv='<div  class="col-md-4 col-md-offset-4">';
	$closediv='</div>';
	$startDiv='<div class="form-group" >';
	$endDiv='</div>';
	echo ($opendiv);
	echo form_fieldset($startDiv);
	echo ("<h1><center>SIGN UP</center></h2>");
	echo '<br>';
	echo form_label('Name *');
	$text=array(
		'class'=>'form-control',
		'name'=>'name',
		'placeholder'=>'name',
		'id'=>'name');
	echo form_input($text);
	echo form_error('name', '<div id="error">', '</div>');

	echo "<div class='errname' style='display:none;color:red;size:8px'>Name is required</div>";
	echo '<br>';

      echo form_label('Email *');
	$text=array(
		'class'=>'form-control',
		'name'=>'email',
		'placeholder'=>'email',
		'id'=>'email');
	echo form_input($text);
	echo form_error('email', '<div id="error">', '</div>');
	echo "<div class='erremail' style='display:none;color:red;size:8px'>Email is required</div>";
	echo "<div class='erremail1' style='display:none;color:red;size:8px'>Email already exists</div>";
      echo '<br>';
      echo form_label('UserName *');
	$text=array(
		'class'=>'form-control',
		'name'=>'username',
		'placeholder'=>'username',
		'id'=>'username');
	echo form_input($text);
	echo form_error('username', '<div id="error">', '</div>');
	echo "<div class='errusername' style='display:none;color:red;size:8px'>Username is required</div>";
	echo "<div class='errusername1' style='display:none;color:red;size:8px'>Username already exists</div>";
	echo '<br>';
	echo form_label('Password *');
	$password=array(
		'name'=>'password',
		'class'=>'form-control',
		'placeholder'=>'password',
		'id'=>'password');
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
	$submit=array(
		'value'=>'Submit',
		'class'=>'btn btn-success btn-block');
	echo form_submit($submit);

	Echo '<br>';
	$back=array(
		'value'=>'Back',
		'class'=>'btn btn-info btn-block',
		'href'=>'user.login');
	echo "<a class='btn btn-info btn-block' href='login'>Back</a>";


	echo form_fieldset_close($endDiv);
	echo ($closediv);

?>

