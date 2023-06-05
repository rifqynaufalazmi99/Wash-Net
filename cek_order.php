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


  // $cek_resi = pg_query($db,"SELECT no_resi from transaksi where no_resi ='$resi'");
  // var_dump($cek_resi);
}
  



?>

<!DOCTYPE html>
<html>

<head>
  <title>Website Laundry</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  <script>
  function copyToClipboard(text) {
    var tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Receipt number copied to clipboard!");
  }
</script>

  <style>
    body {
            margin: 0;
            padding: 0;
            background-color: white;
            box-sizing: border-box;
            outline: none;
            border: none;
        }
        
        header {
            background-color: #42ECFF;
            display: flex;
            flex-direction: center;
            justify-content: space-between;
            padding: 10px 10%;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }
        
        li, a, button {
            font-family: 'Montserrat', 'Poppins', sans-serif;
            font-weight: 700;
            text-decoration: none;
            color: white;
        }
        .nav-brand {
            font-size: 32px;
            font-weight: 700;
            color: white;
            cursor: pointer;
        }

        .nav-links {
            list-style: none;
            display: flex; /* Add this line to make the list items flex containers */
            align-items: center; /* Add this line to vertically align the list items */
        }

        .nav-links li {
            padding: 0px 30px;
            display: flex; /* Add this line to make the list items flex containers */
            align-items: center; /* Add this line to vertically align the list items */
            height: 100%; /* Add this line to make the list items fill the navbar height */
        }

        button {
            background-color: white;
            color: #42ECFF;
            height: 36px;
            width: 100px;
            border-radius: 20px;
            border-color: white;
            border-style: solid;
            cursor: pointer;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #42ECFF;
            color: white;
        }
        .container {
        text-align: center;
       }

  .search-form {
    max-width: 400px;
    margin-bottom: 20px;
    display: inline-block;
  }

  table {
    max-width: 800px;
    margin: 0 auto;
  }

  .status-label {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 3px;
    font-weight: bold;
    color: #000;
  }

  .status-pending {
    background-color: #f0ad4e;
  }

  .status-inprogress {
    background-color: #5bc0de;
  }

  .status-completed {
    background-color: #5cb85c;
  }

  .status-cancelled {
    background-color: #d9534f;
  }

  .status-paid {
    background-color: #337ab7;
  }
</style>

</head>

<body>
<header>
        <a class="nav-brand" href="index.php">Wash Net</a>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php #pricelist">Price List</a></li>
                <li><a href="order.php">New Order</a></li>
				        <li><a href="cek_order.php">View Order</a></li>
            	  <li><a href="cek_resi.php">Check Receipts</a></li>
            </ul>
        </nav>
        <a href="logout.php"><button>Log Out</button></a>
    </header><br><br><br><br><br>
  <div class="container">
    <form class="search-form" action="cek_order.php" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" name="nomor_resi" placeholder="Search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit" name="search">Search</button>
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
        </tr>
      </thead>
      <tbody>
        <?php
        $query = pg_query($db, "SELECT * FROM transaksi  Order BY tanggal asc ");
        while ($transaksi = pg_fetch_array($query)) {
          echo "<tr>";
          echo "<td>" . $transaksi['no_resi']." <button class='btn btn-secondary' onclick='copyToClipboard(\"".$transaksi['no_resi']."\")'>Copy</button></td>";
          echo "<td>" . $transaksi['tanggal'] . "/" . $transaksi['waktu'] . "</td>";
          echo "<td>" . $transaksi['nama_cust'] . "</td>";
          echo "<td>" . $transaksi['no_telp'] . "</td>";
          echo "<td>" . $transaksi['jenis_cucian'] . "</td>";
          echo "<td>" . $transaksi['berat_cucian'] . " Kg</td>";
          echo "<td>" . $transaksi['catatan'] . "</td>";
          echo "<td>" . $transaksi['total_harga'] . "</td>";
          echo "<td>";
          $status = strtolower($transaksi['status_barang']);
          echo "<span class='status-label status-$status'>" . $transaksi['status_barang'] . "</span>";
          echo "<td>";
          echo "<a href='proses_selesai.php?id_transaksi=" . $transaksi['id_transaksi'] . "' class='btn btn-success'>Selesai</a>";
          echo "<a href='proses_bayar.php?id_transaksi=" . $transaksi['id_transaksi'] . "' class='btn btn-primary'>Bayar</a>";
          echo "</td>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Scripts for Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
