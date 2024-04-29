<?php include('../functions/general.php');?>
<?php include('../functions/docxmgmt.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Submission History </title>
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
        <h1> SUBMISSION HISTORY </h1>
    </div>

    <table>
        <tr style="font-weight: bold;">
            <td> Date </td>
            <td> Document Name </td>
            <td> Type </td>
            <td> Status </td>
            <td style="text-align: right";> Action </td>
        </tr>
        <?php docxDisplay($_SESSION["uid"])?>
    </table>
    <br> <br>

    <!--FOOTER-->
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>

</body>
</html>