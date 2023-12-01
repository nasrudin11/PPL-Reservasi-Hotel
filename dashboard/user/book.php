<?php
    session_start();
    $id_kamar = $_GET['id'];
    include '../../controller/user-crud.php';

    include '../../controller/koneksi.php';
    include '../../partials/header-login-noindex.php';

    if (!isset($_SESSION['user_type']) || empty($_SESSION['user_type']) || $_SESSION['user_type'] !== 'tamu') {
        header("Location: ../../login.php");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        pemesanan_kamar($koneksi, $id_kamar, $_SESSION['email'], $_POST['id_hotel'] ,$_POST['cekIn'], $_POST['cekOut'], $_POST['paymen_method'], $_POST['inputGuest'], $_POST['totalHarga']);
    }


    $query = "SELECT kamar.*, hotel.NAMA_HOTEL
            FROM kamar
            JOIN hotel ON kamar.ID_HOTEL = hotel.ID_HOTEL
            WHERE kamar.id_kamar = $id_kamar";  
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_hotel = $row['ID_HOTEL'];
        $namaHotel = $row['NAMA_HOTEL'];
        $hargaKamarDefault = $row['HARGA_KAMAR'];
        $gambarKamar = $row['GAMBAR_KAMAR'];
    } else {
        echo "data error";
    }
    $koneksi->close();
    ?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id_kamar; ?>" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">

                <!-- Stya Details -->

                <div class="header-book">
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
                            <input type="text" for="id_hotel" name="id_hotel" value="<?php echo $id_hotel; ?>" hidden>
                            <div class="col-2">
                                <label for="inputCheckin" class="col-form-label">Cek In</label>
                            </div>
                            <div class="col-4">
                                <input type="date" id="inputCheckin" class="form-control" name="cekIn" required>
                            </div>
                            <div class="col-2">
                                <label for="inputCheckout" class="col-form-label">Cek Out</label>
                            </div>
                            <div class="col-4">
                                <input type="date" id="inputCheckout" class="form-control" name="cekOut" required>
                            </div>
                        </div>

                    </div>
                </div>  
                <div class="card shadow mt-3 p-2">
                    <div class="card-body" id="dynamic-form">
                        <div class="row g-3 mb-1">
                            <div class="col-2">
                                <label for="inputGuest" class="col-form-label">Room 1</label>
                            </div>
                            <div class="col-6">
                                <input type="text" name="inputGuest[]" class="form-control" placeholder="Enter the guest name" required>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success w-100" onclick="addInput()">Add</button>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-danger" onclick="removeInput()">Remove</button>
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
                        <span class="method-payment">Select Payment Method</span>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="1" checked>
                            <label class="form-check-label" for="payment">
                            BCA Virtual Account
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="2">
                            <label class="form-check-label" for="payment">
                            Credit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymen_method" id="payment" value="3">
                            <label class="form-check-label" for="payment">
                            Mandiri Virtual Account
                            </label>
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="col-4">
                <div class="header-book">
                    <h5>Total Payment</h5>
                    <span class="book-describe">
                        Total of payment booking room
                    </span>
                </div>

                <div class="container mt-3  ">
                    <div class="card shadow mt-3 p-2">
                        <div class="card-body" id="dynamic-form">
                            <!-- Your dynamic form content here -->

                            <div class="row">
                                <div class="col-2">
                                    <img src="../../img/<?php echo $gambarKamar; ?>" class="rounded" alt="Gambar Hotel" style="width: 2.5rem; height: 2.5rem;">
                                </div>
                                <div class="col">
                                    <span class="title-book"><?php echo $namaHotel; ?></span>
                                </div>
                            </div>
                            <hr>
                            <!-- Dynamic price Section -->
                            <div class="d-flex justify-content-between mb-3">
                                <span class="price-book">Price Room</span>
                                <span id="price" class="price-book">Rp. <?php echo number_format($hargaKamarDefault, 0, ',', '.'); ?></span>
                            </div>

                            <!-- Dynamic Total Payment Section -->
                            <div class="d-flex justify-content-between mb-3">
                                <span class="price-book">Total Payment</span>
                                <input type="hidden" name="totalHarga" id="totalHarga" value="<?php echo number_format($hargaKamarDefault, 0, ',', '.'); ?>">
                                <span id="totalPayment" class="price-book">Rp. <?php echo number_format($hargaKamarDefault, 0, ',', '.'); ?></span>
                            </div>

                            <!-- Continue Button -->
                            <button class="btn btn-book-custom w-100" name="continue">Continue</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<?php
  include '../../partials/footer.php'
 ?> 

<script>
    var hargaKamarDefault = <?php echo $hargaKamarDefault; ?>;
    var jumlahKamar = 1;

        // Tambahkan event listener untuk input tanggal
    document.getElementById('inputCheckin').addEventListener('change', calculateTotal);
    document.getElementById('inputCheckout').addEventListener('change', calculateTotal);

    function addInput() {
        var dynamicForm = document.getElementById('dynamic-form');

        // Create a new row
        var newRow = document.createElement('div');
        newRow.className = 'row g-3 mb-1';

        // Room label
        var labelCol = document.createElement('div');
        labelCol.className = 'col-2';
        var label = document.createElement('label');
        label.className = 'col-form-label';
        label.textContent = 'Room ' + (dynamicForm.childElementCount + 1);
        labelCol.appendChild(label);
        newRow.appendChild(labelCol);

        // Guest input
        var inputCol = document.createElement('div');
        inputCol.className = 'col-6';
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'inputGuest[]';
        input.className = 'form-control';
        input.placeholder = 'Enter the guest name';
        inputCol.appendChild(input);
        newRow.appendChild(inputCol);

        // Append the new row
        dynamicForm.appendChild(newRow);

        jumlahKamar++;

        // Recalculate total payment
        calculateTotal();
    }

    function removeInput() {
        var dynamicForm = document.getElementById('dynamic-form');
        
        if (dynamicForm.childElementCount > 1) {
            dynamicForm.removeChild(dynamicForm.lastChild);
            // Decrement jumlah kamar, tetapi tidak kurang dari 1
            jumlahKamar = Math.max(1, jumlahKamar - 1);

            // Recalculate total payment
            calculateTotal();
        }
    }


    function calculateTotal() {
        // Mengambil tanggal cek-in dan cek-out dari input
        var checkinDate = new Date(document.getElementById('inputCheckin').value);
        var checkoutDate = new Date(document.getElementById('inputCheckout').value);

        // Menghitung selisih hari
        var timeDifference = checkoutDate.getTime() - checkinDate.getTime();
        var nights = Math.ceil(timeDifference / (1000 * 3600 * 24)); // Mendapatkan jumlah malam

        // Menghitung total harga
        var totalHarga = hargaKamarDefault * jumlahKamar * nights;

        // Menampilkan total harga dengan format
        document.getElementById('totalPayment').textContent = 'Rp. ' + formatNumber(totalHarga);
        document.getElementById('totalHarga').value = totalHarga;
        document.getElementById('hargaKamarPerRoom').textContent = 'Rp. ' + formatNumber(hargaKamarDefault);
    }
    



    // Function to format number with commas
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>