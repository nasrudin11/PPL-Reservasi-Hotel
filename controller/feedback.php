<?php

    function tambah_feedback($koneksi, $nama, $email, $deskripsi) {
        // Buat SQL statement untuk insert ulasan
        $sql = "INSERT INTO feedback (nama, email, deskripsi) VALUES ('$nama', '$email', '$deskripsi')";

        // Jalankan query
        if ($koneksi->query($sql) === TRUE) {
            setcookie("success_message", "Your review has send successful !!", time() + 3600, "/");
            header("Location: feedback.php");
            exit();
        } else {
            return false; 
        }
    }

?>