<?php
    session_start();

    include '../../controller/koneksi.php';
    include '../../controller/user-crud.php';

    $style =  '../../style.css';
    $imagePath ='../../img/user.png';
    $imageLogo = '../../img/logo/logo.png';
    $home = 'user.php';
    $about =  '../../about.php';
    $feed = '../../feedback.php';
    $logout = '../../controller/logout.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        tambahUlasan($koneksi, $_GET['id'], $_SESSION['email'], $_POST['rating'], $_POST['review']);
      }

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type'])) {
        include '../../partials/header.php';
        
    } elseif ($_SESSION['user_type'] === 'tamu') {
        include '../../partials/header-login-noindex.php';
    }

?> 

<div class="container mt-5 w-50">
    <div class="card shadow p-3">
        <div class="card-body">
            <div id="ratingSection">
                <h5>Rating dan Ulasan</h5>

                <div class="rating star-custom  mb-3" id="hotelRating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>

                <form id="reviewForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $_GET['id']); ?>">
                    <input type="hidden" name="rating" id="selected-rating" value="0">
                    <div class="mb-3">
                        <label for="review" class="form-label">Ulasan Anda</label>
                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-ulasan">Kirim Ulasan</button>
                </form>

            </div>
        </div>
    </div>
</div>



           
</body>
</html>

<script>
    const stars = document.querySelectorAll('#hotelRating .star');
    const selectedRating = document.getElementById('selected-rating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = parseInt(star.getAttribute('data-value'));
            updateRating(value);
        });
    });

    function updateRating(value) {
        stars.forEach(star => {
            const starValue = parseInt(star.getAttribute('data-value'));
            star.classList.remove('active');
            if (starValue <= value) {
                star.classList.add('active');
            }
        });

        // Update nilai pada input hidden
        selectedRating.value = value;
    }
</script>