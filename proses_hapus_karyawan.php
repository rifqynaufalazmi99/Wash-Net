<?php
include("config.php");
if(isset($_GET['id_karyawan']) ){
  
  $id_karyawan = $_GET['id_karyawan'];

  $result1 = pg_query($db,"DELETE FROM  karyawan where id_karyawan = '$id_karyawan'");
  

  if($result1 == TRUE ){
    header('Location: daftar_karyawan.php');
  }else{
    die("gagal Bayar...");
  } 
  }else {
    die("akses dilarang...");
}
?>