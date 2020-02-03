<?php
session_start();

if(!isset($_SESSION['username'])){
	echo "<center><font color=red>Maaf Anda Belum Login.<br> Silahkan login terlebih dahulu.</font>";	
	header('Refresh: 2; URL=login.php');
	exit;
}
?>