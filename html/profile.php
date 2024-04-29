<?php include('../functions/general.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="css/styles.css">

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
                <li> <a href="announce.php" class="nav"> Announcement </a> </li>
                <li> <a href="documents.php" class="nav"> Documents </a> </li>
                <li> <a href="history.php" class="nav"> History </a> </li>
                <li> <a href="profile.php" class="nav"> My Account </a> </li>
            </ul>
         </nav>
    </div>


    <div class="info">
        <h1> MY ACCOUNT </h1>
    </div>

    <div id="profile">
        <img src="images/profile.png" alt="Profile Picture">
        <h2>ADRIANO, JESSICA RAYE</h2>
    </div>

    <table border="5">
            <tr>
                <td>Student ID:</td>
                <td>21-0569</td>
            </tr>
            <tr>
                <td>Birthday:</td>
                <td>05/24/2003</td>
            </tr>
            <tr>
                <td>Civil Status:</td>
                <td>Single</td>
            </tr>
            <tr>
                <td>Batch:</td>
                <td>1st</td>
            </tr>
            <tr>
                <td>Age:</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>Marulas, Valenzuela City, Metro Manila, Philippines</td>
            </tr>
            <tr>
                <td>Postal Code:</td>
                <td>1445</td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td>0963821954</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>j**********@gmail.com</td>
            </tr>
            <tr>
                <td>Change Password</td>
                <td></td>
            </tr>
    </table>


    <!--LOG OUT-->
    <div class="btnLogOut">
        <a href="index.php"> Log Out </a> <br> <br>
    </div>
    
</body>
</html>