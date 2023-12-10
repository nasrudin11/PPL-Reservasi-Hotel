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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus_wishlist"])) {
    if (isset($_POST['id_wishlist'])){
        $id_wishlist = $_POST['id_wishlist'];
        $error_message = hapus_wishlist($koneksi, $id_wishlist);

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
    <h4>Wishlist Hotel</h4>
    <div class="row">
    <!-- Status Alert -->
        <?php
        if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                </div>';
        }
        ?>

<?php
    $query = mysqli_query($koneksi, "SELECT hotel.*, wishlist_favorit.ID_WISHLIST, MIN(kamar.HARGA_KAMAR) AS min_harga_kamar,
                GROUP_CONCAT(DISTINCT fasilitas.NAMA_FASILITAS) AS fasilitas
                FROM hotel
                JOIN kamar ON hotel.ID_HOTEL = kamar.ID_HOTEL
                LEFT JOIN fasilitas_hotel ON hotel.ID_HOTEL = fasilitas_hotel.ID_HOTEL
                LEFT JOIN fasilitas ON fasilitas_hotel.ID_FASILITAS = fasilitas.ID_FASILITAS
                JOIN wishlist_favorit ON hotel.ID_HOTEL = wishlist_favorit.ID_HOTEL
                WHERE wishlist_favorit.EMAIL_TAMU = '{$_SESSION['email']}'
                GROUP BY hotel.ID_HOTEL");

    // Memeriksa apakah hasil query kosong
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            ?>

            <div class="col-md-6">
                <a href="hotel-detail.php?id=<?php echo $row['ID_HOTEL']; ?>" class="text-decoration-none">
                    <div class="card mb-3 shadow" style="border-radius: 15px;">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="../../img/upload/hotel/<?php echo $row['GAMBAR_HOTEL']; ?>" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title"><?php echo  $row['NAMA_HOTEL'] ?></h6>
                                        </div>
                                        <div>
                                            <form action = "" method = "post">
                                            <input type="hidden" name="id_wishlist" value="<?php echo $row['ID_WISHLIST'] ?>">
                                            <button class = "btn btn-danger" name = "hapus_wishlist" style="padding: 3px 8px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <small class="text-muted"><?php echo $row['RATING']; ?>/5 (reviews)</small>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>  
                                            <span class="fs-6 "><?php echo  $row['ALAMAT']; ?></span>
                                        </div>
                                        <div>                                            
                                            <span class="fs-6 fw-bold">Rp <?php echo  $row['min_harga_kamar']; ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="badge-container d-flex flex-nowrap overflow-auto">
                                        <?php
                                            $fasilitasArray = explode(',', $row['fasilitas']);
                                            foreach ($fasilitasArray as $fasilitas) {
                                                echo '<span class="badge text-bg-custom ms-2">' . trim($fasilitas) . '</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php
        }
    } else {
        echo '<p>Tidak ada data wishlist.</p>';
    }
?>

    </div>
</div>



</body>
</html>