<?php
include '../../partials/header.php'
?> 

<div class="container mt-5">
    <div class="row">
        <div class="col-8">

            <!-- Contact Details -->

            <div class="header-book">
                <h5>Contact Details</h5>
                <span class="book-describe">
                    The contact details will be used to refund/reschedule purposes.
                </span>
            </div>
            <div class="card shadow mt-3 p-2">
                <div class="card-body">
                    <div class="field-custom mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" aria-label="Username">
                    </div>
                    <div class="field-custom input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" class="form-control" placeholder="Mobile Number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="field-custom">
                        <input type="email" class="form-control" placeholder="Email Address" aria-label="email">
                    </div>  
                </div>
            </div>

            <!-- Stya Details -->

            <div class="header-book mt-5">
                <h5>Stay Details at ASTON Priority Simatupang & Conference Center</h5>
                <span class="book-describe">
                    For a smoother check-in experience, enter the guest’s name as written on the ID card. 
                </span>
            </div>
            <div class="card shadow mt-3 p-2">
                <div class="card-body">
                    <span class="title-room">Room With Twin Bed</span>
                    <ul>
                        <li>2 Guest</li>
                        <li>2 Twin</li>
                        <li>Breakfast not included</li>
                    </ul>
                    <hr>

                    <div class="row g-3 mb-1">
                        <div class="col-2">
                            <label for="inputCheckin" class="col-form-label">Cek In</label>
                        </div>
                        <div class="col-4">
                            <input type="date" id="inputCheckin" class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="inputCheckout" class="col-form-label">Cek Out</label>
                        </div>
                        <div class="col-4">
                            <input type="date" id="inputCheckout" class="form-control">
                        </div>
                    </div>

                </div>
            </div>          
            <div class="card shadow mt-3 p-2">
                <div class="card-body">
                    <div class="row g-3 mb-1">
                        <div class="col-2">
                            <label for="inputGuest" class="col-form-label">Room 1</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="inputGuest" class="form-control" placeholder="Enter the guest name">
                        </div>
                    </div>
                    <div class="row g-3 mb-1">
                        <div class="col-2">
                            <label for="inputGuest" class="col-form-label">Room 2</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="inputGuest" class="form-control" placeholder="Enter the guest name">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-2">
                            <label for="inputGuest" class="col-form-label">Room 3</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="inputGuest" class="form-control " placeholder="Enter the guest name">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Payment Details -->

            <div class="header-book mt-5">
                <h5>Payment Details</h5>
                <span class="book-describe">
                    You can choose payments method booking transaction
                </span>
            </div>        
            <div class="card shadow mt-3 p-2">
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="none" checked>
                        <label class="form-check-label" for="payment">
                         <span class="method-payment">Select Payment Method</span>
                        </label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="bca">
                        <label class="form-check-label" for="payment">
                         BCA Virtual Account
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="credit">
                        <label class="form-check-label" for="payment">
                         Credit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="mandiir">
                        <label class="form-check-label" for="payment">
                         Mandiri Virtual Account
                        </label>
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="col-4">
            <div class="card shadow p-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../img/01.png" class="rounded" alt="Gambar Hotel" style="width: 2.5rem; height: 2.5rem;">
                        </div>
                        <div class="col">
                            <span class="title-book">ASTON Priority Simatupang & Conference Center</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="price-book">Total Payment</span>
                        <span class="price-book">Rp. 1.000.000</span>
                    </div>
                    <button class="btn btn-book-custom w-100">Continue</button>
                </div>
            </div>
        </div>



    </div>
</div>

<?php
  include '../../partials/footer.php'
 ?> 
