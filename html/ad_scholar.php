<?php
include_once('../functions/general.php');
include('../functions/view_sch.php');
include('../functions/add_sch.php');

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'batch_num';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'DESC';

$totalRecords = getTotalRecords($search);
$totalPages = ceil($totalRecords / $recordsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ad_sko.css">
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
            <div class="headerName">
                <h1>SCHOLARS</h1>
            </div>

            <div class="headerRight">
                <div class="notif">
                    <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
                </div>

                <a class="user" href="ad_settings.php">
                    <img src="images/profile.png" alt="">
                </a>
            </div>
        </div>

        <!-- SCHOLAR LIST -->
        <div class="info">
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>

            <button type="button" class="btnAdd" style="margin-right: 1vh;"onclick="openAdd()"> Add Scholar </button>
            <button type="button" class="btnAdd" onclick="openBatch()"> Batch Creation </button>
        </div> <br>

        <div class="tables">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:5%"> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=batch_num&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Batch</a></td>
                    <td style="width:10%"> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=scholar_id&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Scholar No.</a> </td>
                    <td style="width:12%"> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=last_name&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Last Name</a> </td>
                    <td> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=first_name&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">First Name</a> </td>
                    <td style="width:20%"> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=middle_name&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Middle Initial</a> </td>
                    <td style="width:10%"> <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=status&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Status</a> </td>
                    <td style="width:3%"> Actions </td>
                </tr>
                <?php scholarDisplay($currentPage, $recordsPerPage, $search, $sortColumn, $sortOrder);?>
            </table>
        </div>

        <!-- PAGINATION -->
        <?php include('pagination.php');?>

    </div>

    <!-- ADD SCHOLAR MODAL -->    
    <div id="addOverlay" class="overlay">
        <form id="addScholarForm" method="post" action="">
            <div class="overlay-content">
                <h2>ADD INDIVIDUAL SCHOLAR</h2>
                <span class="closeOverlay" onclick="closeAdd()">&times;</span>
                    
                <table>
                    <tr>
                        <td class="details">SCHOLAR ID</td>
                        <td><input type="text" class="input" name="scholar_id" maxlength="5" pattern="\d{5}" placeholder="29001" required></td>
                    </tr>
                    <tr>
                        <td class="details">NAME</td>
                        <td>
                            <input type="text" class="input" name="last_name" placeholder="Last Name" required>
                            <input type="text" class="input" name="first_name" placeholder="First Name(s)" required>
                            <input type="text" class="input" name="middle_name" placeholder="Middle Name">
                        </td>
                    </tr>
                    <tr>
                        <td class="details">SCHOOL</td>
                        <td>
                            <input list="school" class="input" name="school" required>
                            <?php datalisting("school", "scholar", "school");?>
                        </td>
                    </tr>
                    <tr>
                        <td class="details">COURSE</td>
                        <td>
                            <input list="course" class="input" name="course" required>
                            <?php datalisting("course", "scholar", "course");?>
                        </td>
                    </tr>
                    <tr>
                        <td class="details">ADDRESS</td>
                        <td><input type="text" class="input" name="address" required></td>
                    </tr>
                    <tr>
                        <td class="details">CONTACT</td>
                        <td><input type="text" class="input" name="contact" pattern="\+63\d{10}" placeholder="+639XXXXXXXXX" value="+63" required></td>
                    </tr>
                    <tr>
                        <td class="details">EMAIL</td>
                        <td><input type="email" class="input" name="email" placeholder="example.email@gmail.com" required></td>
                    </tr>
                </table>
                
                <br><br>
                <button name="individual" type="submit" class="button">SAVE</button>
            </div>
        </form>
    </div>

    <!-- BATCH UPLOAD MODAL -->
    <div id="batchOverlay" class="batchOverlay">
        <div class="batch-content">
            <div class="infos">
                <h2>Batch Creation</h2>
                <span class="closeBatch" onclick="closeBatch()">&times;</span>
            </div>
            <br><br>

            <div class="step">
                <h4>Step 1: Download CSV Template</h4>
                <a href="../assets/SCHOLAR TEMPLATE.csv" download="SCHOLAR TEMPLATE" class="dl-button"> 
                    <ion-icon name="download-outline"></ion-icon>CSV Template
                </a>
            </div> <br>

            <div class="step">
                <h4>Step 2: Fill out the Template</h4>
            </div> <br>

            <div class="step">
                <h4>Step 3: Upload here </h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <label type="button" class="lblAdd" for="upload"> 
                        <ion-icon name="share-outline"> </ion-icon>
                        Batch Creation
                        <input type="file" name="csv" accept=".csv" id="upload" onchange="form.submit()" hidden/>
                    </label>
                </form>
            </div>
            <br> <br>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div id="deleteOverlay" class="deleteOverlay">
        <div class="delete-content">
            <div class="infos">
                <h2>Confirm Delete</h2>
                <span class="closeDelete" onclick="closeDelete()">&times;</span>
            </div>

            <div class="message">
                <h4>Are you sure you want to delete this?</h4>
            </div>

            <div class="button-container">
                <form id="deleteForm" method="post" action="">
                    <input type="hidden" id="delete-id" name="id">
                    <button type="submit" name="delete" class="yes-button">Yes</button>
                    <button class="no-button" onclick="closeDelete()"> No </button>
                </form>
            </div>
        </div>
    </div>

    <!-- NOTIFICATION -->
    <?php include('notification.php');?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../functions/page.js"></script>
    <script src="../functions/notif.js"></script>
    <script>
        // ERROR
        function closeError() {
            document.getElementById("errorOverlay").style.display = "none";
        }
        
        // ADD SCHOLAR
        function openAdd() {
            document.getElementById("addOverlay").style.display = "block";
        }
        function closeAdd() {
            document.getElementById("addOverlay").style.display = "none";
        }
        function submitForm() {
            closeAdd();
        }

        // BATCH UPLOAD
        function openBatch() {
            document.getElementById("batchOverlay").style.display = "block";
        }
        function closeBatch() {
            document.getElementById("batchOverlay").style.display = "none";
        }
        function submitForm() {
            closeBatch();
        }

        // VIEW MODAL
        function openPrev() {
            document.getElementById("viewOverlay").style.display = "block";
        }
        function closePrev() {
            document.getElementById("viewOverlay").style.display = "none";
        }
        function submitForm() {
            closeAdd();
        }

        // DELETE
        function openDelete(elem) {
            document.getElementById("delete-id").value = elem.getAttribute("data-id");
            document.getElementById("deleteOverlay").style.display = "block";
        }
        function closeDelete() {
            document.getElementById("deleteOverlay").style.display = "none";
        }
    </script>
</body>
</html>
