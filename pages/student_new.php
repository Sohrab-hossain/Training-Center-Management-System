<?php
$name = "";
$regNo = "";
$tag = "";
$contact = "";
$email = "";
$password = "";
$repassword = "";
$gender = "";
$dateOfBirth = "";
$address = "";
$city = "0";

$ename = "";
$eregNo = "";
$etag = "";
$econtact = "";
$eemail = "";
$epassword = "";
$erepassword = "";
$egender = "";
$edateOfBirth = "";
$ecity = "";


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
			print '<span class="successMessage">Student Inserted to System</span>';
			
			$name = "";
			$regNo = "";
			$tag = "";
			$contact = "";
			$email = "";
			$password = "";
			$gender = "";
			$dateOfBirth = "";
			$address = "";
			$city = "0";
		}
		else 
		{
			print '<span class="errorMessage">'.mysqli_error($cn).'</span>';
		}
		
	}
	else
	{
		print '<span class="errorMessage">You have some error in your form, Please review.</span>';
	}
}


?>



<form method="post" action="">
	
	<label>Name</label><br/>
	<input type="text" name="name" id="name" value="<?php print $name; ?>"/>
	<span class="error" id="ename"><?php print $ename; ?></span><br/>
	<br/>
		
	<label>Registration No</label><br/>
	<input type="text" name="regNo" id="regNo" value="<?php print $regNo; ?>"/>
	<span class="error" id="eregNo"><?php print $eregNo; ?></span><br/>
	<br/>
	
	<label>Tag</label><br/>
	<input type="text" name="tag" id="tag" value="<?php print $tag; ?>"/>
	<span class="error" id="etag"><?php print $etag; ?></span><br/>
	<br/>
	
	<label>Contact</label><br/>
	<input type="text" name="contact" id="contact" value="<?php print $contact; ?>"/>
	<span class="error" id="econtact"><?php print $econtact; ?></span><br/>
	<br/>
	
	<label>Email</label><br/>
	<input type="text" name="email" id="email" value="<?php print $email; ?>"/>
	<span class="error" id="eemail"><?php print $eemail; ?></span><br/>
	<br/>
	
	<label>Password</label><br/>
	<input type="password" name="password" id="password"/>
	<span class="error" id="epassword"><?php print $epassword; ?></span><br/>
	<br/>
	<label>Retype Password</label><br/>
	<input type="password" name="repassword" id="repassword"/>
	<span class="error" id="erepassword"><?php print $erepassword; ?></span><br/>
	<br/>
	
	<label>Gender</label><br/>
	<input type="radio" name="gender" value="1" />Female
	<input type="radio" name="gender" value="2" />Male 
	<span class="error" id="egender"><?php print $egender; ?></span><br/>
	<br/>
	
	<label>Date Of Birth</label><br/>
	<input type="text" name="dateOfBirth" id="dateOfBirth" value="<?php print $dateOfBirth; ?>" />
	<span class="error" id="edateOfBirth"><?php print $edateOfBirth; ?></span><br/>
	<br/>
	
	<label>Address</label><br/>
	<textarea name="address" id="address"><?php print $address; ?></textarea><br/>
	<br/>
	
	<label>City</label><br/>
	<select name="city" id="city">
		<option value="0">Select</option>
		<?php
			$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

			$sql = "SELECT id, name FROM city";

			$table = mysqli_query($cn,$sql);
		
			while($row = mysqli_fetch_assoc($table))
			{
				if($row["id"] == $city)
				{
					print '<option value="'.$row["id"].'" Selected>'.htmlentities($row["name"]).'</option>'."\n";
				}
				else
				{
					print '<option value="'.$row["id"].'">'.htmlentities($row["name"]).'</option>'."\n";
				}
			}		
		?>
	</select><span class="error" id="ecity"><?php print $ecity; ?></span><br/>
	<br/>
	
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>