<?php
  session_start();
  include '../../controller/hotel-crud.php';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) { // Perubahan di sini
        $error_message = tambah_kamar($koneksi, $_SESSION['id_hotel'], $_POST["tipe_kamar"], $_POST["harga"], $_POST["status"]);

        // Redirect dengan menyertakan pesan kesalahan
        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
    } elseif (isset($_POST['update'])) {
      $error_message = edit_kamar($koneksi, $_POST["id_kamar"], $_POST["tipe_kamar"], $_POST["harga"], $_POST["status"]);

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
                <div class="mb-3">
                    <label class="form-label" for="basic-default-price">Price</label>
                    <input type="text" class="form-control" id="basic-default-price" name="harga"/>
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

              <?php
                  $id = $_SESSION['id_hotel'];
                  $query = "SELECT kamar.id_kamar, kamar.gambar_kamar, kamar.id_tipe_kamar, tipe_kamar.tipe_kamar, kamar.harga_kamar, kamar.status_kamar
                            FROM kamar
                            JOIN tipe_kamar ON kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar 
                            WHERE id_hotel = $id";
                  $result = $koneksi->query($query);

                  $no = 1;

                  if ($result) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td><img src='../../img/upload/kamar/" . $row['gambar_kamar'] . "' class='rounded' width='100' alt='$row[gambar_kamar]'></td>";
                          echo "<td>" . $row['tipe_kamar'] . "</td>";
                          echo "<td>Rp. " . number_format($row['harga_kamar']) . "</td>";
                          echo "<td><span class='badge " . ($row['status_kamar'] == 'Available' ? 'bg-label-success' : 'bg-label-danger') . " me-1'>" . $row['status_kamar'] . "</span></td>";
                          echo "<td>
                                  <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                      <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                      <a class='dropdown-item' href='javascript:void(0);' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id_kamar'] . "'>
                                        <i class='bx bx-edit-alt me-1'></i> Edit
                                      </a>
                                      <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#konfirmasiModal" . $row['id_kamar'] . "'>
                                        <i class='bx bx-trash me-1'></i> Delete
                                      </a>
                                    </div>
                                  </div>
                                </td>";
                          echo "</tr>";
                ?>
                  <!-- Edit Modal -->
                    <div class='modal fade' id='editModal<?php echo $row['id_kamar']; ?>' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Room</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_kamar" value="<?php echo $row['id_kamar']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-image">Image</label>
                                            <input type="file" class="form-control" id="basic-default-image" name="gambar" value="<?php echo $row['gambar_kamar']; ?>"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-room">Room Type</label>
                                            <select class="form-select" id="basic-default-room" name="tipe_kamar">
                                                <option value="1" <?php echo ($row['id_tipe_kamar'] == 1 ? 'selected' : '') ?> >Single Bed Room</option>
                                                <option value="2" <?php echo ($row['id_tipe_kamar'] == 2 ? 'selected' : '') ?> >Double Bed Room</option>
                                                <option value="3" <?php echo ($row['id_tipe_kamar'] == 3 ? 'selected' : '') ?> >Twin Room</option>
                                                <option value="4" <?php echo ($row['id_tipe_kamar'] == 4 ? 'selected' : '') ?> >Triple Room</option>
                                                <option value="5" <?php echo ($row['id_tipe_kamar'] == 5 ? 'selected' : '') ?> >Quad Room</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-price">Price</label>
                                            <input type="text" class="form-control" id="basic-default-price" name="harga" value="<?php echo $row['harga_kamar']; ?>"/>
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label">Status</label><br>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="roomStatusAvailable" value="Available" <?php echo ($row['status_kamar'] == 'Available') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="roomStatusAvailable">Available</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="roomStatusUnavailable" value="Unavailable" <?php echo ($row['status_kamar'] == 'Unavailable') ? 'checked' : ''; ?>>
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
                  <div class="modal fade" id="konfirmasiModal<?php echo $row['id_kamar']; ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
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
                                      <input type='hidden' name='id_kamar_hapus' value='<?php echo $row['id_kamar']; ?>'>
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