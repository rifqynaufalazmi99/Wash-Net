<?php include('config.php');
session_start();
$resi = $_SESSION['hasil_resi'];
$query = pg_query($db,"SELECT * from transaksi where no_resi = '$resi'");
while($transaksi = pg_fetch_array($query)){
	$resi = $transaksi['no_resi'];
	$tanggal = $transaksi['tanggal']." / ".$transaksi['waktu'];
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
	<!-- Link for Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Link for CSS custom -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding-top: 20px;
		}

		h1 {
			text-align: center;
			margin-bottom: 20px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			padding: 10px;
			border: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
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
									<li><a href="pricelist.php">Pricelist</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Find us</a></li>
									<li><a href="cek_resi.php">Check Receipts</a></li>
									<li><a href="login.php">Login</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<h1>Bukti Transaksi Laundry</h1>
		<table class="table">
			<tr>
				<th>Customer</th>
				<td><?php echo $customer?></td>
			</tr>
			<tr>
				<th>Nomor Resi</th>
				<td><?php echo $resi?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td><?php echo $status?></td>
			</tr>
			<tr>
				<th>Tanggal / Waktu</th>
				<td><?php echo $tanggal?></td>
			</tr>
			<tr>
				<th>Jenis Cucian</th>
				<td><?php echo $jenis_cucian?></td>
			</tr>
			<tr>
				<th>Berat Cucian</th>
				<td><?php echo $berat_cucian?> Kg</td>
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
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>