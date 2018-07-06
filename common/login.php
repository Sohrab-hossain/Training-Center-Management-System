<?php

if(isset($_POST['remember']) && $_POST['remember'] ==1)
{
	// set cokkie as id, name, email, type
}


?>

<hr>

<form method="post" action="">
	<fieldset>
		<legend>Login Area</legend>

		<lebel>Email/Contact</lebel><br />
		<input type="text" name="user" id="user" value="" /><br />
		<br />

		<lebel>Password</lebel><br />
		<input type="password" name="password" id="password" /><br />
		<br />
		
		<input type="checkbox" name="remember" value="1" />
		<label>Robote Varification</label><br />
		<br />
		
		<a href="?c=register">Register</a> | <a href="?c=forgot">Forgot Password</a><br />
		<br />

		<input type="submit" name="btnLogin" value="Login" />
		
	</fieldset>
	
</form>