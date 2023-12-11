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
          <table class="table table-striped">
            <thead>
              <tr>
                <th>no</th>
                <th>Profil</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Born Date</th>
                <th>phone</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <?php

            $query = "SELECT * FROM tamu";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                $counter = 1;

                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $counter; ?> </td>
                    <td><?php echo $row['FOTO']; ?></td>
                    <td><?php echo $row['NAMA_TAMU']; ?></td>
                    <td><?php echo $row['EMAIL_TAMU']; ?></td>
                    <td><?php echo $row['ALAMAT']; ?></td>
                    <td><?php echo date('d M Y', strtotime($row["TANGGAL_LAHIR"]))?></td>
                    <td><?php echo $row['NO_TELEPON_TAMU']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="admin-user-detail.php?id=<?php echo $row['EMAIL_TAMU']; ?>"><i class="bx bx-edit-alt me-1"></i> Detail</a>
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