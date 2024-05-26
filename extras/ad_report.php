<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar List</title>
    <link rel="stylesheet" href="css/ad_report.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="sidebar">
        <header>
            <div class="sideHeader">
                <span class="headerLogo">
                    <img src="html/images/pio-logo.png" alt="logo">
                </span>

                <div class="headerText">
                    <h1>Pio Iskolar</h1>
                </div>
            </div>
        </header> 

        <div class="navBar">
            <ul class="navLinks">
                <li class="navLink"> <a href="ad_dashboard.php" onclick="activateLink(this)"> 
                    <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="text"> Dashboard </span>
                </a> </li>

                <li class="navLink"> <a href="ad_scholar.php" onclick="activateLink(this)">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="text"> Scholar </span> 
                </a> </li>

                <li class="navLink"> <a href="ad_announce.php" onclick="activateLink(this)">
                    <span class="icon">
                        <ion-icon name="megaphone-outline"></ion-icon>
                    </span>
                    <span class="text"> Announcement </span>
                </a> </li>
                
                <li class="navLink"> <a href="ad_reports.php" onclick="activateLink(this)">
                    <span class="icon">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </span>
                    <span class="text"> Reports </span>
                </a> </li>

                <li class="navLink"> <a href="ad_settings.php" onclick="activateLink(this)">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="text"> Settings </span>
                </a> </li>
            </ul>
        </div> 

        <div class="bottom-content">
            <li class="nav-link"><a href="front_page.php">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="text"> Log Out </span>
            </a> </li>
        </div>
    </nav>

    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="headerName">
                <h1>Reports</h1>
            </div>

            <div class="headerRight" >
                <div class="notif" id="clickableIcon">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php" id="clickableIcon">
                    <img src="html/images/profile.png" alt="">
                </a>
            </div>
        </div>

        <!-- REPORTS -->
        <div class="info">
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>

            <form>
                <button type="button" class="btnReports" onclick="openModal('reportModal')"> Generate Reports </button> <br>
            </form> 
        </div> <br>
    </div>


    <!-- GENERATE MODAL -->
    <div id="reportModal" class="report">
        <div class="report-content">
            <div class="infos">
                <h1>Generate Reports</h1>
                <span class="closeEdit" onclick="closeModal('reportModal')">&times;</span>
            </div>
            <br><br>

            <div class="scholar">
                <label for="reports">Choose a Reports:</label> <br>
                <select id="reportScholar" name="reports">
                    <option value="status">Scholar Status Report</option>
                    <option value="profile">Scholar Profile and Requirement Report</option>
                    <option value="stats">Program Statistics Report</option>
                </select>
            </div> <br>
                
            <div class="batch"> 
                <h3>Batch</h3>
                <form>
                    <input type="radio" id="all" name="batches" value="all">
                    <label for="all">All Batches</label> <br>
                        
                    <input type="radio" id="batch" name="batches" value="batch">
                    <label for="batch" onclick="showInput('batch')">By Batch</label>
                    <br> <br>
                    <div id="inputField" class="hideText" style="display: none;">
                        <label for="textInput" style="font-weight: bold;">Enter Batch ID:</label>
                        <input type="text" id="textInput">
                    </div>
                </form>
            </div>

            <div class="btn">
                <button id="submitBtn" class="generate-button"> Generate </button>
            </div> <br>
        </div> 
    </div>

    <!-- SCHOLAR STATUS MODAL -->
    <div id="statusModal" class="statusReport">
        <div class="statusReport-content">
            <span class="close">&times;</span>
            <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>
            SCHOLAR STATUS REPORT <br>
            S.Y. [SCHOOL YEAR]</h3> <br>
            
            Batch Number: <strong>[Batch Number]</strong>

            <p> This report provides an overview of the current status of scholars under the Dr. Pio Valenzuela Scholarship Program for the school year <strong>[School Year]</strong>. As of <strong>[Date]</strong>, there are a total of <strong>[Total Number of Scholars]</strong> scholars enrolled in the program for Batch Number <strong>[Batch Number]</strong>. The table below presents the current status of scholars under the Dr. Pio Valenzuela Scholarship Program, along with the total number of scholars based on their status: </p>
            <br>
            Total Active Scholars: <strong>1</strong> <br>
            Total Dropped Scholars: <strong>1</strong> <br>
            Total Scholars on Leave of Absence: <strong>1</strong> <br>
            Total Graduated Scholars: <strong>1</strong> <br> <br>

            <table>
                <tr>
                    <th class="status-header">Batch ID</th>
                    <th class="status-header">Last Name</th> 
                    <th class="status-header">First Name</th> 
                    <th class="status-header">Middle Inital</th> 
                    <th class="status-header">Status</th> 
                </tr>
                <tr>
                    <td class="status-details">21-0001</td>
                    <td class="status-details">Marcos</td>
                    <td class="status-details">Dannah Lei</td>
                    <td class="status-details">R</td>
                    <td class="status-details">Active</td>
                </tr>
                <tr>
                    <td class="status-details">21-0002</td>
                    <td class="status-details">Jacinto</td>
                    <td class="status-details">Alexis John Rovic</td>
                    <td class="status-details"></td>
                    <td class="status-details">Leave of Absence</td>
                </tr>
                <tr>
                    <td class="status-details">21-0003</td>
                    <td class="status-details">Hidalgo</td>
                    <td class="status-details">Maika Jasmine</td>
                    <td class="status-details">A</td>
                    <td class="status-details">Graduated</td>
                </tr>
                <tr>
                    <td class="status-details">21-0004</td>
                    <td class="status-details">Adriano</td>
                    <td class="status-details">Jessica Raye</td>
                    <td class="status-details"></td>
                    <td class="status-details">Dropped</td>
                </tr>
            </table>
            <div class="nothing-follows">-----Nothing Follows-----</div>

            <br> <br>
            <button onclick="downloadForm()" class="button">DOWNLOAD</button>
        </div>
    </div>
        
    <div id="statusOverlay" class="statusReport">
        <div class="statusReport-content">
        <span class="closeEdit" onclick="closeStatus()">&times;</span>
            <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>
            SCHOLAR STATUS REPORT<br>
            S.Y. [SCHOOL YEAR]</h3> <br>
                
            Batch Number: <strong>[Batch Number]</strong>

            <p> This report provides an overview of the current status of scholars under the Dr. Pio Valenzuela Scholarship Program for the school year <strong>[School Year]</strong>. As of <strong>[Date]</strong>, there are a total of <strong>[Total Number of Scholars]</strong> scholars enrolled in the program for Batch Number <strong>[Batch Number]</strong>. The table below presents the current status of scholars under the Dr. Pio Valenzuela Scholarship Program, along with the total number of scholars based on their status: </p>
            <br>
            Total Active Scholars: <strong>1</strong> <br>
            Total Dropped Scholars: <strong>1</strong> <br>
            Total Scholars on Leave of Absence: <strong>1</strong> <br>
            Total Graduated Scholars: <strong>1</strong> <br>
            <br>

            <table>
                <tr>
                    <th class="status-header">Batch ID</th>
                    <th class="status-header">Last Name</th> 
                    <th class="status-header">First Name</th> 
                    <th class="status-header">Middle Inital</th> 
                    <th class="status-header">Status</th> 
                </tr>
                <tr>
                    <td class="status-details">21-0001</td>
                    <td class="status-details">Marcos</td>
                    <td class="status-details">Dannah Lei</td>
                    <td class="status-details">R</td>
                    <td class="status-details">Active</td>
                </tr>
                <tr>
                    <td class="status-details">21-0002</td>
                    <td class="status-details">Jacinto</td>
                    <td class="status-details">Alexis John Rovic</td>
                    <td class="status-details"></td>
                    <td class="status-details">Leave of Absence</td>
                </tr>
                <tr>
                    <td class="status-details">21-0003</td>
                    <td class="status-details">Hidalgo</td>
                    <td class="status-details">Maika Jasmine</td>
                    <td class="status-details">A</td>
                    <td class="status-details">Graduated</td>
                </tr>
                <tr>
                    <td class="status-details">21-0004</td>
                    <td class="status-details">Adriano</td>
                    <td class="status-details">Jessica Raye</td>
                    <td class="status-details"></td>
                    <td class="status-details">Dropped</td>
                </tr>
            </table>
            <div class="nothing-follows">-----Nothing Follows-----</div>

            <br> <br>
            <button onclick="downloadForm()" class="button">DOWNLOAD</button>
        </div>
    </div>

    <!-- SCHOLAR PROFILE MODAL -->
    <div id="profileModal" class="profileReport">
        <div class="profileReport-content">
            <span class="close">&times;</span>
            <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>
            SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>
            [SEMESTER] Semester of S.Y. [SCHOOL YEAR]</h3><br>

            Batch Number: <strong>[Batch Number]</strong>

            <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>[Semester]</strong> Semester of S.Y. <strong>[School Year]</strong>. As of <strong>[Date]</strong>, there are a total of <strong>[Total Number of Scholars]</strong> scholars enrolled in the program for Batch Number <strong>[Batch Number]</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total the number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program's criteria and obligation. </p>
            <br>
                
            Total Number of Scholars: <strong>1</strong> <br>
            Total Number of Scholars with Complete Requirements: <strong>1</strong> <br>
            Total Number of Scholars Scholars with Missing Requirements: <strong>1</strong> <br> <br>

            <table>
                <tr>
                    <td colspan="2" class="profile-header">SCHOLAR PROFILE</th>
                    <td colspan="2" class="profile-header">S.Y. [School Year]<br>[Sem] SEMESTER REQUIREMENTS</th> 
                </tr>
                <tr>
                    <td class="profile-profile">CONTROL NUMBER</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2">COR</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">NAME</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2">GRADES</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">SCHOOL</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2" style="border-bottom: 2px solid black">SOCIAL CONTRACT</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">COURSE</td>
                    <td class="profile-input"></td>
                    <td colspan="2" class="profile-profile2" style="border:2px solid black">REMARKS</td>
                </tr>
                <tr>
                    <td class="profile-profile">ADDRESS</td>
                    <td class="profile-input"></td>
                    <td rowspan="3" colspan="3" class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">CONTACT NUMBER</td>
                    <td class="profile-input"></td>
                </tr>
                <tr>
                    <td class="profile-profile">EMAIL</td>
                    <td class="profile-input"></td>
                </tr>
            </table>
            <div class="nothing-follows">-----Nothing Follows-----</div>

            <br> <br>
            <button onclick="downloadForm()" class="button">DOWNLOAD</button>
        </div>
    </div>

    <div id="profileOverlay" class="profileReport">
        <div class="profileReport-content">
        <span class="closeEdit" onclick="closeProfile()">&times;</span>
            <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>
            SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>
            [SEMESTER] Semester of S.Y. [SCHOOL YEAR]</h3><br>

            Batch Number: <strong>[Batch Number]</strong>

            <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>[Semester]</strong> Semester of S.Y. <strong>[School Year]</strong>. As of <strong>[Date]</strong>, there are a total of <strong>[Total Number of Scholars]</strong> scholars enrolled in the program for Batch Number <strong>[Batch Number]</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total the number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program's criteria and obligation. </p>
            <br>
                
            Total Number of Scholars: <strong>1</strong> <br>
            Total Number of Scholars with Complete Requirements: <strong>1</strong> <br>
            Total Number of Scholars Scholars with Missing Requirements: <strong>1</strong> <br> <br>

            <table>
                <tr>
                    <td colspan="2" class="profile-header">SCHOLAR PROFILE</th>
                    <td colspan="2" class="profile-header">S.Y. [School Year]<br>[Sem] SEMESTER REQUIREMENTS</th> 
                </tr>
                <tr>
                    <td class="profile-profile">CONTROL NUMBER</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2">COR</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">NAME</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2">GRADES</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">SCHOOL</td>
                    <td class="profile-input"></td>
                    <td class="profile-profile2" style="border-bottom: 2px solid black">SOCIAL CONTRACT</td>
                    <td class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">COURSE</td>
                    <td class="profile-input"></td>
                    <td colspan="2" class="profile-profile2" style="border:2px solid black">REMARKS</td>
                </tr>
                <tr>
                    <td class="profile-profile">ADDRESS</td>
                    <td class="profile-input"></td>
                    <td rowspan="3" colspan="3" class="profile-details"></td>
                </tr>
                <tr>
                    <td class="profile-profile">CONTACT NUMBER</td>
                    <td class="profile-input"></td>
                </tr>
                <tr>
                    <td class="profile-profile">EMAIL</td>
                    <td class="profile-input"></td>
                </tr>
            </table>
            <div class="nothing-follows">-----Nothing Follows-----</div>

            <br> <br>
            <button onclick="downloadForm()" class="button">DOWNLOAD</button>
        </div>
    </div>

    <!-- STATISTIC MODAL -->
    <div id="statsModal" class="modal">
        <!-- Modal content for option 3 -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>This is the modal content for option 3.</p>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        //STATUS MODAL
        function openStatus() {
            document.getElementById("statusOverlay").style.display = "block";
        }
        function closeStatus() {
            document.getElementById("statusOverlay").style.display = "none";
        }
        function downloadForm() {
            closeStatus();
        }

        //PROFILE MODAL
        function openProfile() {
            document.getElementById("profileOverlay").style.display = "block";
        }
        function closeProfile() {
            document.getElementById("profileOverlay").style.display = "none";
        }
        function downloadForm() {
            closeProfile();
        }

        //GENERATE REPORTS
        function openModal(reportModal) {
            var modal = document.getElementById(reportModal);
            modal.style.display = "block";
        }
        function closeModal(reportModal) {
            var modal = document.getElementById(reportModal);
            modal.style.display = "none";
        }
        function showInput(language) {
            var inputField = document.getElementById("inputField");
            if (language === "batch") {
                inputField.style.display = "block";
            } else {
                inputField.style.display = "none";
            }
        }

        var modalOption1 = document.getElementById("statusModal");
        var modalOption2 = document.getElementById("profileModal");
        var modalOption3 = document.getElementById("statsModal");

        var btn = document.getElementById("submitBtn");

        var spans = document.querySelectorAll(".close");

        btn.onclick = function() {
            var selectValue = document.getElementById("reportScholar").value;
            var radioValue = document.querySelector('input[name="batches"]:checked');
            
            if (selectValue && radioValue) {
                switch (selectValue) {
                    case "status":
                        modalOption1.style.display = "block";
                        break;
                    case "profile":
                        modalOption2.style.display = "block";
                        break;
                    case "stats":
                        modalOption3.style.display = "block";
                        break;
                }
            }
        }

        spans.forEach(function(span) {
            span.onclick = function() {
                modalOption1.style.display = "none";
                modalOption2.style.display = "none";
                modalOption3.style.display = "none";
            }
        });

        window.onclick = function(event) {
            if (event.target == modalOption1 || event.target == modalOption2 || event.target == modalOption3) {
                modalOption1.style.display = "none";
                modalOption2.style.display = "none";
                modalOption3.style.display = "none";
            }
        }
    </script>
</body>
</html>