<?php
session_start();

include '../../controller/koneksi.php';
include '../../controller/user-crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus_pemesanan"])) {
  if (isset($_POST['id_pemesanan'])){
      $id_pemesanan = $_POST['id_pemesanan'];
      $error_message = hapus_riwayat($koneksi, $id_pemesanan);

  $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
  header("Location: $redirect_url");
  exit();
  }
}


if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
  include '../../partials/header.php';
  
} elseif ($_SESSION['user_type'] === 'tamu') {
  include '../../partials/header-login.php';
}

?>
<div class="container mt-5">
  <h2>Riwayat Pemesanan</h2>

    <!-- Status Alert -->
    <?php
        if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                </div>';
        }
        ?>


  <?php

$query = mysqli_query($koneksi, "SELECT p.*, h.NAMA_HOTEL FROM pemesanan p JOIN hotel h ON p.ID_HOTEL = h.ID_HOTEL WHERE EMAIL_TAMU = '$_SESSION[email]' ");


while($row=mysqli_fetch_assoc($query)){

  echo'
    <div class="container"> 
    <div class="row">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">'. $row['NAMA_HOTEL'] .'</h5>
        <ul class="list-unstyled">
          <li>Pemesanan: '. $row['TGL_PEMESANAN'] .'</li>
          <li>Check-in: '. $row['TGL_CEKIN'] .'</li>
          <li>Check-out: '. $row['TGL_CEKOUT'] .'</li>
          <li>Total Harga: Rp. '. $row['TOTAL_BIAYA'] .'</li>
          <!-- Tambahkan info lainnya sesuai kebutuhan -->
        </ul>
        <form action = "" method = "post">
        <input type="hidden" name="id_pemesanan" value="' . $row['ID_PEMESANAN'] . '">
        <button class = "btn btn-danger" name = "hapus_pemesanan" style="padding: 3px 8    px;">
          <i class="fas fa-trash-alt"></i>
        </button>
      </form>
</div>
    </div>
  </div> 
  </div>';
}

?>
</div>

  <?php include '../../partials/footer.php' ?>
