<?php
session_start();

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include '../../partials/header.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
    include '../../partials/header-login-noindex.php';
}

?>


<div class="row">
    <div class="col-3" style="width: 280px;">
        <!-- Filter Pencarian -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <h4 class="d-flex align-items-center mb-3">Filters</h4>
        <hr>
        <div class="mb-3">
            <label for="customRange">Price Range</label>
            <div class="input-group">
                <input type="text" class="form-control" id="customRangeMin" value="0">
                <input type="text" class="form-control" id="customRangeMax" value="0">
            </div>
        </div>



        <div class="mb-3">
            <label for="guest-rating" class="form-label">Guest rating</label>
            <select class="form-select" id="guest-rating">
            <option selected>Any</option>
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-select" id="location">
            <option selected>Any</option>
            <option value="central">Central</option>
            <option value="north">North</option>
            <option value="south">South</option>
            <option value="east">East</option>
            <option value="west">West</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amenities" class="form-label">Facilities</label>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="wifi" id="wifi">
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
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="location" placeholder="Lokasi">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control " id="check-in" placeholder="Tanggal Check-in">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control " id="check-out" placeholder="Tanggal Check-out">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control " id="room-count">
                                    <option value="1">1 Kamar</option>
                                    <option value="2">2 Kamar</option>
                                    <option value="3">3 Kamar</option>
                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control " id="guest-count">
                                    <option value="1">1 Tamu</option>
                                    <option value="2">2 Tamu</option>
                                    <option value="3">3 Tamu</option>
                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" id="search-button">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Card Pertama -->
                <div class="col-md-6">
                    <a href="hotel-detail.php" class="text-decoration-none">
                        <div class="card mb-3 shadow" style="border-radius: 15px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../../img/01.png" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Hotel Lainnya</h5>
                                        <p class="card-text"><small class="text-muted">4.2/5 (98 reviews)</small></p>
                                        <p class="card-text text-end">
                                            <span class="fs-5 fw-bold">Rp 800.000</span>
                                        </p>
                                        <hr>
                                        <span class="badge text-bg-success">Free Breakfast</span>
                                        <span class="badge text-bg-success">Bathub</span>
                                        <span class="badge text-bg-success">Swimming Pool</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card Kedua -->
                <div class="col-md-6">
                    <a href="hotel-detail.php" class="text-decoration-none">
                        <div class="card mb-3 shadow" style="border-radius: 15px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../../img/02.png" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Hotel Lainnya</h5>
                                        <p class="card-text"><small class="text-muted">4.2/5 (98 reviews)</small></p>
                                        <p class="card-text text-end">
                                            <span class="fs-5 fw-bold">Rp 800.000</span>
                                        </p>
                                        <hr>
                                        <span class="badge text-bg-success">Free Breakfast</span>
                                        <span class="badge text-bg-success">Bathub</span>
                                        <span class="badge text-bg-success">Swimming Pool</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>



<?php
  include '../../partials/footer.php'
 ?> 
