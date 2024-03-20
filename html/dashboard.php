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


    <div class="container">
        <section class="announce">
            <div class="announce-image">
                <img src="images/pic1.jpg">
            </div>
            <div class="announce-content">
                <h2> Application for Batch 23 </h2>
                <p> The City Government of Valenzuela 
                    will start accepting applicants for theDr. Pio Valenzuela
                    Scholarship Program on December 13, 2023. Here are the 
                    qualifications and requirements for the scholarship program. 
                    <br> <br>
                    Get the downloadable scholarship application form here: 
                    https://www.valenzuela.gov.ph/drpioscholarship 
                    <br> <br>
                    For other concerns, you may send an email to 
                    drpioscholarshiphelpdesk@gmail.com. 
                </p> 
            </div>
        </section> <hr>

        <section class="announce">
            <div class="announce-image">
                <img src="images/pic2.jpg">
            </div>
            <div class="announce-content">
                <h2> Contract Signing </h2>
                <p> City Mayor REX Gatchalian graces the 
                    orientation and contract signing of 212 recipients of the Dr. 
                    Pio Valenzuela Scholarship program at the Pamantasan ng Lungsod 
                    ng Valenzuela (#PLV) Qualified Grantees are required to report at 
                    the Scholarship Office at PLV Maysan Campus, 2nd floor on December 
                    10 to 16, 2023 (except Saturday and Sunday) 8:00 AM to 5:00 PM. 
                    Look for Ms. Miko Tongco regarding Contract Signing and Orientation. 
                    Thank you! 
                </p> 
            </div>
        </section> <hr>

        <section class="announce">
            <div class="announce-image">
                <img src="images/pic3.jpg">
            </div>
            <div class="announce-content">
                <h2> Results for Batch 23 </h2>
                <p> The results of the Dr. Pio Valenzuela Scholarship 
                    Program will be released on Dr. Pio's 154th Birth Anniversary on 
                    December 11, 2023. 
                    <br> <br>
                    Rightfully deserving of the grant, they are currently getting to know 
                    more about their future college journeys as Dr. Pio Valenzuela scholars. 
                    <br> <br>
                    Congratulations and make us proud, dear students! 
                </p> 
            </div>
        </section>
    </div>


    <!--FOOTER-->
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>
</body>
</html>