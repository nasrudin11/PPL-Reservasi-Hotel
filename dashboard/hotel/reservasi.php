<?php
    include '../../partials/header-hotel.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
                
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>no</th>
                <th>User</th>
                <th>Email</th>
                <th>Check in/out</th>
                <th>Payment</th>
                <th>phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td>1</td>
                    <td>Rizqi Rutanto</td>
                    <td>rizqi@gmail.com</td>
                    <td>9 Nov - 12 Nov, 2023</td>
                    <td>BCA Virtual Account</td>
                    <td>0813453272</td>
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
                    <td>Rina Angelica</td>
                    <td>rina@gmail.com</td>
                    <td>12 Nov - 15 Nov, 2023</td>
                    <td>Mandiri Virtual Account</td>
                    <td>0813453272</td>
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