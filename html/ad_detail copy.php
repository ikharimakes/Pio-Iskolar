<?php include_once('../functions/general.php');?>
<?php include('../functions/display_prof.php');?>
<?php include('../functions/view_detail.php');?>

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
            <button class="headerBack" href="./ad_scholar.php" id="clickableIcon">
                <ion-icon name="chevron-back-outline"></ion-icon>
                <h1>Back</h1>
            </button>

            <div class="headerRight">
                <div class="notif">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php">
                    <img src="images/profile.png" alt="">
                </a>
            </div>
        </div>

        <?php navDisplay();?>
        
        <?php adminDisplay();?>

        <br> <br>
        <div class="table">
            <table id="documentsTable" class="table-container">
                <tr>
                    <th colspan="10" class="details2">DOCUMENTS 
                        <ion-icon name="pencil-outline" onclick="toggleEdit('documentsTable')"></ion-icon> 
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" class="details2">ACADEMIC YEAR</th>
                    <th colspan="3" class="details2">1ST SEMESTER</th>
                    <th colspan="3" class="details2">2ND SEMESTER</th>
                    <th colspan="3" class="details2">3RD SEMESTER</th>
                </tr>
                <tr>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                    <th class="details2">COR</th>
                    <th class="details2">GRADES</th>
                    <th class="details2">CONTRACT</th>
                </tr>
                <?php
                    $documents = getDocumentsStatus();
                    displayDocumentsTable($documents);
                ?>
            </table>
        </div> <br>
</div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        //EDIT TABLE
        function toggleEdit(tableId) {
            const table = document.getElementById(tableId);
            const inputs = table.querySelectorAll('input[type="text"]');
            const icon = table.querySelector('ion-icon');

            inputs.forEach(input => {
                input.disabled = !input.disabled;
            });

            if (icon.name === 'pencil-outline') {
                icon.name = 'close-outline';
            } else {
                icon.name = 'pencil-outline';
            }

            let saveButton = table.querySelector('.save-button');
            if (!saveButton) {
                saveButton = document.createElement('button');
                saveButton.textContent = 'Save';
                saveButton.classList.add('save-button');
                saveButton.onclick = () => {
                    inputs.forEach(input => input.disabled = true);
                    icon.name = 'pencil-outline';
                    saveButton.remove();
                    openSave();
                };
                table.appendChild(saveButton);
            } else {
                saveButton.remove();
            }
        }

        // SAVE MODAL
        var modal = document.getElementById("saveOverlay");
        var span = document.getElementsByClassName("closeSave")[0];

        function openSave() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
