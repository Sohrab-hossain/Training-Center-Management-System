<div class="links">
	<a href="?p=country_new">Enter New Country</a>
</div><br />

<?php
	$search = "";
	if(isset($_POST['btnSearch']))
	{
		$search = $_POST['search'];
	}
?>

<div class="search">
	<form method="post" action="">
		<input type="text" name="search" id="search" value="<?php print $search; ?>"/>
		<input type="submit" name="btnSearch" value="Search"/>
	</form>
</div><br />



<?php

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

	if(isset($_GET['did']))
	{
		$sql = "delete from country where id = ".mysqli_real_escape_string($cn, base64_decode($_GET['did']));
		
		if(mysqli_query($cn, $sql))
		{
			print '<span class = "successMessage">Country Deleted Successfully</span>';
		}
		else{
			print '<span class = "errorMessage">'.mysqli_error($cn).'</span>';
		}
	}


		
	$sql = "SELECT id, name FROM country";
	
	if($search != "")
	{
		$sql .= " where name like '%".mysqli_real_escape_string($cn,$search)."%'";
	}

	//$sql .= "limit 0, 10";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Name</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'. str_replace($search, "<hl>".$search."</hl>", htmlentities($row["name"])).'</td>';
		
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> 
		| 
		<a href="?p='.$_GET['p'].'&did='.base64_encode($row["id"]).'"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';

		print '</tr>';
		
	}
	print '</table>';

?>