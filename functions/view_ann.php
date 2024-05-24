<?php
    global $conn;

    function updateStatus() {
        global $conn;
        $currentDate = date('Y-m-d');
        // Update status to ACTIVE where current date is between st_date and end_date
        $updateActive = "UPDATE announcements 
                        SET _status = 'ACTIVE' 
                        WHERE st_date <= '$currentDate' AND end_date >= '$currentDate'";
        $conn->query($updateActive);

        // Update status to INACTIVE where current date is not between st_date and end_date
        $updateInactive = "UPDATE announcements 
                        SET _status = 'INACTIVE' 
                        WHERE st_date > '$currentDate' OR end_date < '$currentDate'";
        $conn->query($updateInactive);
    }

    function annList($currentPage = 1, $recordsPerPage = 15, $search = '') {
        global $conn;

        // Update the status of the announcements before fetching them
        updateStatus();

        $offset = ($currentPage - 1) * $recordsPerPage;
        $searchQuery = $search ? "WHERE title LIKE '%$search%' OR _status LIKE '%$search%' OR st_date LIKE '%$search%' OR end_date LIKE '%$search%'" : '';

        $display = "SELECT announce_id, st_date, end_date, title, _status, img_name, content 
                    FROM announcements 
                    $searchQuery
                    ORDER BY end_date 
                    LIMIT $recordsPerPage OFFSET $offset";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '   
                    <tr>
                        <td> '.$row["title"].' </td>
                        <td> '.$row["_status"].' </td>
                        <td> '.$row["st_date"].' </td>
                        <td> '.$row["end_date"].' </td>
                        <td style="text-align: right;" class="wrap"> 
                            <div class="icon">
                                <div class="tooltip"> View</div>
                                <span> <ion-icon name="eye-outline" onclick="openPrev(this)" 
                                    data-id="'.$row["announce_id"].'" 
                                    data-title="'.$row["title"].'" 
                                    data-status="'.$row["_status"].'" 
                                    data-st_date="'.$row["st_date"].'" 
                                    data-end_date="'.$row["end_date"].'" 
                                    data-img="'.$row["img_name"].'" 
                                    data-content="'.$row["content"].'"></ion-icon> </span>
                            </div>
                            
                            <div class="icon">
                                <div class="tooltip"> Edit</div>
                                <span> <ion-icon name="create-outline" onclick="openEdit(this)" 
                                    data-id="'.$row["announce_id"].'" 
                                    data-title="'.$row["title"].'" 
                                    data-status="'.$row["_status"].'" 
                                    data-st_date="'.$row["st_date"].'" 
                                    data-end_date="'.$row["end_date"].'"
                                    data-content="'.$row["content"].'"></ion-icon> </span>
                            </div>

                            <div class="icon">
                                <div class="tooltip"> Delete</div>
                                <span> <ion-icon name="trash-outline" onclick="openDelete(this)" 
                                    data-id="'.$row["announce_id"].'" 
                                    data-img="'.$row["img_name"].'"></ion-icon> </span>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }    
    }

    function getTotalRecords($search = '') {
        global $conn;
        $searchQuery = $search ? "WHERE title LIKE '%$search%' OR _status LIKE '%$search%' OR st_date LIKE '%$search%' OR end_date LIKE '%$search%'" : '';
        $countQuery = "SELECT COUNT(*) as total FROM announcements $searchQuery";
        $result = $conn->query($countQuery);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
?>
