<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../conn_ayu.php";
$e=$_GET['id'];
$edit=mysqli_query($conn,"SELECT * FROM skincare WHERE id_skincare='$e'");
$book = mysqli_fetch_assoc($edit);
?>
<style>
	.btn:hover{
		color:white;
	}
</style>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#309c9f;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit SkinCare
</div>
<form action="e_skincare_ayu.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_skincare" class="form-control" value =" <?php  echo $book['id_skincare'];?>">
 		<b>Kategori Produk :</b><select name="kategori" class="form-control">
 			<?php
 			$d = mysqli_query($conn,"SELECT * from kategori");
 			while($data = mysqli_fetch_assoc($d)){ ?>;
 			<option> <?php echo $data['kategori']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Nama SkinCare :</b> <input type="text" name="nama_produk" class="form-control" value =" <?php  echo $book['nama_produk'];?>" ><br>
 		<b>Asal Produk :</b><input type="text" name="asal_produk" class="form-control" value =" <?php  echo $book['asal_produk'];?>"><br>
 		<b>Pemilik Produk: </b><input type="text" name="pembuat" class="form-control" value =" <?php  echo $book['pembuat'];?>"><br>
 		<b>Gambar Gambar Produk : </b><input type="file" name="gambar" class="form-control" value =" <?php  echo $book['gambar'];?>" ><br>
 		<b>Isi Produk : </b><input type="text" name="isi_produk" class="form-control" value =" <?php  echo $book['isi_produk'];?>"><br>
 		<b>Harga : </b><input type="text" name="harga" class="form-control" value =" <?php  echo $book['harga'];?>" ><br>
 		<b>Stok : </b><input type="text" name="stok" class="form-control" value =" <?php  echo $book['stok'];?>" ><br>
 		<td><input style="background:#309c9f;" type="submit" class="btn" value="simpan">
</form>