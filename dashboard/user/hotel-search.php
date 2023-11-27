<?php
session_start();

include '../../controller/koneksi.php';

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include '../../partials/header.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
    include '../../partials/header-login-noindex.php';
}

?>

<form action="" method="post">
<div class="row">
    <div class="col-3" style="width: 250px;">
        <!-- Filter Pencarian -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light shadow" style="width: 250px;">
            <h4 class="d-flex align-items-center mb-3">Filters</h4>
            <hr>
            <div class="mb-3">
                <label for="customRange">Price Range</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="customRangeMin" name="customRangeMin" value="0">
                    <input type="text" class="form-control" id="customRangeMax" name="customRangeMax" value="0">
                </div>
            </div>

            <div class="mb-3">
                <label for="guest-rating" class="form-label">Guest rating</label>
                <select class="form-select" name="guest-rating" id="guest-rating">
                <option selected>Any</option>
                <option value="1.0">1 star</option>
                <option value="2.0">2 stars</option>
                <option value="3.0">3 stars</option>
                <option value="4.0">4 stars</option>
                <option value="5.0">5 stars</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="amenities" class="form-label">Facilities</label>
                <div class="form-check">
                <input class="form-check-input" type="checkbox"  value="wifi" id="wifi">
                <label class="form-check-label" for="wifi">
                    Free WiFi
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="parking" id="parking">
                <label class="form-check-label" for="parking">
                    Free parking
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="pool" id="pool">
                <label class="form-check-label" for="pool">
                    Swimming pool
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="spa" id="spa">
                <label class="form-check-label" for="spa">
                    Spa
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="gym" id="gym">
                <label class="form-check-label" for="gym">
                    Gym
                </label>
                </div>
            </div>
        </div>     
    </div>

    <div class="col p-4">
        <!-- Search bar hotel -->
        <div class="container mb-5">
            <div class="card shadow border-0">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="location" placeholder="Lokasi" name="lokasi">
                            </div>
                            <div class="col-md-2">                         
                                <input type="date" class="form-control" id="check-in">
                            </div>
                            <div class="col-md-2">                    
                                <input type="date" class="form-control" id="check-out">
                            </div>
                            <div class="col-md-2">                    
                                <select class="form-control" id="room-count">
                                    <option value="1">1 Kamar</option>
                                    <option value="2">2 Kamar</option>
                                    <option value="3">3 Kamar</option>
                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>
                            <div class="col-md-2">               
                                <select class="form-control" id="guest-count">
                                    <option value="1">1 Tamu</option>
                                    <option value="2">2 Tamu</option>
                                    <option value="3">3 Tamu</option>
                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary" name="search-button" id="search-button">Cari</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </form>



        <div class="container">
            <div class="row">
            <?php
