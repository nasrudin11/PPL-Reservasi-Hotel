<?php
  session_start();

  include '../../controller/koneksi.php';

  $slug = 'user';
  include '../../partials/header-admin.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <div class="card-body">
          <?php

            $email = $_GET['id'];
            $query = "SELECT * FROM tamu WHERE EMAIL_TAMU = '$email'";
            $result = $koneksi->query($query);

            if ($result) {
                $row = $result->fetch_assoc();
            }
            ?>
            <div class="row mb-3">
              <div class="col">
                <label>Email</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['EMAIL_TAMU']; ?>" readonly>
              </div>
              <div class="col">
                <label>Foto Profil</label> <br>
                <img src="../../img/user.png" alt="" class="rounded" style="width: 100px; height: 100px;">  
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['NAMA_TAMU']; ?>" readonly>
              </div>
              <div class="col">
                <label>Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['ALAMAT']; ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal_lahir" value="<?php echo $row['TANGGAL_LAHIR']; ?>" readonly>
              </div>
              <div class="col">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" id="noTelepon" name="telepon" value="<?php echo $row['NO_TELEPON_TAMU']; ?>" readonly>
              </div>
            </div>
          </div>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 