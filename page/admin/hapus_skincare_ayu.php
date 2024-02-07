<?php
include"../../conn_ayu.php";
$bk=$_GET['id'];
mysqli_query($conn,"DELETE FROM skincare WHERE id_skincare='$bk'");
header("location:index.php?page=skincare");
 ?>