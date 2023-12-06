<?php
    session_start();
    
    include '../../partials/header-login.php'
?> 

<div class="banner position-relative">
  <div class="overlay"></div>

  <!-- Carousel -->
  <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../../img/banner/1.png" class="d-block w-100" alt="Slide 1">
        <h1 class="position-absolute bottom-0">Tempat booking hotel <br>dengan harga terjangkau</h1>
      </div>
      <div class="carousel-item">
        <img src="../../img/banner/2.png" class="d-block w-100" alt="Slide 2">
        <h1 class="position-absolute bottom-0">Tersedia banyak hotel <br>untuk bisa kamu kunjungi</h1>
      </div>
      <div class="carousel-item">
        <img src="../../img/banner/3.png" class="d-block w-100" alt="Slide 3">
        <h1 class="position-absolute bottom-0">Tersedia banyak hotel <br>untuk bisa kamu kunjungi</h1>
      </div>
    </div>
  </div>


  <div class="position-absolute top-50 right-side-card">      
    <!-- Pencarian Card -->
    <div class="card shadow p-3">
      <div class="card-body">

        <!-- Form Pencarian -->
        <form action="">
          <div class="mb-3">
            <!-- Pilih Lokasi -->
            <select class="form-select" aria-label="Default select example">
              <option selected>Pilih Lokasi</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <!-- Tanggal Cek in -->
                <label for="formFile" class="form-label">Check-in</label>
                <input class="form-control" type="date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <!-- Tanggal Cek Out -->
                <label for="formFile" class="form-label">Check-out</label>
                <input class="form-control" type="date">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="mb-3">
                <!-- Jumlah Kamar -->
                <label for="formFile" class="form-label">Jumlah Kamar</label>
                <input type="number" id="adults" name="adults" min="1" max="10" value="1" class="form-control">
              </div>
            </div> 
          </div>

          <div class="row">
              <label for="formFile" class="form-label">Jumlah Tamu</label>
              <div class="col-md-6">
                <div class="mb-3">
                  <!-- Jumlah Tamu -->
                  <label for="formFile" class="form-label">Dewasa</label>
                  <input type="number" id="guests" name="guests" min="1" max="10" value="1" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <!-- Jumlah Tamu -->
                  <label for="formFile" class="form-label">Anak-anak</label>
                  <input type="number" id="guests" name="guests" min="1" max="10" value="1" class="form-control">
                </div>
              </div>
            </div> 

          <!-- Tombol Pencarian -->
          <a href="hotel-search.php" class="btn btn-custom-search w-100">Search</a>
        </form>       
      </div>
    </div>
  </div>
</div>

<!-- Promosi -->
<div id="promosi" class="container mt-5">
  <div class="mb-4 text-center">
    <h2>Promosi</h2>
  </div>
  <!-- Carousel -->
  <div id="bannerPromoCarousel" class="carousel slide shadow" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#bannerPromoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Promo 1"></button>
      <button type="button" data-bs-target="#bannerPromoCarousel" data-bs-slide-to="1" aria-label="Promo 2"></button>
      <button type="button" data-bs-target="#bannerPromoCarousel" data-bs-slide-to="2" aria-label="Promo 3"></button>
      <button type="button" data-bs-target="#bannerPromoCarousel" data-bs-slide-to="3" aria-label="Promo 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../../img/promosi/promo1.png" class="d-block w-100" alt="Promo 1">
      </div>
      <div class="carousel-item">
        <img src="../../img/promosi/promo2.png" class="d-block w-100" alt="Promo 2">
      </div>
      <div class="carousel-item">
        <img src="../../img/promosi/promo3.png" class="d-block w-100" alt="Promo 3">
      </div>
      <div class="carousel-item">
        <img src="../../img/promosi/promo4.png" class="d-block w-100" alt="Promo 3">
      </div>
    </div>
  </div>    
</div>

<!-- Rekomendasi -->
<div id="rekomendasi" class="container mt-5">
  <div class="mb-4 text-center">
    <h2 >Rekomendasi Hotel</h2>
  </div>
  <div class="row">
    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/01.png" class="card-img-top" alt="Hotel 1">
        <div class="card-body">
          <h5 class="card-title">Hotel 1</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/02.png" class="card-img-top" alt="Hotel 2">
        <div class="card-body">
          <h5 class="card-title">Hotel 2</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/03.png" class="card-img-top" alt="Hotel 3">
        <div class="card-body">
          <h5 class="card-title">Hotel 3</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/04.png" class="card-img-top" alt="Hotel 4">
        <div class="card-body">
          <h5 class="card-title">Hotel 4</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-4 text-center">
    <a class="btn btn-custom-more" href="#">Selengkapnya</a>
  </div>
