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

//* FETCH SCHOLAR DETAILS *//
    $id = $_POST['find'];
    $details = "SELECT * FROM scholar
    INNER JOIN documents ON scholar.scholar_id = documents.scholar_id
    INNER JOIN records ON scholar.scholar_id = records.scholar_id
    WHERE scholar.scholar_id = '$id'";
    $result = $conn->query($details);

    if ($result->num_rows > 0) {
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
?>