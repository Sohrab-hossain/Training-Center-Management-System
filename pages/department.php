<div class="links">
	<a href="?p=department_new">Enter New Department</a>
</div>



<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
	$sql = "SELECT id, name, description FROM department";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Name</th><th>Description</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["name"]).'</td>';
		print '<td>'.htmlentities($row["description"]).'</td>';
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> | 
		<a href="#"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		print '</tr>';
	}
	print '</table>';

?>