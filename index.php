<?php
	session_start();
	include('component/header.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Us Coching</title>
	<link href="css/index.css" type="text/css" rel="stylesheet" />
	<link href="css/table.css" type="text/css" rel="stylesheet" />
	<link href="css/client.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="mainBody">
		<div class="header">
			<img src="images/logo.png" alt="logo" title="Curious Focuse" />
			<div>
				<h1>Curious Focuse University</h1>
				<p>This is a official page of Curious Focuse . This page offer you best perfomence of web servicing, Software developing, domain & hosting.</p>
				
			</div>
		</div>
	</div>
	
	<div class="main">
		<div class="menu">
			<?php 
			if(isset($_GET['p']))
			{
				include('component/menu.php');
			}
			else
			{
				include('component/clientMenu.php');
			}
			
			
			?>
		</div>
		
		<div class="content">
			
			<?php include('component/controller.php'); ?>	
			
		</div>
	
	</div>
	
	<div class="footer">
		<div class="left">
			<a href="#">Cotact</a>
			<a href="#">TOS</a>
			<a href="#">Privacy Policy</a>
			<a href="#">Support</a>
			<a href="#">FAQ</a>
		</div>
		
		<div class="right">
			copyright @ussl <?php print date("Y");?>
		</div>
	</div>
	

	
	
</body>
</html>