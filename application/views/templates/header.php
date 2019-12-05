<html>
<head>
      <link rel="stylesheet" type="text/css" href="<?php echo site_url()."/assets/css/bootstrap.min.css"?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo site_url()."/assets/css/style.css"?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo site_url()."assets/DataTables/css/jquery.dataTables.min.css"?>"/>
	<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
</head>
<body>
<nav class="navbar bg-secondary">

      <ul class="navbar navbar-left" id="navleft">
            <a class="navbar-brand" href="<?php echo base_url()?>client/viewclient">Client</a>
            <li><a href="<?php echo base_url()?>client/viewclient"><i class="glyphicon glyphicon-home"></i>Home <span class="sr-only"></span></a></li>
      </ul>
      <ul id="navright" class="navbar navbar-right">
            <li><a href="<?php echo base_url()?>User/myaccount"><?php echo  $this->session->userdata('username'); ?></a></li>
            <li><a  href="<?php  echo base_url()?>User/logout/">Log Out</a></li>
    </ul>
</nav>

<div class="container">
	
		<?php if($this->session->flashdata('user_loggedin')): ?>
		<p class="alert alert-success"><?php echo  $this->session->flashdata('user_loggedin')?>
			<button type="button" class="close" onclick="closeFunc()">
                  	<span>&times;</span>
                	</button></p>
		<?php endif; ?>

		<?php if($this->session->flashdata('client_add')): ?>
		<p class="alert alert-success"><?php echo  $this->session->flashdata('client_add')?>
			<button type="button" class="close" onclick="closeFunc()">
                  	<span>&times;</span>
                	</button></p>
		<?php endif; ?>

		<?php if($this->session->flashdata('client_update')): ?>
		<p class="alert alert-success"><?php echo  $this->session->flashdata('client_update')?>
			<button type="button" class="close" onclick="closeFunc()">
                  	<span>&times;</span>
                	</button></p>
		<?php endif; ?>

		<?php if($this->session->flashdata('client_delete')): ?>
		<p class="alert alert-success"><?php echo  $this->session->flashdata('client_delete')?>
			<button type="button" class="close" onclick="closeFunc()">
                  	<span>&times;</span>
                	</button></p>
		<?php endif; ?>
</div>
