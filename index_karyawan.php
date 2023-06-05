<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Net</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <a class="nav-brand" href="index_karyawan.php">Wash Net</a>
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
    <!-- Hero Section -->
    <section class="hero">
            <div class="container">
                <h1>Welcome to Wash Net</h1>
                <p>Professional Laundry Services</p>
            </div>
        </section>

	<!-- Services Section -->
	<section class="container">
		<h2>Our Services</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Laundry Service</h3>
					</div>
					<div class="panel-body">
						<p>We offer high-quality laundry service for all types of garments and fabrics.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Dry Cleaning</h3>
					</div>
					<div class="panel-body">
						<p>Our dry cleaning service ensures that your delicate clothes receive the best care.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Alterations</h3>
					</div>
					<div class="panel-body">
						<p>Our expert tailors provide alteration services to give you the perfect fit.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- main page map section-->
    <section class="map" id="map">
        <div class="container">
        <h3 class="text-center"><br><br>Find us!</h3><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.711838657324!2d106.72912831399876!3d-6.558013965931345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4b758d5c1b5%3A0x89b0802179c78bdf!2sDepartemen%20Ilmu%20Komputer%20FMIPA%20IPB!5e0!3m2!1sen!2sid!4v1668919969518!5m2!1sen!2sid" style= "width:100%;  height:250px; border:0;" allowfullscreen>
            </iframe><br><br><br><br><br><br><br><br>
</body>
</html>