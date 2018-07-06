<a href="?a=home">Home</a>
<a href="?a=country">Country</a>
<a href="?a=city">City</a>
<a href="?a=department">Department</a>
<a href="?a=course">Course</a>
<a href="?a=student">Student</a>
<a href="?a=student_course">Student Course</a>

<?php
if(isset($_SESSION['type']))
{
	print '<a href="?c=logout">Logout</a>
	<a href="?p=profile">'.$_SESSION['name'].'</a><a href="?p=home">Admin Panel</a>';
}
else
{
	print '<a href="?c=login">Login</a>
	<a href="?a=register">Register</a>';
}

?>



