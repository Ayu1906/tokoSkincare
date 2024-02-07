<form method="post" class="form-group">
	<div class="col-md-8" style="margin-bottom:20px;">
	<input type="text" name="kategori" placeholder="kategori baru" style="width:600px;" class="form-control">
	</div>
	<div class="col-md-1">
	<input style=" background:#309c9f; color:#fff;" type="submit" name="simpan" value="simpan" class="btn">
	</div>
</form>
<?php
include"../../conn_ayu.php";
@$sim = $_POST['simpan'];
if($sim)
{
	$kat = $_POST['kategori'];
	mysqli_query($conn,"INSERT into kategori set kategori='$kat'");
	header("location:index.php?page=kategori");
}
?>