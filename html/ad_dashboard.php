<?php
include('../functions/general.php');

// Fetch announcement data
global $conn;
$announcements = [];
$query = "SELECT announce_id, title, st_date, end_date FROM announcements WHERE _status = 'ACTIVE'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $announcements[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../functions/Chart.js"></script>
    <link rel="stylesheet" href="css/ad_dash.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" href="css/page.css">
</head>
<body>
    <!-- SIDEBAR -->
    <?php include('ad_navbar.php');?>


    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="headerWelcome">
                <h1>Welcome, COORDINATOR!</h1>
            </div>

            <div class="headerRight">
                <div class="notif">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php">
                    <img src="images/profile.png" alt="">
                </a>
            </div>
        </div>

        
        <!-- DASHBOARD -->
        <div class="content-grid">
            <div class="left">
                <div class="cards">
                    <div class="card"> 
                        <div class="container">
                            <h5 class="detail"> Total Scholars </h5>
                            <br>
                            <h2 class="num"> 21,350 </h2>
                        </div>
                    </div>

                    <div class="card"> 
                        <div class="container">
                            <h5 class="detail"> Current Scholars </h5>
                            <br>
                            <h2 class="num"> 2,500 </h2>
                        </div> 
                    </div>

                    <div class="card"> 
                        <div class="container">
                            <h5 class="detail"> Pending Documents Approval </h5>
                            <h2 class="num"> 100 </h2>
                        </div> 
                    </div>
                </div> <br> <br>
                
                <!-- LINE GRAPH -->
                <div class="chart-container">
                    <h1> Number of Scholars per Batch </h1>
                    <canvas id="canvas" width="950" height="400"></canvas>
                </div>
            </div>

            <div class="right">
                <!-- CALENDAR -->
                <div class="calendar">
                    <div class="month">
                        <div class="prev">&#10094;</div>
                        <div class="date">
                            <h1 id="month"></h1>
                        </div>
                        <div class="next">&#10095;</div>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days" id="days"></div>
                </div>

                <div class="event">
                    <h4>Events and Announcements</h4>
                    <table id="eventTable">
                        <!-- Dynamic content will be inserted here -->
                    </table>
                </div>
            </div>
        </div>

        
    </div>

    <!-- NOTIFICATION -->
    <?php include('notification.php');?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../functions/notif.js"></script>
    <script>
        const announcements = <?php echo json_encode($announcements); ?>;

        //CHANGE PASS
        function openPass() {
            document.getElementById("passOverlay").style.display = "block";
        }
        function closePass() {
            document.getElementById("passOverlay").style.display = "none";
        }
        function submitForm() {
            closePass();
        }

        //CALENDAR
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        function generateCalendar() {
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const startingDay = firstDayOfMonth.getDay();

            document.getElementById("month").innerHTML = monthNames[currentMonth] + " " + currentYear;

            let calendarDays = document.getElementById("days");
            calendarDays.innerHTML = "";

            for (let i = 0; i < startingDay; i++) {
                let day = document.createElement("div");
                calendarDays.appendChild(day);
            }

            for (let i = 1; i <= daysInMonth; i++) {
                let day = document.createElement("div");
                day.textContent = i;

                // Check if the current day has any announcements
                let currentDate = new Date(currentYear, currentMonth, i);
                announcements.forEach(announcement => {
                    let startDate = new Date(announcement.st_date);
                    let endDate = new Date(announcement.end_date);
                    if (currentDate >= startDate && currentDate <= endDate) {
                        day.style.backgroundColor = "#FFEB3B"; // Highlight day
                        day.title = announcement.title; // Add tooltip
                    }
                });

                calendarDays.appendChild(day);
            }
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${month}/${day}`;
        }

        function populateEvents() {
            let eventTable = document.getElementById("eventTable");
            eventTable.innerHTML = ""; // Clear existing content

            announcements.forEach(announcement => {
                let row = document.createElement("tr");
                let dateCell = document.createElement("td");
                let titleCell = document.createElement("td");

                dateCell.style.fontWeight = "bold";
                dateCell.textContent = `${formatDate(announcement.st_date)} - ${formatDate(announcement.end_date)}`;
                titleCell.textContent = announcement.title;

                row.appendChild(dateCell);
                row.appendChild(titleCell);
                eventTable.appendChild(row);
            });
        }

        document.querySelector(".prev").addEventListener("click", () => {
            currentMonth -= 1;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear -= 1;
            }
            generateCalendar();
        });

        document.querySelector(".next").addEventListener("click", () => {
            currentMonth += 1;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear += 1;
            }
            generateCalendar();
        });

        generateCalendar();
        populateEvents();
        
        // LINE GRAPH
        var lineChartData = {
            labels : ["Batch 1","Batch 2","Batch 3","Batch 4","Batch 5","Batch 6","Batch 7","Batch 8","Batch 9","Batch 10"],
            datasets : [
                {
                    fillColor : "#FFEFD8",
                    strokeColor : "#FFE4C7",
                    pointColor : "#CCCCCC",
                    pointStrokeColor : "#FFF",
                    data : [200, 195, 250, 257, 270, 186, 204, 237, 178, 241]
                }
            ]
        }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
    </script>
</body>
</html>
