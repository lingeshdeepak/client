<html>
      <head>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/spacelab/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="<?php echo site_url()."/assets/css/loginstyle.css"?>"/>
      </head>

      <body>
      <div class="container">

		<?php if($this->session->flashdata('message')): ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('message') ?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
			<p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed')?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_registered')): ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('user_registered')?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>
			
		<?php if($this->session->flashdata('Email_message')): ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('Email_message')?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>

		<?php if($this->session->flashdata('wrong_email')): ?>
			<p class="alert alert-danger"><?php echo $this->session->flashdata('wrong_email')?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_logout')): ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('user_logout') ?>
				<button type="button" class="close" onclick="closeFunc()">
				<span>&times;</span>
				</button>
			</p>
		<?php endif; ?>
			
  	</div>
   