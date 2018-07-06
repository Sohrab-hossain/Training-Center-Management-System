<a href="#">Home</a>
<a href="?p=country">Country</a>
<a href="?p=city">City</a>
<a href="?p=department">Department</a>
<a href="?p=course">Course</a>
<a href="?p=student">Student</a>
<a href="?p=student_course">Student Course</a>
<a href="?p=student_image">Student Image</a>
<a href="?p=student_cv">Student CV</a>

<?php
if(isset($_SESSION['type']))
{
	print '<a href="?c=logout">Logout</a>
	<a href="?p=profile">'.$_SESSION['name'].'</a><a href="?a=home">Client Site</a>';
}
else
{
	print '<a href="?c=login">Login</a>
	<a href="?a=register">Register</a>';
}

?>



