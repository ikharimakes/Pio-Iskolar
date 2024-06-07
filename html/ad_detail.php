<?php 
include_once('../functions/general.php');
include('../functions/display_prof.php');
include('../functions/view_detail.php');
include('../functions/add_sch.php');
?>

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
                        <ion-icon name="create-outline" onclick="openUpload()"></ion-icon>
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
                <?php displayStatusTable();?>
            </table>

            <br> <br>
            <table id="remarksTable" class="table-container">
                <tr>
                    <th class="details2">REMARKS 
                        <ion-icon name="create-outline" onclick="toggleEdit('remarksTable')"></ion-icon>
                    </th>
                </tr>
                <tr>
                    <?php displayRemarks();?>
                </tr>
            </table>
        </div> <br>
    </div>
    
    <!-- UPLOAD MODAL -->
    <div id="uploadOverlay" class="uploadOverlay">
        <div class="upload-content">
            <form action="" method="post" enctype="multipart/form-data">   
                <div>
                    <span class="closeUpload" onclick="closeUpload()">&times;</span>
                </div>
                <div id="select" class="container">    
                    <label for="acad_year">Academic Year:</label>
                    <input id="acad-year" type="text" name="acad_year" pattern="\d{4}-\d{4}" required>
                    
                    <label for="sem" style="margin-left:5vh;">Semester:</label>
                    <select id="sem" name="sem" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div> <br> <hr>
                <div class="container">
                    <div class="reqs">
                        <h2> Photocopy of Certificate of Registration </h2>
                    </div>
                    
                    <div class="formats">
                        <p class="file"> Maximum File Size: </p>
                        <p class="files"> 5MB </p>
                    </div>

                    <div class="formats">
                        <p class="file"> File Type:</p>
                        <p class="files"> PDF File </p>
                    </div> <br> 

                    <label type="button" class="lblAdd" for="choose-file-TOR">
                        <ion-icon name="share-outline" role="img" class="md hydrated"></ion-icon> UPLOAD FILE
                    </label>
                    <input name="TOR" type="file" id="choose-file-TOR" accept=".pdf" style="display: none;">
                </div> <br> <hr>

                <div class="container">
                    <div class="reqs">
                        <h2> Photocopy of Grades/Transcript of Records </h2>
                    </div>
                    
                    <div class="formats">
                        <p class="file"> Maximum File Size: </p>
                        <p class="files"> 5MB </p>
                    </div>

                    <div class="formats">
                        <p class="file"> File Type:</p>
                        <p class="files"> PDF File </p>
                    </div> <br> 

                    <label type="button" class="lblAdd" for="choose-file-COR">
                        <ion-icon name="share-outline" role="img" class="md hydrated"></ion-icon> UPLOAD FILE
                    </label>
                    <input name="COR" type="file" id="choose-file-COR" accept=".pdf" style="display: none;">
                </div> <br> <hr>

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

                    <label type="button" class="lblAdd" for="choose-file-SCF">
                        <ion-icon name="share-outline" role="img" class="md hydrated"></ion-icon> UPLOAD FILE
                    </label>
                    <input name="SCF" type="file" id="choose-file-SCF" accept=".pdf" style="display: none;">
                </div> <br> <hr> <br>

                <div class="submit">
                    <button type="submit" name="submission" class="btnSubmit"> Submit </button> 
                </div> <br>
            </form>
        </div> <br> <br>
    </div>

        </div>
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

        // UPLOAD
        function openUpload() {
            document.getElementById("uploadOverlay").style.display = "block";
        }
        function closeUpload() {
            document.getElementById("uploadOverlay").style.display = "none";
        }

        // EDIT TABLE
        function toggleEdit(tableId) {
            const table = document.getElementById(tableId);
            const inputs = table.querySelectorAll('input[type="text"], textarea');
            const icon = table.querySelector('ion-icon');

            let isEditing = Array.from(inputs).some(input => !input.disabled);

            inputs.forEach(input => {
                input.disabled = isEditing;
            });

            if (icon.name === 'create-outline') {
                icon.name = 'close-outline';
            } else {
                icon.name = 'create-outline';
            }

            let saveButton = table.querySelector('.save-button');
            if (!saveButton && !isEditing) {
                saveButton = document.createElement('button');
                saveButton.textContent = 'Save';
                saveButton.classList.add('save-button');
                saveButton.onclick = () => {
                    console.log("Save button clicked");
                    inputs.forEach(input => input.disabled = true);
                    icon.name = 'create-outline';
                    saveButton.remove();
                    saveData(tableId, inputs);
                };
                table.appendChild(saveButton);
            } else if (saveButton && isEditing) {
                saveButton.remove();
            }
        }

        // Function to save data via AJAX
        function saveData(tableId, inputs) {
            let data = {};
            if (tableId === 'scholarshipTable') {
                data = { scholarship: [] };
                inputs.forEach(input => {
                    if (input.type === 'text') {
                        const acadYear = input.getAttribute('data-acad-year');
                        const sem = input.getAttribute('data-sem');
                        const status = input.value;
                        data.scholarship.push({ acad_year: acadYear, sem: sem, status: status });
                    }
                });
            } else if (tableId === 'remarksTable') {
                data = { remarks: inputs[0].value };
            }

            console.log("Data to be sent:", data); // Add this line to inspect the data

            $.ajax({
                url: '../functions/view_detail.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    console.log('Data saved successfully:', response);
                },
                error: function(error) {
                    console.log('Error saving data:', error);
                }
            });
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
    
    function updateStatusColor() {
        var select = document.getElementById("scholarStatus");
        var selectedOption = select.options[select.selectedIndex];
        var color = "";
        switch(selectedOption.value) {
            case "ACTIVE":
                color = "rgb(0, 136, 0)";
                break;
            case "PROBATION":
                color = "rgb(255,148,0)";
                break;
            case "DROPPED":
                color = "rgb(189, 0, 0)";
                break;
            case "LOA":
                color = "rgb(212, 120, 0)";
                break;
            case "GRADUATED":
                color = "rgb(0,68,255)";
                break;
        }
        select.style.color = color;
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateStatusColor();
        document.getElementById("scholarStatus").addEventListener("change", updateStatusColor);
    });
    </script>
</body>
</html>
