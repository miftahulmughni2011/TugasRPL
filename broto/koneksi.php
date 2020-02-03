<?php
function koneksi_db(){
	$server="127.0.0.1";
	$username="root";
	$password="";
	$database="broto";

	$link=mysqli_connect($server,$username,$password,$database);

	if (!$link) {
		echo "Gagal Koneksi \n Error Code : ".mysqli_error();
		die();
	}
	return $link;
}
?>
