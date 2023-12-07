<?php
    session_start();

    include '../../controller/koneksi.php';
    $slug = 'kalender';

    include '../../partials/header-hotel.php'
?> 
    <style>
        .calendar-container {
            margin-top: 20px;
        }
        .day {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
            min-height: 44px;

        }

        .event {
            background-color: #4CAF50;
            color: white;
            padding: 3px;
            margin-bottom: 2px;
        }
    </style>

    <?php
        $queryReservasi = "SELECT DISTINCT tgl_cekin FROM pemesanan WHERE id_hotel = {$_SESSION['id_hotel']}";
        $resultReservasi = $koneksi->query($queryReservasi);
        
        $reservasi = [];
        if ($resultReservasi->num_rows > 0) {
            while ($row = $resultReservasi->fetch_assoc()) {
                // Mengonversi format tanggal dari database
                $tgl_cekin = date('Y-m-d', strtotime($row['tgl_cekin']));
                $reservasi[] = $tgl_cekin;
            }
        }
        
        $koneksi->close();
    ?>

    <!-- Content wrapper -->
    <div class="content-wrapper">

      <!-- Content -->    
      <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->

        <div class="card shadow p-3">
            <div class="card-body">
                <div class="text-end">
                    <button onclick="changeMonth(-1)" class="btn btn-primary"><<</button>
                    <button onclick="changeMonth(1)" class="btn btn-primary">>></button>
                </div>
                <h2 class="text-center" id="monthYear">December 2023</h2>
                <div class="row">
                    <div class="col text-center">Sun</div>
                    <div class="col text-center">Mon</div>
                    <div class="col text-center">Tue</div>
                    <div class="col text-center">Wed</div>
                    <div class="col text-center">Thu</div>
                    <div class="col text-center">Fri</div>
                    <div class="col text-center">Sat</div>
                </div>
                <div id="calendar"></div>
            </div>
        </div>



        <script>
    // Data reservasi dari PHP
    const reservations = <?php echo json_encode($reservasi); ?>;
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear(); // Tambahkan variabel untuk menyimpan tahun
    const monthYearElement = document.getElementById('monthYear');

    function generateCalendar() {
        const calendarContainer = document.getElementById('calendar');
        const currentDate = new Date();
        currentDate.setMonth(currentMonth); // Set bulan yang digunakan pada currentDate
        currentDate.setFullYear(currentYear); // Set tahun yang digunakan pada currentDate

        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

        let dayCount = 1;
        for (let week = 0; week < 6; week++) {
            const row = document.createElement('div');
            row.classList.add('row');

            for (let dayOfWeek = 0; dayOfWeek < 7; dayOfWeek++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('col', 'day');

                if ((week > 0 || dayOfWeek >= firstDayOfMonth) && dayCount <= daysInMonth) {
                    dayElement.textContent = dayCount;

                    // Check if the day has a reservation
                    if (reservations.includes(formatDate(currentDate, dayCount))) {
                        const eventIndicator = document.createElement('div');
                        eventIndicator.classList.add('event');
                        eventIndicator.textContent = 'Reserved';
                        dayElement.appendChild(eventIndicator);
                    }

                    dayCount++;
                }

                row.appendChild(dayElement);
            }

            calendarContainer.appendChild(row);
        }
    }

    function formatDate(date, day) {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        return `${year}-${month}-${day.toString().padStart(2, '0')}`;
    }

    function changeMonth(offset) {
        currentMonth += offset;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--; // Kurangi tahun jika bulan adalah Desember sebelumnya
        } else if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++; // Tambahkan tahun jika bulan adalah Januari berikutnya
        }

        const currentDate = new Date();
        currentDate.setMonth(currentMonth);
        currentDate.setFullYear(currentYear);

        monthYearElement.textContent = currentDate.toLocaleString('en-US', { month: 'long', year: 'numeric' });
        document.getElementById('calendar').innerHTML = '';
        generateCalendar();
    }

    generateCalendar();
</script>



      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
    include '../../partials/footer-hotel.php'
?> 