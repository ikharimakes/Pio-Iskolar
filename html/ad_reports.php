<?php
include_once('../functions/general.php');
include('../functions/view_reports.php');
include('../functions/add_reports.php');

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'creation_date';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'DESC';

$totalRecords = getTotalRecords($search);
$totalPages = ceil($totalRecords / $recordsPerPage);

function getSortIcon($column) {
    global $sortColumn, $sortOrder;
    if ($sortColumn === $column) {
        return $sortOrder === 'DESC' ? '<ion-icon name="chevron-up-outline"></ion-icon>' : '<ion-icon name="chevron-down-outline"></ion-icon>';
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
    <title>Reports</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ad_report.css">
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
                <h1>REPORTS</h1>
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

        <!-- REPORTS -->
        <div class="info">        
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= htmlspecialchars($search) ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div> 

            <form action="" method="post">
                <button type="button" class="btnReports" onclick="openModal('reportModal')"> Generate Reports </button> <br>
            </form> 
        </div> <br>

        <div class="tables">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:13%"> 
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=batch_no&order=<?= $sortColumn === 'batch_no' &&  $sortOrder === 'DESC' ? 'ASC' : 'DESC' ?>">
                            Batch No. <?= getSortIcon('batch_no') ?>
                        </a>
                    </td>
                    <td style="width:60%"> 
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=title&order=<?= $sortColumn === 'title' &&  $sortOrder === 'DESC' ? 'ASC' : 'DESC' ?>">
                            Report Name <?= getSortIcon('title') ?>
                        </a>
                    </td>
                    <td style="width:15%"> 
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=creation_date&order=<?= $sortColumn === 'creation_date' && $sortOrder === 'DESC' ? 'ASC' : 'DESC' ?>">
                            Date <?= getSortIcon('creation_date') ?>
                        </a>
                    </td>
                    <td style="width:3%"> Actions </td>
                </tr>
                <?php reportList($currentPage, $recordsPerPage, $search, $sortColumn, $sortOrder);?>
            </table>
        </div>

        <!-- PAGINATION -->
        <?php include('pagination.php');?>
    </div>

    <!-- GENERATE MODAL -->
    <div id="reportModal" class="report">
        <div class="report-content">
            <div class="infos">
                <h1>Generate Reports</h1>
                <span class="closeEdit" onclick="closeModal('reportModal')">&times;</span>
            </div>
            <br><br>

            <form action="" method="post">
                <div class="scholar">
                    <label for="reports">Choose a Report:</label> <br>
                    <select id="reportScholar" name="report">
                        <option value="status">Scholar Status Report</option>
                        <option value="profile">Scholar Profile and Requirement Report</option>
                    </select>
                </div> <br>
                    
                <div class="batch"> 
                    <div id="inputField" class="hideText">
                        <label for="textInput" style="font-weight: bold;">Enter Batch ID:</label>
                        <input type="text" id="textInput" name="batch_id" required>
                    </div>
                </div>

                <div class="btn">
                    <button id="submitBtn" class="generate-button" type="submit" name="generate">Generate</button>
                </div> <br>
            </form> 
        </div> 
    </div>

    <!-- REPORT MODAL -->
    <div id="reportOverlay" class="profileReport">
        <div class="profileReport-content">
            <span class="closeEdit" onclick="closeReportModal()">&times;</span>
            <div id="reportContent">content</div>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div id="deleteModal" class="deleteOverlay">
        <div class="delete-content">
            <div class="infos">
                <h2>Confirm Delete</h2>
                <span class="closeDelete" onclick="closeDeleteModal()">&times;</span>
            </div>

            <div class="message">
                <h4>Are you sure you want to delete this report?</h4>
            </div>

            <div class="button-container">
                <form id="deleteForm" method="post" action="">
                    <input type="hidden" id="delete-id" name="report_id">
                    <button type="submit" name="delete" class="yes-button">Yes</button>
                    <button type="button" class="no-button" onclick="closeDeleteModal()">No</button>
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
        // DELETE MODAL
        function openDelete(element) {
            document.getElementById("delete-id").value = element.getAttribute("data-id");
            document.getElementById("deleteModal").style.display = "block";
        }

        function closeDeleteModal() {
            document.getElementById("deleteModal").style.display = "none";
        }

        // Existing functions
        function openReportModal() {
            document.getElementById("reportOverlay").style.display = "block";
        }
        function closeReportModal() {
            document.getElementById("reportOverlay").style.display = "none";
        }

        function openModal(reportModal) {
            var modal = document.getElementById(reportModal);
            modal.style.display = "block";
        }
        function closeModal(reportModal) {
            var modal = document.getElementById(reportModal);
            modal.style.display = "none";
        }

        function openReport(element) {
            const content = element.getAttribute("data-content");
            document.getElementById("reportContent").innerHTML = content.replace(/\n/g, "<br>");
            openReportModal();
        }
    </script>
</body>
</html>
