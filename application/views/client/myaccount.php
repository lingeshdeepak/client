<h1>MY ACCOUNT</h1>	 	
 <div class="container">
	<div class="col-md-4">
		<?php
			$attributes=array(
				'id'=>'myaccount'
			);
			$id=$user['id'];
			if($changeview==1){
				echo form_open('User/myAccount',$attributes); 
			}else
			{ 
				echo form_open('User/editAccount',array('id'=>'editaccount'));
			}

			

			echo form_label('Name *');
			$text=array(
				'class'=>'form-control',
				'name'=>'name',
				'placeholder'=>'name',
				'id'=>'name',
				'value'=>$user['name'],
				'readonly'=>'true'
			);
			echo form_input($text);
			echo form_error('name', '<div id="error">', '</div>');

			echo "<div class='errname' style='display:none;color:red;size:8px'>Name is required</div>";
			echo '<br>';

			echo form_label('Email *');
			$text=array(
				'class'=>'form-control',
				'name'=>'email',
				'placeholder'=>'email',
				'id'=>'email',
				'value'=>$user['email'],
				'readonly'=>'true'
			);
			echo form_input($text);
			echo form_error('email', '<div id="error">', '</div>');
			echo "<div class='erremail' style='display:none;color:red;size:8px'>Email is required</div>";
			// echo "<div class='erremail1' style='display:none;color:red;size:8px'>Email already exists</div>";
			echo '<br>';
			echo form_label('UserName *');
			$text=array(
				'class'=>'form-control',
				'name'=>'username',
				'placeholder'=>'username',
				'id'=>'username',
				'value'=>$user['username'],
				'readonly'=>'true'
			);
			echo form_input($text);
			echo form_error('username', '<div id="error">', '</div>');
			echo "<div class='errusername' style='display:none;color:red;size:8px'>Username is required</div>";
			echo "<div class='errusername1' style='display:none;color:red;size:8px'>Username already exists</div>";
			echo '<br>';
		?>
	</div>	
	<div class="col-md-4">
		<a class='btn btn-info' href='<?php echo base_url()?>client/viewclient'>Home</a>
		<!-- <a class="btn btn-small btn-warning" id="mybutton" href="<?php $id = $user["id"]; echo Base_url('User/editAccount/'.$id); ?>">EDIT</a> -->
	</div>
	<div class="col-md-4">
		<a href="<?php  echo base_url('user/changepassword')?>">Change Password</a>
	</div>
</div>



