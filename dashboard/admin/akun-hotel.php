<?php
  session_start();

  include '../../controller/koneksi.php';

  $slug = 'hotel';
  include '../../partials/header-admin.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>no</th>
                <th>Profil</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Rating</th>
                <th>phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <?php

            $query = "SELECT * FROM hotel";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                $counter = 1;

                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $counter; ?> </td>
                    <td><?php echo $row['GAMBAR_HOTEL']; ?></td>
                    <td><?php echo $row['NAMA_HOTEL']; ?></td>
                    <td><?php echo $row['EMAIL_HOTEL']; ?></td>
                    <td><?php echo $row['ALAMAT']; ?></td>
                    <td><?php echo $row["RATING"]; ?></td>
                    <td><?php echo $row['TLP_HOTEL']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="akun-hotel-detail.php?id=<?php echo $row['ID_HOTEL']; ?>"><i class="bx bx-edit-alt me-1"></i> Detail</a>
                            </div>
                        </div>
                    </td>
                </tr>
                    
                <?php

                    $counter++;
                }
            } else {
                echo '<tr><td colspan="9">Tidak ada data pemesanan.</td></tr>';
            }
            ?>

            </tbody>
          </table>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 