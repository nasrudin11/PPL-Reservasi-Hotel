<?php
    include "koneksi.php";
?>

<!-- Profil -->

<!-- Pemesanan -->
<?php

    function pemesanan_kamar($koneksi, $id_kamar, $emailTamu, $cekIn, $cekOut, $paymentMethod, $guestNames, $totalHarga) {
        // Melakukan query untuk menyimpan data ke tabel pemesanan
        $queryPemesanan = "INSERT INTO pemesanan (email_tamu, id_metode_pembayaran, tgl_cekin, tgl_cekout, total_biaya)
                        VALUES ('$emailTamu', $paymentMethod, '$cekIn', '$cekOut', $totalHarga)";

        echo "Debug Query: " . $queryPemesanan . "<br>";

        $resultPemesanan = $koneksi->query($queryPemesanan);

        if ($resultPemesanan) {
            // Jika pemesanan berhasil, ambil ID pemesanan yang baru saja dibuat
            $id_pemesanan = $koneksi->insert_id;

            // Melakukan loop untuk setiap tamu yang diinputkan
            foreach ($guestNames as $namaPemesan) {
                // Mengambil data kamar dari database sesuai dengan ID_KAMAR yang diinputkan
                // (Pastikan $id_kamar sudah didefinisikan atau sesuaikan dengan kebutuhan)
                $queryKamar = "SELECT * FROM kamar WHERE ID_KAMAR = $id_kamar";
                $resultKamar = $koneksi->query($queryKamar);
                $rowKamar = $resultKamar->fetch_assoc();

                // Mengambil data hotel dari database sesuai dengan ID_HOTEL yang diinputkan
                $queryHotel = "SELECT * FROM hotel WHERE ID_HOTEL = " . $rowKamar['ID_HOTEL'];
                $resultHotel = $koneksi->query($queryHotel);
                $rowHotel = $resultHotel->fetch_assoc();

                // Melakukan query untuk menyimpan data ke tabel detail_pemesanan
                $queryDetailPemesanan = "INSERT INTO detail_pemesanan (id_kamar, id_pemesanan, id_hotel, nama_pemesan)
                                        VALUES ($id_kamar, $id_pemesanan, " . $rowKamar['ID_HOTEL'] . ", '$namaPemesan')";

                // Menjalankan query detail_pemesanan
                $resultDetailPemesanan = $koneksi->query($queryDetailPemesanan);

                if (!$resultDetailPemesanan) {
                    // Jika terjadi kesalahan pada query detail_pemesanan, tampilkan pesan kesalahan
                    echo "Error: " . $koneksi->error;
                }
            }

            // Redirect atau lakukan tindakan selanjutnya setelah berhasil menyimpan data
            header("Location: pembayaran.php?id_pemesanan=$id_pemesanan");
        } else {
            // Jika terjadi kesalahan pada query pemesanan, tampilkan pesan kesalahan
            echo "Error: " . $koneksi->error;
        }

        $koneksi->close();
    }

?>

<!-- Cancel Pemesanan -->
<?php
// Fungsi untuk pembatalan pesanan
function cancel_pemesanan($koneksi, $id_pemesanan) {
    // Mulai transaksi
    $koneksi->begin_transaction();

    try {
        // Hapus data pada tabel detail_pemesanan
        $queryDetail = "DELETE FROM detail_pemesanan WHERE id_pemesanan = $id_pemesanan";
        $koneksi->query($queryDetail);

        // Hapus data pada tabel pembayaran
        $queryPembayaran = "DELETE FROM pembayaran WHERE id_pemesanan = $id_pemesanan";
        $koneksi->query($queryPembayaran);

        // Hapus data pada tabel pemesanan
        $queryPemesanan = "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan";
        $koneksi->query($queryPemesanan);

        // Commit transaksi jika semua query berhasil dieksekusi
        $koneksi->commit();

        return "Pesanan berhasil dibatalkan.";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        $koneksi->rollback();

        return "Error: " . $e->getMessage();
    }
}


?>


<!-- Pembayaran -->

<?php
    function pembayaran_kamar($koneksi, $metode_pembayaran, $id_pemesanan, $total_biaya, $gambar, $email, $nama_hotel){
        $gambar = $_FILES['upload_file']['name']; 

        $query = "INSERT INTO pembayaran (id_pembayaran, id_metode_pembayaran, id_pemesanan, tanggal_pembayaran, jumlah_pembayaran, bukti_transfer)
                VALUES ('', '$metode_pembayaran', '$id_pemesanan', CURRENT_TIMESTAMP(), '$total_biaya', '$gambar')";

        move_uploaded_file($_FILES['upload_file']['tmp_name'], "../img/upload/bukti_transfer/" . $_FILES['upload_file']['name']); // Sesuaikan dengan nama field dalam formulir

        if ($koneksi->query($query) === TRUE) {
            $queryId = "SELECT pemesanan.id_pemesanan, hotel.id_hotel, MIN(detail_pemesanan.id_kamar) AS id_kamar
            FROM pemesanan
            INNER JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
            INNER JOIN hotel ON detail_pemesanan.id_hotel = hotel.id_hotel 
            WHERE pemesanan.id_pemesanan = $id_pemesanan
            GROUP BY pemesanan.id_pemesanan, hotel.id_hotel";

            $queryNotif ="INSERT INTO notifikasi (id_hotel, email_tamu, judul_notif, pesan_notif, tgl_notif)
            VALUES (NULL, '$email', 'Pemesanan Kamar Berhasil', 
            'Kamu telah berhasil melakukan booking dan pembayaran kamar pada $nama_hotel', 
            CURRENT_TIMESTAMP())";

            $koneksi->query($queryNotif);
          
            $resultId = $koneksi->query($queryId);
            if ($resultId) {
              // Mengambil data ID hotel
              $rowId = $resultId->fetch_assoc();
              $id_hotel = $rowId['id_hotel'];
          
              setcookie("success_message", "Booking and payment room successful !!", time() + 3600, "/");
              header("Location: hotel-detail.php?id=" . $id_hotel);
              exit();
            } 
          
          }          

        $koneksi->close();
    }
?>

<!-- Ulasan & Rating -->

<!-- Whislist -->

