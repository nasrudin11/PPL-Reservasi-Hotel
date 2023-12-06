<?php
session_start();

if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
    include 'partials/header-index.php';
    
} elseif ($_SESSION['user_type'] === 'tamu') {
  $slug = 'about'; 
  $style = ($slug === 'about') ? 'style.css' : '../../style.css';
  $imagePath = ($slug === 'about') ? 'img/user.png' : '../../img/user.png';
  $imageLogo = ($slug === 'about') ? 'img/logo/logo.png' : '../../img/logo/logo.png';
  $home = ($slug === 'about') ? 'dashboard/user/user.php' :'user.php';
  $about = ($slug === 'about') ? 'about.php' : '../../about.php';
  $feed = ($slug === 'about') ? 'feedback.php' : '../../feedback.php';
  $logout = ($slug === 'about') ? 'controller/logout.php' : '../../controller/logout.php';

  include 'partials/header-login-noindex.php';
}

?>

<!-- Konten About -->
<div id="rekomendasi" class="container mt-5" style="width : 1000px;">
  <div class="mb-4 text-center">
    <h2 >About Us</h2>
  </div>

  <div class="row">
    <!-- Kiri -->
    <div class="col">
      <div class="card shadow mt-4 p-3 border-0">
          <div class="card-body">
          <h5>Our Journey: Crafting Unforgettable Stays Since 2023</h5>

          <p>Welcome to Staycation, a pioneer in revolutionizing the way you experience travel 
          and hospitality. Our story began in 2023, driven by a passion for creating seamless, 
          memorable getaways for every traveler.</p>

          <h5>Founding Vision</h5>

          <p>Staycation was founded on the belief that travel should be an immersive and enriching 
          experience. The founders, avid travelers themselves, envisioned a platform that would 
          simplify the journey of discovering and booking exceptional accommodations around the globe.</p>

          <h5>Milestones</h5>
          <ul>
            <li>
              <span class="mini-header-about">Inception (2023):</span> Staycation was born out of a shared love for exploration and a desire 
              to provide a one-stop solution for travelers seeking the perfect stay.
            </li>
            <li>
              <span class="mini-header-about">Expansion (2023):</span> We quickly expanded our partnerships with hotels worldwide, curating 
              a diverse collection that caters to every travel preference.
            </li>
            <li>
              <span class="mini-header-about">Technological Advancements (2023):</span> Embracing innovation, Staycation introduced cutting-edge 
                features to enhance user experience, making the reservation process more accessible and enjoyable.
            </li>
            <li>
              <span class="mini-header-about">Community Growth (2023):</span> Our community of Staycation enthusiasts grew, allowing us to negotiate
              exclusive deals and offers for our loyal members.
            </li>
          </ul>

          <h5>Our Commitment</h5>

          <p>Staycation is not just a reservation platform; it's a commitment to elevating your travel 
          experience. Every hotel partnered with us shares our dedication to excellence, ensuring 
          that each stay leaves a lasting impression.</p>

          <h5>The Future</h5>

          <p>As we continue to evolve, Staycation remains devoted to staying ahead of travel trends, 
          anticipating your needs, and providing you with unparalleled service. Join us on this 
          exciting journey as we redefine the world of hospitality, one stay at a time.</p>

          Thank you for being part of the Staycation story. Here's to many more adventures together!

          </div>
      </div>
    </div>

    <!-- Kanan -->
    <div class="col">
      <div class="card shadow mt-4 p-3 border-0">
          <div class="card-body">
          <h5>Our Journey: Crafting Unforgettable Stays Since 2023</h5>

          <p>Welcome to Staycation, a pioneer in revolutionizing the way you experience travel 
          and hospitality. Our story began in 2023, driven by a passion for creating seamless, 
          memorable getaways for every traveler.</p>

          <h5>Founding Vision</h5>

          <p>Staycation was founded on the belief that travel should be an immersive and enriching 
          experience. The founders, avid travelers themselves, envisioned a platform that would 
          simplify the journey of discovering and booking exceptional accommodations around the globe.</p>

          <h5>Milestones</h5>
          <ul>
            <li>
              <span class="mini-header-about">Inception (2023):</span> Staycation was born out of a shared love for exploration and a desire 
              to provide a one-stop solution for travelers seeking the perfect stay.
            </li>
            <li>
              <span class="mini-header-about">Expansion (2023):</span> We quickly expanded our partnerships with hotels worldwide, curating 
              a diverse collection that caters to every travel preference.
            </li>
            <li>
              <span class="mini-header-about">Technological Advancements (2023):</span> Embracing innovation, Staycation introduced cutting-edge 
                features to enhance user experience, making the reservation process more accessible and enjoyable.
            </li>
            <li>
              <span class="mini-header-about">Community Growth (2023):</span> Our community of Staycation enthusiasts grew, allowing us to negotiate
              exclusive deals and offers for our loyal members.
            </li>
          </ul>

          <h5>Our Commitment</h5>

          <p>Staycation is not just a reservation platform; it's a commitment to elevating your travel 
          experience. Every hotel partnered with us shares our dedication to excellence, ensuring 
          that each stay leaves a lasting impression.</p>

          <h5>The Future</h5>

          <p>As we continue to evolve, Staycation remains devoted to staying ahead of travel trends, 
          anticipating your needs, and providing you with unparalleled service. Join us on this 
          exciting journey as we redefine the world of hospitality, one stay at a time.</p>

          Thank you for being part of the Staycation story. Here's to many more adventures together!

          </div>
      </div>
    </div>
  </div>
</div>

<?php
  include 'partials/footer.php'
 ?> 

<style>
    body {
        background-color: #f0f0f0; /* Ganti dengan warna atau URL gambar sesuai keinginan */
    }
</style>
