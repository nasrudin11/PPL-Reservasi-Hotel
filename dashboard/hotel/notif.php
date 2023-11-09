<?php
    include '../../partials/header-hotel.php'
?> 

    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
     
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="card mb-4">
          <div class="card-body">
          <form>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Customer</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name account customer" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Notifications</label>
                  <input type="text" class="form-control" id="basic-default-company" placeholder="Title for notifications" />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Message</label>
                  <textarea
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Write your massage"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 