</div>

<!-- Populer -->
<div id="populer" class="container mt-5">
  <div class="mb-4 text-center">
    <h2>Paling Populer</h2>
  </div>
  <div class="row">
    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/01.png" class="card-img-top" alt="Hotel 1">
        <div class="card-body">
          <h5 class="card-title">Hotel 1</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/02.png" class="card-img-top" alt="Hotel 2">
        <div class="card-body">
          <h5 class="card-title">Hotel 1</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/03.png" class="card-img-top" alt="Hotel 3">
        <div class="card-body">
          <h5 class="card-title">Hotel 1</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 mx-auto">
      <div class="card shadow">
        <img src="../../img/04.png" class="card-img-top" alt="Hotel 4">
        <div class="card-body">
          <h5 class="card-title">Hotel 1</h5>
          <ul class="list-unstyled" style="font-size: 14px;">
            <li>Rating: 4.5</li>
            <li>Alamat: Jalan Hotel 1, Kota</li>
            <li>Harga: $100</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mt-4 text-center">
    <a class="btn btn btn-custom-more" href="#">Selengkapnya</a>
  </div>
  </div>
</div>

<div id="about" class="container mt-5">
  <div class="mb-4 text-center">
    <h2 >About Staycation</h2>
  </div>
  <!-- card about -->
  <div class="row">
      <div class="col-md-6">
          <div class="card shadow" style="height: 100%;">
              <div class="card-body">
                  <h5 class="card-title">Staycation's global hotel search</h5>
                  <p class="card-text" style="font-size: 15px;">Staycation’s hotel search allows users to compare hotel prices in just a few clicks from hundreds 
                    of booking sites for more than 5.0 million hotels and other types of accommodation in over 190 countries. We help 
                    millions of travelers each year compare deals for hotels and accommodations. Get information for trips to cities 
                    like Las Vegas or Orlando and you can find the right hotel on Staycation quickly and easily. New York City and its 
                    surrounding area are great for trips that are a week or longer with the numerous hotels available.</p>
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="card shadow" style="height: 100%;">
              <div class="card-body">
                  <h5 class="card-title">Find cheap hotels on Staycation</h5>
                  <p class="card-text" style="font-size: 15px;">With Staycation you can easily find your ideal hotel and compare prices from different websites. 
                    Simply enter where you want to go and your desired travel dates, and let our hotel search engine compare 
                    accommodation prices for you. To refine your search results, simply filter by price, distance (e.g. from the beach), 
                    star category, facilities and more. From budget hostels to luxury suites, Staycation makes it easy to book online. 
                    You can search from a large variety of rooms and locations across the USA, like San Francisco and Chicago to popular 
                    cities and holiday destinations abroad!</p>
              </div>
          </div>
      </div>
      <div class="col-md-6 mt-3">
          <div class="card shadow" style="height: 100%;">
              <div class="card-body">
                  <h5 class="card-title">Hotel reviews help you find your ideal hotel</h5>
                  <p class="card-text" style="font-size: 15px;">Over 175 million aggregated hotel ratings and more than 19 million images allow you to find out 
                    more about where you're traveling. To get an extended overview of a hotel property, Staycation shows the average rating 
                    and extensive reviews from other booking sites, e.g. Hotels.com, Expedia, Agoda, leading hotels, etc. Staycation makes 
                    it easy for you to find information about your trip to Miami Beach, including the ideal hotel for you.</p>
              </div>
          </div>
      </div>
      <div class="col-md-6 mt-3">
          <div class="card shadow" style="height: 100%;">
              <div class="card-body">
                  <h5 class="card-title">How to book</h5>
                  <p class="card-text" style="font-size: 15px;">Staycation is a hotel search with an extensive price comparison. The prices shown come from 
                    numerous hotels and booking websites. This means that while users decide on Staycation which hotel best suits 
                    their needs, the booking process itself is completed through the booking sites (which are linked to our website). 
                    By clicking on the “view deal” button, you will be forwarded onto a booking site where you can complete the 
                    reservation for the hotel deal found on Staycation. Let Staycation help you to find the right price from hundreds of booking sites!</p>
              </div>
          </div>
      </div>
  </div>
</div>

<?php
    include '../../partials/footer.php'
?> 
