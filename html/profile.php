<?php include_once('../functions/general.php');?>
<?php include('../functions/display_prof.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/myAcc.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" href="css/page.css">
</head>


<body>
    <!-- SIDEBAR -->
    <?php include('sk_navbar.php');?>

    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="headerName">
            </div>

            <div class="headerRight">
                <div class="notif">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="profile.php">
                    <img src="images/profile.png" alt="">
                </a>
            </div>
        </div>

        <!-- ACCOUNT SETTING -->
        <div class="info">
            <h1> MY PROFILE </h1>
        </div>

        <div class="profile">
            <?php scholarDisplay($_SESSION['sid']);?>
        </div>
    </div>


    <!-- CHANGE PASS --><!-- CHANGE PASS -->
<div id="passOverlay" class="passOverlay">
    <div class="pass-content">
        <div class="infos">
            <h2>Change Password</h2>
            <span class="closePass" onclick="closePass()">&times;</span>
        </div>
        <br><br>
        
        <form action="" method="POST">
            <div class="inner-content">
                <label class="passText" for="oldPassword">Enter Current Password:</label> <br>
                <input class="input" type="password" id="oldPassword" name="oldPassword" placeholder="Current Password" required>
            </div>

            <div class="inner-content">
                <label class="passText" for="newPassword">Enter New Password:</label> <br>
                <input class="input" type="password" id="newPassword" name="newPassword" placeholder="New Password" required>
            </div>

            <div class="inner-content">
                <label class="passText" for="confirmPassword">Confirm Password:</label> <br>
                <input class="input" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            </div>

            <div class="enter-button-container">
                <button class="enter-button" type="submit"> Enter </button>
            </div>
        </form>
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
    </script>
</body>
</html>