<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
		<img class="logo" src="<?php echo base_url();?>assets/img/USTP-LOGO.png">

		<div class="login">
			<?php 
	      	if($this->session->flashdata('invalid') != ''){
	      		echo '<center><label style="color: red;"><strong>Sorry! </strong>'. $this->session->flashdata('invalid') .'</label></center>';
	      	}
	      	?>
			
			<form method="POST" action="<?php echo base_url();?>LoginController/login">
				<label>User No : </label>
				<input type="text" placeholder="2014100117" name="user_no"><br>

				<label>Password :</label>
				<input type="password" placeholder="*****" name="password"><br>
				<input type="submit" value="Login">
			</form>
		</div>
  
</body>
</html>
