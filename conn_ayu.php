<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'ta_ayu_db';
$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
	die("Connection Failed = ".mysqli_connect_error());
}
?>