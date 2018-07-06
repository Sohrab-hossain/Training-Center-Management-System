<div class="links">
	<a href="?p=student_image_new">Enter New Student Image</a>
</div>

<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
	//$sql = "SELECT id, name, countryId FROM city";
	//$sql = "SELECT city.id, city.name, country.name as country FROM city,country";
	$sql = " select si.id, s.name as student, s.email, si.image, si.date, si.title
from student_image as si
left join student as s on si.studentId = s.id ";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Student</th><th>Email</th><th>Image</th><th>Date</th><th>Title</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["student"]).'</td>';
		print '<td>'.htmlentities($row["email"]).'</td>';
		print '<td><img src="uploads/student_images/'.$row["id"].'_'.$row["image"].'" height="120px"/></td>';
		print '<td>'.htmlentities($row["date"]).'</td>';
		print '<td>'.htmlentities($row["title"]).'</td>';
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> | 
		<a href="#"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		print '</tr>';
	}
	print '</table>';

?>