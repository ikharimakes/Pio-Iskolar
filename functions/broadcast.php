<?php
//* DATABASE CONNECTION *//
    // Credentials                              //* align the comments with this comment !!
    $serv = "localhost";                        //! replace: null
    $host = "sail";                             //! replace: null
    $keys = "raisseille";                       //! replace: null
    $dbnm = "pio_iskolar";                       //! replace: null
    $port = 3308;                               //* this is typically either 3306 OR 3307.

    // Connection
    $conn = new mysqli($serv, $host, $keys, $dbnm, $port);

	if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}

//* FETCH ANNOUNCEMENT DETAILS *//
?>