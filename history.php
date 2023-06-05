<?php include('config.php');
session_start();
if(!isset($_SESSION["cek"])){
  header('location:login.php');
  exit;
}

if(isset($_POST['search'])){
  $_SESSION['hasil_cek'] =$_POST['nomor_resi']; 
  $_SESSION["cek"] = true;
  // var_dump($_SESSION['hasil_cek']);
  header('location:hasil_search.php');


  // $cek_resi = pg_query($db,"SELECT no_resi from pemasukan where no_resi ='$resi'");
  // var_dump($cek_resi);
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
          <a href="index.php">
            <h1>Wash Net</h1>
          </a>
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
                  <li><a href="history.php">History</a></li>
                  <li><a href="logout.php">Log Out</a></li>

                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  
<form action="cek_order.php" method="POST">
 <input type="text" name="nomor_resi" placeholder="Search"> 
 <input  type="submit" name="search"  value="Search"> <br><br>
 </form>
 <table border="0">
	<style>
		table,th,tr{
			border-collapse:separate ;
			border-spacing: 10px;
			text-align: left;
		}
	</style>
	<thead>
		<tr>
			<!-- <th>ID User</th> -->
			<th>Tanggal</th>
			<th>Name Customer</th>
			<th>Jenis Cucian</th>
			<th>Nominal</th>
		</tr>
	</thead>
	<tbody>

  <?php
		$query = pg_query($db,"SELECT * FROM pemasukan  Order BY tanggal asc ");

    
    
		while($pemasukan = pg_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$pemasukan['nama_customer']."</td>";
			echo "<td>".$pemasukan['tanggal']."</td>";
     	echo "<td>".$pemasukan['jenis_cucian']."</td>";
			echo "<td>".$pemasukan['nominal']."</td>";
      echo"</td>";

			
			echo "</tr>";

			}


		?>

	</tbody>
	</table>

	
</body>


</html>




