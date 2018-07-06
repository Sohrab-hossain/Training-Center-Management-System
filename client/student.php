
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
		
		<?php Combo("city", $city, "", ""); ?>
		<?php Combo("country", $country, "", ""); ?>
		
		<input type="submit" name="btnSearch" value="Search"/>
	</form>
</div><br />


<?php
		
	$sql = "select s.id, s.name, s.regNo, s.tag, s.contact, s.email, s.gender, s.dateOfBirth, s.address, ct.name as city, cn.name as country, s.createIp, s.createDate, (select concat(id, '_', image) from student_image where studentId = s.id limit 0, 1) as image from student as s
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
	while($row = mysqli_fetch_assoc($table))
	{
		print '<div class = "student">'."\n";
		if($row['image'] == "")
		{
			if($row["gender"] == 1)
			{
				print '<img src="images/no_image_female.png"/>'."\n";
			}
			else{
				print '<img src="images/no_image_male.jpg"/>'."\n";
			}
		}
		else{
			print '<img src="uploads/student_images/'.$row['image'].'"/>'."\n";
		}
		
		print '<div>';
		print '<a href="?a=student_profile&sid='.base64_encode($row["id"]).'">';
		print "<span><b>".htmlentities($row["name"])."</b>, ";
		print '</a>';
		if($row["gender"] == 1)
			{
				print "Female";
			}
			else
			{
				print "Male";
			}
		print "</span>";
		
		print "<span>".htmlentities($row["contact"]).", ".htmlentities($row["email"])."</span>";
		print "<span>".htmlentities($row["tag"])."</span>";
		print "<p>From: ".htmlentities($row["city"]).", ".htmlentities($row["country"])."</p>";
		
		if(isset($_SESSION["type"]) and $_SESSION["id"] == $row["id"])
		{
			print '<a href="?a=student_edit&id='.base64_encode($row['id']).'">Update Your Account</a>';
		}
		
		print '</div>';		
		print '</div>'."\n";
	}

?>