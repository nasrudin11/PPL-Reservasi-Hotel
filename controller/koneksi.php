<?php

    $koneksi = new mysqli("localhost", "root", "", "reservasi_hotel_db");

    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }
    
?>
