<?php
include"../../conn_ayu.php";
$kat = mysqli_query($conn,"SELECT * from kategori");
while($get_data=mysqli_fetch_assoc($kat)){

	?><li style="color:#fff; background:#309c9f;"><a href="index.php?page=detail&id=<?=$get_data['id_ketegori']?>">
		<?php echo $get_data['kategori']?>
	</a></li>
	<?php
	}
?>
