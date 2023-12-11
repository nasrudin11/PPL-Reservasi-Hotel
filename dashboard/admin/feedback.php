<?php
  session_start();

  include '../../controller/koneksi.php';

  $slug = 'feed';
  include '../../partials/header-admin.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">

      <!-- Content -->
     
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="accordion shadow mt-4" id="accordionNotif">
        <?php
          $query = "SELECT * FROM `feedback` ORDER BY waktu DESC";
          $result = $koneksi->query($query);
          if ($result->num_rows > 0) {
              $counter = 1;
          
              while ($row = $result->fetch_assoc()) {
                  $accordionID = 'collapse' . $counter;
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordionID; ?>" aria-expanded="false" aria-controls="<?php echo $accordionID; ?>">
                <div class="w-100">
                    <?php echo $row["EMAIL"]; ?>
                </div>
                <div>
                    <span style="font-size: 12px;"><?php echo date('d M Y', strtotime($row["WAKTU"])); ?> </span>
                </div>
            </button>
            </h2>
            <div id="<?php echo $accordionID; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionNotif">
            <div class="accordion-body">
                <div class="mb-2">Nama :</div>
                <p><?php echo $row["NAMA"] ?></p>
                <div class="mb-2"> Deskripsi :</div> 
                  <p><?php echo $row["DESKRIPSI"] ?></p>
            </div>
            </div>
        </div>


        <?php 
                    $counter++;
                }
            } else {
                // Tampilkan pesan jika tidak ada notifikasi
                echo '<div class="accordion-item">';
                echo '<div class="accordion-header">';
                echo 'Tidak ada notifikasi.';
                echo '</div>';
                echo '</div>';
            }
        
        ?>

    </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 