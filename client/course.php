
<?php
		
	$sql = "SELECT c.id, c.name, c.fee, c.duration, department.name as department, c.description, c.syllabus, c.website, (select count(*) from student_course where courseId = c.id) as students  FROM course as c, department WHERE c.departmentId = department.id ";

	$table = mysqli_query($cn,$sql);

	while($row = mysqli_fetch_assoc($table))
	{
		print '<div class = "course">';
		print '<h2>'.htmlentities(ucwords($row["name"])).'</h2>';
		print '<span> Fee: '.htmlentities($row["fee"]).", Duration: ".htmlentities($row["duration"]).'</span>';
		
		print '<span> Department : '.htmlentities($row["department"]).'</span>';
				
		print '<span><a href="uploads/syllabus/'.$row["id"].'_'.$row["syllabus"].'">Syllabus</a>&nbsp&nbsp<a href="http://'.$row["website"].'">'.$row["website"].'</a></span>';
		
		print '<span>'.$row["students"].' student enrolled</span>';
		
		print '<p>'.htmlentities($row["description"]).'</p>';
		
		print '</div>';
	}

?>