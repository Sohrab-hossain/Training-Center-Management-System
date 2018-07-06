<?php
$sql = " update student set active = 1, active_date = '".date('Y-m-d')."' where id = ".ms(base64_decode($_GET['id']));

if(mysqli_query($cn, $sql))
{
	print "You are Active User now.";
}


?>