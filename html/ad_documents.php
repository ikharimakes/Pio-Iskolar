<?php include('../functions/general.php');?>
<?php include('../functions/docxmgmt.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Documents </title>
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
    <style>
        input::file-selector-button {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            border: thin solid grey;
            border-radius: 3px;
            margin-left:0.2rem;
            padding: 0.2rem;
            padding-left: 1rem;
            padding-right: 1rem;
            color: rgb(112, 112, 112);
            background-color: #ffffff;
        }
        .btnSubmit {
            font-size: 20px;
            width: 200px;
            height: 35px;
            background-color: #FFF0E0;
            border: .5%;
            border-radius: 10px;
            margin-right: 35px;
        }
    </style>
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
        <h1> DOCUMENTS </h1>

        <form>
            <!-- Trigger/Open The Modal -->
            <button type="button" class="btnUpload" id="myBtn"> Upload </button>

            <!-- The Modal -->
            <div id="myModal" class="modals">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1> UPLOAD DOCUMENTS </h1>
                
                <div class="tbl_popup">
                    <table>
                        <tr style="font-weight: bold;">
                            <td> Scholar ID </td>
                            <td> Document </td>
                            <td> Doc Type </td>
                        </tr>
                        <tr> 
                            <td> 
                                <input type="text" class="textbox" id="textbox" name="name_1">
                            </td>
                            <td> 
                                <input type="file" accept=".pdf" id="doc_1"/>
                            </td>
                            <td> 
                                <div class="drop">
                                <button type="button" class="dropbtn" name="type_1"> Doc Type</button>
                                <div class="drop-content">
                                        <a href="#">COR</a>
                                        <a href="#">TCG</a>
                                        <a href="#">SCF</a>
                                </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                <br><br><br>
                <button type="submit" name="submission" class="btnSubmit" style="float:right"> Submit </button>
                </div>
                
            </div>
        
            </div>
        <!--
            <div class="dropdown">
                <button type="button" class="dropbtn">Sort by</button>
                <div class="dropdown-content">
                    <a href="#">Name</a>
                    <a href="#">Date</a>
                    <a href="#">Type</a>
                </div>
            </div>
                
            <div class="dropdown">
                <button type="button" onclick="toggleDropdown()" class="dropbtn">Filter</button>
                <div id="myDropdown" class="dropdown-content">
                <a href="#">Option 1</a>
                <a href="#">Option 2</a>
                <a href="#">Option 3</a>
                </div>
            </div>

            <input type="text" id="searchInput" name="searchInput" placeholder="Search..." >
        -->
        
        </form>
    </div> <br>

    <table>
        <tr style="font-weight: bold;">
            <td> ID No. </td>
            <td> Document Name </td>
            <td> Date </td>
            <td> Type </td>
            <td> Status </td>
            <td style="text-align: right;"> Actions </td>
        </tr>
        <?php docxList()?>
    </table>
    <br> <br>

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



    <!--FOOTER-->
    <div class="footer">
        <h6> ©2023 Dr. Pio Scholarship Manager. @All Rights Reserved. </h6>
    </div>

</body>
</html>