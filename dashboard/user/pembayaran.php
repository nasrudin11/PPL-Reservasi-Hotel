<?php
    session_start();
    include '../../controller/koneksi.php';
    include '../../partials/header-login-noindex.php';

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type']) || $_SESSION['user_type'] !== 'tamu') {
        header("Location: ../../login.php");
    }

    $query = "SELECT harga_kamar FROM kamar WHERE id_kamar = 13"; // Ganti sesuai struktur tabel dan kebutuhan

    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hargaKamarDefault = $row['harga_kamar'];
    } else {
        echo "data error";
    }
    $koneksi->close();
?>

<h1>Berhasil yeey</h1>


<?php
  include '../../partials/footer.php'
 ?> 
