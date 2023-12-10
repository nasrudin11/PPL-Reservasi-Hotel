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


if ($_SERVER["REQUEST_METHOD"]) {
  if (isset($_POST['id_riwayat'])){
      $id_riwayat = $_POST['id_riwayat'];   
      $error_message = hapus_riwayat($koneksi, $id_riwayat);

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

    $query = "SELECT hotel.nama_hotel, hotel.id_hotel, tipe_kamar.tipe_kamar, riwayat_pemesanan.*, COUNT(riwayat_detail_pemesanan.id_riwayat_dtl) AS jumlah_kamar
            FROM riwayat_pemesanan
            JOIN riwayat_detail_pemesanan ON riwayat_pemesanan.id_riwayat = riwayat_detail_pemesanan.id_riwayat
            JOIN kamar ON riwayat_detail_pemesanan.id_kamar = kamar.id_kamar
            JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
            JOIN hotel ON kamar.id_hotel = hotel.id_hotel
            WHERE riwayat_pemesanan.email_tamu = '{$_SESSION['email']}'
            GROUP BY riwayat_pemesanan.id_riwayat";
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
                                        <h6>Check-In/Out :</h6> <?php echo date('d M Y', strtotime($row["TGL_CEKIN"])) . ' - ' . date('d M Y', strtotime($row["TGL_CEKOUT"])); ?>
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
                                        <h6>Total Biaya :</h6> <?php echo $row['TOTAL_BIAYA']; ?>
                                    </div>
                                </div>  
                                <div class="text-end">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <input type="hidden" name="id_riwayat" value="<?php echo $row['ID_RIWAYAT']; ?>">
                                        <button type="submit" class='btn btn-danger'>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <a class="btn btn-ulasan" href="ulasan.php?id=<?php echo $row['id_hotel']; ?>">Berikan Ulasan</a>
                                    </form>                                 
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
