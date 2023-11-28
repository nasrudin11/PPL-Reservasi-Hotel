<?php
    include "koneksi.php";
?>

<!-- Profil -->
    <?php
        function edit_profil_hotel($koneksi, $id_hotel, $file, $nama_hotel, $tlp_hotel, $alamat, $deskripsi, $facilities)
        {
            $gambar = $file["name"];
            $tmp_name = $file["tmp_name"];
            $upload_dir = "../../img/upload/hotel/";

            if (!empty($gambar)) {
                move_uploaded_file($tmp_name, $upload_dir . $gambar);
                $query = "UPDATE hotel SET GAMBAR_HOTEL = '$gambar', NAMA_HOTEL = '$nama_hotel', TLP_HOTEL = '$tlp_hotel', 
                ALAMAT = '$alamat', DESKRIPSI = '$deskripsi' WHERE ID_HOTEL = $id_hotel";
            } else {
                // Jika tidak ada file yang diunggah, update data tanpa memperbarui gambar
                $query = "UPDATE hotel SET NAMA_HOTEL = '$nama_hotel', TLP_HOTEL = '$tlp_hotel', 
                ALAMAT = '$alamat', DESKRIPSI = '$deskripsi' WHERE ID_HOTEL = $id_hotel";
            }

            if (!empty($facilities)) {
                // Hapus fasilitas yang sudah ada untuk hotel ini
                $koneksi->query("DELETE FROM fasilitas_hotel WHERE ID_HOTEL = $id_hotel");
        
                // Masukkan fasilitas baru
                foreach ($facilities as $facility) {
                    $koneksi->query("INSERT INTO fasilitas_hotel (ID_HOTEL, ID_FASILITAS) VALUES ($id_hotel, $facility)");
                }
            }

            if ($koneksi->query($query) === TRUE) {
                return "Profil successful updated";
            } else {
                return "Failed to update profil: " . $koneksi->error;
            }

            $koneksi->close();
        }

    ?>


<!-- Manajemen Kamar -->
<?php

    function tambah_kamar($koneksi, $id_hotel, $tipe_kamar, $harga, $status) {
        $gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $upload_dir = "../../img/upload/kamar/";

        move_uploaded_file($tmp_name, $upload_dir . $gambar);

        $query = "INSERT INTO kamar (id_hotel, id_tipe_kamar, harga_kamar, status_kamar, gambar_kamar) VALUES ('$id_hotel', '$tipe_kamar', '$harga', '$status', '$gambar')";

        if ($koneksi->query($query) === TRUE) {
            return "Room successful added";
        } else {
            return "Failed to add room";
        }
        $koneksi->close();
    }

    function edit_kamar($koneksi, $id_kamar, $tipe_kamar, $harga, $status) {
        $gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $upload_dir = "../../img/upload/kamar/";
    
        // Hanya memindahkan file jika ada file yang diunggah
        if (!empty($gambar)) {
            move_uploaded_file($tmp_name, $upload_dir . $gambar);
            $query = "UPDATE kamar SET id_tipe_kamar = '$tipe_kamar', harga_kamar = '$harga', status_kamar = '$status', gambar_kamar = '$gambar' WHERE id_kamar = $id_kamar";
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa memperbarui gambar
            $query = "UPDATE kamar SET id_tipe_kamar = '$tipe_kamar', harga_kamar = '$harga', status_kamar = '$status' WHERE id_kamar = $id_kamar";
        }
    
        if ($koneksi->query($query) === TRUE) {
            return "Room successful updated";
        } else {
            return "Failed to update room: " . $koneksi->error;
        }
        $koneksi->close();
    }

    function hapus_kamar($koneksi, $id_kamar) {
        // Query untuk menghapus data kamar berdasarkan id_kamar
        $query = "DELETE FROM kamar WHERE id_kamar = '$id_kamar'";
    
        if ($koneksi->query($query) === TRUE) {
            return "Room successfully deleted";
        } else {
            return "Failed to delete room";
        }
    }
    
    
?>


<!-- Notifikasi -->

<?php

// Fungsi untuk mengirim notifikasi
function notif_user($koneksi, $emailUser, $id_hotel, $judul, $pesan) {
    // Periksa apakah pengguna dengan email tersebut ada
    $query = "SELECT email_tamu FROM tamu WHERE email_tamu = '$emailUser'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emailTamu  = $row['email_tamu'];

        // Simpan notifikasi ke database
        $queryInsert = "INSERT INTO notifikasi (email_tamu, id_hotel, judul_notif, pesan_notif, tgl_notif)
                        VALUES ('$emailTamu ', $id_hotel, '$judul', '$pesan', CURRENT_TIMESTAMP)";

        if ($koneksi->query($queryInsert) === TRUE) {
            return "Notification has send successful";
        } else {
            return "Gagal menyimpan notifikasi ke database: " . $koneksi->error;
        }
    } else {
        return "User email not found";
    }
}

?>



