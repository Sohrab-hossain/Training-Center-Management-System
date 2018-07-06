<?php
$student = "0";
$image = "";
$title = "";

$estudent = "";
$eimage = "";

if(isset($_POST['submit']))
{
	$student = $_POST['student'];
	$image = $_FILES["image"];
	$title = $_POST["title"];
	
	$er = "";
	
	if($student == "0")
	{
		$er++;
		$estudent = "Select One";
	}
	
	if($image["name"] == "")
	{
		$er++;
		$eimage = "Select Image";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "insert into student_image (studentId, image, date, title) VALUES (
		".mysqli_real_escape_string($cn,$student).",
		'".mysqli_real_escape_string($cn,$image["name"])."',
		'".date("Y-m-d")."',
		'".mysqli_real_escape_string($cn,$title)."'
		
		)";
	
		
		//INSERT INTO city (name, countryId) VALUES ('Dhaka', '1');
		
		if(mysqli_query($cn,$sql))
		{
			$sp = $image["tmp_name"];
			$dp = "uploads/student_images/".mysqli_insert_id($cn)."_".$image["name"];
			move_uploaded_file($sp, $dp);
			
			
			print '<span class="successMessage">Student Image Inserted to System</span>';
			
			$student = "0";
			$image = "";
			$title = "";
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
	
	<label>Student</label><br/>
	<select name="student" id="student">
		<option value="0">Select</option>
		<?php
			$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

			$sql = "SELECT id, name FROM student";

			$table = mysqli_query($cn,$sql);
		
			while($row = mysqli_fetch_assoc($table))
			{
				if($row["id"] == $student)
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
	<span class="error" id="estudent"><?php print $estudent; ?></span><br/>
	<br/>
	
	<label>Image</label><br/>
	<input type="file" name="image" id="image"/>
	<span class="error" id="eimage"><?php print $eimage; ?></span><br/>
	<br/>
	
	<label>Title</label><br/>
	<input type="text" name="title" id="title" value="<?php print $title; ?>" /><br/>
	<br/>
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>