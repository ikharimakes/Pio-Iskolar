<?php
    global $conn;

    function scholarDisplay($currentPage = 1, $recordsPerPage = 15, $search = '') {
        global $conn;
        $offset = ($currentPage - 1) * $recordsPerPage;
        $searchQuery = $search ? "WHERE last_name LIKE '%$search%' OR first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR status LIKE '%$search%'" : '';

        $display = "SELECT batch_num, scholar_id, user_id, last_name, first_name, middle_name, email, status
                    FROM scholar
                    $searchQuery
                    ORDER BY batch_num DESC, scholar_id
                    LIMIT $recordsPerPage OFFSET $offset";
        
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr>
                        <td> '.$row["batch_num"].'</td>
                        <td> '.$row["scholar_id"].' </td>
                        <td> '.$row["last_name"].' </td>
                        <td> '.$row["first_name"].' </td>
                        <td> '.substr($row["middle_name"], 0, 1).' </td>
                        <td> '.$row["status"].' </td>
                        <td style="text-align: right;" class="wrap"> 
                            <form style="display:inline" action="ad_detail.php" method="post"><div class="icon">
                                <div class="tooltip"> View</div>
                                <input type="hidden" name="scholar_id" value="'.$row["scholar_id"].'">
                                
                                <button type="submit" name="view" style="all:unset;">
                                <span><ion-icon name="eye-outline"></ion-icon> </a> </span></button>
                            </div></form>

                            <div class="icon">
                                <div class="tooltip"> Download</div>
                                <span> <ion-icon name="download-outline"></ion-icon> </span>
                            </div>

                            <div class="icon">
                                <div class="tooltip"> Delete</div>

                                <span> <ion-icon name="trash-outline" onclick="openDelete(this)" 
                                    data-id="'.$row["user_id"].'" ></ion-icon> </span>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }
    }

    function getTotalRecords($search = '') {
        global $conn;
        $searchQuery = $search ? "WHERE last_name LIKE '%$search%' OR first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR status LIKE '%$search%'" : '';
        $countQuery = "SELECT COUNT(*) as total FROM scholar $searchQuery";
        $result = $conn->query($countQuery);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
?>