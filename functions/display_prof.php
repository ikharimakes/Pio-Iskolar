<?php
    global $conn;

//* SCHOLAR PROFILE DISPLAY *//
    function scholarDisplay($id) {
        global $conn;
        $display = "SELECT * FROM scholar WHERE scholar_id = '$id'";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                <div class="profile_name">
                    <img src="images/profile.png" alt="Profile Picture"> <br>
                    <h2>'.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].'</h2>
                </div>

                <div class="profile-info">
                    <table>
                        <tr>
                            <th>Batch ID:</th>
                            <td>'.$row['batch_num'].'</td>
                        </tr>
                        <tr>
                            <th>School:</th>
                            <td>'.$row['school'].'</td>
                        </tr>
                        <tr>
                            <th>Course:</th>
                            <td>'.$row['course'].'</td>
                        </tr>
                        <tr>
                            <th>Scholar Status:</th>
                            <td>'.$row['status'].'</td>
                        </tr>
                        <tr style="height: 40px;">
                            <th> </th>
                            <td> </td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>'.$row['_address'].'</td>
                        </tr>
                        <tr>
                            <th>Contact:</th>
                            <td>'.$row['contact'].'</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>'.$row['email'].'</td>
                        </tr>
                        <tr style="height: 10px;">
                            <th> </th>
                            <td> </td>
                        </tr>
                        <tr style="height: 40px;">
                            <th> <a href="#" onclick="openPass()"> Change Password </a></th>
                            <td></td>
                        </tr>
                    </table>
                </div>
                ';
            }
        }
    }

    //* TOP NAV DISPLAY *//
    function navDisplay() {
        global $conn;
        if(isset($_POST['scholar_id'])) {$_SESSION['id'] = $_POST['scholar_id'];}
        $id = $_SESSION['id'];
        // SCHOLAR DETAILS
        $display = "SELECT * FROM scholar WHERE scholar_id = '$id'";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="details"><center> 
                        <h1>'.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].'</h1> 

                        <div class="topnav">
                            <a href="ad_detail.php">Scholar Details</a>
                            <a href="ad_docs.php">Documents</a>
                        </div> 
                    </center></div>
                ';
            }
        }
    }

    //* ADMIN PROFILE DISPLAY *//
    //* ADMIN PROFILE DISPLAY *//
    function adminDisplay() {
        global $conn;
        if(isset($_POST['scholar_id'])) {$_SESSION['id'] = $_POST['scholar_id'];}
        $id = $_SESSION['id'];
        // SCHOLAR DETAILS
        $display = "SELECT * FROM scholar WHERE scholar_id = '$id'";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $profile = [
                    'Batch ID' => $row['batch_num'],
                    'School' => $row['school'],
                    'Course' => $row['course'],
                    'Scholar Status' => $row['status'],
                    '' => '',
                    'Address' => $row['_address'],
                    'Contact' => $row['contact'],
                    'Email' => $row['email']
                ];
                echo '
                    <form action="" method="post" id="profileForm">
                        <div class="profile">
                            <div class="profile_name">
                                <img src="images/profile.png" alt="Profile Picture"> <br>
                            </div>

                            <div class="profile-info">
                                <table>
                ';
                foreach ($profile as $key => $value) {
                    echo '
                        <tr>
                            <th style="width: 20%">'.$key.'</th>
                            <td>';
                    if ($key == 'School') {
                        echo '<input type="text" list="schools" name="school" value="'.$value.'" class="input2" style="text-align: left; box-sizing: border-box; width: 100%; font-size: 20px" readonly>';
                        echo '<datalist id="schools">
                                <option value="School A">
                                <option value="School B">
                                <option value="School C">
                              </datalist>';
                    } elseif ($key == 'Course') {
                        echo '<input type="text" list="courses" name="course" value="'.$value.'" class="input2" style="text-align: left; box-sizing: border-box; width: 100%; font-size: 20px" readonly>';
                        echo '<datalist id="courses">
                                <option value="Course A">
                                <option value="Course B">
                                <option value="Course C">
                              </datalist>';
                    } elseif ($key == 'Scholar Status') {
                        echo '<select name="scholar_status" class="input2" style="text-align: left; box-sizing: border-box; width: 100%; font-size: 20px" disabled>
                                <option value="ACTIVE" '.($value == 'ACTIVE' ? 'selected' : '').'>ACTIVE</option>
                                <option value="PROBATION" '.($value == 'PROBATION' ? 'selected' : '').'>PROBATION</option>
                                <option value="DROPPED" '.($value == 'DROPPED' ? 'selected' : '').'>DROPPED</option>
                                <option value="LOA" '.($value == 'LOA' ? 'selected' : '').'>LOA</option>
                                <option value="GRADUATED" '.($value == 'GRADUATED' ? 'selected' : '').'>GRADUATED</option>
                              </select>';
                    } else {
                        echo '<input type="text" name="'.strtolower(str_replace(' ', '_', $key)).'" value="'.$value.'" class="input2" style="text-align: left; box-sizing: border-box; width: 100%; font-size: 20px" readonly>';
                    }
                    echo '</td>
                        </tr>
                    ';
                }
                echo '
                                </table>
                                <button type="button" class="edit-button" id="editButton">Edit</button>
                                <button type="button" class="cancel-button" id="cancelButton" style="display:none;">Cancel</button>
                                <button type="submit" name="save" class="save-button" style="display:none;">Save</button>
                            </div>
                        </div>
                    </form>
                ';
            }
        }
    }
?>