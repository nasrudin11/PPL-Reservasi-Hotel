<?php
    session_start();

    include '../../controller/koneksi.php';

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
        include '../../partials/header.php';
        
    } elseif ($_SESSION['user_type'] === 'tamu') {
        include '../../partials/header-login-noindex.php';
    }
    $email = $_SESSION['email'];

?> 


<div class="container mt-4">
    <h3>Notifikasi</h3>
    <div class="accordion shadow mt-4" id="accordionNotif">
        <?php
            $query = "SELECT JUDUL_NOTIF, PESAN_NOTIF, TGL_NOTIF FROM `notifikasi` WHERE EMAIL_TAMU = '$email' ORDER BY TGL_NOTIF DESC";
            $result = $koneksi->query($query);
            if ($result->num_rows > 0) {
                // Counter untuk memberikan ID unik pada setiap elemen accordion
                $counter = 1;
            
                // Loop melalui setiap baris hasil
                while ($row = $result->fetch_assoc()) {
                    // Buat ID unik untuk setiap elemen accordion
                    $accordionID = 'collapse' . $counter;
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordionID; ?>" aria-expanded="false" aria-controls="<?php echo $accordionID; ?>">
                <div class="w-100">
                    <?php echo $row["JUDUL_NOTIF"]; ?>
                </div>
                <div>
                    <span style="font-size: 12px;"><?php echo date('d M Y', strtotime($row["TGL_NOTIF"])); ?> </span>
                </div>
            </button>
            </h2>
            <div id="<?php echo $accordionID; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionNotif">
            <div class="accordion-body">
                <?php    
                    echo  '<p>'. $row["PESAN_NOTIF"] .'</p>';
                    echo  date('d M Y', strtotime($row["TGL_NOTIF"]));
                ?>
            </div>
            </div>
        </div>


        <?php 
                    $counter++;
                }
            } else {
                // Tampilkan pesan jika tidak ada notifikasi
                echo '<div class="accordion-item">';
                echo '<div class="accordion-header">';
                echo 'Tidak ada notifikasi.';
                echo '</div>';
                echo '</div>';
            }
        
        ?>

    </div>
</div>

           
</body>
</html>