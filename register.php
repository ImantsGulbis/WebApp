<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="users"; // Table name

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$user = $_POST['username'];
$user=stripslashes($user);
$user=mysql_real_escape_string($user);

$email = $_POST['email'];
$email=stripslashes($email);
$email=mysql_real_escape_string($email);

$pass = $_POST['password'];
$pass=stripslashes($pass);
$pass=mysql_real_escape_string($pass);

$rep = $_POST['repassword'];

If($user=='' || $email=='' || $pass==''|| $rep=='')
{
	die(header("location:registration.php?status=true&reason=blank"));
}
else
{
	If (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
	{
  		die(header("location:registration.php?status=true&reason=format"));
	} 
	else 
	{
		if(strlen($password) < 8)
		{
    		die(header("location:registration.php?status=true&reason=short"));
    	} 
    	else
    	{
			If($pass === $rep){
						$pass = md5($pass);
						$sql="insert into users(user,email,password) values('$user','$email', '$pass')";
						$res=mysql_query($sql);
						If($res)
						{
							die(header("location:registration.php?status=true&reason=succeded"));
						}
						Else
						{						
							die(header("location:registration.php?status=true&reason=problem"));
						}
			}
			else 
			{	
				die(header("location:registration.php?status=true&reason=password"));
			}
		}
	}	
}
?>
