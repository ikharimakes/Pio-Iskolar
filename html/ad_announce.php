<?php include('../functions/general.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Announcements </title>
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

    <!---->
    <div class="info">
        <h1> ANNOUNCEMENTS </h1>

        <form>
            <button type="button" class="btnAnnounce" href="add.html"> Add Announcement </button> <br>
        </form> </div> <br>

        <table>
            <tr style="font-weight: bold;">
                <td> Date </td>
                <td> Title </td>
                <td> Status </td>
                <td> Action </td>
            </tr>
            <tr> 
                <td> 08/01/2023 </td>
                <td> Application for Batch 23 </td>
                <td> ACTIVE </td>
                <td>
                    <!-- Trigger/Open The Modal -->
                    <button type="button" class="iconBtn" id="myBtn"> <img src="images/preview.png" alt="Icon"> </button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-contents">
                        <span class="close">&times;</span>
                        <div class="card"> 
                            <h6 class="title"> Application for Batch 23 </h6>
                            <img class="pic" src="images/pic1.jpg" alt="click here">
                            <div class="container">
                                <center> 
                                    <p class="caption"> The City Government of Valenzuela 
                                    will start accepting applicants for theDr. Pio Valenzuela
                                    Scholarship Program on December 13, 2023. Here are the 
                                    qualifications and requirements for the scholarship program. 
                                    <br> <br>
                                    Get the downloadable scholarship application form here: 
                                    https://www.valenzuela.gov.ph/drpioscholarship 
                                    <br> <br>
                                    For other concerns, you may send an email to 
                                    drpioscholarshiphelpdesk@gmail.com. </p> 
                                </center>
                            </div> 
                        </div>
                    </div></div>
                    <button class="iconBtn"> <img src="images/edit.png" alt="Icon"> </button>
                    <button class="iconBtn"> <img src="images/delete.png" alt="Icon"> </button>
                </td>
            </tr>
            <tr>
                <td> 08/16/2023 </td>
                <td> Contract Signing </td>
                <td> ACTIVE </td>
                <td>
                    <button class="iconBtn"> <img src="images/preview.png" alt="Icon"> </button>
                    <button class="iconBtn"> <img src="images/edit.png" alt="Icon"> </button>
                    <button class="iconBtn"> <img src="images/delete.png" alt="Icon"> </button>
                </td>
            </tr>
            <tr>
                <td> 08/29/2023 </td>
                <td> Results for Batch 26 </td>
                <td> ACTIVE </td>
                <td>
                    <button class="iconBtn"> <img src="images/preview.png" alt="Icon"> </button>
                    <button class="iconBtn"> <img src="images/edit.png" alt="Icon"> </button>
                    <button class="iconBtn"> <img src="images/delete.png" alt="Icon"> </button>
                </td>
            </tr>
        </table>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>


    <!--FOOTER
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>-->
</body>
</html>