<?php
    session_start();

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
        include '../../partials/header.php';
        
    } elseif ($_SESSION['user_type'] === 'tamu') {
        include '../../partials/header-login-noindex.php';
    }
?> 


<div class="container mt-4">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Hotel</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span class="breadcrumb-item span">Details</span></li>
    </ol>
  </nav>

  <!-- About -->
  <div class="card shadow">
      <div class="card-body">
          <h5 class="card-title mb-4">About Hotel</h5> 
          <hr>
          <p class="card-text details-about">
            Located in the East of Bandung, Shakti Hotel Bandung is a great accommodation with an 
            outdoor swimming pool and sun loungers. For an additional charge, guests can enjoy spa 
            treatments at the hotel’s spa centre. Free WiFi is accessible throughout the hotel. The
            modern-style rooms at Shakti Hotel Bandung have wooden floors with a mixture of white
            and green walls. Every room has an air conditioner, a flat-screen TV and an electric
            kettle. Every bathroom has a shower, a hairdryer and free toiletries.  The hotel’s 
            PUSPAMAYA Restaurant offers Indonesian and Asian menu. The restaurant has Shakti VIP
            Room for a private dine-in experience. The hotel’s lobby restaurant, Eat Boss Café, 
            serves Indonesian, Asian and international dishes.  The gym at Shakti Hotel Bandung 
            is free and open to all overnight guests. Other facilities, such as the laundry service 
            and the airport shuttle, can be booked with an additional charge. The hotel also housed 
            the 24-hour Shakti Minimart, conveniently located within the property.     Guests from 
            Shakti Hotel Bandung only need to drive for 24-minutes to reach Trans Studio Bandung. 
            The tourist destination, Kampoeng Tulip, is only a 16-minute drive away from the hotel. 
            Husein Sastranegara International Airport is a 43-minute drive from the property.
          </p>
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

    <div class="card card-room p-4 mt-4">
      <h5 class="card-title mb-4">Room With Twin Bed</h5>
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
                          <span class="title-room">Room With Twin Bed</span>
                          <hr>
                          <div class="row">
                              <div class="col-md-9">
                                  <!-- Fasilitas -->
                                  <div class="fasilitas">
                                      <div class="row">
                                          <div class="col">
                                              1 guest
                                          </div>
                                          <div class="col">
                                              Free Wifi
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              2 Single Beds
                                          </div>
                                          <div class="col">
                                              Parking
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              Breakfast not included
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="price-tag text-end">
                                      <span>Rp 50,000</span>
                                      <span>room/night</span>
                                  </div>
                                  <a id="btnBook"  class="btn btn btn-custom-book" href="book.php">Book</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="card card-room p-4 mt-4">
      <h5 class="card-title mb-4">Room With Twin Bed</h5>
      <div class="card-body">
          <div class="row">
              <div class="col-md-3">
                  <div class="card shadow border-0">
                      <img src="../../img/banner/2.png" alt="" class="rounded">
                  </div>
              </div>
              <div class="col">
                  <div class="card shadow border-0">
                      <div class="card-body">
                          <span class="title-room">Room With Twin Bed</span>
                          <hr>
                          <div class="row">
                              <div class="col-md-9">
                                  <!-- Fasilitas -->
                                  <div class="fasilitas">
                                      <div class="row">
                                          <div class="col">
                                              1 guest
                                          </div>
                                          <div class="col">
                                              Free Wifi
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              2 Single Beds
                                          </div>
                                          <div class="col">
                                              Parking
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              Breakfast not included
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="price-tag text-end">
                                      <span>Rp 50,000</span>
                                      <span>room/night</span>
                                  </div>
                                  <a id="btnBook"  class="btn btn btn-custom-book" href="book.php">Book</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="card card-room p-4 mt-4">
      <h5 class="card-title mb-4">Room With Twin Bed</h5>
      <div class="card-body">
          <div class="row">
              <div class="col-md-3">
                  <div class="card shadow border-0">
                      <img src="../../img/banner/3.png" alt="" class="rounded">
                  </div>
              </div>
              <div class="col">
                  <div class="card shadow border-0">
                      <div class="card-body">
                          <span class="title-room">Room With Twin Bed</span>
                          <hr>
                          <div class="row">
                              <div class="col-md-9">
                                  <!-- Fasilitas -->
                                  <div class="fasilitas">
                                      <div class="row">
                                          <div class="col">
                                              1 guest
                                          </div>
                                          <div class="col">
                                              Free Wifi
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              2 Single Beds
                                          </div>
                                          <div class="col">
                                              Parking
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col">
                                              Breakfast not included
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="price-tag text-end">
                                      <span>Rp 50,000</span>
                                      <span>room/night</span>
                                  </div>
                                  <a id="btnBook"  class="btn btn btn-custom-book" href="book.php">Book</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

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
