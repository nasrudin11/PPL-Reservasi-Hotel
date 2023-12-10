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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_message = edit_profil_tamu($koneksi, $_SESSION['email'], $_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['tanggal_lahir'], $_FILES['foto']);

    $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
    header("Location: $redirect_url");
    exit();
    }

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include '../../partials/header.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
    include '../../partials/header-login-noindex.php';
}
?>



  <div class="container mt-5">
    <?php

        $email = $_SESSION['email'];
        $query = "SELECT * FROM tamu WHERE EMAIL_TAMU = '$email'";
        $result = $koneksi->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
    ?>

    <h2>PROFIL PENGGUNA</h2>

    <div class="card shadow p-3">
      <div class="card-body">
        <?php
            if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                    </div>';
            }
        ?>
        
        <!-- Form Profil Pengguna -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col">
              <label>Email</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['EMAIL_TAMU']; ?>" readonly>
            </div>
            <div class="col">
              <label">Foto Profil</label>
              <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $row['FOTO']; ?>" >
            </div>
          </div>
       

          <div class="row mb-3">
            <div class="col">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['NAMA_TAMU']; ?>">
            </div>
            <div class="col">
              <label>Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['ALAMAT']; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal_lahir" value="<?php echo $row['TANGGAL_LAHIR']; ?>">
            </div>
            <div class="col">
              <label>Nomor Telepon</label>
              <input type="text" class="form-control" id="noTelepon" name="telepon" value="<?php echo $row['NO_TELEPON_TAMU']; ?>">
            </div>
          </div>

          <input class="btn btn-primary" type="submit" name="simpan" value = "Simpan">
        </form>
        
        <?php
          }
        }else {
          echo "Error: " . $koneksi->error;
        }
        $koneksi->close();

        ?>
      </div>
    </div>

  </div>

  <?php include '../../partials/footer.php' ?>