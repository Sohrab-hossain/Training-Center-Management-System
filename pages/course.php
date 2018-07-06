<div class="links">
	<a href="?p=course_new">Enter New Course</a>
</div>



<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
	$sql = "SELECT course.id, course.name, course.fee, course.duration, department.name as department, course.description, course.syllabus, course.website  FROM course, department WHERE course.departmentId = department.id ";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Name</th><th>Fee</th><th>Duration</th><th>Department</th><th>Description</th><th>Syllabus</th><th>Website</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["name"]).'</td>';
		print '<td>'.htmlentities($row["fee"]).'</td>';
		print '<td>'.htmlentities($row["duration"]).'</td>';
		print '<td>'.htmlentities($row["department"]).'</td>';
		print '<td>'.htmlentities($row["description"]).'</td>';
		
		print '<td><a href="uploads/syllabus/'.$row["id"].'_'.$row["syllabus"].'">Download</a></td>';
		
		print '<td><a href="http://'.$row["website"].'">'.$row["website"].'</a></td>';
		
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> | 
		<a href="#"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		print '</tr>';
	}
	print '</table>';

?>