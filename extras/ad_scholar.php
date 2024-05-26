<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar List</title>
    <link rel="stylesheet" href="css/ad_sko.css">
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
            <div class="headerRight">
                <div class="notif">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php">
                    <img src="html/images/profile.png" alt="">
                </a>
            </div>
        </div>

        <!-- SCHOLAR LIST -->
        <div class="info">
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="add-buttons"> 
                <button type="button" class="btnAdd" onclick="openAdd()"> Add Scholar </button>
                <button type="button" class="btnAdd" onclick="openBatch()"> Batch Creation </button>
            </form> 
        </div> <br>

        <div class="tables">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:5%"> Batch</td>
                    <td style="width:10%"> Scholar No. </td>
                    <td style="width:12%"> Last Name </td>
                    <td> First Name </td>
                    <td style="width:20%"> Middle Initial </td>
                    <td style="width:10%"> Status </td>
                    <td style="width:3%"> Actions </td>
                </tr>
            </table>
        </div>
    </div>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>