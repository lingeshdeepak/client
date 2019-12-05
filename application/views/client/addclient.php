<h1>Add Client</h1>

<div class="container">

<?php
     
	$attributes=array(
		'class'=>'testform',
		'method'=>'post',
            'id'=>"addclient");
           
      echo form_open_multipart('Client/addClient',$attributes);
      
      $rowdiv='<div class="row">';
      $endrow='</div>';
	$opendiv='<div  class="col-md-2">';
	$closediv='</div>';
      $fielddiv='<div class="col-md-10">';
      $endfielddiv='</div>';

      //client name field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Client Name *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(
                        'name'=>'clientname',
                        'placeholder'=>'clientname',
                        'id'=>'clientname',        
                  );
                  echo form_input($text);
                  echo '<br>';
                  echo form_error('clientname',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errname' style='display:none;color:red;size:8px'>Client Name is required</div>";
            echo ($endfielddiv);
      echo ($endrow);   
    

      //company name field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Company Name *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(
                        'name'=>'companyname',
                        'placeholder'=>'companyname',
                        'id'=>'companyname', 
                  );
                  echo form_input($text);
                  echo '<br>';
                  echo form_error('companyname',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errcompany' style='display:none;color:red;size:8px'>Company Name is required</div>";
                  echo "<div class='errcompany1' style='display:none;color:red;size:8px'>Company Name already present</div>";
            echo ($endfielddiv);
      echo ($endrow);   
    

      //image upload field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Image *');
            echo ($closediv);
           
            echo ($fielddiv);
                  $text=array(
                        'name'=>'image',
                        'id'=>'image',
                        'onchange'=>"imgView(this)"
                  );
                  echo form_upload($text);
                  echo '<img  alt="image" src="'.base_url('assets/images/no-image.png').'" width="100px" height="100px" id="image1">';
                  echo form_error('image', '<div id="error" style="color:red">','</div>');
                  echo ('<div class="errimage1" style="display:none;color:red"> Image Format Should be JPG, JPEG, PNG or GIF. </div>');
                  echo ('<div class="errimage2" style="display:none;color:red"> No Image Selected.</div>'); 
            echo ($endfielddiv);
      echo ($endrow); 
     
    
      //phone number field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Phone Number *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(		 
                        'name'=>'phonenumber',
                        'placeholder'=>'phonenumber',
                        'id'=>'phonenumber',
				'type'=>"number",
				'minlength'=>"10", 
                        'maxlength'=>"10"
                  );
                  echo form_input($text);
                  echo '<br>';
                  echo form_error('phonenumber',  '<div id="error" style="color:red">', '</div>');
			echo "<div class='errphone' style='display:none;color:red;size:8px'>Phone Number is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
     

      //email field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Email *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(		 
                        'name'=>'email',
                        'placeholder'=>'email',
                        'id'=>'email',
                        );
                  echo form_input($text);
                  echo '<br>';
                  echo form_error('email',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='erremail' style='display:none;color:red;size:8px'>Email is required</div>";
                  echo "<div class='erremail1' style='display:none;color:red;size:8px'>Email id is taken </div>";
            echo ($endfielddiv);
      echo ($endrow); 
     

      //address field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Address *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(         
                        'name'=>'address',
                        'placeholder'=>'address',
                        'id'=>'address',
                        'rows'=>'5',
                        'cols'=>'25',
                        'maxlength'=>"250"
                  );
                  echo form_textarea($text);
                  echo '<br>';
                  echo form_error('address',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='erraddress' style='display:none;color:red;size:8px'>Address is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
     

      //country field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Country *');
            echo ($closediv);

            echo ($fielddiv);
            
                  echo '<select  name="country" id="country">';
                  echo '<option disabled selected>--Select Country--</option>';
                  foreach($country as $result=>$countries){
                        echo '<option value='.$result.'>'.$countries.'</option>';
                  }
                  echo '</select>';
                  echo '<br>';
                  echo form_error('country',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errcountry' style='display:none;color:red;size:8px'>Country is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
      

      //state field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('State *');
            echo ($closediv);

             echo ($fielddiv);
            echo '<select  name="state" id="state">';
            echo '<option disabled selected>--Select State--</option>';
            
            echo '</select>';
            echo '<br>';
                  echo form_error('state',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errstate' style='display:none;color:red;size:8px'>State is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
     
      
      //city field
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('City *');
            echo ($closediv);

            echo ($fielddiv);
            echo '<select  name="city" id="city">';
            echo '<option disabled selected>--Select City--</option>';
          
            echo '</select>';
            echo '<br>';
                  echo form_error('city',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errcity' style='display:none;color:red;size:8px'>City is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
                
      //Postal code
      echo ($rowdiv);
            echo ($opendiv);
                  echo form_label('Postal Code *');
            echo ($closediv);

            echo ($fielddiv);
                  $text=array(
                        'name'=>'postalcode',
                        'placeholder'=>'Eg : 641 024',
                        'id'=>'postalcode',
                        'type'=>'number',
                        'min'=>'0',
                  );
                  echo form_input($text);
                  echo '<br>';
                  echo form_error('postalcode',  '<div id="error" style="color:red">', '</div>');
                  echo "<div class='errpostal' style='display:none;color:red;size:8px'>Postal Code is required</div>";
            echo ($endfielddiv);
      echo ($endrow); 
      //submit button
	echo '<br>';
	$submit=array(
            'value'=> 'Submit',
		'class'=>'btn btn-success');
	echo form_submit($submit);


      //back button
	echo "<a class='btn btn-info' href='viewClient'>Back</a>";

?>
</div>



