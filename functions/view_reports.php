<?php
	global $conn;
    
    function reportList(){
        global $conn;
        $display = "SELECT report_id, batch_no, report_type, creation_date FROM reports ORDER BY creation_date";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '   
                <tr>
                    <td> '.$row["batch_no"].' </td>
                    <td> '.$row["report_type"].' </td>
                    <td> '.$row["creation_date"].' </td>
                    <td style="text-align: right;" class="wrap"> 
                        <div class="icon">
                            <div class="tooltip"> View</div>
                            <span> <ion-icon name="eye-outline" onclick="openStatus()"></ion-icon></ion-icon> </span>
                        </div>

                        <div class="icon">
                            <div class="tooltip"> Download</div>
                            <span> <ion-icon name="download-outline"></ion-icon> </span>
                        </div>

                        <form style="display:inline" action="" method="post"><div class="icon">
                            <input type="hidden" name="report_id" value="'.$row["report_id"].'">
                            <div class="tooltip"> Delete</div>
                            <button type="submit" name="delete" style="all:unset;">
                            <span> <ion-icon name="trash-outline"></ion-icon> </span>
                            </button>
                        </div></form>
                    </td>
                </tr>
                ';
            }
        }
    }
?>