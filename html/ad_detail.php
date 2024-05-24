<?php include('../functions/general.php');?>
<?php include('../functions/display_prof.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ad_details.css">
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
                <h5> Log Out </h5>
            </a>
        </div>

        <?php navDisplay();?>
        
        <?php adminDisplay();?>
        
        <br> <br>
        <div class="table">
            <table class = "table-container">
                <tr>
                    <td rowspan="2" class="details2">ACADEMIC YEAR</td>
                    <td colspan="3" class="details2">1ST SEMESTER</td>
                    <td colspan="3" class="details2">2ND SEMESTER</td>
                    <td colspan="3" class="details2">3RD SEMESTER</td>
                </tr>
                <tr>
                    <td class="details2">COR</td>
                    <td class="details2">GRADES</td>
                    <td class="details2">CONTRACT</td>
                    <td class="details2">COR</td>
                    <td class="details2">GRADES</td>
                    <td class="details2">CONTRACT</td>
                    <td class="details2">COR</td>
                    <td class="details2">GRADES</td>
                    <td class="details2">CONTRACT</td>
                </tr>
                <tr>
                    <td class="details2">2023-2024</td>
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
                    <td class="details2">2024-2025</td>
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
                    <td class="details2">2025-2026</td>
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
                    <td class="details2">2026-2027</td>
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
                    <td class="details2">2027-2028</td>
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
<!--
            <br> <br>
            <table class = "table-container">
                <tr>
                    <td colspan="4" class="details2">SCHOLARSHIP</td>
                </tr> 
                <tr>
                    <td class="details2">ACADEMIC YEAR</td>
                    <td class="details2">1ST SEMESTER</td>
                    <td class="details2">2ND SEMESTER</td>
                    <td class="details2">3RD SEMESTER</td>
                </tr>
                <tr>
                    <td class="details2">2023-2024</td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr> 
                <tr>
                    <td class="details2">2024-2025</td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <td class="details2">2025-2026</td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <td class="details2">2026-2027</td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <td class="details2">2027-2028</td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
            </table>
-->
            <br> <br>
            <table class = "table-container">
                <tr>
                    <td class="details2">REMARKS</td>
                </tr>
                <tr>
                    <td><textarea rows="10" class="input3"></textarea></td>
                </tr>
            </table>  
        </div> <br>
        <div class="info">
            <button type="button" class="btnAnnounce"> Update </button> <br> <br> <br> <br>
        </div></form>
    </div>

    <!-- NOTIFICATION -->
    <?php include('notification.php');?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../functions/notif.js"></script>
</body>
</html>