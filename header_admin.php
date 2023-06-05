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

<nav class="navbar">
  <a href="index.php" class="navbar-brand">Wash Net</a>
  <div class="navbar-nav">
  	<a class="nav-link" href="#pricelist">Daftar Karyawan</a>
    <a class="nav-link" href="#aboutus">Aktivitas Karyawan</a>
    <a class="nav-link" href="#map">Keuangan</a>
    <a href="cek_resi.php">Check Receipts</a>
    <a href="logout.php">Logout</a>
  </div>
</nav>
	</header>