<?php
	global $conn;
//* INDIVIDUAL CREATION IS HELL *//
    if(isset($_POST['individual'])){
        $last_name = strtoupper($_POST['last_name']);
        $first_name = strtoupper($_POST['first_name']);
        $middle_name = strtoupper($_POST['middle_name']);
        $scholar_id = $_POST['scholar_id'];
        $batch_no = substr($scholar_id, 0, 2);
        $school = strtoupper($_POST['school']);
        $course = strtoupper($_POST['course']);
        $address = strtoupper($_POST['address']);
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $insert = "INSERT INTO user (user_id, role_id, username, passhash) VALUES (NULL, '2', '$last_name', 'placeholder')";
        $run = $conn->query($insert);
        
        // inserts into user
        $idquery = "SELECT user_id from user where username = '$last_name'";
        $result = $conn->query($idquery);
        while ($row = $result->fetch_assoc()){
            $uid = $row['user_id'];
        }

        // inserts into scholar
        //! CHANGE BATCH NUMBER
        $insert = "INSERT INTO scholar (scholar_id, batch_num, user_id, status_id, last_name, first_name, middle_name, school, course, _address, contact, email, remarks) VALUES ('$scholar_id', '$batch_no', '$uid', '1', '$last_name', '$first_name', '$middle_name', '$school', '$course', '$address', '$contact', '$email', NULL)";
        $run = $conn->query($insert);
    }

//* BATCH CREATION *//
    if(isset($_FILES['csv'])){
        if($_FILES['csv']['error'] == 0){
            $tmpName = $_FILES['csv']['tmp_name'];
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                // necessary if a large csv file
                set_time_limit(0);
                $error = array();
                while(($data = fgetcsv($handle, 501, ',')) !== FALSE) {
                    // checks if row is "empty"
                    $isEmptyRow = true;
                    for ($i = 1; $i <= 8; $i++) {
                        if (!empty($data[$i])) {
                            $isEmptyRow = false;
                            break;
                        }
                    }
                    if ($isEmptyRow) {continue;}

                    // checks for individual empty fields
                    $requiredFields = [1, 2, 4, 5, 6, 7, 8];
                    foreach ($requiredFields as $field) {
                        if (empty($data[$field])) {
                            array_push($error, $data[0]);
                            continue 2;
                        }
                    }
                }
                if(!empty($error)) {
                    // loads error modal
                    $_SESSION['error_array'] = $error;
                }
                
                // rewinds pointer
                rewind($handle);
                
                // starts csv upload
                $skipRows = 2; // Number of rows to skip
                $currentRow = 0;
                while((($data = fgetcsv($handle, 501, ',')) !== FALSE) && (!isset($_SESSION['error_array']))) {
                    // skips the first $skipRows lines (assuming headers and formats)
                    if($currentRow < $skipRows) { 
                        $currentRow++;
                        continue; 
                    }

                    // checks if row is "empty"
                    $isEmptyRow = true;
                    for ($i = 1; $i <= 8; $i++) {
                        if (!empty($data[$i])) {
                            $isEmptyRow = false;
                            break;
                        }
                    }
                    if ($isEmptyRow) {continue;}

                    // get the values from the csv
                    $insert = "INSERT INTO user (user_id, role_id, username, passhash) VALUES (NULL, '2', '$data[1]', 'placeholder')";
                    $run = $conn->query($insert);
                    
                    // inserts into user
                    $idquery = "SELECT user_id from user where username = '$data[1]'";
                    $result = $conn->query($idquery);
                    while ($row = $result->fetch_assoc()){
                        $uid = $row['user_id'];
                    }

                    // inserts into scholar
                    //! CHANGE BATCH NUMBER
                    $sid = '27' . sprintf('%03d', $data[0]);
                    $number = '+63' . '$data[7]';
                    $insert = "INSERT INTO scholar (scholar_id, batch_num, user_id, status_id, last_name, first_name, middle_name, school, course, _address, contact, email, remarks) VALUES ('$sid', '27', '$uid', '1', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$number', '$data[8]', NULL)";
                    $run = $conn->query($insert);
                }
                // closes pointer, deletes csv file
                fclose($handle);
                unset($_FILES['csv']);
            }
            
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }

//* BATCH CREATION ERROR *//
    if(isset($_SESSION['error_array'])) {
        print '
            <div id="errorOverlay" class="errorOverlay">
                <div class="error-content">
                    <div class="infos">
                        <h2>Upload Failed</h2>
                            <span class="closeError" onclick="closeError()">&times;</span>
                    </div>
                    <div class="message"><h4>
        ';
            foreach ((array) $_SESSION['error_array'] as $line) {
            print '   
                    Error in row '. $line .'.<br>
            ';
            }
        print '
                    </div>
                    <div class="ok-button-container">
                        <button class="ok-button" onclick="closeError()"> OK </button>
                    </div>
                </div>
            </div>
        ';
        unset($_SESSION['error_array']);
    }

//* SCHOLAR DELETION *//
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $delete = "DELETE FROM user WHERE user_id = '$id'";
        $result = $conn->query($delete);
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }
?>