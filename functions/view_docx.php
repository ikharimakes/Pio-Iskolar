<?php
	global $conn;

//* DOCUMENT DISPLAY - SCHOLAR *//
	function docxDisplay($id, $currentPage = 1, $recordsPerPage = 15, $search = ''){
	    global $conn;
	    $offset = ($currentPage - 1) * $recordsPerPage;
	    $searchQuery = $search ? " AND (doc_name LIKE '%$search%' OR doc_type LIKE '%$search%' OR doc_status LIKE '%$search%')" : '';

	    $display = "SELECT * FROM submission WHERE scholar_id = '$id' $searchQuery ORDER BY sub_date DESC LIMIT $recordsPerPage OFFSET $offset";
	    $result = $conn->query($display);

	    if ($result->num_rows > 0) {
	        while ($row = $result->fetch_assoc()) {
	            print '
	                <tr> 
	                    <td> '.$row["sub_date"].' </td>
	                    <td> '.$row["doc_name"].' </td>
	                    <td> '.$row["doc_type"].' </td>
	                    <td> '.$row["doc_status"].' </td>
	                    <td class="wrap" style="width:100%">
							<div class="icon">
								<div class="tooltip">View</div>
								<span> <ion-icon name="eye-outline" onclick="openPrev(this)" 
									data-doc_status="'.$row["doc_status"].'"
									data-doc_reason="'.$row["reason"].'"
									data-doc_name="'.$row["doc_name"].'" ></ion-icon> </span>
							</div>

	                        <div class="icon">
								<div class="tooltip">Download</div>
								<a href="../assets/'.$row["doc_name"].'" download="'.$row["doc_name"].'">
									<span> <ion-icon name="download-outline"></ion-icon> </span>
								</a>
	                        </div>

							<div class="icon">	            
				';
				if ($row["doc_status"] != "APPROVED"){
					print '
					<div class="tooltip">Delete</div>

					<span> <ion-icon name="trash-outline" onclick="openDelete(this)" 
						data-id="'.$row["submit_id"].'" 
						data-name="'.$row["doc_name"].'"></ion-icon> </span>
					';
				}
				print '
								</div>
	                        </td>
	                    </tr>
	                ';
	        }
	    }
	}

//* DOCUMENT DISPLAY - ADMIN *//
	function docxList($currentPage = 1, $recordsPerPage = 15, $search = ''){ 
		global $conn;

		$offset = ($currentPage - 1) * $recordsPerPage;
		$searchQuery = $search ? " AND (doc_name LIKE '%$search%' OR doc_type LIKE '%$search%' OR doc_status LIKE '%$search%')" : '';
		$id = $_SESSION['id'];

		$displayQuery = "SELECT * FROM submission WHERE scholar_id = '$id' $searchQuery ORDER BY sub_date LIMIT $recordsPerPage OFFSET $offset";
		
		$result = $conn->query($displayQuery);

		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '
					<tr> 
						<td>'.$row["doc_name"].'</td>
						<td>'.$row["sub_date"].'</td>
						<td>'.$row["doc_type"].'</td>
						<td>'.$row["doc_status"].'</td>
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

    $searchQuery = $search ? " AND (doc_name LIKE '%$search%' OR doc_type LIKE '%$search%' OR doc_status LIKE '%$search%')" : '';
    $countQuery = "SELECT COUNT(*) as total FROM submission WHERE 1=1 $searchQuery";

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
		die;
	}
?>
