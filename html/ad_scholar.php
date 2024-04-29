<?php include('../functions/general.php');?>
<?php include('../functions/records.php');?>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Scholars </title>
    <link rel="stylesheet" href="css/admin_style.css">

    <!--SIDEBAR-->
    <nav id="sidebar">
		<ul>
            <li> <img class="profile" src="images/profile.png"> </li>
            <li> <a href="" class="name"> NAME </a> </li> <br>
            <hr>
            <li> <a href="ad_dashboard.php" class="nav"> Dashboard </a> </li>
            <li> <a href="ad_scholar.php" class="nav"> Scholar </a> </li>
			<li> <a href="ad_documents.php" class="nav"> Documents </a> </li>
			<li> <a href="ad_announce.php" class="nav">Announcement </a> </li>
            <li> <a href="ad_reports.php" class="nav">Reports </a> </li>
            <li> <a href="index.php" class="nav">Log Out </a> </li>
		</ul>
	</nav>

</head>


<body>
    <!--HEADER-->
    <div class="header">
        <div class="logo" >
            <img src="images/pio-logo.png" alt="pio">
            <h1> PioIskolar </h1>
        </div>
    </div> <br> <br> <br>

    
    <div class="info">
        <h1> SCHOLAR LIST </h1>
        
        <form action="" method="post" enctype="multipart/form-data">
            <button type="button" class="btnAdd" href="addScholar.html"> Add Scholar </button>
            <label type="button" class="lblAdd" for="upload"> Batch Creation <input type="file" name="csv" accept=".csv" id="upload"  onchange="form.submit()" hidden/> </label>
            <!--
                <div class="dropdown">
                    <button class="dropbtn">Sort by</button>
                    <div class="dropdown-content">
                        <a href="#">Name</a>
                        <a href="#">Date</a>
                        <a href="#">Type</a>
                    </div>
                </div>
                    
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">Filter</button>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="#">Option 1</a>
                    <a href="#">Option 2</a>
                    <a href="#">Option 3</a>
                    </div>
                </div>
    
                <input type="text" id="searchInput" name="searchInput" placeholder="Search..." >
            s-->
        </form>
    </div> <br>

    <table>
        <tr style="font-weight: bold;">
            <td style="width:5%"> ID No. </td>
            <td style="width:15%"> Last Name </td>
            <td style="width:18%"> First Name </td>
            <td style="width:12%"> Middle Name </td>
            <td style="width:20%"> Email </td>
            <td style="width:10%"> Status </td>
            <td style="text-align: right;"> Actions </td>
        </tr>
        <?php scholarDisplay();?>
    </table>
    <br> <br>


    <!--FOOTER-->
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>
</body>
</html>