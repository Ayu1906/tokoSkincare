<?php
include"../../conn_ayu.php";
$no = 1;
$qry_produk = mysqli_query($conn,"SELECT * from skincare");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center; background:#e3cbc7; color:#309c9f; line-height:60px;font-size:20px;">
<b>Data Produk</b>
</div>
<a href="index.php?page=input_skincare_ayu" class="btn" style="margin-top:20px;background:#309c9f; color:#fff; "><span class="glyphicon glyphicon-plus"> TAMBAH PRODUK</span></a>
<?php
@$aksi = $_GET['aksi'];
if($aksi=="input")
{
	include("input_skincare_ayu.php");
}
?>
<div class="th">
<table class="table table-bordered" style="margin-top:20px;">
 
	<th style=" background: #E6E6FA;"><center>No</center></th>
	<th style=" background: #E6E6FA;"><center>Nama Produk</center></th>
	<th style=" background: #E6E6FA;"><center>Asal Produk</center></th>
	<th style=" background: #E6E6FA;"><center>Pemilik</center></th>
	<th style=" background: #E6E6FA;"><center>Gambar</center></th>
	<th style=" background: #E6E6FA;"><center>Isi Produk</center></th>
	<th style=" background: #E6E6FA;"><center>harga</center></th>
	<th style=" background: #E6E6FA;"><center>stok</center></th>
	<th style=" background: #E6E6FA;"><center>aksi</center></th>
	<?php while($data = mysqli_fetch_assoc($qry_produk)) { ?>
	<tr>
	 <td><?php echo $no++ ?></td>
	 <td><?php echo $data['nama_produk'] ?></td>
	 <td><?php echo $data['asal_produk'] ?></td>
	 <td><?php echo $data['pembuat'] ?></td>
	 <td><center><img src="../../gambar/<?php echo $data['gambar'] ?>" style="width:100px;"></center></td>
	 <td><?php echo $data['isi_produk'] ?></td>
	 <td>Rp.<?php echo number_format($data['harga']); ?>,-</td>
	 <td><?php echo $data['stok'] ?></td>
	 <td><a href="index.php?page=edit_skincare_ayu&id=<?php echo $data['id_skincare']; ?>"><center>| <span class="glyphicon glyphicon-pencil"></span></a> | | <a href="hapus_skincare_ayu.php?id=<?php echo $data['id_skincare']; ?>"><span class="glyphicon glyphicon-trash"></span> |</center></a></td>
	</tr>
	<?php } ?>
</table>
</div>