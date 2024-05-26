<?php
    include_once('../functions/general.php');
    global $conn;
    global $year;
    global $sem;

    function getDocumentsStatus() {
        global $conn;
        if(isset($_POST['scholar_id'])) {$_SESSION['id'] = $_POST['scholar_id'];}
        $id = $_SESSION['id'];

        $query = "SELECT acad_year, sem, doc_type, doc_status FROM submission WHERE scholar_id = '$id'";
        $result = $conn->query($query);

        $documents = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $documents[$row['acad_year']][$row['sem']][$row['doc_type']] = $row['doc_status'];
            }
        }
        $conn -> close();
        return $documents;
    }

    function displayDocumentsTable($documents) {
        global $year;
        global $sem;
        
        $currentYear = $year;
        $currentSem = $sem;

        $years = ['2023-2024', '2024-2025', '2025-2026', '2026-2027', '2027-2028'];
        $sems = [1, 2, 3]; // Include 3rd semester as well
        $types = ['COR', 'TOR', 'SCF'];

        foreach ($years as $acad_year) {
            echo "<tr><th class='details2'>$acad_year</th>";

            foreach ($sems as $semester) {
                foreach ($types as $type) {
                    if (($acad_year > $currentYear) || ($acad_year == $currentYear && $semester > $currentSem) || $semester == 3) {
                        // Show input field for future academic years and 3rd semester
                        echo "<td class='details2'><input type='text' name='{$acad_year}_{$semester}_{$type}' value='' class='input2' disabled></td>";
                    } else {
                        // Show status for past and present academic years and semesters
                        $status = isset($documents[$acad_year][$semester][$type]) ? $documents[$acad_year][$semester][$type] : 'Not Submitted';
                        echo "<td class='details2'>$status</td>";
                    }
                }
            }

            echo "</tr>"; // Ensure to close the table row
        }
    }
?>
