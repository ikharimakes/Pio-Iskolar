<?php include('../functions/general.php');?>

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
            <div class="notif">
                <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
            </div>

            <div class="search">
            </div>

            <a class="user" href="ad_settings.php">
                <img src="images/profile.png" alt="" >
            </a>

            <a class="logOut" href="front_page.php"> 
                <ion-icon name="log-out-outline"></ion-icon> 
                <h5> Log  Out </h5>
            </a>
        </div>

        
        <!-- DASHBOARD -->
        <div class="content-grid">
            <div class="left">
                <div class="cards">
                    <div class="card"> 
                        <div class="container">
                            <h5 class="detail"> Total Number of Scholars </h5>
                            <h2 class="num"> 21,350 </h2>
                        </div>
                    </div>

                    <div class="card"> 
                        <div class="container">
                            <h5 class="detail"> Current Number of Scholars </h5>
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
                    <canvas id="canvas" width="900" height="400"></canvas>
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
                    <table>
                        <tr>
                            <td style="font-weight: bold;"> 05/20: </td>
                            <td> Application for Batch 23 </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;"> 06/11: </td>
                            <td> Contract Signing </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;"> 06/24: </td>
                            <td> Results for Batch 23 </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;"> 07/01: </td>
                            <td> Requirement Submission </td>
                        </tr>
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
                calendarDays.appendChild(day);
            }
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
        
        // LINE GRAPH
        var lineChartData = {
            labels : ["Batch 1","Batch 2","Batch 3","Batch 4","Batch 5","Batch 6","Batch 7","Batch 8","Batch 9","Batch 10"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#FFF",
                    data : [200, 195, 250, 257, 270, 186, 204, 237, 178, 241]
                }
            ]
        }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
    </script>
</body>
</html>