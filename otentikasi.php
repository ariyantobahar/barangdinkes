<?php
include'koneksi.php';

session_start();
	
$username = $_POST['user'];
$password = $_POST['pass'];
$sql = mysql_query("select * from user where username='$username' and password='$password'");
if(mysql_num_rows($sql) == 1){
	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
header('location:index.php');
}
else {
	echo "<script> alert('Username/Password tidak terdaftar');window.location='login.php';</script>";
}
?>