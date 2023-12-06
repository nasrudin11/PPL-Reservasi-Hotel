<?php
session_start();

include '../../controller/koneksi.php';
include '../../controller/user-crud.php';

$style =  '../../style.css';
$imagePath ='../../img/user.png';
$imageLogo = '../../img/logo/logo.png';
$home = 'user.php'; 
$about =  '../../about.php';
$feed = '../../feedback.php';
$logout = '../../controller/logout.php';


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
  include '../../partials/header-login-noindex.php';
}

?>

<div class="container mt-4">
    <?php
    if (isset($_COOKIE['success_message'])) {
        $successMessage = $_COOKIE['success_message'];
        echo '<div class="alert alert-success">'. $successMessage .'</div>';
        // Hapus cookie setelah digunakan
        setcookie("success_message", "", time() - 3600, "/");
    }
    ?>
</div>



  <?php

    $query = "SELECT hotel.nama_hotel, hotel.id_hotel, tipe_kamar.tipe_kamar, pemesanan.id_pemesanan,
                      pemesanan.tgl_pemesanan, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
                      pemesanan.total_biaya, COUNT(detail_pemesanan.id_detail) AS jumlah_kamar
                      FROM pemesanan
                      JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
                      JOIN kamar ON detail_pemesanan.id_kamar = kamar.id_kamar
                      JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
                      JOIN hotel ON kamar.id_hotel = hotel.id_hotel
                      WHERE pemesanan.email_tamu = '{$_SESSION['email']}'
                      GROUP BY hotel.nama_hotel, tipe_kamar.tipe_kamar, pemesanan.id_pemesanan,
                      pemesanan.tgl_pemesanan, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
                      pemesanan.total_biaya;";
    $result = $koneksi->query($query);
  ?>

<div class="container mt-4">
        <h3 class="mb-3">Riwayat Pemesanan</h3>

        <?php
        if ($result->num_rows > 0) {
            echo '<div class="accordion" id="accordionPesanan">';
            
            $counter = 1;
            
            while ($row = $result->fetch_assoc()) {
                $accordionID = 'collapse' . $counter;
            ?>
            
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $counter; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordionID; ?>" aria-expanded="false" aria-controls="<?php echo $accordionID; ?>">
                            <?php echo $row['nama_hotel']; ?>
                    </button>

                    </h2>
                    <div id="<?php echo $accordionID; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $counter; ?>" data-bs-parent="#accordionPesanan">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <h6>Tipe Kamar :</h6><?php echo $row['tipe_kamar']; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <h6>Check-In/Out :</h6> <?php echo date('d M Y', strtotime($row["tgl_cekin"])) . ' - ' . date('d M Y', strtotime($row["tgl_cekout"])); ?>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <h6>Jumlah Kamar :</h6><?php echo $row['jumlah_kamar']; ?> Kamar
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <h6>Total Biaya :</h6> <?php echo $row['total_biaya']; ?>
                                    </div>
                                </div>  
                                <div class="text-end">
                                   <a class='btn btn-danger' href='#' data-bs-toggle='modal' data-bs-target='#konfirmasiModal<?php echo $row['id_pemesanan']; ?>'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                  <a class="btn btn-ulasan" href="ulasan.php?id=<?php echo $row['id_hotel']; ?>">Berikan Ulasan</a>
                                </div>  
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            
                $counter++;
            }
            
            echo '</div>';
        } else {
            echo "Tidak ada data pesanan.";
        }
        
        ?>

    </div>



</body>
</html>
