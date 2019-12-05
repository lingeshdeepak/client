<center><h1>CLIENT DETAILS</h1></center>
<div class="card">
	<table class="table-hover ">
     
		<thead>
			<h1><?php echo $client['clientname']; ?></h1>
		</thead>
		<tbody>
			<tr>
				<td>Email</td>
				<td> </td>
				<td><?php echo $client['email']; ?></td>
			</tr>

			<tr>
				<td>Phone NUMBER</td>
				<td> </td>
				<td><?php echo $client['phonenumber']; ?></td>
			</tr>

			<tr>
				<td>Address</td>
				<td> </td>
				<td><?php echo $client['address']; ?></td>
			</tr>

			<tr>
				<td>Country</td>
				<td> </td>
				<td><?php echo $client['Countryname']; ?></td>
			</tr>

			<tr>
				<td>State</td>
				<td> </td>
				<td><?php echo $client['Statename']; ?></td>
			</tr>

			<tr>
				<td>City</td>
				<td> </td>
				<td><?php echo $client['Cityname']; ?></td>
			</tr>

			<tr>
				<td>Postal Code</td>
				<td> </td>
				<td><?php echo $client['postalcode']; ?></td>
			</tr>
		</tbody>
	
	</table>

	<div class="col-md-4 offset-md-2">
		<img src="<?php echo site_url(); ?>assets/images/<?php echo $client['image']; ?>" alt="<?php echo $client['clientname']; ?>" >
	</div>	
</div>

<div id="details">
	<center>
		<a href="<?php echo base_url()?>Client/viewClient" class="btn btn-info" >BACK</a>	
		<a class="btn btn-small btn-warning"  href="<?php $id = $client["id"]; echo Base_url('Client/editClient/'.$id); ?>">EDIT</a>
		<a class="btn btn-small btn-danger" onclick="return deletefn()" href="<?php $id = $client["id"]; echo Base_url('Client/deleteClient/'.$id); ?>">DELETE</a><br>
	</center>
</div>
