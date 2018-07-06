 <?php
$name = "";
$country = "0";

$ename = "";
$ecountry = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$country = $_POST["country"];
	
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
	if($country == "0")
	{
		$er++;
		$ecountry = "Select one";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "update city set 
		name = '".mysqli_real_escape_string($cn,$name)."', 
		countryId = ".$country."
		where id = ".mysqli_real_escape_string($cn, base64_decode($_GET["eid"]));
	
		
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">City Updated to System</span>';
			
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
else
{
	if(isset($_GET['eid']))
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "select id, name, countryId from city where id = ".mysqli_real_escape_string($cn, base64_decode($_GET["eid"]));
		
		$table = mysqli_query($cn,$sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			$name = $row["name"];
			$country = $row["countryId"];
		}
	}
}


?>



<form method="post" action="">
	
	<label>Name</label><br/>
	<input type="text" name="name" id="name" value="<?php print $name; ?>"/>
	<span class="error" id="ename"><?php print $ename; ?></span><br/>
	<br/>
	
	<label>Country</label><br/>
	<select name="country" id="country">
		<option value="0">Select</option>
		<?php
			$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

			$sql = "SELECT id, name FROM country";

			$table = mysqli_query($cn,$sql);
		
			while($row = mysqli_fetch_assoc($table))
			{
				if($row["id"] == $country)
				{
					print '<option value="'.$row["id"].'" Selected>'.htmlentities($row["name"]).'</option>'."\n";
				}
				else
				{
					print '<option value="'.$row["id"].'">'.htmlentities($row["name"]).'</option>'."\n";
				}
			}		
		?>
	</select>
	<span class="error" id="ecountry"><?php print $ecountry; ?></span><br/>
	<br/>
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>