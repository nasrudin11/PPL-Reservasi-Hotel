<?php
    session_start();

    include '../../controller/koneksi.php';

    $style =  '../../style.css';
    $imagePath ='../../img/user.png';
    $imageLogo = '../../img/logo/logo.png';
    $home = 'user.php';

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

                <div class="rating  mb-3" id="hotelRating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>

                <form id="reviewForm">
                    <div class="mb-3">
                        <label for="review" class="form-label">Ulasan Anda</label>
                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-ulasan">Kirim Ulasan</button>
                </form>

                <div id="userReview">
                    <!-- Tempat untuk menampilkan ulasan pengguna -->
                </div>
            </div>
        </div>
    </div>
</div>



           
</body>
</html>

<script>
    const stars = document.querySelectorAll('#hotelRating .star');
    const reviewForm = document.getElementById('reviewForm');
    const userReview = document.getElementById('userReview');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = parseInt(star.getAttribute('data-value'));
            updateRating(value);
        });
    });

    reviewForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const reviewText = document.getElementById('review').value;
        const userRating = parseInt(getSelectedRating());

        // Simpan ulasan dan rating ke tempat yang sesuai, contoh: userReview
        const userReviewElement = document.createElement('div');
        userReviewElement.innerHTML = `<h6>Rating: ${getSelectedRating()} / 5</h6><p><strong>Ulasan:</strong> ${reviewText}</p>`;
        userReview.appendChild(userReviewElement);

        // Bersihkan formulir
        reviewForm.reset();
        updateRating(0); // Reset rating setelah mengirim ulasan
    });

    function updateRating(value) {
        stars.forEach(star => {
            const starValue = parseInt(star.getAttribute('data-value'));
            star.classList.remove('active');
            if (starValue <= value) {
                star.classList.add('active');
            }
        });
    }

    function getSelectedRating() {
        const selectedRating = document.querySelector('#hotelRating .star.active:last-child');
        return selectedRating ? selectedRating.getAttribute('data-value') : 0;
    }


</script>