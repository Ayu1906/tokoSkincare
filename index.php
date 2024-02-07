<?php
include"config_ayu.php";
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

    <title>TokoSaya</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#e3cbc7; color:#309c9f;">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#"><img src="images/header.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul style="background:#309c9f;" id="nav">
          <li style="background:#309c9f;" ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li style="background:#309c9f;"><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li style="background:#309c9f;"><?php include("kat_ayu.php");?></li>

</ul>
</li>
          <li style="background:#309c9f;" class="a"><a href="cara_pesan_skincare.php" style="color:#fff;"><span class="glyphicon glyphicon-question-sign"> CaraBelanja | </span></a></li
          <li style="background:#309c9f;" class="a"><a href="login.php" style="color:#fff;background:#309c9f;"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="img/skincare.jpg" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di Toko kami.<h1 style="color:#f97b61;">Ayu<b>SkinCare.Com</b></h1></h2>
        <p>di sini anda bisa membeli dan memesan Produk-produk Skincare dengan mudah, anda tinggal klik, maka Produk yang anda beli sampai di tempat rumah anda, tidak perlu lagi jauh-jauh ke toko kami.</p>
      </div>
    </div>
    </div>
<div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#e3cbc7; color:#309c9f;line-height:60px;font-size:20px;">
<b>Pilihan Produk kami sbb:</b>
</div>
    <div class="container">
      <div class="row">
      <?php
      include"conn_ayu.php";
      @$idkat = $_GET['id'] ;
      $qryskincarekat = mysqli_query($conn,"SELECT * from skincare where id_ketegori='$idkat'");
      $qryskincare= mysqli_query($conn,"SELECT * from skincare");
      if($idkat==0){
      while($skincare = mysqli_fetch_assoc($qryskincare)) {
      ?>
      
        <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
        <center><img src="gambar/<?php echo $skincare['gambar'] ?>" style="margin-top:20px; width:210px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $skincare['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare['stok']; ?>)</center>
          <center><a style="background:#309c9f; color:#fff;" class="btn btn-danger" href="detail_ayu.php?id=<?php echo $skincare['id_skincare'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
        <?php } }
        else{ while($skincare1 = mysqli_fetch_assoc($qryskincarekat)){?>
            <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
        <center><img src="gambar/<?php echo $skincare1['gambar'] ?>" style="margin-top:20px;width:210px;height:190px;"></center>
        <h3 style="text-align:center; color:#f97b61; "><?php echo $skincare1['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare1['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare1['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail_ayu.php?id=<?php echo $skincare1['id_skincare'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
          <?php }} ?>
      </div>

      <hr>

      
    </div> 
     
    <div class="footer" style="width:100%;height:270px; background:#e3cbc7; color:#309c9f;">
      <div class="row" style="background:#e3cbc7; color:#309c9f;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="background:#e3cbc7; color:#309c9f;"><h3><b>Tentang TokoSaya:</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>Ayu Skincare</b> adalah</li>
          <li>Sebuah TOKO ONLINE</li>
          <li>yang menyediakan semua</li>
          <li>jenis Produk Skincare dengan pemilihan</li>
          <li>berdasarkan kategori.</li>
        </ul>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="background:#e3cbc7; color:#309c9f;"><h3><b>Alamat Kami:</b></h3></li>
        </ul></center>
          <hr>
    
          <ul>
          <li>Jl. Kranggan Lembur No.1</li>
          <li>IKN, Kota Bekasi,</li>
          <li>Indonesia</li>
          <li>Asia Tenggara</li>
          <li></li>
        </ul>
      
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <ul>
          <li style="background:#e3cbc7; color:#309c9f;"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
          <a href="https://www.facebook.com/Imro'atus Ayu Sholikhah/"><img src="images/fb.png" style="width:70px;height:75px;  "></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.instagram.com/iaas19_/"><img src="images/ig.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.twitter.com/AyuSholikhah19"><img src="images/Twitter.png" style="width:40px;height:45px; margin-top:2  0px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>CopyRights &copy; 2024 | Re-Design by www.imroatusayu.my.id </center>
        </div>
      </div>
  </body>
</html>
