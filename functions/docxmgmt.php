<?php
	global $conn;

//* DOCUMENT DISPLAY - SCHOLAR *//
    function docxDisplay($id){
        global $conn;
        $display = "SELECT sub_date, doc_name, doc_type, doc_status FROM document WHERE scholar_id = '$id' ORDER BY sub_date";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr> 
                        <td> '.$row["sub_date"].' </td>
                        <td> '.$row["doc_name"].' </td>
                        <td> '.$row["doc_type"].' </td>
                        <td> '.$row["doc_status"].' </td>
                        <td style="text-align: right;">
                        <a href="../assets/'.$row["doc_name"].'" target="_blank">
                        <button class="iconBtn"> <img src="images/preview.png" alt="Icon"> </button></a>
                        <a href="../assets/'.$row["doc_name"].'" download="'.$row["doc_name"].'">
                        <button class="iconBtn"> <img src="images/download.png" alt="Icon"> </button></a>
                        </td>
                    </tr>
                ';
            }
        }
    }

//* DOCUMENT DISPLAY - ADMIN
    function docxList(){
        global $conn;
        $display = "SELECT * FROM document ORDER BY sub_date";
        $result = $conn->query($display);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print '
                    <tr> 
                        <td> '.$row["scholar_id"].' </td>
                        <td> '.$row["doc_name"].' </td>
                        <td> '.$row["sub_date"].' </td>
                        <td> '.$row["doc_type"].' </td>
                        <td> '.$row["doc_status"].' </td>
                        <td style="text-align: right;">
                            <a href="../assets/'.$row["doc_name"].'" target="_blank">
                            <button class="iconBtn"> <img src="images/preview.png" alt="Icon"> </button></a>
                            <a href="../assets/'.$row["doc_name"].'" download="'.$row["doc_name"].'">
                            <button class="iconBtn"> <img src="images/download.png" alt="Icon"> </button></a>
                            <button class="iconBtn"> <img src="images/edit.png" alt="Icon"> </button>
                            <form style="display:inline" action="" method="post"> 
                            <input type="hidden" name="doc_id" value="'.$row["doc_id"].'">
                            <input type="hidden" name="doc_name" value="'.$row["doc_name"].'">
                            <button type="submit" name="delete" class="iconBtn"> <img src="images/delete.png" alt="Icon"> </button> </form>
                        </td>
                    </tr>
                ';
            }
        }
    }

//* DOCUMENT SUBMISSION - SCHOLAR *//
    if(isset($_POST['submission'])) {
        $id = $_SESSION['uid'];
        $date = date("Y-m-d");
        $year = "2023-2024";
        $sem = 2;
        if(empty($_FILES['register']['tmp_name']) || !is_uploaded_file($_FILES['register']['tmp_name']))
        {} else {
            $upload = $_FILES['register']['name'];
            $upload_temp = $_FILES['register']['tmp_name'];

            move_uploaded_file($upload_temp,"../assets/$upload");
            $insert = "INSERT INTO document (doc_id, scholar_id, doc_name, doc_type, doc_status, sub_date, year, sem) VALUES (NULL, '$id', '$upload', 'COR', 'PENDING', '$date','$year','$sem')";
            $execute = $conn->query($insert);
            if ($execute){} else {
                die(mysqli_error($conn));
            }
        }
        if(empty($_FILES['grades']['tmp_name']) || !is_uploaded_file($_FILES['grades']['tmp_name']))
        {} else {
            $upload = $_FILES['grades']['name'];
            $upload_temp = $_FILES['grades']['tmp_name'];

            move_uploaded_file($upload_temp,"../assets/$upload");
            $insert = "INSERT INTO document (doc_id, scholar_id, doc_name, doc_type, doc_status, sub_date, year, sem) VALUES (NULL, '$id', '$upload', 'TCG', 'PENDING', '$date','$year','$sem')";
            $execute = $conn->query($insert);
            if ($execute){} else {
                die(mysqli_error($conn));
            }
        }
        if(empty($_FILES['contract']['tmp_name']) || !is_uploaded_file($_FILES['contract']['tmp_name']))
        {} else {
            $upload = $_FILES['contract']['name'];
            $upload_temp = $_FILES['contract']['tmp_name'];

            move_uploaded_file($upload_temp,"../assets/$upload");
            $insert = "INSERT INTO document (doc_id, scholar_id, doc_name, doc_type, doc_status, sub_date, year, sem) VALUES (NULL, '$id', '$upload', 'SCF', 'PENDING', '$date','$year','$sem')";
            $execute = $conn->query($insert);
            if ($execute){} else {
                die(mysqli_error($conn));
            }
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }

//* DOCUMENT UPLOAD - ADMIN*//

//* DOCUMENT DELETION *//
    if(isset($_POST['delete'])){
        $path = "../assets/".$_POST['doc_name'];
        unlink($path);

        $id = $_POST['doc_id'];
        $delete = "DELETE FROM document WHERE doc_id = '$id'";
        $result = $conn->query($delete);
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }
?>