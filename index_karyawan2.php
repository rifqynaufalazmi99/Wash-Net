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
	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
	<!-- header -->
	<header>
	<style>
  .navbar .navbar-nav a:hover {
    display: inline-block;
    font-size: 1.7rem;
    margin: 0 1rem;
    font-weight: 700;
    color: var(--primary);
    position: relative; /* Add this line to create a new positioning context */
  }

  .navbar .navbar-nav a::after {
    content: '';
    display: block;
    padding-bottom: 0.5rem;
    border-bottom: 0.1rem solid var(--primary);
    transform: scaleX(0);
    bottom: -0.2rem; /* Adjust this value to control the vertical position of the underline */
    left: 0; /* Adjust this value to control the horizontal position of the underline */
    width: 100%; /* Add this line to ensure the underline stretches across the entire link width */
    transition: transform 0.2s linear; /* Add transition for a smooth effect */
  }

  .navbar .navbar-nav a:hover::after {
    transform: scaleX(0.5); /* Modify this value to control the underline's width when hovering */
  }
</style>
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
	<div class="row">
	<img src="home index.png" alt="logo1" style="max-width: 100%; height: auto;">
        </div><br><br>

	<!----price list -->
<div class id="pricelist"><br><br><br>
<div class="container text-center">
  <h3 class="text-center">Price list</h3><br>
  <div class="d-flex justify-content-center">
    <img src="pricelist 1.png" alt="Menu" style="max-width: 100%; height: auto;">
  </div>
</div>
</div><br><br><br><br><br>
<!----end of price list -->

<!-- about us -->
<div class id="aboutus"><br><br><br>
  <div class="container">
    <h3 class="text-center">About us</h3><br>
    <div class="d-flex justify-content-center">
      <img src="about us.png" alt="Menu" style="max-width: 100%; height: auto; margin-top: 20px;">
    </div>
  </div>
</div><br><br><br><br><br><br>
<!----end of about us -->

<!-- main page map section-->
<section class="map" id="map">
    <div class="container">
    <h3 class="text-center"><br><br>Find us!</h3><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.711838657324!2d106.72912831399876!3d-6.558013965931345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4b758d5c1b5%3A0x89b0802179c78bdf!2sDepartemen%20Ilmu%20Komputer%20FMIPA%20IPB!5e0!3m2!1sen!2sid!4v1668919969518!5m2!1sen!2sid" style= "width:100%;  height:250px; border:0;" allowfullscreen>
		</iframe><br><br><br><br><br><br><br><br>
                    
<?php?>        

</section>
<!--end of main page map section-->

<!--footer-->
<footer class="footer" id="footer">
	<div class="social">
		<a href = "#"><i data-feather="facebook"></i></a>
	</div>
 <div class="container"><br>
  <div class="row">
    <div class="col-sm-12">
      <div class="social-icon">
        <a href="index.php"><ii data-feather="fa fa-facebook"></i></a>
        <a href="index.php"><i class="fa fa-twitter"></i></a>
        <a href="index.php"><i class="fa fa-pinterest"></i></a>
        <a href="index.php"><i class="fa fa-rss"></i></a>
      </div>
      <div class="copyright">
        <p class="white"> copyright &copy; <b>Wash-Net</b></p>
        <p><i class="fa fa-phone"></i> +62 (812) 1550 7410 &nbsp;<i class="fa fa-envelope-o"></i> wash-net@apps.ipb.ac.id</p>
      </div>
    </div>
  </div>
 </div>
</footer>
<!--end of footer-->
<script>
      feather.replace()
    </script>
</body>
<!---end of body-->
</html>