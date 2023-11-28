<?php
  session_start();

  include '../../controller/koneksi.php';
  include '../../controller/hotel-crud.php';

  $slug = 'customer-notif';

  $id_hotel = $_SESSION['id_hotel'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Panggil fungsi cancel_pemesanan
    $result = notif_user($koneksi, $_POST['email_tamu'], $id_hotel, $_POST['judul'], $_POST['pesan']);

    $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($result);
    header("Location: $redirect_url");
    exit();
}
    include '../../partials/header-hotel.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">

    <div class="container mt-4">
        <?php
          if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                  </div>';
          }
        ?>
      </div>
      <!-- Content -->
     
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <div class="card-body">
          <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Customer</label>
                  <input type="email" class="form-control" id="basic-default-fullname" name="email_tamu" placeholder="Email name account customer" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Notifications</label>
                  <input type="text" class="form-control" id="basic-default-company" name="judul" placeholder="Title for notifications" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Message</label>
                  <textarea
                  id="basic-default-message"
                  class="form-control"
                  name="pesan"
                  placeholder="Write your massage"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 