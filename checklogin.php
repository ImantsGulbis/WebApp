<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

if(!($myusername == "")){
	if(!($mypassword == "")){
		// To protect MySQL injection 
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);

		$mypassword = md5($mypassword);

		$sql="SELECT * FROM $tbl_name WHERE user='$myusername' and password='$mypassword'";
		$result=mysql_query($sql);

		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count==1){
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			session_start();
			$_SESSION['myusername']=$myusername;
			$_SESSION['mypassword']=$mypassword;
			header("location:login_success.php");
		}
		else {
			die(header("location:index.php?loginFailed=true&reason=password"));
		}
	} else {
		die(header("location:index.php?loginFailed=true&reason=blank"));
	}
} else {
	die(header("location:index.php?loginFailed=true&reason=blank"));
}
?>
