<?php
    global $conn;
//* USER LOGIN *//
    if(isset($_POST['login'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        $log = "SELECT * FROM user WHERE username = '$user' AND passhash = '$pass'";
        $result = $conn->query($log);

        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                if($row["role_id"] == "1"){
                    $_SESSION['role'] = "admin";
                    header("location: ./ad_dashboard.php");
                    die;
                } else {
                    $_SESSION['role'] = "scholar";
                    $uid = $row['user_id'];
                    $grab = "SELECT scholar_id FROM scholar WHERE user_id = '$uid'";
                    $account = $conn->query($grab);
                    while ($row = $account->fetch_assoc()) {
                        $_SESSION['uid'] = $row['scholar_id'];
                    }
                    header("location: ./announce.php");
                    die;
                }
            }
        } else {
            print "<script>alert('Invalid Credentials!')</script>";
        }
    }
/*
    $cookie_name = "user";
    $cookie_value = "John Doe";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
*/

//* USER LOGOUT *//
    if (isset($_POST['quitting'])){
        // UNSETS GLOBAL VARIABLES 
        session_unset();
        session_destroy();
        
        header('location: ./index.php');
    }
?>