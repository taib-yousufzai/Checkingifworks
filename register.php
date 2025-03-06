<!DOCTYPE html>
<html>
<head>
	<title> Register</title>
</head>
</body>
<br>
<form action="register.php" method="post" name="form1">
<table width="35%">
	<tr>
		<td> name</td>
		<td><input type="text" name="name" required></td>
	</tr>
	<tr>
		<td> email</td>
		<td><input type="text" name="email" required></td>
	</tr>
	<tr>
		<td>password</td>
		<td><input type="password" name="password" required></td>
	</tr>
	<tr>
		<td> </td>
		<td><input type="submit" name="register" value="register"></td>
	</tr>
</table>
</form>
	<a href="login.php"> login </a>
	<?php
	 if (isset($_POST['register']))
     {
        include_once("db_config.php");
	 	$name=$_POST['name'];
	 	$email=$_POST['email'];
	 	$password=$_POST['password'];
	 	$email_result=mysqli_query($mysqli,"select 'email' from user where email='$email' and password='$password'");
	 	$user_matched=mysqli_num_rows($email_result);
	 	if ($user_matched >0) 
	 	{
	 		echo "<br><br><strong> error: </strong>";
	 		echo "user already exists with email id '$email'";
	 	}
	 	else
	 	{
	 		$result=mysqli_query($mysqli,"INSERT INTO user(name,email,password) values('$name','$email','$password')");
	 		if($result) 
	 		{
	 			echo "<br> <br> user registered successfully";
	 		}
	 		else
	 		{
	 			echo "Registration error do not try again";
	 			mysqli_error(mysqli);
	 		}
	 	}
	 }
	?>
</body>
</html>