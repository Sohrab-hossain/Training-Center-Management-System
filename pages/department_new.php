<?php
$name = "";
$description = "";

$ename = "";

if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$description = $_POST["description"];
	
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
		
		$sql = "INSERT INTO department (name,description) VALUES (
		'".mysqli_real_escape_string($cn,$name)."',
		'".mysqli_real_escape_string($cn,$description)."')";
		
		//$sql = "INSERT INTO department (name, description) VALUES ('CSE', 'Dhaka City College')";
		
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">Department Inserted to System</span>';
			
			$name = "";
			$description = "";
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
	
	<label>Description</label><br/>
	<textarea name="description" id="description"><?php print $description; ?></textarea><br/>
	<br/>
	
	<input type="submit" name="submit" value="Submit"/>
</form>