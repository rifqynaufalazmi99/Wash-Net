<?php include ('config.php');
session_start();
$err ="";

if (isset($_POST['daftar'])) {
  //menerima input data
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  
  //cek password
  if($password !== $password2){
    $err = '<h4 style ="color:red">Wrong Password!</h4>';
		
  }else{
		//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// var_dump($password); 

	//input to database
	$query = pg_query($db,
		"INSERT INTO karyawan(nama,email,password,gaji) 
		VALUES('$nama','$email','$password',0)");
	var_dump($query);
		
	//daftar berhasil
	if($query == TRUE){
		header('Location: login.php?status=sukses');
	}else{
		header('Location: sign_up.php?status =gagal');
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
									<li><a href="resi.php">Check Receipts</a></li>
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
      <h1>Register</h1>
    </div>
		<form action="sign_up.php" method="POST">
        <div class="container" style="position: relative; top: 60px;">
            <div class="row align-items-between" style="height: 190px;">
						<!-- //text jika password tidak sama  -->
						<?php if($err){	echo "<ul>$err</ul>";} ?>
						<div class="col-6 offset-3 form-outline">
									<h4>Name</h4>
                </div>
                <div class="col-6 offset-3 form-outline">
                    <input type="text" name="nama" class="form-control pendaftaran green-bar" placeholder="Full Name" required/>
                </div>
								<div class="col-6 offset-3 form-outline">
									<h4>Email</h4>
                </div>
                <div class="col-6 offset-3 form-outline">
                    <input type="email" name="email" class="form-control pendaftaran green-bar" placeholder="example@gmail.com"required />
                </div>
								<div class="col-6 offset-3 form-outline">
									<h4>Password</h4>
                </div>
                <div class="col-6 offset-3 form-outline">
                    <input type="password" name="password" class="form-control pendaftaran green-bar" placeholder="Password" required />
                </div>
								<div class="col-6 offset-3 form-outline">
									<h4>Confirm Password</h4>
                </div>
                <div class="col-6 offset-3 form-outline">
                    <input type="password" name="password2" class="form-control pendaftaran green-bar" placeholder="Confirm Password"required />
                </div>
								<div class="d-flex mx-auto justify-contents-center" style="position: relative; top: 20px; width: 200px;">
               	 		<input type="submit" class="tombol inter ijo white-bar" name="daftar" value="Create">
            		</div>
            </div>
            
        </div>
    </form>
  </div>
</body>
</html>
