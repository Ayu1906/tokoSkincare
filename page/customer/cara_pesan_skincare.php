<?php
include"../../config_ayu.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
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

    <title>Jumbotron Template for Bootstrap</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#e3cbc7;">
      <div class="container-fluid">
        <div class="navbar-header">
          
        <a class="navbar-brand" href="#"><img src="../../images/header.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="background:#309c9f;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="keranjang.php" style="background:#309c9f;"><span class="glyphicon glyphicon-shopping-cart"> Keranjang[<?php
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
          <li><a href="" style="background:#309c9f;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li><?php include("kat.php");?></li>

</ul>
</li>
         <li class="a"><a href="cara_pesan_skincare.php" style="background:#309c9f;"><span class="glyphicon glyphicon-question-sign"> Cara Belanja | </span></a></li>

         <?php
         include"../../conn_ayu.php";
         $q_cek_cekout = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cek_cekout = mysqli_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
          $cek = mysqli_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li style="background:#309c9f;"> <a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" > Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li style="background:#309c9f;"><a href="cara_pesan_skincare.php?page=konfirmasi"><span class="glyphicon glyphicon-check" > Konfirmasi | </span></a></li>
          <?php }} ?>

         
           <li style="background:#309c9f;"><a href="#"><span class="glyphicon glyphicon-user" > <?php echo $nama; ?></span></a>
                <ul>
                  <li style="background:#309c9f;"><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
                </ul>
          </li>
          
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <?php
    @$page= $_GET['page'];
    if($page=="pembelian_selesai")
    {
      include("pembelian_selesai.php");
    }
    else if($page=="konfirmasi")
    {
      include("konfirmasi.php");
    }
    else{
    ?>
     <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/skincare.jpg">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di toko murah kami.<h1 style="color:#f97b61;">Ayu<b>SkinCare.Com</b></h1></h2>
        <p>di sini anda bisa membeli dan memesan Produk Skin Care dengan mudah, anda tinggal klik, maka Produk akan dikirim sampai di tempat anda, tidak perlu lagi jauh-jauh mendatangi ke lokasi toko kami.</p>
      </div>
    </div>
    </div>
    <div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#e3cbc7; color:#309c9f;line-height:60px;font-size:20px;margin-bottom:20px;">
Cara Pesan
</div>
		  <p><h3><b>1. Pembayaran dilakukan dalam jangka waktu 1x24 jam setelah melakukan pemesanan.<br>
          2. Pembayaran dapat dilakukan melalui transfer ke Rekening kami. Melalui Konfirmasi Pembayaran.<br>
          3. Setelah melakukan pembayaran, konfirmasi pembayaran dikirim ke-<br>
          <br>
    <p style="color:#0000ff;">BCA, Jakarta Timur,
    Atas Nama: Imro'atus Ayu Sholikhah
    No. Rek: 7115116045</p>
    <br>
          4. Selanjutnya buku yang telah dipesan akan dikirimkan dalam waktu maksimal 7 Hari.<br>
          5. Kami mengirimkan barang dengan menggunakan jasa pengiriman barang via POST<br><br></b></p>
    <p style="color:red;">* Harga barang belum termasuk ongkos kirim, dan ongkos kirim akan disesuaikan dengan tujuan pengiriman.</p></h3>
	


      <hr>
      <?php } ?>

      
    </div> 
  <div class="footer" style="width:100%;height:270px;background:#e3cbc7; color:#309c9f;">
      <div class="row" style="background:#e3cbc7; color:#309c9f;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#309c9f;"><h3><b>Tentang TokoSaya</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>Ayu SkinCare</b> adalah</li>
          <li>Sebuah TOKO ONLINE</li>
          <li>yang menyediakan semua</li>
          <li>jenis Produk Skin Care dengan pemilihan</li>
          <li>berdasarkan kategori.</li>
        </ul>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#309c9f;"><h3><b>Alamat Kami:</b></h3></li>
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
          <a href="https://www.facebook.com/anis.rohmadi"><img src="../../images/fb.png" style="width:70px;height:75px;  "></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.instagram.com/anisrohmadi/"><img src="../../images/ig.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.twitter.com/anis_rohmadi"><img src="../../images/Twitter.png" style="width:40px;height:45px; margin-top:20px;"></a>
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

