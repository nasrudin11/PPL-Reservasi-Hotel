<?php
include "koneksi.php";

//<!-- Profil -->
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
        $query = "UPDATE tamu SET NAMA_TAMU = '$nama_tamu', ALAMAT = '$alamat', NO_TELEPON = '$no_telp', 
        TANGGAL_LAHIR = '$tanggal_lahir' WHERE EMAIL_TAMU = '$email_tamu'";
    }

<<<<<<< Updated upstream
    if ($koneksi->query($query) === TRUE) {
        return "Profil successful updated";
    } else {
        return "Failed to update profil: " . $koneksi->error;
=======
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
>>>>>>> Stashed changes
    }

    $koneksi->close();

}

//<!-- Pemesanan -->

//<!-- Ulasan & Rating -->

//<!-- Whislist -->
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
