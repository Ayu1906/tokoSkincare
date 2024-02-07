<?php
include"../../conn_ayu.php";
$qry_kategori = mysqli_query($conn,"SELECT * from kategori");

	?>
	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#e3cbc7; color:#309c9f;line-height:60px;font-size:20px;">
Tambah Produk
</div>
<form method="post" class="form-group" action="tambah_skincare_ayu.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($kategori=mysqli_fetch_assoc($qry_kategori)){
	?>
			<option><?php echo $kategori['kategori']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control"><br>
	<input type="text" name="asal_produk" placeholder="Asal Produk" class="form-control"><br>
	<input type="text" name="pembuat" placeholder="Pemilik Produk" class="form-control"><br>
	<input type="file" name="gambar" placeholder="Gambar" class="form-control"><br>
	<input type="text" name="isi_produk" placeholder="Isi Produk (ML,GR)" class="form-control"><br>
	<input type="text" name="harga" placeholder="Harga" class="form-control"><br>
	<input type="text" name="stok" placeholder="Stok" class="form-control"><br>
	<input type="submit" name="simpan" value="simpan" class="btn" style="background:#309c9f; color:#fff;"><br>
	</form>