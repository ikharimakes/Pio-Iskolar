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

    $log = "SELECT * FROM scholar_tbl WHERE user = '$user' AND pass = '$pass'";
    $result = $conn->query($log);

    if ($result->num_rows == 1) {

        while ($row = $result->fetch_assoc()) {}
        $_SESSION['user']=$user;
        print "<script>alert('Login Successfully!')</script>";
        if ($user == "admin") {
            print "<script>window.open('./dashboard.php','_self')</script>";
        }
        print "<script>window.open('./admin_dashboard.php','_self')</script>";
    } else {
        print "<script>alert('Invalid Credentials!')</script>";
    }
}
?>