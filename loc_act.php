<!DOCTYPE html>
<html>
<head>
	<title>Employee Log Activity - Wash Net</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Link for Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
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

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<section>
					<h2>Log In</h2>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include('config.php');
								$query = pg_query($db, "SELECT * FROM log_act ORDER BY time ASC");

								while($sql = pg_fetch_array($query)){
									echo "<tr>";
									echo "<td>".$sql['lid_karyawan']."</td>";
									echo "<td>".$sql['nama_karyawan']."</td>";
									echo "<td>".$sql['time']."</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</section>
			</div>

			<div class="col-md-6">
				<section>
					<h2>Log Out</h2>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include('config.php');
								$query = pg_query($db, "SELECT * FROM logout_act ORDER BY time ASC");

								while($sql = pg_fetch_array($query)){
									echo "<tr>";
									echo "<td>".$sql['id_karyawan']."</td>";
									echo "<td>".$sql['nama_karyawan']."</td>";
									echo "<td>".$sql['time']."</td>";		
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</body>
</html>
