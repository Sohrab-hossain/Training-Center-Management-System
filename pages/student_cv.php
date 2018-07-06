<div class="links">
	<a href="?p=student_cv_new">Enter New Student CV</a>
</div>

<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
	//$sql = "SELECT id, name, countryId FROM city";
	//$sql = "SELECT city.id, city.name, country.name as country FROM city,country";
	$sql = " select scv.studentId, s.name as student, s.email, scv.cv, scv.date
from student_cv as scv
left join student as s on scv.studentId = s.id ";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Student</th><th>Email</th><th>CV</th><th>Date</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["student"]).'</td>';
		print '<td>'.htmlentities($row["email"]).'</td>';
		print '<td><a href="uploads/student_cv/'.$row["studentId"].'_'.$row["cv"].'">'.$row["cv"].'</a></td>';
		print '<td>'.htmlentities($row["date"]).'</td>';
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> | 
		<a href="#"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		print '</tr>';
	}
	print '</table>';

?>