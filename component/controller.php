<?php
	if(isset($_GET['p']))
	{
		if(!isset($_SESSION["type"]))
		{
			print '<span>You have to login with admin account to view this content. <span>';
			include('common/login.php');
			
		}
		else if(file_exists("pages/".$_GET['p'].".php"))
		{
			print '<span class="pageTitle">'.ucwords(str_replace("_"," ",$_GET['p'])).'</span>';
			include("pages/".$_GET['p'].".php");
		}
		else
		{
		print '<span class="pageTitle">Invelid Request</span>';
		print "Your request is invelid.";
		}
				
	}

	else if(isset($_GET['c']))
	{
		if($_GET['c'] == "login" and isset($_POST['btnLogin']))
		{
			if(isset($_SESSION['type']))
			{
				print 'Login Successfully';				
			}
			else
			{
				print "Invelid Login";
				include('common/login.php');
			}
		}
		else if(file_exists("common/".$_GET['c'].".php"))
		{
			print '<span class="pageTitle">'.ucwords(str_replace("_"," ",$_GET['c'])).'</span>';
			include("common/".$_GET['c'].".php");
		}
		else
		{
		print '<span class="pageTitle">Invelid Request</span>';
		print "Your request is invelid.";
		}
				
	}

	else if(isset($_GET['a']))
	{
		if(file_exists("client/".$_GET['a'].".php"))
		{
			print '<span class="pageTitle">'.ucwords(str_replace("_"," ",$_GET['a'])).'</span>';
			include("client/".$_GET['a'].".php");
		}
		else
		{
		print '<span class="pageTitle">Invelid Request</span>';
		print "Your request is invelid.";
		}
				
	}

	else
	{
		print '<span class="pageTitle">Home</span>';
		include("client/home.php");
	}
?>