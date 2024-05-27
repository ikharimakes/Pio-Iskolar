<?php include_once('../functions/general.php');?>
<?php include('../functions/display_prof.php');?>
<?php include('../functions/view_detail.php');?>
<?php include('../functions/add_sch.php');?>

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
            <a href="./ad_scholar.php" style="text-decoration:none">
            <button class="headerBack" id="clickableIcon">
                <ion-icon name="chevron-back-outline"></ion-icon>
                <h1>Back</h1>
            </button>
            </a>

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
                        <ion-icon name="create-outline" onclick="toggleEdit('documentsTable')"></ion-icon>
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
            <br> <br>
            
            <table id="scholarshipTable" class="table-container">
                <tr>
                    <th colspan="4" class="details2">SCHOLARSHIP 
                        <ion-icon name="create-outline" onclick="toggleEdit('scholarshipTable')"></ion-icon>
                    </th>
                </tr> 
                <tr>
                    <th class="details2">ACADEMIC YEAR</th>
                    <th class="details2">1ST SEMESTER</th>
                    <th class="details2">2ND SEMESTER</th>
                    <th class="details2">3RD SEMESTER</th>
                </tr>
                <tr>
                    <th class="details2">2023-2024</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr> 
                <tr>
                    <th class="details2">2024-2025</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2025-2026</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2026-2027</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
                <tr>
                    <th class="details2">2027-2028</th>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                    <td><input type="text" class="input2"></td>
                </tr>
            </table>

            <br> <br>
            <table id="remarksTable" class="table-container">
                <tr>
                    <th class="details2">REMARKS 
                        <ion-icon name="create-outline" onclick="toggleEdit('remarksTable')"></ion-icon>
                    </th>
                </tr>
                <tr>
                    <td><textarea rows="10" class="input3"></textarea></td>
                </tr>
            </table>  
        </div> <br>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // EDIT TABLE
        function toggleEdit(tableId) {
            const table = document.getElementById(tableId);
            const inputs = table.querySelectorAll('input[type="text"], textarea');
            const icon = table.querySelector('ion-icon');

            inputs.forEach(input => {
                input.disabled = !input.disabled;
            });

            if (icon.name === 'create-outline') {
                icon.name = 'close-outline';
            } else {
                icon.name = 'create-outline';
            }

            let saveButton = table.querySelector('.save-button');
            if (!saveButton) {
                saveButton = document.createElement('button');
                saveButton.textContent = 'Save';
                saveButton.classList.add('save-button');
                saveButton.onclick = () => {
                    inputs.forEach(input => input.disabled = true);
                    icon.name = 'create-outline';
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.getElementById('editButton');
    const cancelButton = document.getElementById('cancelButton');
    const saveButton = document.querySelector('button[name="save"]');
    const inputs = document.querySelectorAll('input[readonly], select[disabled]');

    editButton.addEventListener('click', function() {
        inputs.forEach(input => {
            input.removeAttribute('readonly');
            input.removeAttribute('disabled');
        });
        editButton.style.display = 'none';
        cancelButton.style.display = 'inline';
        saveButton.style.display = 'inline';
    });

    cancelButton.addEventListener('click', function() {
        inputs.forEach(input => {
            input.setAttribute('readonly', 'readonly');
            input.setAttribute('disabled', 'disabled');
        });
        editButton.style.display = 'inline';
        cancelButton.style.display = 'none';
        saveButton.style.display = 'none';
        // Optionally, reload the page to revert changes
        location.reload();
    });

    saveButton.addEventListener('click', function() {
        document.getElementById('profileForm').submit();
    });
});

    </script>
</body>
</html>