// Assuming you have a database connection named $koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lokasi"])) {
    // parameter navbar
    $navbarLocation = mysqli_real_escape_string($koneksi, $_POST['lokasi']);

    // Menyimpan parameter dari form sidebar ke dalam variabel
    $sidebarPriceRangeMin = (int)$_POST['customRangeMin'];
    $sidebarPriceRangeMax = (int)$_POST['customRangeMax'];
    $sidebarGuestRating = (float)$_POST['guest-rating'];

    // Membangun kondisi filter berdasarkan form navbar
    $navbarFilter = '';
    if (!empty($navbarLocation)) {
        $navbarFilter .= " AND hotel.alamat = '$navbarLocation'";
    }

    // Membangun kondisi filter berdasarkan form sidebar
    $sidebarFilter = '';
    if ($sidebarPriceRangeMin > 0 && $sidebarPriceRangeMax > 0) {
        $sidebarFilter .= " AND kamar.harga_kamar BETWEEN '$sidebarPriceRangeMin' AND '$sidebarPriceRangeMax'";
    }
    if (!empty($sidebarGuestRating) && $sidebarGuestRating !== 'Any') {
        $rangeStart = $sidebarGuestRating;
        $rangeEnd = $sidebarGuestRating + 0.9;
    
        $sidebarFilter .= " AND hotel.rating BETWEEN $rangeStart AND $rangeEnd";
    }

    // Merged filter condition from the sidebar and location filter
    $filterCondition = $navbarFilter . $sidebarFilter;

    // Query to fetch hotel and room data with applied filters
    $query = "SELECT hotel.ID_HOTEL, hotel.NAMA_HOTEL, hotel.RATING, hotel.ALAMAT, hotel.GAMBAR_HOTEL, MIN(kamar.HARGA_KAMAR) AS min_harga_kamar
            FROM hotel
            JOIN kamar ON hotel.ID_HOTEL = kamar.ID_HOTEL
            WHERE 1 $filterCondition
            GROUP BY hotel.ID_HOTEL";

    $result = $koneksi->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display hotel information as needed
            echo '<div class="col-md-6">
                    <a href="hotel-detail.php?id=' . $row['ID_HOTEL'] . '" class="text-decoration-none">
                        <div class="card mb-3 shadow" style="border-radius: 15px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="../../img/upload/hotel/'.$row['GAMBAR_HOTEL'].'" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">' . $row['NAMA_HOTEL'] . '</h6>
                                    <small class="text-muted">' . $row['RATING'] . '/5 (reviews)</small>
                                    <p class="card-text text-end">
                                        <span class="fs-6 fw-bold">Rp ' . $row['min_harga_kamar'] . '</span>
                                    </p>
                                    <hr>
                                    <div class="badge-container overflow-auto">
                                        <span class="badge text-bg-success ms-2">Free Breakfast</span>
                                        <span class="badge text-bg-success ms-2">Bathub</span>
                                        <span class="badge text-bg-success ms-2">Free Wifi</span>
                                        <span class="badge text-bg-success ms-2">Gym</span>
                                        <span class="badge text-bg-success ms-2">Spa</span>
                                        <span class="badge text-bg-success ms-2">Swimming Pool</span>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </a>
                </div>';
        }
    } else {
        echo "No hotels found for the selected location.";
    }


    // Close the database connection
    $koneksi->close();
} else {
    // Display all hotels when the form is not submitted
    // Adjust this query based on your actual database structure
    $query = "SELECT hotel.ID_HOTEL, hotel.NAMA_HOTEL, hotel.RATING, hotel.ALAMAT, hotel.GAMBAR_HOTEL, MIN(kamar.HARGA_KAMAR) AS min_harga_kamar
                FROM hotel
                JOIN kamar ON hotel.ID_HOTEL = kamar.ID_HOTEL
                GROUP BY hotel.ID_HOTEL";
    $result = $koneksi->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-6">
                    <a href="hotel-detail.php?id=' . $row['ID_HOTEL'] . '" class="text-decoration-none">
                        <div class="card mb-3 shadow" style="border-radius: 15px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="../../img/upload/hotel/'.$row['GAMBAR_HOTEL'].'" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h6 class="card-title">' . $row['NAMA_HOTEL'] . '</h6>
                                        <small class="text-muted">' . $row['RATING'] . '/5 (reviews)</small>
                                        <p class="card-text text-end">
                                            <span class="fs-6 fw-bold">Rp ' . $row['min_harga_kamar'] . '</span>
                                        </p>
                                        <hr>
                                        <div class="badge-container d-flex flex-nowrap overflow-auto">
                                            <span class="badge text-bg-success ms-2">Free Breakfast</span>
                                            <span class="badge text-bg-success ms-2">Free Wifi</span>
                                            <span class="badge text-bg-success ms-2">Gym</span>
                                            <span class="badge text-bg-success ms-2">Spa</span>
                                            <span class="badge text-bg-success ms-2">Swimming Pool</span>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
        }
    } else {
        echo "No hotels found.";
    }

    // Close the database connection
    $koneksi->close();
}
?>

            
            </div>
        </div>



    </div>
</div>



<?php
  include '../../partials/footer.php'
 ?> 

