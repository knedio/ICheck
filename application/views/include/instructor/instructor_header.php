<!doctype html>
<html lang="en">

<head>
	<title>ICheck</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/linearicons/style.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
	<!--
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#datatables').DataTable();
		} );
		$(document).ready(function() {
			$('#datatables2').DataTable();
		} );
		$(document).ready(function() {
			$('#datatables3').DataTable();
		} );
	</script>
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<nav class="navbar navbar-fixed-top">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>
		</nav>
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
				<div class="scrollbar" id="style-1">
				<nav>
					<ul class="nav">
						<div class="logoContainer" ><br />
  
								<img src="<?php echo base_url();?>assets/img/USTP-LOGO.png" width= '80%' height='70%' >
						</div>
						<p>Welcome <?php echo $this->session->userdata('lname'); ?>!</p>
						<li><a href="<?php echo base_url();?>InstructorController/reportsSelectDate" class=""><i class="fa fa-file-text-o"></i>Report</a></li>
						<li><a href="<?php echo base_url();?>InstructorController/timelogsSelectDate" class=""><i class="fa fa-hourglass-start"></i>Time Log</a></li>
						<li><a href="<?php echo base_url();?>InstructorController/schedule" class=""><i class="lnr lnr-book"></i>Schedule</a></li>
						<li><a href="<?php echo base_url();?>InstructorController/profile" class=""><i class="fa fa-user-o"></i>Profile</a></li>
						<li><a href="<?php echo base_url();?>InstructorController/requests" class=""><i class="fa fa-envelope"></i>Request</a></li>
						<li><a href="<?php echo base_url();?>InstructorController/logout" class=""><i class="fa fa-sign-out" ></i> Log Out</a></li>
						<br>
						<br>
					</ul>
				</nav>
			</div>
		</div>
        <!-- LEFT SIDEBAR -->
        <!-- page-wrapper -->
		
        <div class="main">