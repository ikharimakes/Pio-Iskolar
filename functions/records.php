<?php
	global $conn;
    
//* SCHOLAR DISPLAY *//
    function scholarDisplay(){
        global $conn;
        $display = "SELECT scholar_id, last_name, first_name, middle_name, email, status.status_name FROM scholar 
        LEFT JOIN status ON scholar.status_id = status.status_id
        ORDER BY scholar.scholar_id";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr> 
                        <td> '.$row["scholar_id"].' </td>
                        <td> '.$row["last_name"].' </td>
                        <td> '.$row["first_name"].' </td>
                        <td> '.$row["middle_name"].' </td>
                        <td> '.$row["email"].' </td>
                        <td> '.$row["status_name"].' </td>
                        <td style="text-align: right;">
                            <button class="iconBtn"> <img src="images/preview.png" alt="Icon"> </button>
                            <button class="iconBtn"> <img src="images/download.png" alt="Icon"> </button>
                            <button class="iconBtn"> <img src="images/edit.png" alt="Icon"> </button>
                            <button class="iconBtn"> <img src="images/delete.png" alt="Icon"> </button>
                        </td>
                    </tr>
                ';
            }
        }
    }
    
//* ACCOUNT CREATION *//
    if(isset($_FILES['csv'])){
        if($_FILES['csv']['error'] == 0){
            $tmpName = $_FILES['csv']['tmp_name'];
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                // necessary if a large csv file
                set_time_limit(0);

                $flag = true;
                while(($data = fgetcsv($handle, 500, ',')) !== FALSE) {
                    // skips first line (assuming header)
                    if($flag) { $flag = false; continue; }

                    // get the values from the csv
                    $insert = "INSERT INTO user (user_id, role_id, username, passhash) VALUES (NULL, '2', '$data[1]', 'placeholder')";
                    $run = $conn->query($insert);

                    $idquery = "SELECT user_id from user where username = '$data[1]'";
                    $result = $conn->query($idquery);
                    while ($row = $result->fetch_assoc()){
                        $uid = $row['user_id'];
                    }

                    $sid = '27' . sprintf('%03d', $data[0]);
                    $number = '+' . $data[7];
                    //sprintf('%03d', $data[0])
                    $insert = "INSERT INTO scholar (scholar_id, batch_num, user_id, status_id, last_name, first_name, middle_name, school, course, _address, contact, email, remarks) VALUES ('$sid', '27', '$uid', '1', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$number', '$data[8]', NULL)";
                    $run = $conn->query($insert);
                    
                }
                fclose($handle);
                
            unset($_FILES['csv']);
            }
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }
?>