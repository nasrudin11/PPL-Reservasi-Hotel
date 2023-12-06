<?php
    include "koneksi.php";
?>

<!-- Profil -->
<?php
    function edit_profil_tamu($koneksi, $email_tamu, $nama_tamu, $alamat, $no_telp, $tanggal_lahir, $file)
    {
        $foto = $file["name"];
        $tmp_name = $file["tmp_name"];
        $upload_dir = "../../img/upload/tamu/";

        if (!empty($foto)) {
            move_uploaded_file($tmp_name, $upload_dir . $foto);
            $query = "UPDATE tamu SET NAMA_TAMU = '$nama_tamu', ALAMAT = '$alamat', NO_TELEPON_TAMU = '$no_telp', TANGGAL_LAHIR = '$tanggal_lahir', 
            FOTO = '$foto' WHERE EMAIL_TAMU = '$email_tamu'";
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa memperbarui gambar
            $query = "UPDATE tamu SET NAMA_TAMU = '$nama_tamu', ALAMAT = '$alamat', NO_TELEPON_TAMU = '$no_telp', 
            TANGGAL_LAHIR = '$tanggal_lahir' WHERE EMAIL_TAMU = '$email_tamu'";
        }

        if ($koneksi->query($query) === TRUE) {
            return "Profil successful updated";
        } else {
            return "Failed to update profil: " . $koneksi->error;
        }

        $koneksi->close();

    }
?>

<!-- Pemesanan -->
<?php

    function pemesanan_kamar($koneksi, $id_kamar, $emailTamu, $id_hotel, $cekIn, $cekOut, $paymentMethod, $guestNames, $totalHarga) {
        // Melakukan query untuk menyimpan data ke tabel pemesanan
        $queryPemesanan = "INSERT INTO pemesanan (email_tamu, id_hotel, id_metode_pembayaran, tgl_cekin, tgl_cekout, total_biaya)
                        VALUES ('$emailTamu', $id_hotel , $paymentMethod, '$cekIn', '$cekOut', $totalHarga)";

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

                // Melakukan query untuk menyimpan data ke tabel detail_pemesanan
                $queryDetailPemesanan = "INSERT INTO detail_pemesanan (id_kamar, id_pemesanan, nama_pemesan)
                                        VALUES ($id_kamar, $id_pemesanan, '$namaPemesan')";

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

        move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../img/upload/bukti_transfer/" . $_FILES['upload_file']['name']); // Sesuaikan dengan nama field dalam formulir

        if ($koneksi->query($query) === TRUE) {
            $queryId = "SELECT pemesanan.id_pemesanan, pemesanan.id_hotel, MIN(detail_pemesanan.id_kamar) AS id_kamar
            FROM pemesanan
            INNER JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
            WHERE pemesanan.id_pemesanan = $id_pemesanan
            GROUP BY pemesanan.id_pemesanan, pemesanan.id_hotel";

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


<!-- Hapus Riwayat pemesanan -->
<?php
    function hapus_riwayat($koneksi, $id_pemesanan){
        if(!empty($id_pemesanan)){
            $query = "DELETE FROM pemesanan WHERE ID_PEMESANAN = '$id_pemesanan'";       
            $query2 = "DELETE FROM detail_pemesanan WHERE ID_PEMESANAN = '$id_pemesanan'";

            if ($koneksi->query($query)=== TRUE) {
                if ($koneksi->query($query2)=== TRUE){
                return " Order history has been successfully deleted";
            } else {
                return "Failed to Order history delete: " . $koneksi->error;
            }}

            $koneksi->close();

        }   

    }
?>

<!-- Ulasan & Rating -->

<?php

    function tambahUlasan($koneksi, $idHotel, $emailTamu, $rating, $komentar) {
        // Buat SQL statement untuk insert ulasan
        $sql = "INSERT INTO ulasan (id_hotel, email_tamu, rating, komentar) VALUES ('$idHotel', '$emailTamu', '$rating', '$komentar')";

        // Jalankan query
        if ($koneksi->query($sql) === TRUE) {
            setcookie("success_message", "Your review has send successful !!", time() + 3600, "/");
            header("Location: hotel-riwayat-pemesanan.php");
            exit();
        } else {
            return false; 
        }
    }

?>

<!-- Whislist -->
<?php
    function tambah_wishlist($koneksi, $email_tamu, $id_hotel){

        if(!empty($id_hotel)){
        $query = "INSERT INTO wishlist_favorit (EMAIL_TAMU, ID_HOTEL) VALUES ('$email_tamu', '$id_hotel')";
            if ($koneksi->query($query) === TRUE) {
                return "Hotel wishlist added successfully";
            } else {
                return "Failed to hotel wishlist added: " . $koneksi->error;
            }
        $koneksi->close();
        }
    }
?>

<!-- Hapus Wishlist -->
<?php
    function hapus_wishlist($koneksi, $id_wishlist){
        if(!empty($id_wishlist)){
            $query = "DELETE FROM wishlist_favorit WHERE ID_WISHLIST = '$id_wishlist'";       

            if ($koneksi->query($query) === TRUE) {
                return "Hotel wishlist delete successfully";
            } else {
                return "Failed to hotel wishlist delete: " . $koneksi->error;
            }

            $koneksi->close();

        }   

    }
?>
