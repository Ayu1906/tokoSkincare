<?php
include"../../conn_ayu.php";
session_start();
$id_pembeli = $_SESSION['id_pembeli'];
$q_aman = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$id_pembeli'");
$aman = mysqli_num_rows($q_aman);
if($aman==0)

{
$id_skincare = $_POST['id_skincare'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$total_harga = $qty*$harga;
$qryskincare = mysqli_query($conn,"SELECT * from keranjang where id_skincare='$id_skincare'");
$q_stok = mysqli_query($conn,"SELECT * from skincare where id_skincare='$id_skincare'");
$d_stok = mysqli_fetch_assoc($q_stok);
$stok = $d_stok['stok'];
$siso_stok = $stok-$qty;
mysqli_query($conn,"UPDATE skincare set stok='$siso_stok' where id_skincare='$id_skincare'");
$data = mysqli_fetch_assoc($qryskincare);
$idbuk = $data['id_skincare'];
if($id_skincare==$idbuk)
{
	$q_qty = mysqli_query($conn,"SELECT * from keranjang where id_skincare='$id_skincare'");
	$data_qty = mysqli_fetch_assoc($q_qty);
	$qty1 = $data_qty['qty'];
	$qty2 = $qty1 + $qty;
	$tot = $harga * $qty2;
mysqli_query($conn,"UPDATE keranjang set id_pembeli='$id_pembeli',id_skincare='$id_skincare',qty='$qty2',harga='$harga',total_harga='$tot' where id_skincare='$id_skincare'");
header("location:detail.php?page=keranjang");
}

else{
mysqli_query($conn,"INSERT into keranjang set id_pembeli='$id_pembeli',id_skincare='$id_skincare',qty='$qty',harga='$harga',total_harga='$total_harga'");
header("location:detail.php?page=keranjang");
}
}
else if($aman>=1)
{
	header("location:index.php?pesan=blok");
}
?>