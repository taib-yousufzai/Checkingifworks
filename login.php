<?php
session_start();
include_once("db_config.php");
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$result=mysqli_query($mysqli,"select email, password from user where email='$email' and password='$password'");

		$user_matched=mysqli_num_rows($result);
	if ($user_matched>0) 
	{
		$_SESSION["email"]=$email;
		header("Location:page-1.php");
	}
	else
	{
		echo "user email or password is not matched <br><br>"; 
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> login</title>
</head>
<body>
	<form action="login.php" method="post" name="form1">
	    <table width=25%>
            <tr>
                <td> email </td>
                <td> <input type="text" name="email"> </td>
            </tr>
            <tr>
                <td> password </td>
                <td> <input type="password" name="password"> </td>
            </tr>
            <tr>
                <td>  </td>
                <td> <input type="submit" name="login" value="login"> </td>
            </tr>
	    </table>
	</form>
	<a href="register.php"> Register </a>
</body>
</html>