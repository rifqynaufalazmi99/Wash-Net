<?php include ('config.php');
session_start();
$err='';


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
	

	//owner page
  if ($email == 'admin@gmail.com' and $password == 'admin') {
    header('location:admin.php?');
	}else{ 
    //mengecek match or no
		$id = pg_query($db,"SELECT id_karyawan From karyawan Where email = '$email'");
    $result  = pg_query($db, "SELECT email from karyawan where email = '$email'");
    $row = pg_fetch_array($result);
    $row = pg_fetch_array($id);
	
		
    if(pg_num_rows($result)>0){
      
      $_SESSION['email'] = $row['email'];
      password_verify($password, $row['password']);
			$_SESSION['id_karyawan']= $row['id_karyawan'];
			$_SESSION["cek"]= true;
      header('Location:order.php?');
    }else {
      $err = '<h style="color:red">Email dan Password salah!</h4>';
      
    }
  }
}
?>

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
            align-items: center;
            justify-content: center;
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

        .center {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, 50%);
            width: 400px;
            background: #42ECFF;
            border-radius: 10px;
        }

        .center h1 {
            font-family: "Montserrat";
            font-weight: 700;
            font-size: 30px;
            text-decoration: none;
            color: black;
            text-align: center;
            padding: 0 0 20px 0;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-family: "Montserrat";
            font-weight: 700;
            font-size: 16px;
            background: white;
            border-radius: 10px;
            outline: none;
        }

        .txt_field label {
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <header>
        <a class="nav-brand" href="index.php">Wash Net</a>
        <nav>
            <ul class="nav-links">
                <li><a href="pricelist.php">Pricelist</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Find Us</a></li>
                <li><a href="cek_resi.php">Check Receipts</a></li>
            </ul>
        </nav>
        <a href="login.php"><button>Login</button></a>
    </header>
    <div class = "center">
        <h1>Login</h1>
        <form action="login2.php" method="POST">
            <div class="txt_field">
                <input type="email" name="email" placeholder="Email" required/>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password" required/>
                <span></span>
                <label>Password</label>
            <div class="d-flex mx-auto justify-contents-center" style="position: relative; top: 20px; width: 200px;">
                <input type="submit" class="b" name="login" value="Login">
            </div>
            </div>
            <div class="signup">
                Create Account
                <a href="sign_up.php"><button>Sign Up</button></a>
            </div>
        </form>
    </div>
    <!-- Link for Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>