<?php
$name = "";
$fee = "";
$duration = "";
$department = "0";
$description = "";
$syllabus = "";
$website = "";

$ename = "";
$efee = "";
$eduration = "";
$edepartment = "";
$edescription = "";
$esyllabus = "";
$ewebsite = "";

if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$fee = $_POST["fee"];
	$duration = $_POST["duration"];
	$department = $_POST["department"];
	$description = $_POST["description"];
	$syllabus = $_FILES["syllabus"];
	$website = $_POST["website"];
	
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
	
	if($fee == "")
	{
		$er++;
		$efee = "Required";
	}
	if($duration == "")
	{
		$er++;
		$eduration = "Required";
	}
	if($department == "0")
	{
		$er++;
		$edepartment = "Required";
	}
	if($description == "")
	{
		$er++;
		$edescription = "Required";
	}
	if($syllabus["name"] == "")
	{
		$er++;
		$esyllabus = "Required";
	}
	if($website == "")
	{
		$er++;
		$ewebsite = "Required";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "INSERT INTO course (name,fee,duration,departmentId,description,syllabus,website) VALUES (
		'".mysqli_real_escape_string($cn,$name)."',
		".mysqli_real_escape_string($cn,$fee).",
		".mysqli_real_escape_string($cn,$duration).",
		".mysqli_real_escape_string($cn,$department).",
		'".mysqli_real_escape_string($cn,$description)."',
		'".mysqli_real_escape_string($cn,$syllabus["name"])."',
		'".mysqli_real_escape_string($cn,$website)."'
		
		)";
		
		if(mysqli_query($cn,$sql))
		{
			$sp = $syllabus["tmp_name"];
			$dp = "uploads/syllabus/".mysqli_insert_id($cn)."_".$syllabus["name"];
			move_uploaded_file($sp, $dp);
			
			print '<span class="successMessage">Course Inserted to System</span>';
			
			$name = "";
			$fee = "";
			$duration = "";
			$department = "0";
			$description = "";
			$syllabus = "";
			$website = "";
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



<form method="post" action="" enctype="multipart/form-data">
	
	<label>Name</label><br/>
	<input type="text" name="name" id="name" value="<?php print $name; ?>"/>
	<span class="error" id="ename"><?php print $ename; ?></span><br/>
	<br/>
	
	<label>Description</label><br/>
	<textarea name="description" id="description"><?php print $description; ?></textarea>
	<span class="error" id="edescription"><?php print $edescription; ?></span><br/>
	<br/>
	
	<label>Fee</label><br/>
	<input type="text" name="fee" id="fee" value="<?php print $fee; ?>"/>
	<span class="error" id="efee"><?php print $efee; ?></span><br/>
	<br/>
	
	<label>Duration</label><br/>
	<input type="text" name="duration" id="duration" value="<?php print $duration; ?>"/>
	<span class="error" id="eduration"><?php print $eduration; ?></span><br/>
	<br/>
	
	<label>Department</label><br/>
	<select name="department" id="department">
		<option value="0">Select</option>
		<?php
			$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

			$sql = "SELECT id, name FROM department";

			$table = mysqli_query($cn,$sql);
		
			while($row = mysqli_fetch_assoc($table))
			{
				if($row["id"] == $department)
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
	<span class="error" id="edepartment"><?php print $edepartment; ?></span><br/>
	<br/>
		
	<label>Syllabus</label><br/>
	<input type="file" name="syllabus" id="syllabus"/>
	<span class="error" id="esyllabus"><?php print $esyllabus; ?></span><br/>
	<br/>
	
	<label>Website</label><br/>
	<input type="text" name="website" id="website" value="<?php print $website; ?>"/>
	<span class="error" id="ewebsite"><?php print $ewebsite; ?></span><br/>
	<br/>
		
	<input type="submit" name="submit" value="Submit"/>
</form>