
<?php
	$search = "";
	$country = "0";
	if(isset($_REQUEST['country']))
	{
		$country = $_REQUEST['country'];
	}
	if(isset($_POST['btnSearch']))
	{
		$search = $_POST['search'];
		$country = $_POST['country'];
	}
?>

<div class="search">
	<form method="post" action="">
		<label>City :</label>
		<input type="text" name="search" id="search" value="<?php print $search; ?>"/>
		<?php
		Combo("country", $country, "", " where id in (select countryId from city)" );
		?>
		<input type="submit" name="btnSearch" value="Search"/>
	</form>
</div><br />

<?php
	
	$page = 1;
	if(isset($_GET['page']))
		$page = $_GET['page'];

		
	//$sql = "SELECT id, name, countryId FROM city";
	//$sql = "SELECT city.id, city.name, country.name as country FROM city,country";

	$sql = "SELECT city.id, city.name, country.name as country 
	FROM city left join country on city.countryId = country.id where city.id > 0 ";

	$TRC = mysqli_query($cn, $sql);
	$TRC = mysqli_num_rows($TRC);

	if($search != "")
	{
		$sql .= " and city.name like '%".mysqli_real_escape_string($cn,$search)."%'";
	}
	if($country != "0")
	{
		$sql .= "and country.id = ".$country;
	}
	

	$sql .=  " limit ".(($page-1)*10).", 10 ";
	

	$table = mysqli_query($cn,$sql);

	print '<ol>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<li>';
		print "<b>".htmlentities($row["name"])."</b>".", ".htmlentities($row["country"]);		
		print '</li>';
	}
	print '</ol';
	
	print '<div>';
	if($page >= ((($TRC - ($TRC % 10)) / 10) + 1))
	{
		print 'Next | Last |';
	}
	else
	{
		print ' <a href="?a='.$_GET['a'].'&page='.($page +1).'">Next</a> | ';
		print ' <a href="?a='.$_GET['a'].'&page='.((($TRC - ($TRC % 10)) / 10) + 1) .'">Last</a> | ';
	}
	if($page <=1)
	{
		print 'First | Previous';
	}
	else
	{
		print ' <a href="?a='.$_GET['a'].'">First</a> | ';
		print ' <a href="?a='.$_GET['a'].'&page='.($page -1).'">Previous</a> ';
	}

	print '</div>';



?>