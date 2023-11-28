<?php
    session_start();
    include '../../controller/koneksi.php';

    $slug = 'manajemen-reservasi';

    include '../../partials/header-hotel.php'
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
                <th>User</th>
                <th>Email</th>
                <th>Check in/out</th>
                <th>Payment</th>
                <th>phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <?php
            // Gantilah kolom-kolom yang sesuai dengan struktur tabel Anda
            $id_hotel = $_SESSION['id_hotel']; 

            $query = "SELECT pemesanan.id_pemesanan,tamu.nama_tamu, tamu.email_tamu, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
                    metode_pembayaran.nama_metode_pembayaran, tamu.no_telepon_tamu
                FROM pemesanan
                JOIN tamu ON pemesanan.email_tamu = tamu.email_tamu
                JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
                JOIN hotel ON detail_pemesanan.id_hotel = hotel.id_hotel
                JOIN metode_pembayaran ON pemesanan.id_metode_pembayaran = metode_pembayaran.id_metode_pembayaran
                WHERE hotel.id_hotel = $id_hotel
                GROUP BY pemesanan.id_pemesanan
                ORDER BY pemesanan.tgl_cekin DESC";

            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                $counter = 1;

                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $counter; ?> </td>
                    <td><?php echo $row['nama_tamu']; ?></td>
                    <td><?php echo $row['email_tamu']; ?></td>
                    <td><?php echo date('d M', strtotime($row["tgl_cekin"])) . ' - ' . date('d M Y', strtotime($row["tgl_cekout"])); ?></td>
                    <td><?php echo $row['nama_metode_pembayaran']; ?></td>
                    <td><?php echo $row['no_telepon_tamu']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="reservasi-detail.php?id=<?php echo $row['id_pemesanan']; ?>"><i class="bx bx-edit-alt me-1"></i> Detail</a>
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