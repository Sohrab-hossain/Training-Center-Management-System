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
		
	$sql = "SELECT cn.id, cn.name FROM country as cn";
	
	if($search != "")
	{
		$sql .= " where cn.name like '%".ms($search)."%'";
	}

	//$sql .= "limit 0, 10";

	$table = mysqli_query($cn,$sql);


	print '<ol>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<li>';
		print str_replace($search, "<hl>".$search."</hl>", htmlentities($row["name"]));
		print findCities($row["id"]);		
		print '</li>';		
	}
	print '</ol>';


function findCities($id)
{
	global $cn;
	$sql = "select name from city where countryId = ".$id;
	$table = mysqli_query($cn, $sql);
	$s = "";
	while($row = mysqli_fetch_assoc($table))
	{
		$s = $s. $row["name"]."\n";
	}
	$s = ', [ <a href ="?a=city&country='.$id.'" title = "'.$s.'">'.mysqli_num_rows($table).'</a> ] Cities.';
	return $s;
}





?>