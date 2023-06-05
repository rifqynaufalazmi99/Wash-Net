<?php
include("config.php");
if(isset($_GET['id_transaksi']) ){
  
  $id_transaksi = $_GET['id_transaksi'];
  $status_barang = "SELESAI";

  $result1 = pg_query($db,"UPDATE transaksi SET status_barang ='SELESAI'  where id_transaksi = '$id_transaksi'");
  

  if($result1 == TRUE ){
    header('Location: cek_order.php');
  }else{
    die("gagal Proses...");
  } 
  }else {
    die("akses dilarang...");
}
?>