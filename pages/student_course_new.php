 <?php
$student = "0";
$course = "0";
$date = "";
$remarks = "";

$estudent = "";
$ecourse = "";
$edate = "";

if(isset($_POST['submit']))
{
	$student = $_POST['student'];
	$course = $_POST["course"];
	$date = $_POST["date"];
	$remarks = $_POST["remarks"];
	
	$er = "";
	
	if($student == "0")
	{
		$er++;
		$estudent = "Select One";
	}
	
	if($course == "0")
	{
		$er++;
		$ecourse = "Select one";
	}
	
	if($date == "")
	{
		$er++;
		$edate = "Required";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "insert into student_course (studentId, courseId, date, remarks) VALUES (
		".mysqli_real_escape_string($cn,$student).",
		".mysqli_real_escape_string($cn,$course).",
		'".mysqli_real_escape_string($cn,$date)."',
		'".mysqli_real_escape_string($cn,$remarks)."'
		
		)";
	
		
		//INSERT INTO city (name, countryId) VALUES ('Dhaka', '1');
		
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">Student Course Inserted to System</span>';
			
			$student = "0";
			$course = "0";
			$date = "";
			$remarks = "";
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
	
	<label>Course</label><br/>
	<select name="course" id="course">
		<option value="0">Select</option>
		<?php
			$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

			$sql = "SELECT id, name FROM course";

			$table = mysqli_query($cn,$sql);
		
			while($row = mysqli_fetch_assoc($table))
			{
				if($row["id"] == $course)
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
	<span class="error" id="ecourse"><?php print $ecourse; ?></span><br/>
	<br/>
	
	<label>Date</label><br/>
	<input type="text" name="date" id="date" value="<?php print $date;?>" />
	<span class="error" id="edate"><?php print $edate; ?></span><br/>
	<br/>
	<label>Remarks</label><br/>
	<textarea name="remarks" id="remarks"><?php print $remarks;?></textarea><br/>
	<br/>
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>