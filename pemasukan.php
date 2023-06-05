<?php include('config.php');
// // $row['bulan'] = date('M');
// // $tahun = date('Y');
// // $tanggalawal = date('y-m-01');
// $tanggalakhir = date('YMd');
// var_dump($tanggalakhir);
// // $query = pg_query($db, "SELECT cast(sum(nominal) as Numeric) , tanggal  from pemasukan where tanggal >= '$tanggalawal' and tanggal <='$tanggalakhir' GROUP BY tanggal");
// $query = pg_query($db,"SELECT EXTRACT(MONTH FROM tanggal) AS bulan, cast(sum(nominal) as Numeric) FROM pemasukan GROUP BY EXTRACT(MONTH FROM tanggal)");

// $result = pg_fetch_assoc($query);
// 
// $total = $result['sum'];
// $total = (int) $total;
// var_dump($total);

// $query = pg_query($db, "SELECT EXTRACT(MONTH FROM tanggal) AS bulan, cast(sum(nominal) as Numeric) FROM pemasukan GROUP BY EXTRACT(MONTH FROM tanggal)");
// $data = pg_fetch_all($query);

// // Mengubah format data untuk digunakan dalam chart
// $labels = [];
// $datasetData = [];
// foreach ($data as $row) {
//     $labels[] = $row['bulan'];
//     $datasetData[] = $row['sum'];
// }

$query = pg_query($db, "SELECT EXTRACT(MONTH FROM tanggal) AS bulan, cast(sum(nominal) as Numeric) FROM pemasukan GROUP BY EXTRACT(MONTH FROM tanggal)");

$labels = array();
$data = array();

while ($row = pg_fetch_assoc($query)) {
if($row['bulan']==1){
	$row['bulan'] ="Januari";
}else if($row['bulan']==2){
	$row['bulan']="Febuari";
}else if($row['bulan']==3){
	$row['bulan']="Maret";
}else if($row['bulan']==4){
	$row['bulan']="April";
}else if($row['bulan']==5){
	$row['bulan']="Mei";
}else if($row['bulan']==6){
	$row['bulan']="Juni";
}else if($row['bulan']==7){
	$row['bulan']="Juli";
}else if($row['bulan']==8){
	$row['bulan']="Agustus";
}else if($row['bulan']==9){
	$row['bulan']="September";
}else if($row['bulan']==10){
	$row['bulan']="Oktober";
}else if($row['bulan']==11){
	$row['bulan']="November";
}else if($row['bulan']==12){
	$row['bulan']="Desember";
}
    $labels[] = $row['bulan'];
    $data[] = $row['sum'];
}



// var_dump($data);
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
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
			margin-top: 20px;
		}
        
        .hero {
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
			justify-content: center;
			color: black;
		}

		.hero h1 {
			font-size: 48px;
			margin-bottom: 20px;
		}

		.hero p {
			font-size: 24px;
			margin-bottom: 40px;
        }
    </style>

</head>
<body>
<header>
        <a class="nav-brand" href="indexadmin2.php">Wash Net</a>
        <nav>
            <ul class="nav-links">
                <li><a href="daftar_karyawan.php">Daftar Karyawan</a></li>
				<li><a href="loc_act.php">Kehadiran Karyawan</a></li>
            	<li><a href="pemasukan.php">Pemasukan</a></li>
            </ul>
        </nav>
        <a href="logout.php"><button>Log Out</button></a>
    </header><br><br><br><br><br>
  <h1>Penjualan Laundry </h1>
	<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Pemasukan',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: <?php echo json_encode($data); ?>,
            }]
        },
    });
</script>
	
</body>
</html>
