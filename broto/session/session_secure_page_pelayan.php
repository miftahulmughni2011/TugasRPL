<?php  
if($_SESSION['username']!="pelayan"){
	echo "<center><font color=red>Maaf Menu Ini hanya untuk user Pelayan.</font>";	
	header('Refresh: 2; URL=index.php');
	exit;
}
?>