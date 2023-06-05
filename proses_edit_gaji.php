<?php
include('config.php');

if(isset($_POST['save'])){
	$id_karyawan = $_POST['id_karyawan'];
  var_dump($id_karyawan);
  $gaji = $_POST['gaji'];
  var_dump($gaji);
  $query =pg_query($db,"UPDATE karyawan SET gaji =$gaji 
    where id_karyawan ='$id_karyawan'");
  var_dump($query);

  if($query==true){
    header('location: daftar_karyawan.php');
  }
}
?>