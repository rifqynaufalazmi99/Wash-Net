<?php
include('config.php');
session_start();
if (!isset($_SESSION["cek"])) {
  header('location:login.php');
  exit;
}

$resi = ''; // Initialize the $resi variable

if (isset($_POST["search"])) {
  $resi = $_POST['resi'];
}

?>
<!-- Rest of your code remains the same -->


<!DOCTYPE html>
<html>

<head>
  <title>Website Laundry</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link for Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Link for custom CSS -->
  <style>
    body {
      padding-top: 20px;
    }

    .navbar {
      margin-bottom: 20px;
    }

    .form-search {
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .actions {
      display: flex;
      gap: 10px;
    }

    .actions a {
      padding: 5px 10px;
      background-color: #007bff;
      color: #fff;
      border-radius: 4px;
      text-decoration: none;
    }
  </style>
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
                  <li><a href="cek_resi.php">Check Receipts</a></li>
                  <li><a href="logout.php">Log Out</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <form method="POST" action="" class="form-search">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="input-group">
            <input type="text" name="resi" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit" name="search">Search</button>
            </span>
          </div>
        </div>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>Nomor Resi</th>
          <th>Tanggal/Waktu</th>
          <th>Name Customer</th>
          <th>Telephone</th>
          <th>Jenis Cucian</th>
          <th>Berat Cucian</th>
          <th>Catatan</th>
          <th>Total harga</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = pg_query($db, "SELECT * FROM transaksi  where no_resi = '$resi' ");

        while ($transaksi = pg_fetch_array($query)) {
          echo "<tr>";
          echo "<td>" . $transaksi['no_resi'] . "</td>";
          echo "<td>" . $transaksi['tanggal'] . "/" . $transaksi['waktu'] . "</td>";
          echo "<td>" . $transaksi['nama_cust'] . "</td>";
          echo "<td>" . $transaksi['no_telp'] . "</td>";
          echo "<td>" . $transaksi['jenis_cucian'] . "</td>";
          echo "<td>" . $transaksi['berat_cucian'] . " Kg</td>";
          echo "<td>" . $transaksi['catatan'] . "</td>";
          echo "<td>" . $transaksi['total_harga'] . "</td>";
          echo "<td>" . $transaksi['status_barang'] . "</td>";
          echo "<td class='actions'>";
          echo "<a href='proses_selesai.php?id_transaksi=" . $transaksi['id_transaksi'] . "'>Selesai</a>";
          echo "<a href='proses_bayar.php?id_transaksi=" . $transaksi['id_transaksi'] . "'>Bayar</a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

