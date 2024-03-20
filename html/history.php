<?php include('../php/functions.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="css/style.css">

</head>


<body>
    <!--HEADER-->
    <div class ="header">
        <div class = "logo" >
            <img src="images/pio-logo.png" alt="pio">
            <h1> PioIskolar </h1>
        </div>

        <!--NAVIGATION BAR-->
        <nav id="sidebar"> 
            <ul>
                <li> <a href="dashboard.php" class="nav"> Announcement </a> </li>
                <li> <a href="documents.php" class="nav"> Documents </a> </li>
                <li> <a href="history.php" class="nav"> History </a> </li>
                <li> <a href="profile.php" class="nav"> My Account </a> </li>
            </ul>
         </nav>
    </div>

</body>
</html>