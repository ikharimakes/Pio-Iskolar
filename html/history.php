<?php 
include('../functions/general.php');
include('../functions/view_docx.php');

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$totalRecords = getTotalRecords($search);
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirement History</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/history.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" href="css/page.css">
</head>


<body>
    <!-- SIDEBAR -->
    <?php include('sk_navbar.php');?>
    
    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="notif">
                <ion-icon name="notifications-outline" onclick="openOverlay()"></ion-icon>
            </div>

            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>

            <a class="user" href="ad_settings.php">
                <img src="images/profile.png" alt="">
            </a>

            <a class="logOut" href="front_page.php"> 
                <ion-icon name="log-out-outline"></ion-icon> 
                <h5> Log Out </h5>
            </a>
        </div>

        <!-- TOP NAV -->
        <div class="details">
            <center> <h1> REQUIREMENTS </h1>

            <div class="topnav">
                <a href="documents.php">Requirements</a>
                <a href="#">History</a>
            </div> </center>
        </div>

        <!-- SUBMISSION HISTORY -->
        <div class="table">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:8%"> Date </td>
                    <td style="width:50%"> Document Name </td>
                    <td style="width:10%"> Type </td>
                    <td style="width:10%"> Status </td>
                    <td style="width:3%"> Actions </td>
                </tr>
                <?php docxDisplay($_SESSION["uid"], $currentPage, $recordsPerPage, $search)?>
            </table>
        </div>
        
        <!-- PAGINATION -->
        <?php include('pagination.php');?>
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
                    <input type="hidden" id="delete-name" name="name">
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
        // DELETE
        function openDelete(elem) {
            document.getElementById("delete-id").value = elem.getAttribute("data-id");
            document.getElementById("delete-name").value = elem.getAttribute("data-name");
            document.getElementById("deleteOverlay").style.display = "block";
        }
        function closeDelete() {
            document.getElementById("deleteOverlay").style.display = "none";
        }
    </script>
</body>
</html>