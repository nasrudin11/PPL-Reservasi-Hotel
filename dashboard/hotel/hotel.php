<?php
  session_start();
  include '../../controller/hotel-crud.php';
  $slug = 'manajemen-kamar';
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) { 
        $error_message = tambah_kamar($koneksi, $_SESSION['id_hotel'], $_POST["tipe_kamar"], $_POST["ruangan"], $_POST["harga"], $_POST["status"], $_POST["dewasa"], $_POST["anak"]);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
    } elseif (isset($_POST['update'])) {
        $error_message = edit_kamar($koneksi, $_POST["id_kamar"], $_POST["tipe_kamar"], $_POST["harga"], $_POST["status"], $_POST['ruangan'], $_POST["dewasa"], $_POST["anak"]);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
    }elseif(isset($_POST['hapus'])) {
      hapus_kamar($koneksi,$_POST['id_kamar_hapus']);


      $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode("Room deleted successfully");
      header("Location: $redirect_url");
      exit();
    }
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

        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
      </div>

      <!-- Modal Tambah Data -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Image</label>
                    <input type="file" class="form-control" id="basic-default-image" name="gambar"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-room">Room Type</label>
                    <select class="form-select" id="basic-default-room" name="tipe_kamar">
                      <option value="1">Single Bed Room</option>
                      <option value="2">Double Bed Room</option>
                      <option value="3">Twin Room</option>
                      <option value="4">Triple Room</option>
                      <option value="5">Quad Room</option>
                  </select>

                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label" for="basic-default-price">Room</label>
                    <input type="text" class="form-control" id="basic-default-price" name="ruangan"/>
                  </div>
                  <div class="col">
                    <label class="form-label" for="basic-default-price">Price</label>
                    <input type="text" class="form-control" id="basic-default-price" name="harga"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label class="form-label" for="basic-default-dewasa">Max Dewasa</label>
                    <input type="text" class="form-control" id="basic-default-dewasa" name="dewasa"/>
                  </div>
                  <div class="col">
                    <label class="form-label" for="basic-default-anak">Max Anak</label>
                    <input type="text" class="form-control" id="basic-default-anak" name="anak"/>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">status</label><br>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="roomStatusAvailable" value="Available" checked>
                      <label class="form-check-label" for="roomStatusAvailable">Available</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="roomStatusUnavailable" value="Unavailable">
                      <label class="form-check-label" for="roomStatusUnavailable">Unavailable</label>
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
        </div>
    </div>

                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>no</th>
                <th>Image</th>
                <th>Type Room</th>
                <th>price</th>
                <th>Status</th>
                <th>Rooms</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

              <?php
                  $id = $_SESSION['id_hotel'];
                  $query = "SELECT kamar.* , tipe_kamar.TIPE_KAMAR FROM kamar
                            JOIN tipe_kamar ON kamar.ID_TIPE_KAMAR = tipe_kamar.ID_TIPE_KAMAR 
                            WHERE id_hotel = $id";
                  $result = $koneksi->query($query);

                  $no = 1;

                  if ($result) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td><img src='../../img/upload/kamar/" . $row['GAMBAR_KAMAR'] . "' class='rounded' width='100' alt='$row[GAMBAR_KAMAR]'></td>";
                          echo "<td>" . $row['TIPE_KAMAR'] . "</td>";
                          echo "<td>Rp. " . number_format($row['HARGA_KAMAR']) . "</td>";
                          echo "<td><span class='badge " . ($row['STATUS_KAMAR'] == 'Available' ? 'bg-label-success' : 'bg-label-danger') . " me-1'>" . $row['STATUS_KAMAR'] . "</span></td>";
                          echo "<td>". $row['JUMLAH_RUANGAN']. "</td>"; 
                          echo "<td>
                                  <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                      <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                      <a class='dropdown-item' href='javascript:void(0);' data-bs-toggle='modal' data-bs-target='#editModal" . $row['ID_KAMAR'] . "'>
                                        <i class='bx bx-edit-alt me-1'></i> Edit
                                      </a>
                                      <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#konfirmasiModal" . $row['ID_KAMAR'] . "'>
                                        <i class='bx bx-trash me-1'></i> Delete
                                      </a>
                                    </div>
                                  </div>
                                </td>";
                          echo "</tr>";
                ?>

                  <!-- Edit Modal -->
                    <div class='modal fade' id='editModal<?php echo $row['ID_KAMAR']; ?>' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Room</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_kamar" value="<?php echo $row['ID_KAMAR']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-image">Image</label>
                                            <input type="file" class="form-control" id="basic-default-image" name="gambar" value="<?php echo $row['GAMBAR_KAMAR']; ?>"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-room">Room Type</label>
                                            <select class="form-select" id="basic-default-room" name="tipe_kamar">
                                                <option value="1" <?php echo ($row['ID_TIPE_KAMAR'] == 1 ? 'selected' : '') ?> >Single Bed Room</option>
                                                <option value="2" <?php echo ($row['ID_TIPE_KAMAR'] == 2 ? 'selected' : '') ?> >Double Bed Room</option>
                                                <option value="3" <?php echo ($row['ID_TIPE_KAMAR'] == 3 ? 'selected' : '') ?> >Twin Room</option>
                                                <option value="4" <?php echo ($row['ID_TIPE_KAMAR'] == 4 ? 'selected' : '') ?> >Triple Room</option>
                                                <option value="5" <?php echo ($row['ID_TIPE_KAMAR'] == 5 ? 'selected' : '') ?> >Quad Room</option>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                          <div class="col">
                                            <label class="form-label" for="basic-default-price">Room</label>
                                            <input type="text" class="form-control" id="basic-default-price" name="ruangan" value="<?php echo $row['JUMLAH_RUANGAN']; ?>"/>
                                          </div>
                                          <div class="col">
                                            <label class="form-label" for="basic-default-price">Price</label>
                                            <input type="text" class="form-control" id="basic-default-price" name="harga" value="<?php echo $row['HARGA_KAMAR']; ?>"/>
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <div class="col">
                                            <label class="form-label" for="basic-default-dewasa">Max Dewasa</label>
                                            <input type="text" class="form-control" id="basic-default-dewasa" value="<?php echo $row['DEWASA']; ?>"/>
                                          </div>
                                          <div class="col">
                                            <label class="form-label" for="basic-default-anak">Max Anak</label>
                                            <input type="text" class="form-control" id="basic-default-anak" value="<?php echo $row['ANAK']; ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label">Status</label><br>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="roomStatusAvailable" value="Available" <?php echo ($row['STATUS_KAMAR'] == 'Available') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="roomStatusAvailable">Available</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="roomStatusUnavailable" value="Unavailable" <?php echo ($row['STATUS_KAMAR'] == 'Unavailable') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="roomStatusUnavailable">Unavailable</label>
                                          </div>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="konfirmasiModal<?php echo $row['ID_KAMAR']; ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="konfirmasiModalLabel">Delete Conformation</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <p>Are you sure you want to delete this room?</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
                                      <input type='hidden' name='id_kamar_hapus' value='<?php echo $row['ID_KAMAR']; ?>'>
                                      <button type='submit' name='hapus' class='btn btn-danger'>Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>


                <?php
                      }

                      $result->free();
                  } else {
                      echo "Error: " . $koneksi->error;
                  }

                    $koneksi->close();
              ?>

            </tbody>
          </table>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 