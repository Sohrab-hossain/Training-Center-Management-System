<div class="links">
	<a href="?p=city_new">Enter New City</a>
</div><br />

<?php
	$search = "";
	$country = "0";
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
		<label>Country :</label>
			<select name="country" id="country">
				<option value="0">Select</option>
				<?php
					$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

					$sql = "SELECT id, name FROM country";

					$table = mysqli_query($cn,$sql);

					while($row = mysqli_fetch_assoc($table))
					{
						if($row["id"] == $country)
						{
							print '<option value="'.$row["id"].'" Selected>'.htmlentities($row["name"]).'</option>'."\n";
						}
						else
						{
							print '<option value="'.$row["id"].'">'.htmlentities($row["name"]).'</option>'."\n";
						}
					}		
				?>
			</select>
		<input type="submit" name="btnSearch" value="Search"/>
	</form>
</div><br />

<?php
	
	$page = 1;
	if(isset($_GET['page']))
		$page = $_GET['page'];

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

	if(isset($_GET['did']))
	{
		$sql = "delete from city where id = ".mysqli_real_escape_string($cn, base64_decode($_GET['did']));
		
		if(mysqli_query($cn, $sql))
		{
			print '<span class = "successMessage">City Deleted Successfully</span>';
		}
		else{
			print '<span class = "errorMessage">'.mysqli_error($cn).'</span>';
		}
	}


		
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

	print '<table>';
	print '<tr><th>Name</th><th>Country</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.htmlentities($row["name"]).'</td>';
		print '<td>'.htmlentities($row["country"]).'</td>';
		
		print '<td><a href="?p=city_edit&eid='.base64_encode($row["id"]).'"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> 
		| 
		
		<a href="?p='.$_GET['p'].'&did='.base64_encode($row["id"]).'"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		
		print '</tr>';
	}
	print '</table>';
	
	print '<div>';
	if($page >= ((($TRC - ($TRC % 10)) / 10) + 1))
	{
		print 'Next | Last |';
	}
	else
	{
		print ' <a href="?p='.$_GET['p'].'&page='.($page +1).'">Next</a> | ';
		print ' <a href="?p='.$_GET['p'].'&page='.((($TRC - ($TRC % 10)) / 10) + 1) .'">Last</a> | ';
	}
	if($page <=1)
	{
		print 'First | Previous';
	}
	else
	{
		print ' <a href="?p='.$_GET['p'].'">First</a> | ';
		print ' <a href="?p='.$_GET['p'].'&page='.($page -1).'">Previous</a> ';
	}

	print '</div>';



?>