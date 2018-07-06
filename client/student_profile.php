<script>
	function changeImage(clientId)
	{
		alert(clientId);
	}
</script>


<?php
		
	$sql = "select s.id, s.name, s.regNo, s.tag, s.contact, s.email, s.gender, s.dateOfBirth, s.address, ct.name as city, cn.name as country, s.createIp, s.createDate, (select concat(id, '_', image) from student_image where studentId = s.id limit 0, 1) as image from student as s
	left join city as ct on s.cityId = ct.id
	left join country as cn on ct.id = cn.id where s.id = ".ms(base64_decode($_GET['sid']));

	
// $sql .= " limit 0 ,10";

	$table = mysqli_query($cn,$sql);
	while($row = mysqli_fetch_assoc($table))
	{
		print '<div class = "profile">'."\n";
		
		print '<div class="album">';
		print '<img id = "mainImage" src="';
		
			if($row['image'] == "")
			{
				if($row["gender"] == 1)
				{
					print 'images/no_image_female.png';
				}
				else{
					print 'images/no_image_male.jpg';
				}
			}
			else{
				print 'uploads/student_images/'.$row['image'];
			}
		print '"/>';
		print '<div>';
		findImages($row["id"]);
		print '</div>';
		print '</div>';
		
		
		print '<div class="details">';
		print "<span><b>".htmlentities($row["name"])."</b>, ";
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
		print '</div>';		

		
		
		
		print '</div>'."\n";
	}

function findImages($id)
{
	global $cn;
	$sql = "select id, image, title from student_image where studentId = ".$id;
	$table = mysqli_query($cn, $sql);
	$i = 1;
	while($row = mysqli_fetch_assoc($table))
	{
		$clientId = "img".$i++;
		print '<img src="uploads/student_images/'.$row["id"].'_'.$row["image"].'" id="'.$clientId.'" onClick="changeImage(\''.$clientId.'\')" height="90px" />';
	}
}











?>