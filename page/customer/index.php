<?php
include"../../config_ayu.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
@$pesan = $_GET['pesan'];
if($pesan=="blok")
{
  echo"<script type='text/javascript'>alert('anda tidak dapat membeli dikarenakan anda belum membayar/belum dikonfirmasi oleh admin');</script>";
}
else if($pesan=="suwon")
{
  echo"<script type='text/javascript'>alert('terima kasih telah melakukan konfirmasi :-), anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda dikonfirmasi oleh admin');</script>";
}
else if($pesan=="sudah konfirmasi")
{
  echo"<script type='text/javascript'>alert('anda sudah konfirmasi, anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda dikonfirmasi oleh admin');</script>";
}
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

    <title>TokoSaya.Com page Customer</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#e3cbc7; color:#309c9f;">
      <div class="container-fluid">
        <div class="navbar-header">
          
         <a class="navbar-brand" href="#"><img src="../../images/header.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff; background:#309c9f;  "><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="detail.php?page=keranjang" style="color:#fff; background:#309c9f;"><span class="glyphicon glyphicon-shopping-cart"> Keranjang[<?php
          include"../../conn_ayu.php";
          $qcek=mysqli_query($conn,"SELECT * from keranjang where id_pembeli='$_SESSION[id_pembeli]'");
          $cek=mysqli_num_rows($qcek); 
          $q_cekout= mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cekout = mysqli_num_rows($q_cekout);
          if($cekout>=1)
          {
          echo "0";
          }
          else{
          echo $cek;
          }  ?>] | </span></a></li>
          <li><a href="" style="background:#309c9f;" ><span style="color:#fff; background:#309c9f;" class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li><?php include("../../kat_ayu.php");?></li>

</ul>
</li>
          <li class="a"><a href="cara_pesan_skincare.php" style="color:#fff; background:#309c9f;"><span class="glyphicon glyphicon-question-sign"> Cara Belanja | </span></a></li>
          <?php
          include"../../conn_ayu.php";
          $q_cek_cekout = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cek_cekout = mysqli_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
          $cek = mysqli_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li style="color:#fff; background:#309c9f;"><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" > Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li style="color:#fff; background:#309c9f;"><a href="cara_pesan_skincare.php?page=konfirmasi"><span class="glyphicon glyphicon-check" > Konfirmasi | </span></a></li>
          <?php } }?>




          <li style="color:#fff; background:#309c9f;"><a href="#"><span class="glyphicon glyphicon-user" > <?php echo $nama; ?></span></a>
<ul>
<li style="color:#fff; background:#309c9f;"><a href="../../logoutcustomer.php"><span class="glyphicon glyphicon-log-out" >Keluar</span></a></li>
</ul>
          </li>
          
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/foto31.jpg" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di Toko kami.<h1 style="color:#f97b61;">Ayu<b>SkinCare.Com</b></h1></h2>
        <p>di sini anda bisa membeli dan memesan Produk skincare dengan mudah, anda tinggal klik, maka Produk sampai di tempat anda, tidak perlu lagi jauh-jauh ke toko kami.</p>
      </div>
    </div>
    </div>
<div style="margin-top: -30px; width:100%,height:50px;text-align:center; background:#e3cbc7; color:#309c9f; line-height:60px;font-size:20px;">
<b>Barang dagangan kami sbb:</b>
</div>
    <div class="container">
      <div class="row">
     <?php
     include"../../conn_ayu.php";
      @$idkat = $_GET['id'] ;
      $qryskincarekat = mysqli_query($conn,"SELECT * from skincare where id_ketegori='$idkat'");
      $qryskincare= mysqli_query($conn,"SELECT * from skincare");
      if($idkat==0){
      while($skincare = mysqli_fetch_assoc($qryskincare)) {
      ?>
      
        <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
          <center><img src="../../gambar/<?php echo $skincare['gambar'] ?>" style="width:180px;height:190px; margin-top:20px;"></center>
          <h3 style="text-align:center; color:#f97b61;"><?php echo $skincare['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $skincare['id_skincare'] ?>" role="button" style="margin-top:10px; color:#fff; background:#309c9f;">View details &raquo;</a></center>
         </div>
        </div>
        <?php } }
        else{ while($skincare1 = mysqli_fetch_assoc($qryskincarekat)){?>
            <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
          <center><img src="../../gambar/<?php echo $skincare1['gambar'] ?>" style="margin-top:20px;width:210px;height:190px;"></center>
        <h3 style="text-align:center; color:#f97b61; "><?php echo $skincare1['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare1['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare1['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $skincare1['id_skincare'] ?>" role="button" style="margin-top:10px; color:#fff; background:#309c9f;">View details &raquo;</a></center>
         </div>
        </div>
          <?php }} ?>
      </div>

      <hr>

      
    </div> 
  <div class="footer" style="width:100%;height:270px;background:#e3cbc7; color:#309c9f;">
      <div class="row" style="background:#e3cbc7; color:#309c9f;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="background:#e3cbc7; color:#309c9f;"><h3><b>Tentang TokoSaya</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>Ayu SkinCare</b> adalah</li>
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
          <li style="color:#309c9f;"><h3><b>Alamat Kami</b></h3></li>
        </ul></center>
          <hr>
    
          <ul>
          <li>Jl. Kranggan No.1</li>
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
          <li style="color:#309c9f;"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
           <a href="https://www.facebook.com/imro'atusAyuSholikhah"><img src="../../images/fb.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.instagram.com/iaas19_/"><img src="../../images/ig.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.twitter.com/ayusholikhah19"><img src="../../images/Twitter.png" style="width:40px;height:45px; margin-top:20px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>CopyRights &copy; 2024 | Re-Design by www.Imroatusayu.my.id </center>
        </div>
      </div>
  </body>
</html>