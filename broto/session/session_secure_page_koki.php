<?php  
if($_SESSION['username']!="koki"){
	echo "<center><font color=red>Maaf Menu Ini hanya untuk koki .</font>";	
	header('Refresh: 2; URL=index.php');
	exit;
}
?>