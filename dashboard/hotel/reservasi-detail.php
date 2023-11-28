<?php
    session_start();
    include '../../controller/koneksi.php';

    $slug = 'manajemen-reservasi';

    include '../../partials/header-hotel.php';

    $id_hotel = $_SESSION['id_hotel'];
    $id_pemesanan = $_GET['id'];
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="col-8">

                <!-- Stya Details -->

                <?php
                $query = "SELECT kamar.*, tipe_kamar.tipe_kamar, hotel.nama_hotel, pemesanan.tgl_cekin, pemesanan.tgl_cekout,
                        pemesanan.id_metode_pembayaran, pemesanan.total_biaya, tamu.nama_tamu
                    FROM
                        pemesanan
                    JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
                    JOIN kamar ON detail_pemesanan.id_kamar = kamar.id_kamar
                    JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
                    JOIN tamu ON pemesanan.email_tamu = tamu.email_tamu
                    JOIN hotel ON kamar.id_hotel = hotel.id_hotel
                    WHERE hotel.id_hotel = $id_hotel";

                $result = $koneksi->query($query);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $gambar_kamar = $row['GAMBAR_KAMAR'];
                        $tipe_kamar = $row['tipe_kamar'];
                        $harga_kamar = $row['HARGA_KAMAR'];
                        $nama_hotel = $row['nama_hotel'];
                        $cekin = $row['tgl_cekin'];
                        $formatted_tgl_cekin = date('Y-m-d', strtotime($cekin));

                        $cekout = $row['tgl_cekout'];
                        $formatted_tgl_cekout = date('Y-m-d', strtotime($cekout));

                        $total_harga = $row['total_biaya'];

                        $metode_pembayaran = $row['id_metode_pembayaran'];
                    }       

                }else {
                    echo "Error: " . $koneksi->error;
                }

                ?>

                <div class="header-book">
                    <h5>Stay Details at ASTON Priority Simatupang & Conference Center</h5>
                    <span class="book-describe">
                        The detail for   guest booking room
                    </span>
                </div>
                <div class="card shadow mt-3 p-2">
                    <div class="card-body">
                        <span class="title-room">Room With Twin Bed</span>
                        <ul>
                            <li>2 Guest</li>
                            <li><?php echo $tipe_kamar; ?></li>
                            <li>Breakfast not included</li>
                        </ul>
                        <hr>

                        <div class="row g-3 mb-1">
                            <div class="col-2">
                                <label for="inputCheckin" class="col-form-label">Cek In</label>
                            </div>
                            <div class="col-4">
                                <input type="date" id="inputCheckin" class="form-control" name="cekIn" value="<?php echo $formatted_tgl_cekin; ?>" readonly>
                            </div>
                            <div class="col-2">
                                <label for="inputCheckout" class="col-form-label">Cek Out</label>
                            </div>
                            <div class="col-4">
                                <input type="date" id="inputCheckout" class="form-control" name="cekOut" value="<?php echo  $formatted_tgl_cekout; ?>" readonly>
                            </div>
                        </div>

                    </div>
                </div>  
                <div class="card shadow mt-3 p-2">
                    <div class="card-body" id="dynamic-form">
                        <?php
                        $query = "SELECT nama_pemesan FROM detail_pemesanan
                                WHERE id_pemesanan = $id_pemesanan";
                        $result = $koneksi->query($query);
                        $room_number = 1;

                        if ($result->num_rows > 0) {
                            // Mulai iterasi untuk setiap baris detail pemesanan
                            while ($row = $result->fetch_assoc()) {
                                // Ambil informasi yang diperlukan  
                        ?>

                        <div class="row g-3 mb-1">
                            <div class="col-2">
                                <label for="inputGuest" class="col-form-label">Room <?php echo $room_number; ?></label>
                            </div>
                            <div class="col-6">
                                <input type="text" name="inputGuest[]" class="form-control" value="<?php echo $row['nama_pemesan'] ?>" readonly>
                            </div>
                        </div>

                        <?php
                            $room_number++;
                            }
                        } else {
                            echo "Tidak ada data.";
                        }
                        ?>
                    </div>
                </div>
            
                    <!-- Payment Details -->

                <div class="header-book mt-5">
                    <h5>Payment Details</h5>
                    <span class="book-describe">
                        Guest payments method booking transaction
                    </span>
                </div>        
                <div class="card shadow mt-3 p-2">
                    <div class="card-body">
                        <span class="method-payment">Select Payment Method</span>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="1" <?php echo ($metode_pembayaran == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="payment">
                            BCA Virtual Account
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="2" <?php echo ($metode_pembayaran == 2) ? 'checked' : 'disabled'; ?> >
                            <label class="form-check-label" for="payment">
                            Credit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="3" <?php echo ($metode_pembayaran == 3) ? 'checked' : 'disabled'; ?> >
                            <label class="form-check-label" for="payment">
                            Mandiri Virtual Account
                            </label>
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="col-4">
                <div class="header-book">
                    <h5>Total Payment</h5>
                    <span class="book-describe">
                        Total of payment booking room
                    </span>
                </div>

                <div class="card shadow mt-3 p-2">
                    <div class="card-body" id="dynamic-form">
                        <!-- Your dynamic form content here -->

                        <div class="row">
                            <div class="col-2">
                                <img src="../../img/<?php echo $gambar_kamar; ?>" class="rounded" alt="Gambar Hotel" style="width: 2.5rem; height: 2.5rem;">
                            </div>
                            <div class="col">
                                <span class="title-book"><?php echo $nama_hotel; ?></span>
                            </div>
                        </div>
                        <hr>
                        <!-- Dynamic price Section -->
                        <div class="d-flex justify-content-between mb-3">
                            <span class="price-book">Price Room</span>
                            <span id="price" class="price-book">Rp. <?php echo number_format($harga_kamar, 0, ',', '.'); ?></span>
                        </div>

                        <!-- Dynamic Total Payment Section -->
                        <div class="d-flex justify-content-between">
                            <span class="price-book">Total Payment</span>
                            <span id="totalPayment" class="price-book">Rp. <?php echo number_format($total_harga, 0, ',', '.'); ?></span>
                        </div>
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