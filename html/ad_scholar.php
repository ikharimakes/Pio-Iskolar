<?php include('../php/functions.php');?>
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
			<li> <a href="" class="nav"> Documents </a> </li>
			<li> <a href="" class="nav">Announcement </a> </li>
            <li> <a href="" class="nav">Reports </a> </li>
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
    </div>

    <div class="navBar">
        <ul>
            <a href="ad_scholar.php"> Scholar Information </a>
            <a href="ad_createAcc.php"> Account Creation </a>
		</ul>
    </div> <br> <br>

    <div class="info">
        <h1> SCHOLAR LIST</h1>
        
        <form>
            <button class="btnCreate"> Create </button>
            <input type="text" id="searchInput" name="searchInput" placeholder="Search..." >
        </form>
    </div> <br>

    <table>
        <tr style="font-weight: bold;">
            <td> ID No. </td>
            <td> Last Name </td>
            <td> First Name </td>
            <td> Status </td>
            <td> Action </td>
            <td> </td>
            <td> </td>
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