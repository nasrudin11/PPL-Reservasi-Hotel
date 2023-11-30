<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Tamu</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyD8JbDN0W5d10BOk1jcKz5b+76jCFWpRU" crossorigin="anonymous">
</head>
<body>
<?php 
    session_start();
    include '../../controller/user-crud.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_message = edit_profil_tamu($koneksi, $_SESSION['email'], $_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['tanggal_lahir'], $_FILES['foto']);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
        
      }
    include '../../partials/header-login.php';
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
      <div class="container mt-4">
        <?php
          if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                  </div>';
          }
        ?>
      </div>


  <div class="container mt-5">
            <?php

            $email = $_SESSION['email'];
            $query = "SELECT * FROM tamu WHERE EMAIL_TAMU = '$email'";
            $result = $koneksi->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
            ?>

    <h2>PROFIL PENGGUNA</h2>
    <!-- Form Profil Pengguna -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Email</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['EMAIL_TAMU']; ?>">
      </div>

      <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['NAMA_TAMU']; ?>">
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['ALAMAT']; ?>">
      </div>

      <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" class="form-control" id="noTelepon" name="telepon" value="<?php echo $row['NO_TELEPON_TAMU']; ?>">
      </div>

      <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal_lahir" value="<?php echo $row['TANGGAL_LAHIR']; ?>">
      </div>

      <div class="mb-3">
        <label">Foto Profil</label>
        <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $row['FOTO'];?>">
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

  <?php include '../../partials/footer.php' ?>

  <!-- Bootstrap JS (diperlukan untuk beberapa fitur Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKl7U5Ll6X5Z9jJQGpI8MzQ8FFetFq2+EbrFxnBf6I" crossorigin="anonymous"></script>
</body>

</html>

