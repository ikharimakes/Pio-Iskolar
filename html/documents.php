<?php 
include_once('../functions/general.php');
include('../functions/add_docx.php');

// Assume $scholar_id is set from the session or another reliable source
$scholar_id = $_SESSION['uid'];

function disableUploadIfPending($scholar_id, $doc_type) {
    return hasPendingDocument($scholar_id, $doc_type) ? 'hidden' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/docu.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="css/error.css">
    <style>
        .custom-file-upload {
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
        .custom-file-upload:disabled {
            background-color: #e0e0e0;
            color: #a0a0a0;
        }
    </style>
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

        <!-- TOP NAV -->
        <div class="details">
            <center> <h1> REQUIREMENTS </h1>

            <div class="topnav">
                <a href="#">Requirements</a>
                <a href="history.php">History</a>
            </div> </center>
        </div>

        <!-- REQUIREMENTS SUBMISSION -->
        <div class="info"> <br>
            <p> These requirements must be submitted after every enrollment. </p>
        </div>

        <div class="cards">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card"> 
                <div class="container">
                    <h2 class="reqs"> Photocopy of Certificate of Registration 3rd Year 2nd Semester </h2>
                    
                    <h3 class="format"> Follow the file name format: </h3>
                    <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_2ndsem_COR.pdf</p>

                    <label for="choose-file1" class="custom-file-upload">
                    Upload PDF
                    </label>
                    <input name="COR" type="file" id="choose-file1" accept=".pdf" style="display: none;" <?php echo disableUploadIfPending($scholar_id, 'COR'); ?> /> 
                </div> <br> <hr> <br>

                <div class="container">
                    <h2 class="reqs"> Photocopy of Certificate of Report Card 3rd Year 1st Semester </h2>
                    
                    <h3 class="format"> Follow the file name format: </h3>
                    <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_1stsem_Grades.pdf</p>

                    <label for="choose-file2" class="custom-file-upload">
                    Upload PDF
                    </label>
                    <input name="TOR" type="file" id="choose-file2" accept=".pdf" style="display: none;" <?php echo disableUploadIfPending($scholar_id, 'TOR'); ?> /> 
                </div> <br> <hr> <br>

                <div class="container">
                    <h2 class="reqs"> Social Service Monitoring Record with complete 40 hours </h2>
                    
                    <h3 class="format"> Follow the file name format: </h3>
                    <p class="file"> DelaCruz_JuanMiguel_DeTorre_3rdyear_SocialService.pdf</p>

                    <label for="choose-file3" class="custom-file-upload">
                    Upload PDF
                    </label>
                    <input name="SCF" type="file" id="choose-file3" accept=".pdf" style="display: none;" <?php echo disableUploadIfPending($scholar_id, 'SCF'); ?> /> 
                </div> <br> <hr> <br>

                <div class="submit">
                    <button type="submit" name="submission" class="btnSubmit"> Submit </button> 
                </div> <br>
            </div></form>
        </div> <br> <br>
    </div>

    <!-- NOTIFICATION -->
    <?php include('notification.php');?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../functions/notif.js"></script>
    <script>
        $(document).ready(function () {
            // Select all input elements with class 'custom-file-upload'
            $('input[type=file]').change(function () {
                var file = $(this)[0].files[0].name;
                // Find the corresponding label by its 'for' attribute
                var labelFor = $(this).attr('id');
                $('label[for=' + labelFor + ']').text(file);
            });
        });
    </script>
</body>
</html>
