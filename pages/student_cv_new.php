<?php
$student = "0";
$cv = "";

$estudent = "";
$ecv = "";

if(isset($_POST['submit']))
{
	$student = $_POST['student'];
	$cv = $_FILES["cv"];
	
	$er = "";
	
	if($student == "0")
	{
		$er++;
		$estudent = "Select One";
	}
	
	if($cv["name"] == "")
	{
		$er++;
		$eimage = "Select CV";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "insert into student_cv (studentId, cv, date) VALUES (
		
		".mysqli_real_escape_string($cn,$student).",
		'".mysqli_real_escape_string($cn,$cv["name"])."',
		'".date("Y-m-d")."'
		
		)";
	
		
		//INSERT INTO city (name, countryId) VALUES ('Dhaka', '1');
		
		if(mysqli_query($cn,$sql))
		{
			$sp = $cv["tmp_name"];
			$dp = "uploads/student_cv/".$student."_".$cv["name"];
			move_uploaded_file($sp, $dp);
			
			
			print '<span class="successMessage">Student CV Inserted to System</span>';
			
			$student = "0";
			$cv = "";
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
	
	<label>CV</label><br/>
	<input type="file" name="cv" id="cv"/>
	<span class="error" id="ecv"><?php print $ecv; ?></span><br/>
	<br/>
	
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>