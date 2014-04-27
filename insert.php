<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="users"; // Table name

$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$text = $_POST['message'];
date_default_timezone_set("Europe/Riga");
$d = date("y.m.d h:i:sa");

$myusername=$_SESSION['myusername'];
$mypassword=$_SESSION['mypassword'];

$sql=mysql_query("SELECT `id` FROM $tbl_name WHERE user='$myusername' and password='$mypassword'");
$id=mysql_fetch_row($sql);

$res=mysql_query("Insert into messages(user_id,message,date)values('$id[0]','$text','$d')", $conn);
header("location:login_success.php");
?>