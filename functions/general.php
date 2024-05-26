<?php
@session_start();
$errors = array();
$success = array();
$warning = array();
$sweetAlert = array();
$warnAlert = array();

require '../vendor/autoload.php';

//* DATABASE CONNECTION *//
    // Credentials
    $serv = "localhost";  
    $host = "root";   
    $keys = "";   
    $dbnm = "pio_iskolar"; 
    $port = 3308;

    // Connection
    $conn = new mysqli($serv, $host, $keys, $dbnm, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//* USER LOGIN *//
if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $log = $conn->prepare("SELECT * FROM user WHERE username = ? AND passhash = ?");
    $log->bind_param("ss", $user, $pass);
    $log->execute();
    $result = $log->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if($row["role_id"] == "1"){
            $_SESSION['role'] = "admin";
            $_SESSION['uid'] = $row['user_id'];
            header("location: ./ad_dashboard.php");
            die;
        } else {
            $_SESSION['role'] = "scholar";
            $_SESSION['uid'] = $row['user_id'];
            $id = $row['user_id'];
            
            $grab = $conn->prepare("SELECT scholar_id FROM scholar WHERE user_id = ?");
            $grab->bind_param("i", $id);
            $grab->execute();
            $account = $grab->get_result();
            $row = $account->fetch_assoc();
            $_SESSION['sid'] = $row['scholar_id'];
            
            header("location: ./announce.php");
            die;
        }
    } else {
        echo "<script>alert('Invalid Credentials!')</script>";
    }
}

//* USER LOGOUT *//
if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
    
    header('location: ./front_page.php');
}

//* SESSION CHECK *//
    // if (empty($_SESSION["role"])) { header("location: ./index.php"); }
    // else if(($_SESSION["role"] == "1")) { header("location: ./ad_dashboard.php"); } 
    // else { header("location: ./announce.php");};

//* PARAMETER PULL *//
function academic() {
    global $conn;
    $query = "SELECT acad_year AS acad FROM batch_year ORDER BY batch_no DESC LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['acad'];
    }
}

function batch() {
    global $conn;
    $query = "SELECT batch_no AS batch FROM batch_year ORDER BY batch_no DESC LIMIT 1";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['batch'];
    }
}

function semester() {
    $current_month = date('n'); 
    if ($current_month >= 7 && $current_month <= 12) {
        return 1;
    } else {
        return 2;
    }
}

$year = academic();
$sem = semester();
$batch = batch();

//* DATA LISTS *//
function datalisting($column, $table, $id) {
    global $conn;
    if($id == "sem"){ 
        echo '    
            <datalist id="sem">
                <option value="1">
                <option value="2">
                <option value="3"> 
            </datalist>
        ';
    } else {
        $query = $conn->prepare("SELECT DISTINCT $column AS a FROM $table");
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            echo '<datalist id="'.$id.'">';
            while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['a'].'">';
            }
            echo '</datalist>';
        }
    }
    // SCHOLAR STATUS   datalisting("status_name", "status", "status");
    // SCHOOLS          datalisting("School", "scholar", "school");
    // COURSES          datalisting("Course", "scholar", "course");
    // BATCH NUMBER     datalisting("batch_no", "batch_year", "batch");
    // ACADEMIC YEAR    datalisting("acad_year", "batch_year", "year");
    // SEMESTER         datalisting("", "", "sem");
}
?>
