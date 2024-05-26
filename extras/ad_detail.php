<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Details</title>
    <link rel="stylesheet" href="css/ad_details.css">
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
            <li class="navLink"><a href="front_page.php">
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
            <button class="headerBack" href="ad_scholar.php" id="clickableIcon">
                <ion-icon name="chevron-back-outline"></ion-icon>
                <h1>Back</h1>
            </button>

            <div class="headerRight" >
                <div class="notif" id="clickableIcon">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php" id="clickableIcon">
                    <img src="html/images/profile.png" alt="">
                </a>
            </div>
        </div>

        <br> <br>
        <div class="table">
            <table id="documentsTable" class="table-container">
                <tr>
                    <th colspan="10" class="details2">DOCUMENTS 
                        <ion-icon name="pencil-outline" onclick="toggleEdit('documentsTable')"></ion-icon> 
                    </th>
                </tr> 
                <tr>
                    <th rowspan="2" class="details2">ACADEMIC YEAR</th>
                    <th colspan="3" class="details2">1ST SEMESTER</th>
                    <th colspan="3" class="details2">2ND SEMESTER</th>
                    <th colspan="3" class="details2">3RD SEMESTER</th>
                </tr>
                <tr>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                </tr>
                <tr>
                    <th class="details2">2023-2024</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2024-2025</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2025-2026</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2026-2027</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2027-2028</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
            </table>
            
            <br> <br>
            <table id="scholarshipTable" class="table-container">
                <tr>
                    <th colspan="4" class="details2">SCHOLARSHIP 
                        <ion-icon name="pencil-outline" onclick="toggleEdit('scholarshipTable')"></ion-icon>
                    </th>
                </tr> 
                <tr>
                    <th class="details2">ACADEMIC YEAR</th>
                    <th class="details2">1ST SEMESTER</th>
                    <th class="details2">2ND SEMESTER</th>
                    <th class="details2">3RD SEMESTER</th>
                </tr>
                <tr>
                    <th class="details2">2023-2024</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr> 
                <tr>
                    <th class="details2">2024-2025</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2025-2026</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2026-2027</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2027-2028</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
            </table>

            <br> <br>
            <table id="remarksTable" class="table-container">
                <tr>
                    <th class="details2">REMARKS 
                        <ion-icon name="pencil-outline" onclick="toggleEdit('remarksTable')"></ion-icon>
                    </th>
                </tr>
                <tr>
                    <td><textarea rows="10" class="input3"></textarea></td>
                </tr>
            </table>  
        </div> <br>
    </div>


    <!-- SAVE MODAL -->
    <div id="saveOverlay" class="saveOverlay">
        <div class="save-content">
            <div class="infos">
                <h2>Confirm Delete</h2>
                <span class="closeSave" onclick="closeSave()">&times;</span>
            </div>

            <div class="message">
                <h4>Are you sure you want to save the changes?</h4>
            </div>

            <div class="button-container">
                <button class="yes-button">Yes</button>
                <button class="no-button" onclick="closeSave()"> No </button>
            </div>
        </div>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        //EDIT TABLE
        function toggleEdit(tableId) {
            const table = document.getElementById(tableId);
            const inputs = table.querySelectorAll('input, textarea');
            const icon = table.querySelector('ion-icon');
            
            inputs.forEach(input => {
                input.disabled = !input.disabled;
            });
            
            if (icon.name === 'pencil-outline') {
                icon.name = 'close-outline';
            } else {
                icon.name = 'pencil-outline';
            }

            let saveButton = table.querySelector('.save-button');
            if (!saveButton) {
                saveButton = document.createElement('button');
                saveButton.textContent = 'Save';
                saveButton.classList.add('save-button');
                saveButton.onclick = () => {
                    inputs.forEach(input => input.disabled = true);
                    icon.name = 'pencil-outline';
                    saveButton.remove();
                    openSave();
                };
                table.appendChild(saveButton);
            } else {
                saveButton.remove();
            }
        }

        //SAVE MODAL
        var modal = document.getElementById("saveOverlay");
        var span = document.getElementsByClassName("closeSave")[0];
        
        function openSave() {
            modal.style.display = "block";
        }

         span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>