<?php
$name = "";
$ename = "";

if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	
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
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "INSERT INTO country (name) VALUES ('".mysqli_real_escape_string($cn,$name)."')";
		
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">Country Inserted to System</span>';
			
			$name = "";
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
	
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>