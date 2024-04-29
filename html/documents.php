<?php include('../functions/general.php');?>
<?php include('../functions/docxmgmt.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
    input::file-selector-button {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        border: thin solid grey;
        border-radius: 3px;
        padding: 0.5rem;
        padding-left: 1rem;
        padding-right: 1rem;
        color: rgb(112, 112, 112);
        background-color: #ffffff;
    }
    </style>
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
        <h1> REQUIREMENTS </h1>
        <p> These requirements must be submitted after every enrollment. </p>
    </div>

    <center><div class="cards">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="card"> 
            <div class="container">
                <h2 class="reqs"> Photocopy of Certificate of Registration 3rd Year 2nd Semester </h2>
                
                <h3 class="format"> Follow the file name format: </h3>
                <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_2ndsem_COR.pdf</p>

                <input type="file" name="register" accept=".pdf"/>
            </div> <br> <br> <hr> <br>

            <div class="container">
                <h2 class="reqs"> Photocopy of Certificate of Report Card 3rd Year 1st Semester </h2>
                
                <h3 class="format"> Follow the file name format: </h3>
                <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_1stsem_Grades.pdf</p>

                <input type="file" name="grades" accept=".pdf"/>
            </div> <br> <br> <hr> <br>

            <div class="container">
                <h2 class="reqs"> Social Service Monitoring Record with complete 40 hours </h2>
                
                <h3 class="format"> Follow the file name format: </h3>
                <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_SocialService.pdf</p>

                <input type="file" name="contract" accept=".pdf"/>
            </div> <br> <br>

            
            <div class="Submit"> <center>
            <button type="submit" name="submission" class="btnSubmit"> Submit </button>
            </center> </div>
        </div>
        </form>
    </div>
    <br> <br>

    <!--FOOTER-->
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>
</body>
</html>