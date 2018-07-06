<?php
	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

	function ms($value)
	{
		global $cn;
		
		return mysqli_real_escape_string($cn, $value);
	}

if(isset($_COOKIE['type']))
{
	$_SESSION['id'] = $_COOKIE["id"];
	$_SESSION['name'] = $_COOKIE["name"];
	$_SESSION['email'] = $_COOKIE["email"];
	$_SESSION['type'] = $_COOKIE["type"];
}

if(isset($_GET['c']) and $_GET['c'] == "logout")
{
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	unset($_SESSION['type']);
}


if(isset($_POST['btnLogin']))
{
	$sql = "select id, name, email, type, active from student 
			where (email = '".ms($_POST['user'])."' or contact = '".$_POST['user']."') and password = password('".$_POST['password']."')";
	
	$table = mysqli_query($cn, $sql);
	
	if(mysqli_num_rows($table) > 0)
	{
		while($row = mysqli_fetch_assoc($table))
		{
			if($row['active'] == 1)
			{
				$_SESSION['id'] = $row["id"];
				$_SESSION['name'] = $row["name"];
				$_SESSION['email'] = $row["email"];
				$_SESSION['type'] = $row["type"];
			}
			else
			{
				print "You have not activated your account yet. Please login to your email and click the link we sent you.";
			}
		}
	}
}


	
	function Combo($TableName, $value = "0", $error = "", $extra= "")
	{
		global $cn;
		print '<label>'. ucwords($TableName) .':</label>
		<select name ="'.$TableName.'" id ="'.$TableName.'">
		<option value ="0">Select</option>';
		
		$sql = " select id, name from ".$TableName." ".$extra;
		
		$table = mysqli_query($cn, $sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			if($row["id"] == $value)
			{
				print '<option value = "'.$row["id"].'"
				selected>'.htmlentities($row["name"]).'</option>'."\n" ;
			}
			else
			{
				print '<option value = "'.$row["id"].'">'.htmlentities($row["name"]).'</option>'."\n" ;
			}
		}
		
		print '</select><span class = "error" id = "e'.$TableName.'">'.$error.'</span>';
	}

?>