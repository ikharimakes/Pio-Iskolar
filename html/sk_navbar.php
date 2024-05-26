<nav class="sidebar">
    <header>
        <div class="sideHeader">
            <span class="headerLogo">
                <img src="images/pio-logo.png" alt="logo">
            </span>

            <div class="headerText">
                <h1>Pio Iskolar</h1>
            </div>
        </div>
    </header> 

    <div class="navBar">
        <ul class="navLinks">
            <li class="navLink"> <a href="announce.php" onclick="activateLink(this)">
                <span class="icon">
                    <ion-icon name="megaphone-outline"></ion-icon>
                </span>
                <span class="text"> Announcement </span>
            </a> </li>
            
            <li class="navLink"> <a href="documents.php" onclick="activateLink(this)">
                <span class="icon">
                    <ion-icon name="document-outline"></ion-icon>
                </span>
                <span class="text"> Documents </span> 
            </a> </li>
            
            <li class="navLink"> <a href="profile.php" onclick="activateLink(this)">
                <span class="icon">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </span>
                <span class="text"> My Profile </span>
            </a> </li>
        </ul>
    </div> 

    <div class="bottom-content">
        <form action="" method="post">
            <li class="nav-link"> <a href="">
                <button type="submit" name="logout" style="all:unset; display: flex;">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="text"> Log Out </span>
                </button>
            </a> </li>
        </form>
    </div>
</nav>