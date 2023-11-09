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
                    <label class="form-label" for="basic-default-fullname">Name Hotel</label>
                    <input type="text" class="form-control" id="basic-default-fullname" value="ASTON Priority Simatupang & Conference Center" disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Addres</label>
                    <input type="text" class="form-control" id="basic-default-company" value="Jln Raya Gubeng, Surabaya " disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">Email</label>
                    <input
                        type="text"
                        id="basic-default-email"
                        class="form-control"
                        value="astonhotel@gmailcom" disabled
                        aria-label="john.doe"
                        aria-describedby="basic-default-email2" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Phone No</label>
                    <input
                    type="text"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    value="658 799 8941" disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Description</label>
                    <textarea
                    id="basic-default-message"
                    class="form-control"
                    disabled></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit Profil</button>
                </form>
            </div>

        </div>


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 

