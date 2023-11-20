<?php
session_start();

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include 'partials/header-index.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
  $slug = 'feedback'; 
  $imagePath = ($slug === 'feedback') ? 'img/user.png' : '../../img/user.png';
  $imageLogo = ($slug === 'feedback') ? 'img/logo/logo.png' : '../../img/logo/logo.png';
  $home = ($slug === 'feedback') ? 'dashboard/user/user.php' :'user.php';
  $about = ($slug === 'feedback') ? 'about.php' : '../../about.php';
  $feed = ($slug === 'feedback') ? 'feedback.php' : '../../feedback.php';
  $logout = ($slug === 'feedback') ? 'controller/logout.php' : '../../controller/logout.php';

  include 'partials/header-login-noindex.php';
}
?>

<!-- Konten Feedback -->
<div id="rekomendasi" class="container mt-5" style="width: 1000px;">
  <div class="mb-4 text-center">
    <h2>Feedback</h2>
  </div>

  <div class="row">
    <!-- Kiri -->
    <div class="col">
      <div class="card shadow mt-4 p-3 border-0">
        <div class="card-body">
          <h4>Contact Us</h4>
          <p>Nomor Telepon: +62 123 456 789</p>
          <p>Nomor Telepon: +62 123 456 789</p>
          <p>Nomor Telepon: +62 123 456 789</p>
          <p>Email: info@example.com</p>
        </div>
      </div>
    </div>

    <!-- Kanan -->
    <div class="col">
      <div class="card shadow mt-4 p-3 border-0">
        <div class="card-body">
          <h4>Form Feedback</h4>
          <form action="/submit_feedback" method="post">
            <!-- Tambahkan elemen formulir sesuai kebutuhan, seperti input, textarea, dll. -->
            <div class="mb-3">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="feedback">Feedback</label>
              <textarea class="form-control" id="feedback" name="feedback" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-custom-feed">Send Feedback</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include 'partials/footer.php'
 ?> 


