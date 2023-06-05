<?php include('config.php');
session_start();



if(isset($_POST['search'])){
  $_SESSION['hasil_resi'] =$_POST['nomor_resi']; 
  var_dump($_SESSION['hasil_resi']);
  header('location:hasil_resi.php');

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
  
<form action="cek_resi.php" method="POST">
 <input type="text" name="nomor_resi" placeholder="Search"> 
 <input  type="submit" name="search"  value="Search"> <br><br>
 </form>
 
</body>


</html>




