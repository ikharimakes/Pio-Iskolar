<?php
    global $conn;

//* SCHOLAR PROFILE DISPLAY *//
    function scholarDisplay($id) {
        global $conn;
        $display = "SELECT * FROM scholar LEFT JOIN status ON scholar.status_id = status.status_id WHERE scholar_id = '$id'";
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
                            <td>'.$row['status_name'].'</td>
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
        $display = "SELECT * FROM scholar LEFT JOIN status ON scholar.status_id = status.status_id WHERE scholar_id = '$id'";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
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
    function adminDisplay() {
        global $conn;
        if(isset($_POST['scholar_id'])) {$_SESSION['id'] = $_POST['scholar_id'];}
        $id = $_SESSION['id'];
        // SCHOLAR DETAILS
        $display = "SELECT * FROM scholar LEFT JOIN status ON scholar.status_id = status.status_id WHERE scholar_id = '$id'";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $profile = [
                    'Batch ID' => $row['batch_num'],
                    'School' => $row['school'],
                    'Course' => $row['course'],
                    'Scholar Status' => $row['status_name'],
                    '' => '',
                    'Address' => $row['_address'],
                    'Contact' => $row['contact'],
                    'Email' => $row['email']
                ];
                print '
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="profile">
                            <div class="profile_name">
                                <img src="images/profile.png" alt="Profile Picture"> <br>
                            </div>

                            <div class="profile-info">
                                <table>
                ';
                foreach ($profile as $key => $value) {
                    print '
                        <tr>
                            <th> '.$key.' </th>
                            <td> '.$value.'</td>
                        </tr>
                    ';
                }
                print '
                                </table>
                            </div>
                        </div>
                ';
            }
        }
    }
?>