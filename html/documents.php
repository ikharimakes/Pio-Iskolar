<?php 
include('../functions/general.php');
include('../functions/add_docx.php');

// Assume $scholar_id is set from the session or another reliable source
$scholar_id = $_SESSION['uid'];
global $year, $sem;

function getUploadButtonHtml($scholar_id, $doc_type, $year, $sem) {
    $docDetails = getDocumentDetails($scholar_id, $doc_type, $year, $sem);
    if ($docDetails) {
        if ($docDetails['doc_status'] === 'DECLINED') {
            $buttonLabel = 'Replace Document';
            $buttonStyle = '';
        } else {
            $buttonLabel = '';
            $buttonStyle = 'hidden';
        }
        return "
            <p>{$docDetails['doc_name']} - {$docDetails['doc_status']}</p>
            <label type='button' class='lblAdd' for='choose-file-$doc_type' $buttonStyle>
                <ion-icon name='share-outline'></ion-icon> $buttonLabel
            </label>
            <input name='$doc_type' type='file' id='choose-file-$doc_type' accept='.pdf' style='display: none;' $buttonStyle />
        ";
    } else {
        return "
            <label type='button' class='lblAdd' for='choose-file-$doc_type'>
                <ion-icon name='share-outline'></ion-icon> Upload File
            </label>
            <input name='$doc_type' type='file' id='choose-file-$doc_type' accept='.pdf' style='display: none;' />
        ";
    }
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
</head>
<body>
    <!-- SIDEBAR -->
    <?php include('sk_navbar.php');?>

    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="headerRight" >
                <div class="notif" id="clickableIcon">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php" id="clickableIcon">
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
                        <div class="reqs">
                            <h2> Photocopy of Certificate of Registration </h2>
                            <h5>(Current Academic Year and Semester)</h5>
                        </div>
                        
                        <div class="formats">
                            <p class="file"> Maximum File Size: </p>
                            <p class="files"> 5MB </p>
                        </div>

                        <div class="formats">
                            <p class="file"> File Type:</p>
                            <p class="files"> PDF File </p>
                        </div> <br> 

                        <?php echo getUploadButtonHtml($scholar_id, 'COR', $year, $sem); ?> 
                    </div> <br> <hr> <br>

                    
                    <div class="container">
                        <div class="reqs">
                            <h2> Photocopy of Certificate of Registration </h2>
                            <h5>(Current Academic Year and Semester)</h5>
                        </div>
                        
                        <div class="formats">
                            <p class="file"> Maximum File Size: </p>
                            <p class="files"> 5MB </p>
                        </div>

                        <div class="formats">
                            <p class="file"> File Type:</p>
                            <p class="files"> PDF File </p>
                        </div> <br> 

                        <?php echo getUploadButtonHtml($scholar_id, 'TOR', $year, $sem); ?> 
                    </div> <br> <hr> <br>

                    <div class="container">
                        <h2 class="reqs"> Social Service Monitoring Record with complete 40 hours </h2>
                        
                        <div class="formats">
                            <p class="file"> Maximum File Size: </p>
                            <p class="files"> 5MB </p>
                        </div>

                        <div class="formats">
                            <p class="file"> File Type:</p>
                            <p class="files"> PDF File </p>
                        </div> <br> 

                        <?php echo getUploadButtonHtml($scholar_id, 'SCF', $year, $sem); ?> 
                    </div> <br> <hr> <br>

                    <div class="submit">
                        <button type="submit" name="submission" class="btnSubmit"> Submit </button> 
                    </div> <br>
                </div>
            </form>
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
