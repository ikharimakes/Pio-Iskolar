<?php
    include_once('../functions/general.php');
	global $conn;

//* DOCUMENT DISPLAY - PENDING *//
function docxList($currentPage = 1, $recordsPerPage = 15, $search = ''){ 
    global $conn;

    $offset = ($currentPage - 1) * $recordsPerPage;
    $searchQuery = $search ? " AND (doc_name LIKE '%$search%' OR doc_type LIKE '%$search%')" : '';

    $displayQuery = "SELECT * FROM submission WHERE doc_status LIKE 'PENDING' $searchQuery ORDER BY sub_date LIMIT $recordsPerPage OFFSET $offset";
    
    $result = $conn->query($displayQuery);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Determine the color based on status
            $style = "";
            if ($row["doc_status"] == "PENDING") {
				$style = "color: rgb(212, 120, 0); font-weight: 600;";
            }

            echo '
                <tr> 
					<td>'.$row["scholar_id"].'</td>
                    <td>'.$row["doc_name"].'</td>
                    <td>'.$row["sub_date"].'</td>
                    <td>'.$row["doc_type"].'</td>
                    <td style="'.$style.'">'.$row["doc_status"].'</td>
                    <td style="float: right;" class="wrap"> 
                        <div class="icon">
                            <div class="tooltip">View</div>
                            <span> <ion-icon name="eye-outline" onclick="openPrev(this)"
                                data-submit_id="'.$row["submit_id"].'"  
                                data-doc_name="'.$row["doc_name"].'" 
                                data-doc_status="'.$row["doc_status"].'"
                                data-doc_reason="'.$row["reason"].'"></ion-icon> </span>
                        </div>

                        <div class="icon">
                            <div class="tooltip">Download</div>
                            <a href="../assets/'.$row["doc_name"].'" download="'.$row["doc_name"].'">
                                <span> <ion-icon name="download-outline"></ion-icon> </span>
                            </a>
                        </div>

                        <div class="icon">
                            <div class="tooltip"> Approve</div>
                            <span> <ion-icon name="checkmark-circle-outline" onclick="openApprove(this)" 
                                data-id="'.$row["submit_id"].'"></ion-icon> </span>
                        </div>

                        <div class="icon">
                            <div class="tooltip"> Decline</div>
                            <span> <ion-icon name="close-circle-outline" onclick="openDecline(this)" 
                                data-id="'.$row["submit_id"].'"></ion-icon> </span>
                        </div>

                        <div class="icon">
                            <div class="tooltip">Delete</div>

                            <span> <ion-icon name="trash-outline" onclick="openDelete(this)" 
                                data-id="'.$row["submit_id"].'" 
                                data-name="'.$row["doc_name"].'"></ion-icon> </span>
                        </div>
                    </td>
                </tr>
            ';
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
}

function getTotalRecords($search = '') {
    global $conn;

    $searchQuery = $search ? " AND (doc_name LIKE '%$search%' OR doc_type LIKE '%$search%')" : '';
    $countQuery = "SELECT COUNT(*) as total FROM submission WHERE doc_status LIKE 'PENDING' $searchQuery";

    $result = $conn->query($countQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


//* DOCUMENT APPROVAL/DENIAL *//
	if (isset($_POST['update'])) {
		$doc_id = $_POST['doc_id'];
		$status = $_POST['status'];
		$reason = isset($_POST['reason']) ? $_POST['reason'] : null;

		$update = "UPDATE submission SET doc_status = '$status', reason = '$reason' WHERE submit_id = '$doc_id'";
		$result = $conn->query($update);
		header('Location: '.$_SERVER['PHP_SELF']);
		
		$conn -> close();
		die;
	}

//* DOCUMENT APPROVAL/DENIAL *//
	if (isset($_POST['approve'])) {
		$doc_id = $_POST['doc_id'];
		$status = "APPROVED";
		$reason = null;

		$approve = "UPDATE submission SET doc_status = '$status', reason = '$reason' WHERE submit_id = '$doc_id'";
		$result = $conn->query($approve);
		header('Location: '.$_SERVER['PHP_SELF']);
		
		$conn -> close();
		die;
	}

	if (isset($_POST['decline'])) {
		$doc_id = $_POST['doc_id'];
		$status = "DECLINED";
		$reason = isset($_POST['reason']) ? $_POST['reason'] : '';

		$decline = "UPDATE submission SET doc_status = '$status', reason = '$reason' WHERE submit_id = '$doc_id'";
		$result = $conn->query($decline);
		header('Location: '.$_SERVER['PHP_SELF']);
		
		$conn -> close();
		die;
	}

	
//* DOCUMENT DELETION *//
	if(isset($_POST['delete'])){
		$path = "../assets/".$_POST['name'];
		unlink($path);

		$id = $_POST['id'];
		$delete = "DELETE FROM submission WHERE submit_id = '$id'";
		$result = $conn->query($delete);
		header('Location: '.$_SERVER['PHP_SELF']);
		
		$conn -> close();
		die;
	}
?>
