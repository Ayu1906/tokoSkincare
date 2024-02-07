<?php
include"../../conn_ayu.php";
@$kd = $_GET['id'];
$qry = mysqli_query($conn,"SELECT * from skincare where id_skincare='$kd'");
$data = mysqli_fetch_assoc($qry);
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

    <title>TokoSaya</title>
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
          <li ><a href="index.php" style="background:#e3cbc7;background:#309c9f; color:"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="detail.php?page=keranjang" style="background:#309c9f; color:"><span class="glyphicon glyphicon-shopping-cart"> Keranjang[<?php
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
          <li style="background:#309c9f; color:#e3cbc7;"><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check"> Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li style="background:#309c9f; color:#e3cbc7;"><a href="cara_pesan_skincare.php?page=konfirmasi"><span class="glyphicon glyphicon-check"> Konfirmasi | </span></a></li>
          <?php } }?>
          
          <li style="background:#309c9f; color:#e3cbc7;"><a href="#"><span class="glyphicon glyphicon-user" > <?php echo $nama; ?></span></a>
              <ul>
                  <li style="background:#309c9f; color:#e3cbc7;"><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
              </ul>
          </li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
     <?php
@$aksi = $_GET['aksi'];
$tanggal = date("d-m-Y");
if($aksi=="checkout")
{?>
   <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/skincare31.jpg" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di toko murah saya kami.<h1 style="color:#f97b61;">Toko<b>Saya.Com</b></h1></h2>
        <p>di sini anda bisa membeli dan memesan barang dengan mudah, anda tinggal klik, maka barang akan dikirim sampai di tempat anda, tidak perlu lagi jauh-jauh mendatangi ke lokasi toko kami.</p>
      </div>
    </div>
    </div>
  <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Checkout</b>
</div><br>
<form action="proses_chekout.php" method="post">
<label>Nama Penerima</label>
<input type="text" name="nama" placeholder="Nama Anda" class="form-control">
<label>Alamat Lengkap</label>
<input type="text" name="alamat" placeholder="Jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
<label>Nomor Telepon</label>
<input type="text" name="nomor_tlp" placeholder="Nomor Telepon Anda" class="form-control"><br>
<label>Tanggal</label>
<input type="text" name="tanggal"  class="form-control" value="<?php echo $tanggal; ?>" readonly>
<input type="submit" class="btn btn-info" value="selesai">
</form> 
 <?php }else{
    @$page = $_GET['page'];
    if($page=="keranjang"){
      include("keranjang.php");
    }
    else if($page==""){
    ?>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="../../gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
          <tr>
            <h3><td><b>nama_produk</b></td>   <td>: <?php echo $data['nama_produk']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Asal Produk</b></td>    <td>: <?php echo $data['asal_produk']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Pemilik Produk</b></td>   <td>: <?php echo $data['pembuat']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Isi Produk (ML,GR)</b></td>   <td>: <?php echo $data['isi_produk']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Harga</b></td>   <td>: <?php echo $data['harga']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Stok</b></td>    <td>: <?php echo $data['stok']; ?></td></h3>
          </tr>
        </table><br><br>
        <form action="tambah_keranjang.php" method="post">

              <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stok']; ?>">
              <input type="hidden" name='harga' value="<?php echo $data['harga'];?>">
              <input type="hidden" name='id_skincare' value="<?php echo $data['id_skincare'];?>">
              <?php if($data['stok']==0){ ?>
                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
                <?php }
                else{?>
         <button type="submit" class="btn btn-success">Beli</button>
         <?php } ?>
         </form>
        </div>
    </div>
    </div>
<?php } ?>
    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#e3cbc7; color:#309c9f;line-height:60px;font-size:20px;">
<b>Barang dagangan kami sbb:</b>
</div>
<div class="container">
     <div class="row">
      <?php
      $qryskincare= mysqli_query($conn,"SELECT * from skincare");
      while($skincare = mysqli_fetch_assoc($qryskincare)) {
      ?>

      <div class="col-md-3" style="margin-top:20px;">
        <div class="skincare">
        <center><img src="../../gambar/<?php echo $skincare['gambar'] ?>" style="margin-top:20px; width:200px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $skincare['nama_produk'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $skincare['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $skincare['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $skincare['id_skincare'] ?>" role="button" style="margin-top:10px;background:#309c9f;#309c9f;">View details &raquo;</a></center>
         </div>
        </div>

        <?php } }?>
      </div>

      <hr>

      
    </div> 
    <div class="footer" style="width:100%;height:270px;color:#309c9f;background:#e3cbc7;">
      <div class="row" style="background:#e3cbc7;">
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
          <li>indonesia</li>
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
        <center>CopyRights &copy; 2024 | Re-Design by www.Imroatusayu.my.id </center>
        </div>
      </div>
  </body>
</html>
