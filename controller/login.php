<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $queryAdmin = "SELECT * FROM admin WHERE email_admin = '$email'";
    $resultAdmin = $koneksi->query($queryAdmin);

    $queryTamu = "SELECT * FROM tamu WHERE email_tamu = '$email'";
    $resultTamu = $koneksi->query($queryTamu);

    if ($resultAdmin->num_rows > 0) {
        $rowAdmin = $resultAdmin->fetch_assoc();
        if (isset($rowAdmin["PASSWORD"])) {
            $hashed_password = $rowAdmin["PASSWORD"];
            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["user_type"] = "admin";
                $_SESSION["email"] = $email;
                $_SESSION["nama_admin"] = $rowAdmin["NAMA_ADMIN"];
                header("Location: dashboard/hotel/hotel.php");
                exit(); 
            } else {
                $error_message = "Kata sandi salah.";
            }
        } 
    } elseif ($resultTamu->num_rows > 0) {
        $rowTamu = $resultTamu->fetch_assoc();
        if (isset($rowTamu["PASSWORD"])) {
            $hashed_password = $rowTamu["PASSWORD"];
            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["user_type"] = "tamu";
                $_SESSION["email"] = $email;
                $_SESSION["nama_tamu"] = $rowTamu["NAMA_TAMU"];
                header("Location: dashboard/user/user.php");
                exit();
            } else {
                echo $rowTamu["PASSWORD"];
                $error_message = "Kata sandi salah.";
            }
        } 
    } else {
        $error_message = "User tidak ditemukan.";
    }

    $koneksi->close();
}
?>
