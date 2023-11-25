<?php
    session_start();

    include '../../controller/koneksi.php';

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
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="user.php">Home</a></li>
      <li class="breadcrumb-item"><a href="hotel-search.php">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span class="breadcrumb-item span">Details</span></li>
    </ol>
  </nav>

  <!-- About -->
  <div class="card shadow">
      <div class="card-body">
          <h5 class="card-title mb-4">About Hotel</h5> 
          <hr>
          <p class="card-text details-about"><?php echo $deskripsi; ?></p>
      </div>
  </div>


  <!-- Review -->
  <div class="card shadow mt-5">
      <div class="card-body">
        <h5 class="card-title mb-4">Review</h5>
          <!-- Membuat rating dan tombol "See all" -->
          <hr>
          <div class="d-flex justify-content-between align-items-center">
              <div class="rating">
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star-half-o"></span>
                  <span class="sum-rate">4.3</span>
                  <span class="sum-rate-total">/5</span>
                  <span class="sum-rate-view">dari 100 review</span>
              </div>
              <a href="#" class="see-all text-decoration-none fw-bold">See all</a>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <!-- Membuat review pertama -->
              <div class="d-flex mt-3 justify-content-between mt-3">
                  <span class="reviewer-name">Andi</span>
                  <span class="reviewer-date"> 8 Nov 2023</span>
              </div>
              <div class="rating">
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
              </div>
              <p class="review-text">Tempatnya nyaman dan bersih, pelayanannya ramah dan cepat, makanannya enak dan murah. Pokoknya recomended banget deh!</p>
            </div>

            <div class="col">
              <!-- Membuat review kedua -->
              <div class="d-flex mt-3 justify-content-between mt-3">
                  <span class="reviewer-name">Budi</span>
                  <span class="reviewer-date"> 8 Nov 2023</span>
              </div>
              <div class="rating">
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
              </div>
              <p class="review-text">Saya suka sekali dengan tempat ini, suasana nya tenang dan nyaman, cocok untuk bersantai atau bekerja. Wifi nya juga kencang dan stabil.</p>
            </div>
          </div>

          <div class="row">
              <div class="col">
                <!-- Membuat review ketiga -->
                <div class="d-flex mt-3 justify-content-between mt-3">
                    <span class="reviewer-name">Cindy</span>
                    <span class="reviewer-date"> 8 Nov 2023</span>
                </div>
                <div class="rating">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="review-text">Tempat ini sangat bagus untuk menghabiskan waktu bersama teman atau keluarga. Ada banyak fasilitas yang disediakan, seperti kolam renang, gym, spa, dan lainnya. Kamar nya juga luas dan bersih.</p>
              </div>

              <div class="col">
                <!-- Membuat review keempat -->
                <div class="d-flex mt-3 justify-content-between mt-3">
                    <span class="reviewer-name">Cindy</span>
                    <span class="reviewer-date"> 8 Nov 2023</span>
                </div>
                <div class="rating">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="review-text"></p>
              </div>
            </div>

      </div>
  </div>

  <!-- Kamar Hotel -->
    <div class="card shadow mt-5">
      <div class="card-body">
        <h5 class="card-title">Room Type and Price</h5>
      </div>  
    </div>

<?php
    // Query untuk mengambil data kamar yang berelasi dengan tabel hotel
    $query = "SELECT kamar.*, tipe_kamar.tipe_kamar
    FROM kamar
    JOIN hotel ON kamar.ID_HOTEL = hotel.ID_HOTEL
    JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
    WHERE kamar.id_hotel = $id_hotel;";
    $result = $koneksi->query($query);

    // Periksa apakah ada hasil query
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="card card-room p-4 mt-4">
                <h5 class="card-title mb-4">' . $row['tipe_kamar'] . '</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card shadow border-0">
                                <img src="../../img/banner/1.png" alt="" class="rounded">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <span class="title-room">' . $row['tipe_kamar'] . '</span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <!-- Fasilitas -->
                                            <div class="fasilitas">
                                                <div class="row">
                                                    <div class="col">
                                                        ' . 2 . ' guest
                                                    </div>
                                                    <div class="col">
                                                        ' . 2 . '
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        ' . 2 . '
                                                    </div>
                                                    <div class="col">
                                                        ' . 2 . '
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        ' . 2 . '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="price-tag text-end">
                                                <span>Rp ' . number_format($row['HARGA_KAMAR'], 0, ',', '.') . '</span>
                                                <span>room/night</span>
                                            </div>
                                            <a class="btn btn btn-custom-book" href="book.php?id='.$row['ID_KAMAR'].'">Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
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
