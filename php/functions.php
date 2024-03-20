<?php
    @session_start();
	$errors = array();
	$success = array();
	$warning = array();
	$sweetAlert = array();
	$warnAlert = array();

//* DATABASE CONNECTION *//
    // Credentials                              //* align the comments with this comment !!
    $serv = "localhost";                        //! replace: null
    $host = "sail";                             //! replace: null
    $keys = "raisseille";                       //! replace: null
    $dbnm = "pioiskolar";                       //! replace: null
    $port = 3307;                               //* this is typically either 3306 OR 3307.

    // Connection
    $conn = new mysqli($serv, $host, $keys, $dbnm, $port);

	if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}

//* SESSION CHECK *//
    if (empty($_SESSION["user_id"])) { }
	else if(($_SESSION["role"] == "admin")) { header("location: ./ad_dashboard.php"); } 
	else { header("location: ./dashboard.php");};

//* STRING SANITATION *//
	function sanitizeString($var){
		global $conn;
	    $var = strip_tags($var);
	    $var = htmlentities($var);
	    $var = stripslashes($var);
	    return $conn->real_escape_string($var);
    }

//* USER LOGIN *//
    if(isset($_POST['login'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        $log = "SELECT * FROM user_tbl WHERE user = '$user' AND pass = '$pass'";
        $result = $conn->query($log);

        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                if($row["roleID"] == "1"){
                    $_SESSION['role'] = "admin";
                } else { $_SESSION['role'] = "any"; }
            }
            if ($_SESSION["role"] == "admin") {
                print "<script>window.open('./ad_dashboard.php','_self')</script>";
            } else {
                print "<script>window.open('./dashboard.php','_self')</script>";
            }
        } else {
            print "<script>alert('Invalid Credentials!')</script>";
        }
    }

//* USER LOGOUT *//
    if (isset($_POST['quitting'])){
        // UNSETS GLOBAL VARIABLES 
        session_destroy();
        unset($_SESSION['user']);
        unset($_SESSION['quitting']);

        header('location: ./index.php');
    }

//* SCHOLAR DISPLAY *//
    function scholarDisplay(){
        global $conn;
        $display = "SELECT scholarID, batchID, lastName, firstName, middleName, scholarstatus_tbl.statusName FROM scholar_tbl 
        LEFT JOIN scholarstatus_tbl ON scholar_tbl.statusID = scholarstatus_tbl.statusID
        ORDER BY scholar_tbl.scholarID";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr> 
                        <td> '.$row["scholarID"].' </td>
                        <td> '.$row["lastName"].' </td>
                        <td> '.$row["firstName"].' </td>
                        <td> '.$row["statusName"].' </td>
                        <td> 
                            <button><i class="btnPrev"></i> Preview </button> 
                        </td>
                        <td>
                            <button><i class="btnEdit"></i> Edit </button>
                        </td>
                        <td>
                            <img src="images/download.png" alt="Icon">
                        </td>
                    </tr>
                ';
            }
        }
    }

//* ACCOUNT CREATION *//
    if(isset($_POST['upload'])){
        if($_FILES['csv']['error'] == 0){
            $tmpName = $_FILES['csv']['tmp_name'];
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                // necessary if a large csv file
                set_time_limit(0);
    
                $flag = true;
                while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    // skips first line (assuming header)
                    if($flag) { $flag = false; continue; }

                    // get the values from the csv
                    $insert = "INSERT INTO user_tbl (userID, roleID, user, pass) VALUES (NULL, '2', '$data[0]', 'placeholder')";
                    $run = $conn->query($insert);

                    $idquery = "SELECT userID from user_tbl where user = '$data[0]'";
                    $result = $conn->query($idquery);
                    while ($row = $result->fetch_assoc()){
                        $uid = $row['userID'];
                    }

                    $insert = "INSERT INTO scholar_tbl (scholarID, userID, AYSem, batchID, statusID, lastName, firstName, middleName, email, school) VALUES (NULL, '$uid', '2023-2024/1', '23', '1', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
                    $run = $conn->query($insert);
                }
                fclose($handle);
            }
        }

        //bootleg display code
        $display = "SELECT scholarID, batchID, lastName, firstName, middleName, scholarstatus_tbl.statusName FROM scholar_tbl 
        LEFT JOIN scholarstatus_tbl ON scholar_tbl.statusID = scholarstatus_tbl.statusID
        ORDER BY scholar_tbl.scholarID";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            print '
                <table>
                    <tr style="font-weight: bold;">
                        <td> ID No. </td>
                        <td> Last Name </td>
                        <td> First Name </td>
                        <td> Status </td>
                        <td> Action </td>
                        <td> </td>
                        <td> </td>
                    </tr>
            ';
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr> 
                        <td> '.$row["scholarID"].' </td>
                        <td> '.$row["lastName"].' </td>
                        <td> '.$row["firstName"].' </td>
                        <td> '.$row["statusName"].' </td>
                        <td> 
                            <button><i class="btnPrev"></i> Preview </button> 
                        </td>
                        <td>
                            <button><i class="btnEdit"></i> Edit </button>
                        </td>
                        <td>
                            <img src="images/download.png" alt="Icon">
                        </td>
                    </tr>
                ';
            }
        }
    }
?>