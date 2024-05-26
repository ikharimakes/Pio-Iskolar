<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Document</title>
    <link rel="stylesheet" href="css/ad_docu.css">
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


        <!-- DOCUMENTS -->
        <div class="table">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:8%"> Batch ID </td>
                    <td style="width:50%"> Document Name </td>
                    <td style="width:12%"> Date <ion-icon name="caret-down-outline"></ion-icon></td>
                    <td style="width:10%"> Type </td>
                    <td style="width:10%" class="statusColor"> Status </td>
                    <td style="text-align: right;"> Actions </td>
                </tr>
                <tr> 
                    <td> 21-2321 </td>
                    <td> Adriano_JessicaRaye_3rdyear_2ndsem_COR.pdf </td>
                    <td> 04/23/2024 </td>
                    <td> PDF </td>
                    <td class="statusColor"> Approved </td>
                    <td style="text-align: right;" class="wrap"> 
                        <div class="icon">
                            <div class="tooltip"> Approve</div>
                            <span> <ion-icon name="checkmark-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Decline</div>
                            <span> <ion-icon name="close-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> View</div>
                            <span> <ion-icon name="eye-outline" onclick="openView()"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Download</div>
                            <span> <ion-icon name="download-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Edit</div>
                            <span> <ion-icon name="create-outline" onclick="openModal('statusModal')"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Delete</div>
                            <span> <ion-icon name="trash-outline"></ion-icon> </span>
                        </div>
                    </td>
                </tr>
                <tr> 
                    <td> 21-2321 </td>
                    <td> Adriano_JessicaRaye_3rdyear_2ndsem_COR.pdf </td>
                    <td> 04/23/2024 </td>
                    <td> PDF </td>
                    <td class="statusColor"> Pending </td>
                    <td style="text-align: right;" class="wrap"> 
                        <div class="icon">
                            <div class="tooltip"> Approve</div>
                            <span> <ion-icon name="checkmark-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Decline</div>
                            <span> <ion-icon name="close-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> View</div>
                            <span> <ion-icon name="eye-outline" onclick="openView()"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Download</div>
                            <span> <ion-icon name="download-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Edit</div>
                            <span> <ion-icon name="create-outline" onclick="openModal('statusModal')"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Delete</div>
                            <span> <ion-icon name="trash-outline"></ion-icon> </span>
                        </div>
                    </td>
                </tr>
                <tr> 
                    <td> 21-2321 </td>
                    <td> Adriano_JessicaRaye_3rdyear_2ndsem_COR.pdf </td>
                    <td> 04/23/2024 </td>
                    <td> PDF </td>
                    <td class="statusColor"> Declined </td>
                    <td style="text-align: right;" class="wrap"> 
                        <div class="icon">
                            <div class="tooltip"> Approve</div>
                            <span> <ion-icon name="checkmark-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Decline</div>
                            <span> <ion-icon name="close-circle-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> View</div>
                            <span> <ion-icon name="eye-outline" onclick="openView()"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Download</div>
                            <span> <ion-icon name="download-outline"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Edit</div>
                            <span> <ion-icon name="create-outline" onclick="openModal('statusModal')"></ion-icon> </span>
                        </div>
                        <div class="icon">
                            <div class="tooltip"> Delete</div>
                            <span> <ion-icon name="trash-outline"></ion-icon> </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div> 
    </div>


    <!-- EDIT MODAL -->
    <div id="statusModal" class="status">
        <div class="status-content">
            <div class="infos">
                <h1>Adriano, Jessica Raye</h1>
                <span class="close" onclick="closeModal('statusModal')">&times;</span>
            </div>
            <br><br>

            <h4>Adriano_JessicaRaye_3rdyear_2ndsem_COR.pdf</h4>
            <div class="drop-status">
                <label for="status">Status</label> <br>
                <select id="statusScholar" name="status">
                    <option value="approve">Approve</option>
                    <option value="decline">Decline</option>
                </select>
            </div>

            <div id="declineReason" style="display:none; margin-top: 20px;">
                <label>Reason for Decline:</label><br>
                <input type="radio" name="reason" value="incomplete"> Incomplete Document<br>
                <input type="radio" name="reason" value="incorrect"> Incorrect Information<br>
                <input type="radio" name="reason" value="other"> Other
            </div>

            <div class="btn">
                <button id="submitBtn" class="save-button"> Save </button>
                <center><img src="assets/pic1.jpg"></center>   
            </div> <br>
        </div> 
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        //CHANGE COLOR BASE ON STATUS
        document.addEventListener('DOMContentLoaded', () => {
            const statusCells = document.querySelectorAll('.statusColor');

            statusCells.forEach(cell => {
                switch (cell.textContent.trim().toLowerCase()) {
                    case 'approved':
                        cell.classList.add('statusColor-approved');
                        break;
                    case 'pending':
                        cell.classList.add('statusColor-pending');
                        break;
                    case 'declined':
                        cell.classList.add('statusColor-declined');
                        break;
                }
            });
        });

        //EDIT
        function openModal(statusModal) {
            var modal = document.getElementById(statusModal);
            modal.style.display = "block";
        }
        function closeModal(statusModal) {
            var modal = document.getElementById(statusModal);
            modal.style.display = "none";
        }
        function showReason(select) {
            var declineReason = document.getElementById("declineReason");
            if (select.value == "decline") {
                declineReason.style.display = "block";
            } else {
                declineReason.style.display = "none";
            }
        }
    </script>
</body>
</html>