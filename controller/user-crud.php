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
        $idPemesanan = $koneksi->insert_id;

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
                                     VALUES ($id_kamar, $idPemesanan, " . $rowKamar['ID_HOTEL'] . ", '$namaPemesan')";

            // Menjalankan query detail_pemesanan
            $resultDetailPemesanan = $koneksi->query($queryDetailPemesanan);

            if (!$resultDetailPemesanan) {
                // Jika terjadi kesalahan pada query detail_pemesanan, tampilkan pesan kesalahan
                echo "Error: " . $koneksi->error;
            }
        }

        // Redirect atau lakukan tindakan selanjutnya setelah berhasil menyimpan data
        header("Location: pembayaran.php?id_pemesanan=$idPemesanan");
    } else {
        // Jika terjadi kesalahan pada query pemesanan, tampilkan pesan kesalahan
        echo "Error: " . $koneksi->error;
    }
}



// Tutup koneksi ke database (jika diperlukan)
$koneksi->close();

?>


<!-- Ulasan & Rating -->

<!-- Whislist -->

