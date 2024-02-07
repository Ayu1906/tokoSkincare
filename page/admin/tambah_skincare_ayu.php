<?php
include"../../conn_ayu.php";
	$kat = $_POST['kat'];
	$nama_produk = $_POST['nama_produk'];
	$asal_produk = $_POST['asal_produk'];
	$pembuat = $_POST['pembuat'];
	$isi_produk = $_POST['isi_produk'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$qryid = mysqli_query($conn,"SELECT * FROM kategori where kategori='$kat'");
	$data = mysqli_fetch_assoc($qryid);
	$id_kategori = $data['id_ketegori'];

@$message		= '';
$valid_file		= true;
$max_size		= 1024000; 


if($_FILES['gambar']['name']){
	
	if(!$_FILES['gambar']['error']){

		
		$new_file_name = strtolower($_FILES['gambar']['tmp_name']); 
		if($_FILES['gambar']['size'] > $max_size) 
		{
			$valid_file	= false;
			$message	= 'Maaf, file terlalu besar. Max: 1MB';
		}
	


		
		$image_path = pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION); 
		$extension = strtolower($image_path); 

		if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif" ) {
			$valid_file = false;
			$message	= "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #".$extension;
		}



		
		if($valid_file == true)
		{
			
			$rename_nama_file	= date('YmdHis');
			$nama_file_baru		= $rename_nama_file.'.'.$extension;

			
			
			mysqli_query($conn,"INSERT into skincare set nama_produk='$nama_produk',id_ketegori='$id_kategori',pembuat='$pembuat',asal_produk='$asal_produk',isi_produk='$isi_produk',harga='$harga', gambar='$nama_file_baru', stok='$stok'");
			
			move_uploaded_file($_FILES['gambar']['tmp_name'], '../../gambar/'.$nama_file_baru);
			header("location:index.php?page=skincare");
		}
	}
	
	else
	{
		
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['gambar']['error'];
	}
}
?>