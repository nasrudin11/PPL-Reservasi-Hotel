<?php 
session_start();

include '../../controller/koneksi.php';
include '../../controller/user-crud.php';

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

<div class="container mt-5">
    <h4>Wishlist Hotel</h4>

    <!-- Status Alert -->
        <?php
        if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                </div>';
        }
        ?>

<?php
$query = mysqli_query($koneksi, "SELECT W.ID_WISHLIST, h.NAMA_HOTEL, h.TLP_HOTEL, h.ALAMAT, h.RATING, h.GAMBAR_HOTEL FROM wishlist_favorit w 
                                  JOIN hotel h ON w.ID_HOTEL = h.ID_HOTEL JOIN tamu t ON t.EMAIL_TAMU = w.EMAIL_TAMU; ");

while($row=mysqli_fetch_assoc($query)){

  echo '
  <div class="container">
  <div class="row">
  <div class="col-md-6">
      <div class="card mb-3 shadow" style="border-radius: 15px;">
          <div class="row g-0">
              <div class="col-md-5">
                  <img src="../../img/upload/hotel/'.$row['GAMBAR_HOTEL'].'" alt="Hotel" class="img-fluid h-100" style="border-radius: 15px 0 0 15px;">
              </div>
              <div class="col-md-7">
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h6 class="card-title">' . $row['NAMA_HOTEL'] . '</h6>
                          </div>
                          <div>
                            <form action = "" method = "post">
                              <input type="hidden" name="id_wishlist" value="' . $row['ID_WISHLIST'] . '">
                              <button class = "btn btn-danger" name = "hapus_wishlist" style="padding: 3px 8    px;">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </form>
                          </div>
                      </div>
                      <small class="text-muted">' . $row['RATING'] . '/5 (reviews)</small>
                      <div class="d-flex justify-content-between align-items-center">
                          <div>  
                              <span class="fs-6 ">' . $row['ALAMAT'] . '</span>
                          </div>
                        </div>

                      <hr>
                      <span class="badge text-bg-success">Free Breakfast</span>
                      <span class="badge text-bg-success">Bathub</span>
                  </div>
              </div>
          </div>
      </div>
</div>';
}

?>

</div>



<?php include '../../partials/footer.php' ?>