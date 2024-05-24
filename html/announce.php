<?php include('../functions/general.php');?>
<?php include('../functions/display_ann.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/announces.css">
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
            <div class="notif">
                <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
            </div>

            <div class="search">
            </div>
            
            <div class="user">
                <a href="profile.php"><img src="images/profile.png" ></a>
            </div>

            <a class="logOut" href="front_page.php"> 
                <ion-icon name="log-out-outline"></ion-icon> 
                <h5> Log  Out </h5>
            </a>
        </div>


        <!-- ANNOUNCEMENT -->
        <div class="info">
            <h1> ANNOUNCEMENT </h1>
        </div>

        <div class="container">
            <?php annDisplay();?>
        </div>
    </div>


    <!-- NOTIFICATION -->
    <?php include('notification.php');?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../functions/notif.js"></script>
</body>
</html>