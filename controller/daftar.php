<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $table = "";
    $nama_column = "";
    
    if ($role == "1") {
        $table = "tamu";
        $nama_column = "nama_tamu";
    } elseif ($role == "2") {
        $table = "admin";
        $nama_column = "nama_admin";
    } else {
        echo "Role tidak valid.";
        exit(); 
    }

    $query = "INSERT INTO $table (email_$table, password, $nama_column) VALUES ('$email', '$hashed_password', '$username')";

    if ($koneksi->query($query) === TRUE) {
        // Menampilkan pesan sukses menggunakan modal Bootstrap
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                        keyboard: false
                    });
                    myModal.show();
                });
            </script>";
    } else {
        echo "<div class='alert alert-danger'>Register Failed</div>";
    }
    
    // Tutup koneksi
    $koneksi->close();
}
?>
