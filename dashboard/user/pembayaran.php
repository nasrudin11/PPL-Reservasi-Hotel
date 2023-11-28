<?php
    session_start();
    include '../../controller/user-crud.php';
    include '../../controller/koneksi.php';   
    include '../../partials/header-login-noindex.php';

    $ambil_id = $_GET['id_pemesanan'];

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type']) || $_SESSION['user_type'] !== 'tamu') {
        header("Location: ../../login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        pembayaran_kamar($koneksi, $_POST['metode_pembayaran'], $_POST['id_pemesanan'], $_POST['total_biaya'], $_POST['upload_file'], $_SESSION['email'], $_POST['nama_hotel']);
    }

    $query = "SELECT pemesanan.*, metode_pembayaran.nama_metode_pembayaran, hotel.nama_hotel
        FROM
            pemesanan
        JOIN
            metode_pembayaran ON pemesanan.id_metode_pembayaran = metode_pembayaran.id_metode_pembayaran
        JOIN
            detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
        JOIN
            hotel ON detail_pemesanan.id_hotel = hotel.id_hotel
        WHERE
            pemesanan.id_pemesanan = $ambil_id"; 


    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_pemesanan = $row['ID_PEMESANAN'];
        $nama_hotel = $row['nama_hotel'];
        $nama_metode = $row['nama_metode_pembayaran'];
        $metode_pembayaran = $row['ID_METODE_PEMBAYARAN'];
        $total_biaya = $row['TOTAL_BIAYA'];
    } else {
        echo "data error";
    }
    $koneksi->close();
?>

<div class="container mt-4">
    <div class="alert alert-info text-center">
        <div id="countdown"></div>
    </div>

    <div class="card shadow p-3">
        <div class="card-body">
            <h5 class="mb-2">Pemesanan berhasil! Silakan lanjutkan ke proses pembayaran</h5>
            <p class="mb-0">1. Pembayaran yang anda lalukan menggunakan <?php echo $nama_metode; ?>.</p>
            <p class="mb-0">2. Pembayaran harus dilakukan dalam waktu 24 jam.</p>
            <p class="mb-0">3. Uplod bukti pembayaran 
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_pemesanan=<?php echo $ambil_id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan ?>">
                        <input type="hidden" name="nama_hotel" value="<?php echo $nama_hotel ?>">
                        <input type="hidden" name="metode_pembayaran" value="<?php echo $metode_pembayaran ?>">
                        <input type="hidden" name="total_biaya" value="<?php echo $total_biaya ?>">
                    <div class="mb-3 mt-3">
                        <input type="file" class="form-control" name="upload_file" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" id="tombol">Upload</button>
                </form>
            </p>
        </div>
    </div>
</div>



<?php
  include '../../partials/footer.php'
 ?> 

<script>
    // Implementasi countdown timer menggunakan JavaScript
    var countdownDate = new Date().getTime() + (24 * 60 * 60 * 1000); // Tambahkan 24 jam (dalam milidetik) ke waktu sekarang

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countdownDate - now;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = hours + " jam " + minutes + " menit " + seconds + " detik.";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Waktu pembayaran telah berakhir.";
        }
    }, 1000);
</script>