<?php
include 'partials/header-index.php'
?> 

<div class="container-md mt-3">
  <div class="header text-center">
    <h1>Sign Up</h1>
    <p>Sign up and receive promo from staycation</p>
  </div>
  <div class="card shadow p-3 mx-auto" style="width: 450px;">
    <div class="card-body">
      <form>
        <div class="mb-3">
          <label class="form-label" for="basic-default-fullname">Username</label>
          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Input Username" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-default-email">Email</label>
          <div class="input-group input-group-merge">
            <input
              type="text"
              id="basic-default-email"
              class="form-control"
              placeholder="Input Email"
              aria-label="john.doe"
              aria-describedby="basic-default-email2" />
            <span class="input-group-text" id="basic-default-email2">@example.com</span>
          </div>
        </div>
        <div class="mb-3">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-default-phone">Role</label>
          <div class="mb-3">
            <select id="defaultSelect" class="form-select">
              <option>Choose Role</option>
              <option value="1">User/Customer</option>
              <option value="2">Hotel</option>
            </select>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-signup-custom">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>

