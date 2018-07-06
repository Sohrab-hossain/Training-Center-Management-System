<?php
$name = "";
$regNo = "";
$tag = "";
$contact = "";
$email = "";
$password = "";
$repassword = "";
$gender = "";
$dateOfBirth = "";
$address = "";
$city = "0";

$ename = "";
$eregNo = "";
$etag = "";
$econtact = "";
$eemail = "";
$epassword = "";
$erepassword = "";
$egender = "";
$edateOfBirth = "";
$ecity = "";





?>



<form method="post" action="?a=register_process">
	
	<label>Name</label><br/>
	<input type="text" name="name" id="name" value="<?php print $name; ?>"/>
	<span class="error" id="ename"><?php print $ename; ?></span><br/>
	<br/>
		
	<label>Registration No</label><br/>
	<input type="text" name="regNo" id="regNo" value="<?php print $regNo; ?>"/>
	<span class="error" id="eregNo"><?php print $eregNo; ?></span><br/>
	<br/>
	
	<label>Tag</label><br/>
	<input type="text" name="tag" id="tag" value="<?php print $tag; ?>"/>
	<span class="error" id="etag"><?php print $etag; ?></span><br/>
	<br/>
	
	<label>Contact</label><br/>
	<input type="text" name="contact" id="contact" value="<?php print $contact; ?>"/>
	<span class="error" id="econtact"><?php print $econtact; ?></span><br/>
	<br/>
	
	<label>Email</label><br/>
	<input type="text" name="email" id="email" value="<?php print $email; ?>"/>
	<span class="error" id="eemail"><?php print $eemail; ?></span><br/>
	<br/>
	
	<label>Password</label><br/>
	<input type="password" name="password" id="password"/>
	<span class="error" id="epassword"><?php print $epassword; ?></span><br/>
	<br/>
	<label>Retype Password</label><br/>
	<input type="password" name="repassword" id="repassword"/>
	<span class="error" id="erepassword"><?php print $erepassword; ?></span><br/>
	<br/>
	
	<label>Gender</label><br/>
	<input type="radio" name="gender" value="1" />Female
	<input type="radio" name="gender" value="2" />Male 
	<span class="error" id="egender"><?php print $egender; ?></span><br/>
	<br/>
	
	<label>Date Of Birth</label><br/>
	<input type="text" name="dateOfBirth" id="dateOfBirth" value="<?php print $dateOfBirth; ?>" />
	<span class="error" id="edateOfBirth"><?php print $edateOfBirth; ?></span><br/>
	<br/>
	
	<label>Address</label><br/>
	<textarea name="address" id="address"><?php print $address; ?></textarea><br/>
	<br/>
	
	<label>City</label><br/>
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
	</select><span class="error" id="ecity"><?php print $ecity; ?></span><br/>
	<br/>
	
	
	
	<input type="submit" name="submit" value="Submit"/>
</form>