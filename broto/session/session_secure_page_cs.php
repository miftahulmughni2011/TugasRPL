<?php  
if($_SESSION['username']!="cs"){
	echo "<center><font color=red>Maaf Menu Ini hanya untuk user super Costumer Service.</font>";	
	header('Refresh: 2; URL=index.php');
	exit;
}
?>