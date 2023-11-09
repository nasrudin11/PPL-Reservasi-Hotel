<?php
    include '../../partials/header-hotel.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->

      <div class="container mt-4">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
      </div>

      <!-- Modal Tambah Data -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Full Name</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Company</label>
                  <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-email">Email</label>
                  <div class="input-group input-group-merge">
                  <input
                      type="text"
                      id="basic-default-email"
                      class="form-control"
                      placeholder="john.doe"
                      aria-label="john.doe"
                      aria-describedby="basic-default-email2" />
                  <span class="input-group-text" id="basic-default-email2">@example.com</span>
                  </div>
                  <div class="form-text">You can use letters, numbers & periods</div>
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">Phone No</label>
                  <input
                  type="text"
                  id="basic-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Message</label>
                  <textarea
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
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
                <th>Type Room</th>
                <th>guest</th>
                <th>bed</th>
                <th>Fasilitas</th>
                <th>price</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td>1</td>
                  <td>
                    <img src="../../img/01.png" class="rounded" width="100" alt="Gambar Hotel">
                    Twin Bed
                  </td>
                  <td>2</td>
                  <td>2</td>
                  <td>Fasilitas</td>
                  <td>Rp. 1000000</td>
                  <td><span class="badge bg-label-success me-1">Available</span></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <img src="../../img/01.png" class="rounded" width="100" alt="Gambar Hotel">
                    Twin Bed
                  </td>
                  <td>2</td>
                  <td>2</td>
                  <td>Fasilitas</td>
                  <td>Rp. 1000000</td>
                  <td><span class="badge bg-label-warning me-1">Full</span></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 