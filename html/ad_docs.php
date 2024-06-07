<?php 
include('../functions/general.php');
include('../functions/view_docx.php');

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 15;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'sub_date';
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
    <title>Scholar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/ad_docs.css">
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
                <h1>PENDING DOCUMENTS</h1>
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


        <!-- DOCUMENTS -->
        <div class="info">
            <div class="search">
                <form action="" method="get">
                    <label>
                        <input type="text" name="search" placeholder="Search here" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <ion-icon name="search-outline" onclick="this.closest('form').submit();"></ion-icon>
                    </label>
                </form>
            </div>
        </div>

        <div class="table">
            <table>
                <tr style="font-weight: bold;">
                    <td style="width:10%"> 
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=scholar_no&order=<?= $sortColumn === 'scholar_no' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">
                            Scholar No. <?= getSortIcon('scholar_no') ?>
                        </a> 
                    </td>
                    <td> 
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=doc_name&order=<?= $sortColumn === 'scholar_no' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">
                            Document Name <?= getSortIcon('doc_name') ?>
                        </a>
                    </td>
                    <td style="width:10%">
                        <a href="?page=<?= $currentPage ?>&search=<?= $search ?>&sort=sub_date&order=<?= $sortColumn === 'sub_date' && $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">
                            Date <?= getSortIcon('sub_date') ?>
                        </a>
                    </td>
                    <td style="width:8%"> Type </td>
                    <td style="width:10%" class="statusColor"> Status </td>
                    <td style="width:12%; text-align: right;"> Action </td>
                </tr>
                <?php docxPending($currentPage, $recordsPerPage, $search, $sortColumn, $sortOrder) ?>
            </table>
        </div>

        <!-- PAGINATION -->
        <?php include('pagination.php');?>
    </div>

    <!-- VIEW MODAL -->
    <div id="viewOverlay" class="view">
        <div class="view-content">
            <h2 id="view-doc_name">Document Name</h2>
            <span class="closeView" onclick="closePrev()">&times;</span>
            
            <form id="updateForm" method="post" action="">
                <input type="hidden" id="update-doc_id" name="doc_id">

                <div class="status">
                    <h4>Status:</h4>
                    <label>
                        <input type="radio" name="status" value="APPROVED" id="approveRadio"> APPROVE
                    </label>
                    <label>
                        <input type="radio" name="status" value="DECLINED" id="declineRadio"> DECLINE
                    </label>
                </div>

                <div id="declineOptions" style="display: none;">
                    <div class="decline">
                        <h4>Reason for Declining:</h4>
                        <select name="declineReason" id="declineReasonSelect">
                            <option value="" disabled selected>Select a reason</option>
                            <option value="CORRUPTED FILE">CORRUPTED FILE</option>
                            <option value="NOT LEGIBLE/READABLE">NOT LEGIBLE/READABLE</option>
                            <option value="WRONG DOCUMENT">WRONG DOCUMENT</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                    </div>

                    <div id="otherReason" style="display: none;" class="others">
                        <h4>Enter other reasons:</h4>
                        <textarea name="reason" id="denialReasonText" placeholder="Type your reason here"></textarea>
                    </div>
                </div> <br>

                <center>
                    <button id="updateButton" type="submit" name="update" class="btnSave">Save</button>
                </center>
            </form>

             <br> <hr> <br>
            <center>
                <div class="pdfViewer" id="pdfViewer"></div>
            </center>
        </div>
    </div>

    <!-- APPROVE MODAL -->
    <div id="approveOverlay" class="deleteOverlay">
        <div class="delete-content">
            <div class="infos">
                <h2>Confirm Approval</h2>
                <span class="closeDelete" onclick="closeApprove()">&times;</span>
            </div>
            <div class="message">
                <h4>Are you sure you want to approve this document?</h4>
            </div>
            <div class="button-container">
                <form id="approveForm" method="post" action="">
                    <input type="hidden" id="approve-id" name="doc_id">
                    <button type="submit" name="approve" class="yes-button">Yes</button>
                    <button type="button" class="no-button" onclick="closeApprove()">No</button>
                </form>
            </div>
        </div>
    </div>

    <!-- DECLINE MODAL -->
    <div id="declineOverlay" class="deleteOverlay">
        <div class="delete-content">
            <div class="infos">
                <h2>Confirm Decline</h2>
                <span class="closeDelete" onclick="closeDecline()">&times;</span>
            </div>
            <form id="declineForm" method="post" action="">
                <input type="hidden" id="decline-id" name="doc_id">

                <div class="message">
                    <h4>Are you sure you want to decline this document?</h4>
                </div>

                <div id="declineOptions2">
                        <div class="decline">
                            <select name="declineReason_alt" id="declineReasonSelect2" style="width:100%">
                                <option value="" disabled selected>Reason for Declining</option>
                                <option value="CORRUPTED FILE">CORRUPTED FILE</option>
                                <option value="NOT LEGIBLE/READABLE">NOT LEGIBLE/READABLE</option>
                                <option value="WRONG DOCUMENT">WRONG DOCUMENT</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                        </div>

                        <div id="otherReason2" style="display: none;" class="others">
                            <h4>Enter other reasons:</h4>
                            <textarea name="reason_alt" id="denialReasonText2" placeholder="Type your reason here"></textarea>
                        </div>
                    </div>

                <div class="button-container">
                        <button type="submit" name="decline" class="yes-button" id="declineSubmitButton2" class="disabled-button">Yes</button>
                        <button type="button" class="no-button" onclick="closeDecline()">No</button>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.1.81/pdf.min.js"></script>
    <script src="../functions/page.js"></script>
    <script src="../functions/notif.js"></script>
    <script>
        function openPrev(elem) {
            const status = elem.getAttribute("data-doc_status");
            const reason = elem.getAttribute("data-doc_reason") || "";

            document.getElementById("view-doc_name").innerText = elem.getAttribute("data-doc_name");
            document.getElementById("update-doc_id").value = elem.getAttribute("data-submit_id");

            if (status === "PENDING") {
                document.getElementById("approveRadio").disabled = false;
                document.getElementById("declineRadio").disabled = false;
                document.getElementById("updateButton").style.display = "block";
            } else {
                document.getElementById("approveRadio").disabled = true;
                document.getElementById("declineRadio").disabled = true;
                document.getElementById("updateButton").style.display = "none";
            }

            document.getElementById("approveRadio").checked = status === "APPROVED";
            document.getElementById("declineRadio").checked = status === "DECLINED";
            document.getElementById("declineOptions").style.display = status === "DECLINED" ? "block" : "none";
            document.getElementById("otherReason").style.display = reason && status === "DECLINED" ? "block" : "none";
            document.getElementById("denialReasonText").value = reason;

            const pdfPath = '../assets/' + elem.getAttribute("data-doc_name");
            loadPDF(pdfPath);

            document.getElementById("viewOverlay").style.display = "block";
            validateForm();  // Add this line to validate form on opening
        }

        document.getElementById("approveRadio").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("declineOptions").style.display = "none";
            }
            validateForm();
        });

        document.getElementById("declineRadio").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("declineOptions").style.display = "block";
            }
            validateForm();
        });

        document.getElementById("declineReasonSelect").addEventListener("change", function() {
            if (this.value === "OTHER") {
                document.getElementById("otherReason").style.display = "block";
            } else {
                document.getElementById("otherReason").style.display = "none";
            }
            validateForm();
        });

        document.getElementById("denialReasonText").addEventListener("input", validateForm);

        function validateForm() {
            const approveRadio = document.getElementById("approveRadio").checked;
            const declineRadio = document.getElementById("declineRadio").checked;
            const declineReasonSelected = document.getElementById("declineReasonSelect").value;
            const otherReasonText = document.getElementById("denialReasonText").value.trim();

            const saveButton = document.getElementById("updateButton");

            if (approveRadio || (declineRadio && declineReasonSelected && (declineReasonSelected !== "OTHER" || otherReasonText))) {
                saveButton.disabled = false;
                saveButton.style.background = "#2F3787";
            } else {
                saveButton.disabled = true;
                saveButton.style.background = "grey";
            }
        }

        document.getElementById("declineReasonSelect2").addEventListener("change", function() {
            if (this.value === "OTHER") {
                document.getElementById("otherReason2").style.display = "block";
            } else {
                document.getElementById("otherReason2").style.display = "none";
            }
            validateForm2();
        });

        document.getElementById("denialReasonText2").addEventListener("input", validateForm2);

        function validateForm2() {
            const declineReasonSelected = document.getElementById("declineReasonSelect2").value;
            const otherReasonText = document.getElementById("denialReasonText2").value.trim();

            const saveButton = document.getElementById("declineSubmitButton2");

            if (declineReasonSelected && (declineReasonSelected !== "OTHER" || otherReasonText)) {
                saveButton.disabled = false;
                saveButton.style.background = "#2F3787";
            } else {
                saveButton.disabled = true;
                saveButton.style.background = "grey";
            }
        }
        
        function closePrev() {
            const status = document.querySelector('input[name="status"]:checked');
            localStorage.setItem('update-doc_id', document.getElementById('update-doc_id').value);
            localStorage.setItem('update-status', status ? status.value : '');
            localStorage.setItem('update-reason', document.getElementById('declineReasonSelect').value);
            localStorage.setItem('update-other-reason', document.getElementById('denialReasonText').value);
            document.getElementById("viewOverlay").style.display = "none";
        }

        window.onload = function() {
            const doc_id = localStorage.getItem('update-doc_id');
            const status = localStorage.getItem('update-status');
            const reason = localStorage.getItem('update-reason');
            const otherReason = localStorage.getItem('update-other-reason');

            if (doc_id) {
                document.getElementById('update-doc_id').value = doc_id;
                if (status === "APPROVED") {
                    document.getElementById('approveRadio').checked = true;
                } else if (status === "DECLINED") {
                    document.getElementById('declineRadio').checked = true;
                    document.getElementById('declineOptions').style.display = 'block';
                    document.getElementById('declineReasonSelect').value = reason;
                    if (reason === "OTHER") {
                        document.getElementById('otherReason').style.display = 'block';
                        document.getElementById('denialReasonText').value = otherReason;
                    }
                }
            }
        };

        function loadPDF(pdfPath) {
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.1.81/pdf.worker.min.js';

            var loadingTask = pdfjsLib.getDocument(pdfPath);
            loadingTask.promise.then(function(pdf) {
                console.log('PDF loaded');

                pdf.getPage(1).then(function(page) {
                    console.log('Page loaded');

                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function() {
                        console.log('Page rendered');
                        var pdfViewer = document.getElementById('pdfViewer');
                        pdfViewer.innerHTML = '';
                        pdfViewer.appendChild(canvas);
                    });
                });
            }, function (reason) {
                console.error(reason);
            });
        }

        // APPROVE
        function openApprove(elem) {
            if (elem.closest('.icon').classList.contains('disabled')) return;
            document.getElementById("approve-id").value = elem.getAttribute("data-id");
            document.getElementById("approveOverlay").style.display = "block";
        }
        function closeApprove() {
            document.getElementById("approveOverlay").style.display = "none";
        }

        // DECLINE
        function openDecline(elem) {
            if (elem.closest('.icon').classList.contains('disabled')) return;
            document.getElementById("decline-id").value = elem.getAttribute("data-id");
            document.getElementById("declineOverlay").style.display = "block";
        }

        function closeDecline(elem) {
            document.getElementById("declineOverlay").style.display = "none";
        }

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