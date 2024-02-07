<?php
include"conn_ayu.php";
$id = $_GET['id'];
$qry = mysqli_query($conn,"SELECT * from skincare where id_skincare='$id'");
$data = mysqli_fetch_assoc($qry);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>AyuSkinCare.Com</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#d74b35;">
      <div class="container-fluid">
        <div class="navbar-header">
          
        <a class="navbar-brand" href="#"><img src="images/heder.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="" style="color:#fff;"><span class="glyphicon glyphicon-shopping-cart"> Keranjang | </span></a></li>
          <li><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li><?php include("kat_ayu.php");?></li>

</ul>
</li>
          <li class="a"><a href="cara_pesan_skincare.php" style="color:#fff;"><span class="glyphicon glyphicon-question-sign"> Cara Belanja | </span></a></li>
          <li class="a"><a href="login.php" style="color:#fff;"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
        	<tr>
        		<h3><td><b>Nama Produk</b></td>		<td>: <?php echo $data['nama_produk']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Asal Produk</b></td>		<td>: <?php echo $data['asal_produk']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Pemilik Produk</b></td>		<td>: <?php echo $data['pembuat']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Isi Produk</b></td>		<td>: <?php echo $data['isi_produk']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Harga</b></td>		<td>: <?php echo $data['harga']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Stok</b></td>		<td>: <?php echo $data['stok']; ?></td></h3>
        	</tr>
        </table><br><br>
         <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stok']; ?>">
         <a href="login.php?pesan=a" class="btn btn-success">Beli</a>
        </div>
    </div>
    </div>

    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Pilihan barang kami sbb:</b>
</div>
<div class="container">
      <div class="row">
      <?php
      include"conn_ayu.php";
      $qryskincare= mysqli_query($conn,"SELECT * from skincare");
      while($skincare = mysqli_fetch_assoc($qryskincare)) {
      ?>

      <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
        <center><img src="gambar/<?php echo $skincare['gambar'] ?>" style="margin-top:20px; width:210px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $skincare['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail_ayu.php?id=<?php echo $skincare['id_skincare'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>

        <?php } ?>
      </div>

      <hr>

      
    </div> 
   <div class="footer" style="width:100%;height:270px;color:#fff;background:#d74b35;">
      <div class="row" style="background:#7e7c78;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#f97b61"><h3><b>Tentang TokoSaya</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>TokoSaya</b> adalah</li>
          <li>Sebuah TOKO ONLINE</li>
          <li>yang menyediakan semua</li>
          <li>jenis barang dengan pemilihan</li>
          <li>berdasarkan kategori.</li>
        </ul>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#f97b61"><h3><b>Alamat Kami</b></h3></li>
        </ul></center>
          <hr>
    
          <ul>
          <li>Jl. Lurus Sekali No.1</li>
          <li>IKN, Kalimantan,</li>
          <li>Endonesia</li>
          <li>Asia Tenggara</li>
          <li></li>
        </ul>
      
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
         <ul>
          <li style="color:#f97b61"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
          <a href="https://www.facebook.com/anis.rohmadi"><img src="images/fb.png" style="width:70px;height:75px;  "></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.instagram.com/anisrohmadi/"><img src="images/ig.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.twitter.com/anis_rohmadi"><img src="images/Twitter.png" style="width:70px;height:75px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>CopyRights &copy; 2023 | Re-Design by www.AnisRohmadi.my.id </center>
        </div>
      </div>
  </body>
</html>
