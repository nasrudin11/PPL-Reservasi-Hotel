<?php
  session_start();
  include '../../controller/hotel-crud.php';
  $slug = 'promosi';
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) { 
        $error_message = tambah_promosi($koneksi, $_SESSION['id_hotel']);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
    } elseif (isset($_POST['update'])) {
        $error_message = edit_promosi($koneksi, $_POST["id_promosi"]);

        $redirect_url = $_SERVER['PHP_SELF'] . "?status=" . urlencode($error_message);
        header("Location: $redirect_url");
        exit();
    }elseif(isset($_POST['hapus'])) {
      hapus_promosi($koneksi,$_POST['id_promosi_hapus']);


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
            <h5 class="modal-title" id="exampleModalLabel">Add Promosi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Image</label>
                    <input type="file" class="form-control" id="basic-default-image" name="gambar"/>
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

              <?php
                  $id = $_SESSION['id_hotel'];
                  $query = "SELECT * FROM promosi WHERE id_hotel = $id";
                  $result = $koneksi->query($query);

                  $no = 1;

                  if ($result) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td><img src='../../img/promosi/" . $row['PROMOSI'] . "' class='rounded' width='500' alt='$row[PROMOSI]'></td>";
                          echo "<td>
                                  <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                      <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                      <a class='dropdown-item' href='javascript:void(0);' data-bs-toggle='modal' data-bs-target='#editModal" . $row['ID_PROMOSI'] . "'>
                                        <i class='bx bx-edit-alt me-1'></i> Edit
                                      </a>
                                      <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#konfirmasiModal" . $row['ID_PROMOSI'] . "'>
                                        <i class='bx bx-trash me-1'></i> Delete
                                      </a>
                                    </div>
                                  </div>
                                </td>";
                          echo "</tr>";
                ?>

                  <!-- Edit Modal -->
                    <div class='modal fade' id='editModal<?php echo $row['ID_PROMOSI']; ?>' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Promosi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_promosi" value="<?php echo $row['ID_PROMOSI']; ?>">
                                          <div class="mb-3">
                                              <label class="form-label" for="basic-default-image">Image</label>
                                              <input type="file" class="form-control" id="basic-default-image" name="gambar"/>
                                          </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="konfirmasiModal<?php echo $row['ID_PROMOSI']; ?>" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
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
                                      <input type='hidden' name='id_promosi_hapus' value='<?php echo $row['ID_PROMOSI']; ?>'>
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