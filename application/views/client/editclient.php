<h1>Edit Client</h1>



<?php
     $attributes=array(
			'id'=>"editClient"
		);
    echo form_open_multipart('Client/updateClient/'.$post['id'],$attributes);
?>
<div class=container>
      <input type="hidden" name="id" value=<?php echo $post["id"];?>>

      <!-- client name field -->

      
      <div class="row"> 
        <div class="col-md-2">
          <label >Client Name</label>
        </div>
        <div class="col-md-6">
					<input type="text" name='clientname' placeholder='Client Name' id='clientname' value=<?php echo $post['clientname']?>>    
					<br>     
          <div class='errname' style='display:none;color:red;size:8px'>Client Name is required</div>
        </div>
      </div>
 
    
      <!-- company name field -->
      <div class="row"> 
        <div class="col-md-2">
          <label >Company Name</label>
        </div>
        <div class="col-md-6">
					<input type="text" name='companyname' placeholder='Company Name' id='companyname' value=<?php echo $post['companyname']?>> 
					<br>     
          <div class='errcompany' style='display:none;color:red;size:8px'>Company Name is required</div>
        </div>
      </div>
			<br>	

      <!-- //image upload field -->
      <div class="form-group">
      
        <label>Upload Image</label>
    
      
      <div class=" offset-md-2 col-md-4 ">
      <input class="selectimage" type="checkbox" id="checkBox" name="checkBox" value="1" onchange="selectimage()"> Change Image
      <div id="check" style="visibility:hidden">
            <input type="hidden" name="image12" value="<?php echo $post['image']; ?>"> 
				<input type="file" id="image" name="image"  onchange="imgView(this)">
				<br>
        <div class="errimage1" style="display:none;color:red"> Image Format Should be JPG, JPEG, PNG or GIF. </div>
        <div class="errimage2" style="display:none;color:red"> No Image Selected. Select an image or Uncheck the check box</div>
      </div>
        <img src="<?php echo base_url()?>/assets/images/<?php echo $post['image']; ?>" alt="image" width="100px" height="100px" id="image1">
      </div></div>
				

    
      <!-- phone number field -->
    
      <div class="row"> 
        <div class="col-md-2">
          <label >Phone Number</labele>
        </div>
        <div class="col-md-6">
          <input type="number" minlength="10" maxlength="10" name='phonenumber' placeholder='Phone Number' id='phonenumber' value=<?php echo $post['phonenumber']?>>
					<br>	
          <div class='errphone' style='display:none;color:red;size:8px'>Phone Number is required</div>
        </div>  
      </div>


      <!-- //email field -->

      <div class="row"> 
        <div class="col-md-2">
          <label >Email</labele>
        </div>
        <div class="col-md-6"> 
          <input type="text" name='email' placeholder='Email' id='email' value=<?php echo $post['email']?>>
					<br>	
          <div class='erremail' style='display:none;color:red;size:8px'>Email is required</div>
        </div>
      </div>


      <!-- //address field -->
    
      <div class="row"> 
        <div class="col-md-2">
          <label >Address</labele>
        </div>
        <div class="col-md-6"> 
          <textarea name="address" id="address" cols="50" rows="10" ><?php echo $post['address']?></textarea>
					<br>	
          <div class='erraddress' style='display:none;color:red;size:8px'>Address is required</div>
        </div>
      </div>
 

        <!-- Country -->
       
      <div class="row"> 
        <div class="col-md-2">
          <label >Country</labele>
        </div>
        <div class="col-md-6"> 
					<select name='country' id="country">
        <?php foreach( $country as $result=>$countries): ?>
				 <option value="<?php echo $result ?>" <?php if( $result == $post['c_id'] ): ?>selected='selected'<?php endif; ?>> <?php echo $countries; ?></option>
				<?php endforeach; ?> 
				 </select>
					<br>	
          <div class='errcountry' style='display:none;color:red;size:8px'>Country is required</div>
        </div>
      </div>


      <!-- //state field -->
     
      <div class="row"> 
        <div class="col-md-2">
          <label >State</labele>
        </div>
        <div class="col-md-6"> 
				<select name="state"  id="state">
          <option disabled selected>--Select State--</option>
          <?php foreach( $state as $states): ?>
           <option value="<?php echo $states['s_id']?>" <?php if($states['s_id'] == $post['state'] ): ?> selected="selected"<?php endif; ?>><?php echo $states['state']; ?></option>
          <?php endforeach; ?> 
       </select>
					<br>	
          <div class='errstate' style='display:none;color:red;size:8px'>state is required</div>
        </div>
      </div>
  
      
      <!-- //city field -->

      <div class="row"> 
				<div class="col-md-2">
					<label >City</labele>
				</div>
				<div class="col-md-6"> 
				<select name="city"  id="city">
          <option disabled selected>--Select City--</option>
          <?php foreach( $city as $cities): ?>
           <option value="<?php echo $cities['city_id']?>" <?php if($cities['city_id'] == $post['state'] ): ?> selected="selected"<?php endif; ?>><?php echo $cities['city']; ?></option>
          <?php endforeach; ?> 
       </select>		
					<div class='errcity' style='display:none;color:red;size:8px'>city is required</div>
				</div>
      </div>


      <!-- //Postal code -->
  
      <div class="row"> 
        <div class="col-md-2">
          <label >Postal Code</labele>
        </div>
        <div class="col-md-6"> 
					<input type="number" name='postalcode' placeholder='Postal Code' id='postalcode' value=<?php echo $post['postalcode']?>>
					<br>
					<div class='errpostal' style='display:none;color:red;size:8px'>Postalcode is required</div>
        </div>
      </div>
</div>

<div class="container"> 
  <!-- //submit button -->

  <button type="submit" class="btn btn-success">UPDATE</button>

  <!-- //back button -->
  <a class='btn btn-info' href='<?php echo base_url()?>Client/viewClient'>Back</a>
</div>
     
 
  <?php echo form_close();?>
