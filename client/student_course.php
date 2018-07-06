<div class="links">
	<a href="?p=student_course_new">Enter New Student Course</a>
</div>

<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

	if(isset($_GET['student']) && isset($_GET['course']))
	{
		$sql = "delete from student_course where studentId = ".mysqli_real_escape_string($cn, base64_decode($_GET['student'])). " and courseId = ".mysqli_real_escape_string($cn, base64_decode($_GET['course'])) ;
		
		if(mysqli_query($cn, $sql))
		{
			print '<span class = "successMessage">Student Course Deleted Successfully</span>';
		}
		else{
			print '<span class = "errorMessage">'.mysqli_error($cn).'</span>';
		}
	}
 
	$sql = " select sc.studentId,sc.courseId, s.name as student, s.email, c.name as course, sc.date, sc.remarks
from student_course as sc
left join student as s on sc.studentId = s.id
left join course as c on sc.courseId = c.id ";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Student</th><th>Email</th><th>Course</th><th>Date</th><th>Remarks</th> <th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["student"]).'</td>';
		print '<td>'.htmlentities($row["email"]).'</td>';
		print '<td>'.htmlentities($row["course"]).'</td>';
		print '<td>'.htmlentities($row["date"]).'</td>';
		print '<td>'.htmlentities($row["remarks"]).'</td>';
		
		print '<td><a href="?p=student_course_edit&student='.base64_encode($row["studentId"]).'&course='.base64_encode($row["courseId"]).'"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> 
		| 
		<a href="?p='.$_GET['p'].'&student='.base64_encode($row["studentId"]).'&course='.base64_encode($row["courseId"]).'"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		
		print '</tr>';
	}
	print '</table>';

?>