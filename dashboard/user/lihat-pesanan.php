<?php
session_start();

include '../../controller/koneksi.php';
include '../../controller/user-crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_cancel_pemesanan'])) {
    // Panggil fungsi cancel_pemesanan
    $result = cancel_pemesanan($koneksi, $_POST['id_cancel_pemesanan']);

    $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($result);
    header("Location: $redirect_url");
    exit();
}

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include '../../partials/header.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
    include '../../partials/header-login-noindex.php';
}


$email = $_SESSION['email'];
// Query untuk mendapatkan informasi pesanan
$query = "SELECT hotel.nama_hotel, tipe_kamar.tipe_kamar, pemesanan.id_pemesanan,
            pemesanan.tgl_pemesanan, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
            pemesanan.total_biaya, COUNT(detail_pemesanan.id_detail) AS jumlah_kamar
            FROM pemesanan
            JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
            JOIN kamar ON detail_pemesanan.id_kamar = kamar.id_kamar
            JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
            JOIN hotel ON kamar.id_hotel = hotel.id_hotel
            WHERE pemesanan.email_tamu = '$email'
            GROUP BY hotel.nama_hotel, tipe_kamar.tipe_kamar, pemesanan.id_pemesanan,
            pemesanan.tgl_pemesanan, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
            pemesanan.total_biaya;";

$result = $koneksi->query($query);

?>
    <div class="container mt-4">
        <?php
            if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                    </div>';
            }
        ?>
    </div>

    <div class="container mt-3">
        <h3>Daftar Pesanan Saya</h3>

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
                        <div class="w-100">
                            <?php echo $row['nama_hotel']; ?>
                        </div>
                        <div>
                            <span style="font-size: 12px;"><?php echo date('d M Y', strtotime($row["tgl_pemesanan"])); ?> </span>
                        </div>
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
                                        Cancel Pesanan
                                      </a>
                                </div>  

                                <!-- Cancel Modal -->
                                <div class="modal fade" id="konfirmasiModal<?php echo $row['id_pemesanan']; ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="konfirmasiModalLabel">Canceling Booking Conformation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to cancel this Booking?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
                                                    <input type='hidden' name='id_cancel_pemesanan' value='<?php echo $row['id_pemesanan']; ?>'>
                                                    <button type='submit' name='cancel' class='btn btn-danger'>Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
