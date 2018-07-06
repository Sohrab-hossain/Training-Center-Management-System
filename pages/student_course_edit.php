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
		
		$sql = "update student_course set 
		studentId = '".mysqli_real_escape_string($cn,$student).", 
		cours
		eId = ".mysqli_real_escape_string($cn,$course).",
		date = '".mysqli_real_escape_string($cn,$date)."',
		remarks = '".mysqli_real_escape_string($cn,$remarks)."'
		where studentId = ".mysqli_real_escape_string($cn, base64_decode($_GET["student"]))." and courseId = " .mysqli_real_escape_string($cn, base64_decode($_GET["course"]));
				
		if(mysqli_query($cn,$sql))
		{
			print '<span class="successMessage">Student Course Updated to System</span>';
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
	if(isset($_GET['student']) && isset($_GET['course']))
	{
		$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
		$sql = "select studentId, courseId, date, remarks from student_course where studentId = ".mysqli_real_escape_string($cn, base64_decode($_GET["student"])). "and courseId = ".mysqli_real_escape_string($cn, base64_decode($_GET["course"]));
		
		$table = mysqli_query($cn,$sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			$student = $row["studentId"];
			$course = $row["courseId"];
			$date = $row["date"];
			$remarks = $row["remarks"];
		}
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