<?php include ('config.php');
session_start();
$err='';


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
	

	//owner page
  if ($email == 'admin@admin' and $password == 'admin') {
		header('location:indexadmin2.php');
		// header('location:admin/admin.php');
	}else{ 
    //mengecek match or no
    $result  = pg_query($db, "SELECT nama,email, password,id_karyawan from karyawan where email = '$email'");
    $row = pg_fetch_array($result);
		$nama = $row['nama'];
		$lid  = $row['id_karyawan'];
		$_SESSION['id_karyawan']= $row['id_karyawan'];
		$_SESSION['nama']= $row['nama'];
		$timestamp = date('Y-m-d H:i:s');

		if($email == $row['email'] && password_verify( $password,$row['password']) ){
			 pg_query($db,"INSERT INTO log_act (time,lid_karyawan,nama_karyawan) values('$timestamp','$lid','$nama')");
			$_SESSION['cek']=true;
			header('Location:index_karyawan.php');
		}else{
			$err = '<div class="mx-auto berhasil" style="position: relative; top: 70px; height: 50px;">Username atau Password salah</div>';
		}

	
    
  }
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
	<div class="mx-auto berhasil" style="position: relative; top: 95px; height: 50px;">
    <div class="col-6 offset-5 form-outline">
      <h1>Login</h1>
    </div>
    <form action="login.php" method="POST">
      <div class="container" style="position: relative; top: 60px;">
        <div class="row align-items-between" style="height: 190px;">
				<?php if($err){	echo "<ul>$err</ul>";} ?>
				<div class="col-6 offset-3 form-outline">
					<h4>Email</h4>
				</div>
          <div class="col-6 offset-3 form-outline">
            <input type="email" name="email" class="form-control pendaftaran green-bar" placeholder="Email" required/>
          </div>
					<div class="col-6 offset-3 form-outline">
					<h4>Password</h4>
				</div>
          <div class="col-6 offset-3 form-outline">
          <input type="password" name="password" class="form-control pendaftaran green-bar" placeholder="Password"required />
          </div>
          <div class="col-6 offset-3 form-outline">
          </div>
        </div>
        <div class="d-flex mx-auto justify-contents-center" style="position: relative; top: 20px; width: 200px;">
          <input type="submit" class="tombol inter ijo white-bar" name="login" value="Login">
        </div>
				<div class="d-flex mx-auto justify-contents-center" style="position: relative; top: 20px; width: 200px;">
					<h4>Create Account</h4>
				</div>
				<div class="d-flex mx-auto justify-contents-center" style="position: relative; top: 20px; width: 200px;">
					<a href="sign_up.php"><h4>Sign Up</h4></a>
				</div>
      </div>
    </form>
  </div>
</body>
</html>
