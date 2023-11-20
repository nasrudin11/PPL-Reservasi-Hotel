<?php
include 'partials/header-index.php';

include 'controller/daftar.php';
?> 

<div class="container-md mt-3">
  <div class="header text-center">
    <h1>Sign Up</h1>
    <p>Sign up and receive promo from staycation</p>
  </div>
  <div class="card shadow p-3 mx-auto border-0" style="width: 450px;">
    <div class="card-body">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Username</label>
            <input type="text" name="username" class="form-control" id="basic-default-fullname" placeholder="Input username" required />
        </div>

        <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
                <input type="text" name="email" id="basic-default-email" class="form-control" placeholder="Input email" aria-label="john.doe" aria-describedby="basic-default-email2" required />
                <span class="input-group-text" id="basic-default-email2">@example.com</span>
            </div>
        </div>

        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Input password" required />
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="userRole" value="1" checked>
                <label class="form-check-label" for="userRole">Customer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="adminRole" value="2">
                <label class="form-check-label" for="adminRole">Admin Hotel</label>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-signup-custom">Sign Up</button>
        </div>
      </form>

      <!-- Modal Bootstrap untuk Pesan Sukses -->
      <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h5>Your registration is successful!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

