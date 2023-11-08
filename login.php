<?php
include 'partials/header.php'
?> 

<section class="login d-flex">
  <div class="login-left w-50 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-6">
        <div class="header">
          <h1>Welcome Back</h1>
          <p>Welcome back! Please enter your details</p>
        </div>

        <div class="login-form">
          <!-- Form Login -->
          <form action="dashboard/user/user.php">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">

            <a href="#" class="text-decoration-none text-center">Forgot password?</a>
            <button class="login">Login</button>
          </form>

          <div class="text-center">
            <span class="d-inline">Don't have an account? 
              <a href="signup.php" class="signup d-inline text-decoration-none">Sign up for free</a>
            </span>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="login-right w-50 h-100">   
    <div id="carouselLoginFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/login/1.svg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="img/login/2.svg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
          <img src="img/login/3.svg" class="d-block w-100" alt="Slide 3">
        </div>
      </div>
    </div>

  </div>
</section>

<?php
  include 'partials/footer.php'
 ?> 
