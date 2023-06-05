<?php include('config.php');

$id_karyawan = $_GET['id_karyawan'];
$query = pg_query($db,"SELECT *,cast(gaji as Numeric) from karyawan where id_karyawan = '$id_karyawan'");
while($karyawan = pg_fetch_array($query)){
	$id_karyawan = $karyawan['id_karyawan'];
	$nama = $karyawan['nama'];
	$gaji = (int)$karyawan['gaji'];
  $email = $karyawan['email'];
  $telepon = $karyawan['no_telp'];
	
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
                <li><a href="daftar_karyawan.php">Daftar Karyawan</a></li>
									<li><a href="loc_act.php">Kehadiran Karyawan</a></li>
									<li><a href="pemasukan.php">Pemasukan</a></li>
									<li><a href="logout.php">Log Out</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header>
  <form action="proses_edit_gaji.php" method="POST">
	<table>
		<tr>
			<th>ID Karyawan</th>
			<td><input type="text" name="id_karyawan" value="<?php  echo $id_karyawan?>" readonly> </td>
		</tr>
		<tr>
			<th>Nama</th>
			<td>input<?php echo $nama?> </td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $email?> </td>
		</tr>
		<tr>
			<th>No. Telepon</th>
			<td><?php echo $telepon?> </td>
		</tr>
		<tr>
			<th>Gaji</th>
			<td><input type="text" name="gaji" value="<?php echo $gaji?>"></td>
		</tr>
		
	</table>
  <input type="submit" name="save" value="Save">
</body>
	</form>
	
</html>

