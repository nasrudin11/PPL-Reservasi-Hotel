<?php
    session_start();

    include '../../controller/koneksi.php';

    $style =  '../../style.css';
    $imagePath ='../../img/user.png';
    $imageLogo = '../../img/logo/logo.png';
    $home = 'user.php';
    $about =  '../../about.php';
    $feed = '../../feedback.php';
    $logout = '../../controller/logout.php';

    $id_hotel = $_GET['id'];

    $query = "SELECT * FROM hotel WHERE id_hotel = $id_hotel";

    $result = $koneksi->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           $nama_hotel = $row['NAMA_HOTEL'];
           $alamat = $row['ALAMAT'];
           $gambar_hotel = $row['GAMBAR_HOTEL'];
           $deskripsi = $row['DESKRIPSI'];
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



<div class="container mt-4">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="user.php">Home</a></li>
      <li class="breadcrumb-item"><a href="hotel-search.php">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span class="breadcrumb-item span">Details</span></li>
    </ol>
  </nav>

  <!-- About -->
  <div class="card shadow p-2">
      <div class="card-body">
          <h5 class="card-title mb-4">About Hotel</h5> 
          <hr>
          <p class="card-text details-about"><?php echo $deskripsi; ?></p>
      </div>
  </div>


  <!-- Review -->
  <div class="card shadow mt-5 p-2">
      <div class="card-body">
        <h5 class="card-title mb-4">Review</h5>
          <!-- Membuat rating dan tombol "See all" -->
            <hr>
            <div class="d-flex justify-content-between align-items-center">

            <?php
                // Ambil data rating dan jumlah review dari database
                $queryRating = "SELECT AVG(rating) AS avg_rating, COUNT(id_ulasan) AS total_reviews FROM ulasan WHERE id_hotel = $id_hotel";
                $resultRating = $koneksi->query($queryRating);

                // Tampilkan rating dan jumlah review
                if ($resultRating->num_rows > 0) {
                    $rowRating = $resultRating->fetch_assoc();
                    $avgRating = $rowRating['avg_rating'];
                    $totalReviews = $rowRating['total_reviews'];
            ?>
                 <div class="rating">
            <?php
                // Tampilkan bintang berdasarkan nilai rata-rata rating
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $avgRating) {
                        echo '<span class="fa fa-star"></span>';
                    } else {
                        echo '<span class="fa fa-star-o"></span>';
                    }
                }
                ?>
                <span class="sum-rate"><?php echo number_format($avgRating, 1); ?></span>
                <span class="sum-rate-total">/5</span>
                <span class="sum-rate-view">dari <?php echo $totalReviews; ?> review</span>
            </div>
            <?php
            } else {
                echo "Tidak ada ulasan.";
            }
            ?>
            <a href="#" class="see-all text-decoration-none fw-bold">See all</a>
        </div>
        <hr>
          <div class="row">
            <?php
            // Ambil data ulasan dari database
                $queryUlasan = "SELECT ulasan.*, tamu.nama_tamu FROM ulasan 
                JOIN tamu ON ulasan.email_tamu = tamu.email_tamu
                WHERE id_hotel = $id_hotel LIMIT 4";
                $resultUlasan = $koneksi->query($queryUlasan);

                // Tampilkan ulasan
                if ($resultUlasan->num_rows > 0) {
                    while ($row = $resultUlasan->fetch_assoc()) {
                        $reviewerName = $row['nama_tamu'];
                        $rating = $row['RATING'];
                        $reviewText = $row['KOMENTAR'];
                        $reviewerDate = date('d M Y', strtotime($row['TGL_REVIEW']));
            ?>
            <div class="col-md-6">
                <div class="d-flex mt-3 justify-content-between mt-3">
                    <span class="reviewer-name"><?php echo $reviewerName; ?></span>
                    <span class="reviewer-date"><?php echo $reviewerDate; ?></span>
                </div>
                <div class="rating">
                    <?php
                    // Tampilkan bintang berdasarkan nilai rating
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<span class="fa fa-star"></span>';
                        } else {
                            echo '<span class="fa fa-star-o"></span>';
                        }
                    }
                    ?>
                </div>
                <p class="review-text"><?php echo $reviewText; ?></p>
            </div>

            <?php
                    }
                } else {
                    echo "<p>Belum ada ulasan</p>";
                }
            ?>

        </div>
    </div>
  </div>

  <!-- Kamar Hotel -->
    <div class="card shadow mt-5 p-2">
      <div class="card-body">
        <h5 class="card-title">Room Type and Price</h5>
      </div>  
    </div>

<?php
    // Query untuk mengambil data kamar yang berelasi dengan tabel hotel
    $query = "SELECT kamar.*, tipe_kamar.tipe_kamar, kamar.dewasa + kamar.anak AS jumlah_guest
            FROM kamar
            JOIN hotel ON kamar.ID_HOTEL = hotel.ID_HOTEL
            JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
            WHERE kamar.id_hotel = $id_hotel;";
    $result = $koneksi->query($query);

    // Periksa apakah ada hasil query
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="card card-room p-4 mt-4">
                <h5 class="card-title mb-4"><?php echo $row['tipe_kamar']; ?></h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card shadow border-0">
                                <img src="../../img/banner/1.png" alt="" class="rounded">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow border-0 p-2">
                                <div class="card-body">
                                    <span class="title-room"><?php echo $row['tipe_kamar'].' (Kamar tersedia : '.$row['JUMLAH_RUANGAN'].')'; ?></span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-2">
                                            <?php echo $row['jumlah_guest'] . " Guest"; ?> 
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row['DEWASA']." Dewasa & ". $row['ANAK']." Anak"; ?> 
                                        </div>
                                        <div class="col-4">
                                            <div class="price-tag text-end">
                                                <span>Rp <?php echo number_format($row['HARGA_KAMAR'], 0, ',', '.'); ?> (room/night)</span>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn btn-custom-book" href="book.php?id='<?php echo $row['ID_KAMAR']; ?>'">Book</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "Tidak ada data kamar yang ditemukan.";
    }
?>

</div>

<script>
    document.getElementById('btnBook').addEventListener('click', function (event) {
        event.preventDefault();

        var userType = "<?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?>";

        if (userType !== "tamu") {
            alert("Anda harus login terlebih dahulu sebagai tamu.");
        } else {
            window.location.href = "book.php";
        }
    });
</script>



<?php
  include '../../partials/footer.php'
 ?> 
