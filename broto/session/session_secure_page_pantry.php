<?php  
if($_SESSION['username']!="pantry"){
	echo "<center><font color=red>Maaf Menu Ini hanya untuk user Pantry.</font>";	
	header('Refresh: 2; URL=index.php');
	exit;
}
?>