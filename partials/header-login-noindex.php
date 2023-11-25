<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
    <!-- import bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- import css -->
    <link rel="stylesheet" href="../../style.css">
    <title>Welcome</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar bg-white">
      <div class="container">
        <a class="navbar-brand" href="user.php">
              <img src="../../img/logo/logo.png" height="24" class="d-inline-block align-text-top">
              <span class="logo-name">staycation</span>
          </a>

        <!-- link navbar -->
        <ul class="nav">
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link text-black" href="<?php echo $about; ?>">About Us</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link text-black" href="<?php echo $feed; ?>">Feedback</a>
          </li>
          <li>
            <!-- Gambar Profil dengan Dropdown -->
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../../img/user.png" alt="Profil" class="profile-img" style="height: 30px;">
              </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#"><?php echo $_SESSION["nama_tamu"]; ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item" href="#">Notifikasi</a>
                <a class="dropdown-item" href="#">Wishlist</a>
                <a class="dropdown-item" href="#">Riwayat Pemesanan</a>
                <a class="dropdown-item" href="#">Pengaturan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo $logout; ?>">Logout</a>
              </div>
            </div>
          </li>
        </ul>
    </div>
  </nav>