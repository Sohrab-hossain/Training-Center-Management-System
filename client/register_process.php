<?php

if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$regNo = $_POST["regNo"];
	$tag = $_POST["tag"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	
	if(isset($_POST["gender"]))
		$gender = $_POST["gender"];
	
	$dateOfBirth = $_POST["dateOfBirth"];
	$address = $_POST["address"];
	$city = $_POST["city"];

	
	$er = "";
	
	if($name == "")
	{
		$er++;
		$ename = "Required";
	}
	else if(strlen($name)<2 || strlen($name)>200)
	{
		$er++;
		$ename = "Name must contain 2-200 charecter";
	}
	
	if($regNo == "")
	{
		$er++;
		$eregNo = "Required";
	}
	if($tag == "")
	{
		$er++;
		$etag = "Required";
	}
	if($contact == "")
	{
		$er++;
		$econtact = "Required";
	}
	if($email == "")
	{
		$er++;
		$eemail = "Required";
	}
	
	
	
	if($password == "")
	{
		$er++;
		$epassword = "Required";
	}
	else if($repassword == "")
	{
		$er++;
		$erepassword = "Required";
	}
	else if($password != $repassword){
		$er++;
		$erepassword = "Password does not match.";
	}
	
	
	
	if($gender == "")
	{
		$er++;
		$egender = "Required";
	}
	if($dateOfBirth == "")
	{
		$er++;
		$edateOfBirth = "Required";
	}
	if($city == "0")
	{
		$er++;
		$ecity = "Required";
	}
	
	
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "INSERT INTO student (name,  regNo, tag, contact, email, password, gender, dateOfBirth, address, cityId, createDate, createIp) VALUES (
		'".mysqli_real_escape_string($cn,$name)."',
		'".mysqli_real_escape_string($cn,$regNo)."',
		'".mysqli_real_escape_string($cn,$tag)."',
		'".mysqli_real_escape_string($cn,$contact)."',
		'".mysqli_real_escape_string($cn,$email)."',
		password('".$password."'),
		".mysqli_real_escape_string($cn,$gender).",
		'".mysqli_real_escape_string($cn,$dateOfBirth)."',
		'".mysqli_real_escape_string($cn,$address)."',
		".mysqli_real_escape_string($cn,$city).",
		
		'".date("Y-m-d")."',
		
		'".$_SERVER['REMOTE_ADDR']."'
		
		)";
		
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">Information Inserted to System Successfully.</span>';
			
			$subject = "Please click the link bellow or copy paste to browser url and activate / validate your account.";
			
			$subject .= "<br/><hr>http://localhost/www/UsCoching/?a=activate&id=".base64_encode(mysqli_insert_id($cn))."<hr><br/>";
			
			//mail($email, "admin@demoproject.com", $subject);
			print $subject;
			
		}
		else 
		{
			print '<span class="errorMessage">'.mysqli_error($cn).'</span>';
			include("client/register.php");
		}
		
	}
	else
	{
		print '<span class="errorMessage">You have some error in your form, Please review.</span>';
		include("client/register.php");
	}
}



?>