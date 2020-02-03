<?php  
if($_SESSION['username']!="kasir"){
	echo "<center><font color=red>Maaf Menu Ini hanya untuk user kasir.</font>";	
	header('Refresh: 2; URL=index.php');
	exit;
}
?>