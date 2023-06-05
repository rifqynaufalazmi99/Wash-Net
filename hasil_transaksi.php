<?php include('config.php');
session_start();

if(!isset($_SESSION["cek"])){
  header('location:cek_resi.php');
  exit;
  
}
$hasil_transaksi = $_SESSION['hasil_transaksi'];
$query = pg_query($db,"SELECT * from transaksi where no_resi = '$hasil_transaksi'");
while($transaksi = pg_fetch_array($query)){
	$hasil_transaksi = $transaksi['no_resi'];
	$tanggal = $transaksi['tanggal']." / ".$transaksi['waktu'];
	$id_karyawan=$transaksi['id_karyawan'];
      $karyawan = pg_query($db,"SELECT nama FROM karyawan where id_karyawan = '$id_karyawan'");
      while($tag= pg_fetch_array($karyawan)){
        $nama_karyawan = $tag['nama'];
      }
	$customer = $transaksi['nama_cust'];
	$telepon = $transaksi['no_telp'];
	$jenis_cucian = $transaksi['jenis_cucian'];
	$berat_cucian = $transaksi['berat_cucian'];
	$catatan =$transaksi['catatan'];
	$total_harga = $transaksi['total_harga'];
	$status = $transaksi['status_barang'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Laundry</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Link untuk Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Link untuk CSS custom -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<head>
	<title>Bukti Transaksi Laundry</title>
	<style>
		table, th, td {
			border: 0px solid black;
			border-collapse: collapse;
			padding: 10px;
			text-align: left;
		}
	</style>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<a href="index.php"><h1>Wash Net</h1></a>
				</div>
				<div class="col-md-6">
					<!-- menu navigasi -->
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="navbar-collapse-1">
								<ul class="nav navbar-nav navbar-left">
                <li><a href="order.php">New Order</a></li>
									<li><a href="cek_order.php">View Order</a></li>
									<li><a href="logout.php">Log Out</a></li>
									
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<h1>Bukti Transaksi Laundry</h1>
	<table>
		<tr>
			<th>Karyawan </th>
			<td><?php echo $nama_karyawan?> </td>
		</tr>
		<tr>
			<th>Customer</th>
			<td><?php echo $customer?> </td>
		</tr>
		<tr>
			<th>Nomor Resi</th>
			<td><?php echo $hasil_transaksi?></td>
		</tr>
		<tr>
			<th>Status</th>
			<td><?php echo $status?></td>
		</tr>
		<tr>
			<th>Tanggal / Waktu</th>
			<td>  <?php echo $tanggal?></td>
		</tr>
		<tr>
			<th>Jenis Cucian</th>
			<td><?php echo $jenis_cucian?></td>
		</tr>
		<tr>
			<th>Berat Cucian</th>
			<td> <?php echo $berat_cucian?> Kg</td>
		</tr>
		<tr>
			<th>Total Harga</th>
			<td><?php echo $total_harga?></td>
		</tr>
		<tr>
			<th>Catatan</th>
			<td><?php echo $catatan?></td>
		</tr>
	</table>
</body>
</html>
