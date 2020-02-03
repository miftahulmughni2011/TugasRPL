<?php
session_start();
require("../koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];
$link=koneksi_db();
$sql="Select * from akun where username='$username' and password=('$password')";
$res=mysqli_query($link,$sql);
$ketemu=mysqli_num_rows($res);

if($ketemu > 0){
	$_SESSION['username']=$_POST['username'];
	header("location:../index.php");
	//echo "<script>(location.href='session_secure_page.php')</script>";
}
else{
	echo "<center><font color=red>USERNAME DAN PASSWORD SALAH!</font>";
	header('Refresh: 2; URL=../login.php');
}


?>
