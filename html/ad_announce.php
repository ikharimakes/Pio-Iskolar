<?php 
include_once('../functions/general.php');
include('../functions/add_ann.php');
include('../functions/view_ann.php');

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'title';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$totalRecords = getTotalRecords($search);
$totalPages = ceil($totalRecords / $recordsPerPage);

function getSortIcon($column) {
    global $sortColumn, $sortOrder;
    if ($sortColumn === $column) {
        return $sortOrder === 'ASC' ? '<ion-icon name="chevron-down-outline"></ion-icon>' : '<ion-icon name="chevron-up-outline"></ion-icon>';
    } else {
        return '<ion-icon name="chevron-expand-outline"></ion-icon>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ad_announces.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" href="css/page.css">
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
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <?php include('ad_navbar.php');?>

    <!-- TOP BAR -->
    <div class="main">
        <div class="topBar">
            <div class="headerName">
                <h1>ANNOUNCEMENTS</h1>
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

        <!-- ANNOUNCEMENTS -->
        <div class="info">
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>
            
            <form>
                <button type="button" class="btnAnnounce" onclick="openModal('announceModal')"> Add Announcement </button> <br>
            </form> 
        </div> <br>

        <table>
            <tr style="font-weight: bold;">
                <td style="width:50%">
                    <a href="?sort=title&order=<?= $sortColumn === 'title' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>&search=<?= $search ?>&page=<?= $currentPage ?>">
                        Title <?= getSortIcon('title') ?>
                </a>
                </td>
                <td style="width:10%">
                    <a href="?sort=_status&order=<?= $sortColumn === '_status' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>&search=<?= $search ?>&page=<?= $currentPage ?>">
                        Status <?= getSortIcon('_status') ?>
                </a>
                </td>
                <td style="width:12%">
                    <a href="?sort=st_date&order=<?= $sortColumn === 'st_date' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>&search=<?= $search ?>&page=<?= $currentPage ?>">
                        Start Date <?= getSortIcon('st_date') ?>
                </a>
                </td>
                <td style="width:12%">
                    <a href="?sort=end_date&order=<?= $sortColumn === 'end_date' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>&search=<?= $search ?>&page=<?= $currentPage ?>">
                        End Date <?= getSortIcon('end_date') ?>
                </a>
                </td>
                <td style="width:3%"> Action </td>
            </tr>
            <?php annList($currentPage, $recordsPerPage, $search, $sortColumn, $sortOrder); ?>
        </table>

        <!-- PAGINATION -->
        <?php include('pagination.php'); ?>
    </div>
    
    <!-- ADD ANNOUNCEMENTS MODAL -->
    <div id="announceModal" class="announce">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="announce-content">
                <div class="infos">
                    <h1>Publish Announcement</h1>
                    <span class="close" onclick="closeModal('announceModal')">&times;</span>
                </div>
                <br><br>

                <div class="announceTitle">
                    <h3>Announcement Title</h3>
                    <input type="text" name="title"> 
                </div> <br>

                <div class="announceImg">
                    <h3>Upload an Image</h3>
                    <label for="choose-file1" class="custom-file-upload">
                    Upload Image
                    </label>
                    <input name="cover" type="file" id="choose-file1" accept="image/png, image/gif, image/jpeg" style="display: none;" /> 
                </div> <br>

                <div class="announceDetail">
                    <h3>Announcement Details</h3>
                    <textarea name="content" rows="2" cols="50"> </textarea>
                </div> <br>

                <div class="announceDate">
                    <h3>Start Date</h3>
                    <input type="date" name="startDate" required> <br> <br> 

                    <h3>End Date</h3>
                    <input type="date" name="endDate" required>
                </div>

                <div class="btn">
                    <button type="submit" name="add_ann" class="publish-button"> Publish </button>
                </div> <br>
            </div>
        </form>
    </div>

    <!-- VIEW MODAL -->
    <div id="viewOverlay" class="overlay">
        <div class="overlay-content">
            <h2 id="view-title"> Application for Batch 23 </h2>
            <span class="closeOverlay" onclick="closePrev()">&times;</span>

            <div class="card"> 
                <img id="view-img" class="pic" src="images/pic1.jpg" alt="click here">
                <div class="container">
                    <center> 
                        <p id="view-content" class="caption"></p> 
                    </center>
                </div> 
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div id="EditModal" class="announce">
        <div class="announce-content">
            <div class="infos">
                <h1>Edit Announcement</h1>
                <span class="closeOverlay" onclick="closeEdit()">&times;</span>
            </div>
            <br><br>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-id" name="id">
                <div class="announceTitle">
                    <h3>Announcement Title</h3>
                    <input type="text" id="edit-title" name="title">
                </div> <br>

                <div class="announceImg">
                    <h3>Upload an Image</h3>

                    <label for="choose-file2" class="custom-file-upload">
                    Upload Image
                    </label>
                    <input name="cover" type="file" id="choose-file2" accept="image/png, image/gif, image/jpeg" style="display: none;" /> 
                </div> <br>

                <div class="announceDetail">
                    <h3>Announcement Details</h3>
                    <textarea id="edit-content" name="content" rows="2" cols="50"> </textarea>
                </div> <br>

                <div class="announceDate">
                    <h3>Start Date</h3>
                    <input type="date" id="edit-startDate" name="startDate" required> <br> <br> 

                    <h3>End Date</h3>
                    <input type="date" id="edit-endDate" name="endDate" required>
                </div>

                <div class="btn">
                    <button type="submit" name="update_ann" class="publish-button"> Save </button>
                </div> <br>
            </form>
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
                    <input type="hidden" id="delete-img" name="img">
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
        //ADD 
        function openModal(announceModal) {
            var modal = document.getElementById(announceModal);
            modal.style.display = "block";
        }
        function closeModal(announceModal) {
            var modal = document.getElementById(announceModal);
            modal.style.display = "none";
        }
    
        // VIEW
        function openPrev(elem) {
            document.getElementById("view-title").innerText = elem.getAttribute("data-title");
            document.getElementById("view-img").src = '../assets/' + elem.getAttribute("data-img");
            document.getElementById("view-content").innerText = elem.getAttribute("data-content");
            document.getElementById("viewOverlay").style.display = "block";
        }
        function closePrev() {
            document.getElementById("viewOverlay").style.display = "none";
        }

        //EDIT
        function openEdit(elem) {
            document.getElementById("edit-id").value = elem.getAttribute("data-id");
            document.getElementById("edit-title").value = elem.getAttribute("data-title");
            document.getElementById("edit-content").value = elem.getAttribute("data-content");
            document.getElementById("edit-startDate").value = elem.getAttribute("data-st_date");
            document.getElementById("edit-endDate").value = elem.getAttribute("data-end_date");
            document.getElementById("EditModal").style.display = "block";
        }
        function closeEdit() {
            document.getElementById("EditModal").style.display = "none";
        }

        // DELETE
        function openDelete(elem) {
            document.getElementById("delete-id").value = elem.getAttribute("data-id");
            document.getElementById("delete-img").value = elem.getAttribute("data-img");
            document.getElementById("deleteOverlay").style.display = "block";
        }
        function closeDelete() {
            document.getElementById("deleteOverlay").style.display = "none";
        }
        
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