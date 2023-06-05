<?php
include("config.php");
if(isset($_GET['id_transaksi']) ){
  
  $id_transaksi = $_GET['id_transaksi'];
  $result1 = pg_query($db,"DELETE FROM  transaksi where id_transaksi = '$id_transaksi'");
  

  if($result1 == TRUE ){
    header('Location: cek_order.php');
  }else{
    die("gagal Bayar...");
  } 
  }else {
    die("akses dilarang...");
}
?>