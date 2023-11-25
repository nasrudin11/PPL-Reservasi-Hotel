<?php
    session_start();
    include '../../controller/hotel-crud.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_message = edit_profil_hotel($koneksi, $_SESSION['id_hotel'], 
                $_FILES["gambar"], $_POST["nama_hotel"], $_POST["tlp_hotel"], 
                $_POST["alamat"] , $_POST["deskripsi"], isset($_POST["facilities"]) ? $_POST["facilities"] : []);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
        
      }
    include '../../partials/header-hotel.php';
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
      <div class="container mt-4">
        <?php
          if (isset($_GET['status'])) {
            echo '<div class="alert alert-' . (strpos($_GET['status'], 'successful') !== false ? 'success' : 'danger') . '" status="alert">
                    ' . urldecode($_GET['status']) . '
                  </div>';
          }
        ?>
      </div>
                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
            <div class="card-body">

            <?php

            $id = $_SESSION['id_hotel'];
            $query = "SELECT hotel.*
                    FROM hotel WHERE hotel.id_hotel = $id";
            $result = $koneksi->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">Email</label>
                    <input type="text" id="basic-default-email" class="form-control" value="<?php echo $row['EMAIL_HOTEL']; ?>" disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Image</label><br>
                    <input type="file" class="form-control" id="basic-default-image" name="gambar" value="<?php echo $row['GAMBAR_HOTEL']; ?>"/>
                </div>
                <div class="mb-3">
                    <img src="../../img/upload/hotel/<?php echo $row['GAMBAR_HOTEL']; ?>"  class="rounded" width="400" alt="<?php echo $row['GAMBAR_HOTEL']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Name Hotel</label>
                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_hotel" value="<?php echo $row['NAMA_HOTEL']; ?>"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Phone No</label>
                    <input type="text" id="basic-default-phone" class="form-control phone-mask" name="tlp_hotel" value="<?php echo $row['TLP_HOTEL']; ?>"/>
                </div>

                <?php $queryFasiltas = "SELECT hotel.id_hotel, fasilitas.NAMA_FASILITAS 
                    FROM hotel 
                    LEFT JOIN fasilitas_hotel ON hotel.id_hotel = fasilitas_hotel.id_hotel 
                    LEFT JOIN fasilitas ON fasilitas_hotel.ID_FASILITAS = fasilitas.ID_FASILITAS
                    WHERE hotel.id_hotel = $id";

                    $resultFasilitiy = $koneksi->query($queryFasiltas);
                    $selectedFacilities = array();

                    if ($result) {
                        while ($rowFasiliy = $resultFasilitiy->fetch_assoc()) {
                            $selectedFacilities[] = $rowFasiliy['NAMA_FASILITAS'];
                        }
                    }

                ?>


                <!-- Fasilitas -->
                <label class="form-label" for="basic-default-fullname">fasilities</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="1" id="breakfast" <?php if (in_array("Breakfast", $selectedFacilities)) echo "checked"; ?>>
                    <label class="form-check-label" for="breakfast">
                        Breakfast
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="2" id="wifi" <?php if (in_array('Free Wifi', $selectedFacilities)) echo "checked"; ?>>
                    <label class="form-check-label" for="wifi">
                        Free Wifi
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="3" id="spa" <?php if (in_array('Spa', $selectedFacilities)) echo "checked"; ?>>
                    <label class="form-check-label" for="spa">
                        Spa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="4" id="gym" <?php if (in_array('Gym', $selectedFacilities)) echo "checked"; ?>>
                    <label class="form-check-label" for="gym">
                        Gym
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="5" id="swimmingPool" <?php if (in_array('Swimming Pool', $selectedFacilities)) echo "checked"; ?>>
                    <label class="form-check-label" for="swimmingPool">
                        Swimming Pool
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Addres</label>
                    <input type="text" class="form-control" id="basic-default-company" name="alamat" value="<?php echo $row['ALAMAT']; ?>"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Description</label>
                    <textarea id="basic-default-message" class="form-control custom-textarea-class" name="deskripsi" 
                    style=" height: 200px;"><?php echo $row['DESKRIPSI']; ?></textarea>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>

            <?php
                    
                }       

            }else {
                echo "Error: " . $koneksi->error;
            }
                $koneksi->close();
        
            ?>
            </div>

        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 

