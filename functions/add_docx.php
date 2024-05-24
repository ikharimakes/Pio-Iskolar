<?php
    global $conn;

//* DOCUMENT SUBMISSION - SCHOLAR *//
    if(isset($_POST['submission'])) {
        $id = $_SESSION['uid']; //! MAKE INTO SCHOLAR ID
        $date = date("Y-m-d");  //! CHANGE (MAKE INTO VARIABLE)
        $year = "2023-2024";    //! CHANGE (MAKE INTO VARIABLE)
                                //! ADD SEM
        $sem = 2;
        
        $file_fields = ['register', 'grades', 'contract'];

        foreach($file_fields as $field) {
            if(!empty($_FILES[$field]['tmp_name']) && is_uploaded_file($_FILES[$field]['tmp_name'])) {
                $upload = $_FILES[$field]['name']; //! NAME CHANGE
                $upload_temp = $_FILES[$field]['tmp_name'];

                move_uploaded_file($upload_temp,"../assets/$upload");
                $insert = "INSERT INTO submission (submit_id, scholar_id, sub_date, doc_name, doc_type, acad_year, sem, doc_status) VALUES (NULL, '$id', '$date', '$upload', 'COR', '$year', '$sem', 'PENDING')";
                $execute = $conn->query($insert);
                if (!$execute) {
                    die(mysqli_error($conn));
                }
            }
        }
        
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }

//* DOCUMENT UPLOAD - ADMIN *//


//* DOCUMENT UPDATE *//
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];
    $content = $conn -> real_escape_string($_POST['content']);
    
    // Check if an image was uploaded
    if(!empty($_FILES['cover']['name'])) {
        $img = $_FILES['cover']['name'];
        $img_temp = $_FILES['cover']['tmp_name'];
        move_uploaded_file($img_temp, "../assets/$img");

        // Construct update query with image
        $update = "UPDATE announcements SET st_date = '$start', end_date = '$end', img_name = '$img', title = '$title', content = '$content' WHERE announce_id = '$id';";
    } else {
        // Construct update query without image
        $update = "UPDATE announcements SET st_date = '$start', end_date = '$end', title = '$title', content = '$content' WHERE announce_id = '$id';";
    }
    $run = $conn->query($update);

    if ($run){} else {
        die(mysqli_error($conn));
    }
}
?>