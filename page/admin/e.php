<?php
include"../../conn_ayu.php";
$a=$_POST['id_ketegori'];
$b=$_POST['kategori'];

 mysqli_query($conn,"UPDATE kategori SET   kategori='$b' WHERE id_ketegori='$a'");
 header("location:index.php?page=kategori");
?>