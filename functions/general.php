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
    $host = "root";                             //! replace: null
    $keys = "";                       			//! replace: null
    $dbnm = "pio_iskolar";                      //! replace: null
    $port = 3308;                               //* this is typically either 3306 OR 3307.

    // Connection
    $conn = new mysqli($serv, $host, $keys, $dbnm, $port);

	if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}

//* SESSION CHECK *//
    //? if (empty($_SESSION["role"])) { header("location: ./index.php"); }
	//? else if(($_SESSION["role"] == "1")) { header("location: ./ad_dashboard.php"); } 
	//? else { header("location: ./announce.php");};

//! OUTDATED !//
//* STRING SANITATION *//
	function sanitizeString($var){
		global $conn;
	    $var = strip_tags($var);
	    $var = htmlentities($var);
	    $var = stripslashes($var);
	    return $conn->real_escape_string($var);
    }
?>