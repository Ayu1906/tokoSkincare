<?php 
$koneksi = mysqli_connect("localhost","root","","ta_ayu_db");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>