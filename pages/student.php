<div class="links">
	<a href="?p=student_new">Enter New Student</a>
</div>

<?php
	$search = "";
	$country = "0";
	$city = "0";

	if(isset($_POST['btnSearch']))
	{
		$search = $_POST['search'];
		$country = $_POST['country'];
		$city = $_POST['city'];
	}
?>

<div class="search">
	<form method="post" action="">
		<input type="text" name="search" id="search" value="<?php print $search; ?>"/>
		
		<label>City :</label>
			<select name="city" id="city">
				<option value="0">Select</option>
				<?php
					$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");

					$sql = "SELECT id, name FROM city";

					$table = mysqli_query($cn,$sql);

					while($row = mysqli_fetch_assoc($table))
					{
						if($row["id"] == $city)
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

	$cn = mysqli_connect("localhost", "root", "", "dbuscoaching");
		
	$sql = "select s.id, s.name, s.regNo, s.tag, s.contact, s.email, s.gender, s.dateOfBirth, s.address, ct.name as city, cn.name as country, s.createIp, s.createDate from student as s
	left join city as ct on s.cityId = ct.id
	left join country as cn on ct.id = cn.id where s.id > 0";

	if($search != "")
	{
		$tmp = mysqli_real_escape_string($cn,$search);
		
		$sql .= " and ( s.name like '%".$tmp."%' or s.regNo like '%".$tmp."%' or s.tag like '%".$tmp."%' or s.contact like '%".$tmp."%' or s.email like '%".$tmp."%' or s.address like '%".$tmp."%' or s.createIp like '%".$tmp."%' )";
		
	}
	if($country != "0")
	{
		$sql .= " and cn.id = ".$country;
	}

	if($city != "0")
	{
		$sql .= " and ct.id = ".$city;
	}

// $sql .= " limit 0 ,10";

	$table = mysqli_query($cn,$sql);

	print '<table>';
	print '<tr><th>Basic Info</th><th>Other Info</th><th>Address</th><th>Security Info</th><th>#</th></tr>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<tr>';
		print '<td>'.
			htmlentities($row["name"])."<br/>".
			htmlentities($row["regNo"])."<br/>".
			htmlentities($row["contact"])."<br/>".
			htmlentities($row["email"])
			.'</td>';
		
 		print '<td>'.
			htmlentities($row["tag"])."<br/>";
		
			if($row["gender"] == 1)
			{
				print "Female";
			}
			else
			{
				print "Male";
			}
			
		print "<br/>".htmlentities($row["dateOfBirth"]).'</td>';
		
 		print '<td><address>'.htmlentities($row["address"])."</address>".
			htmlentities($row["city"]).",".
			htmlentities($row["country"])
			.'</td>';
		
		
		print '<td>'.
			htmlentities($row["createIp"])."<br/>".
			htmlentities($row["createDate"])
			.'</td>';
		
		print '<td><a href="#"><img src="images/edit.png" height="20" title="Edit" alt="Edit"/></a> | 
		<a href="#"><img src="images/delete01.png" height="20" title="Delete" alt="Delete"></a></td>';
		print '</tr>';
	}
	print '</table>';

?>