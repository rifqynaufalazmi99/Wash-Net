<?php 
include('config.php');
session_start();




if(!isset($_SESSION["cek"])){
  header('location:login.php');
  exit;
  
}
$id_karyawan = $_SESSION['id_karyawan'];
$nama ='';
$tanggal ='';
$waktu ='';
$jenis_cucian ='';
$berat_cucian =0.0;
$total_harga =0;
$telp ='';
$no_urut =0;
$note ='';


if(isset($_POST['order'])){
  $nama = $_POST['nama'];
  $id_karyawan = $_SESSION['id_karyawan'];
  $tanggal = $_POST['tanggal'];
  $waktu = $_POST['waktu'];
  $jenis_cucian = $_POST['jenis_cucian'];
  $berat_cucian = $_POST['berat_cucian'];
  $telp = $_POST['telp'];
  $note = $_POST['note'];
  $tgl = $tanggal;
  $tgl =date('Ymd');
  $no_urut= rand(1,999);
  $no_resi ="WN".$tgl. $no_urut;
  
  
  switch($jenis_cucian){
    case 1:
      $jenis_cucian = "tipe 1";
      $total_harga= 10000 * $berat_cucian;
      break;

    case 2:
      $jenis_cucian = "tipe 2";
      $total_harga = 10000* $berat_cucian;
      break;

    case 3:
      $jenis_cucian = "tipe 3";
      $total_harga = 10000* $berat_cucian;
      break;

    case 4:
      $jenis_cucian = "tipe 4";
      $total_harga = 10000* $berat_cucian;
      break;

    case 5:
      $jenis_cucian = "tipe 5";
      $total_harga = 10000* $berat_cucian;
      break;

    default:
    header('location: order.php');//nanti diisi pesan error
      break;
  }

  $query = pg_query($db,"INSERT into transaksi(id_karyawan,tanggal,nama_cust,jenis_cucian,berat_cucian,
  total_harga,waktu,no_telp,catatan,no_resi, status_barang)
  VALUES('$id_karyawan','$tanggal','$nama','$jenis_cucian',
  '$berat_cucian','$total_harga','$waktu','$telp','$note','$no_resi','Proses')");
  var_dump($query);
  header('location:cek_order.php');
  }



?> 

<!DOCTYPE html>
<html>
<head>
  <title>Website Laundry</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link for Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-control {
      height: 40px;
    }

    .btn-submit {
      width: 100%;
      height: 40px;
      background-color: #337ab7;
      border: none;
      color: #fff;
      font-weight: bold;
      border-radius: 3px;
    }

    .btn-submit:hover {
      background-color: #286090;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Place an Order</h1>
    <form action="order.php" method="post">
      <div class="form-group">
        <label for="nama">Full Name</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="form-group">
        <label for="tanggal">Date</label>
        <input type="date" class="form-control" name="tanggal" required>
      </div>
      <div class="form-group">
        <label for="waktu">Time</label>
        <input type="time" class="form-control" name="waktu" required>
      </div>
      <div class="form-group">
        <label for="jenis_cucian">Laundry Type</label>
        <input type="number" class="form-control" min="1" max="5" name="jenis_cucian" required>
      </div>
      <div class="form-group">
        <label for="berat_cucian">Laundry Weight</label>
        <input type="number" step="any" class="form-control" name="berat_cucian" required>
      </div>
      <div class="form-group">
        <label for="telp">Telephone Number</label>
        <input type="tel" class="form-control" name="telp" required>
      </div>
      <div class="form-group">
        <label for="note">Notes</label>
        <textarea class="form-control" name="note" rows="3"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="order" class="btn-submit">Order Now</button>
      </div>
    </form>
  </div>
</body>
</html>