<?php include('../functions/view_notif.php'); ?>

<div id="notifOverlay" class="overlay-notif" style="display: none;">
    <div class="content-notif">
        <div class="header-notif">
            <button class="icon-btn" onclick="deleteAllNotifs()">
                <ion-icon name="trash-outline"></ion-icon> 
                <p>Delete All</p>
            </button>
            <h2>Notifications</h2>
            <span class="closeOverlay" onclick="closeOverlay()">&times;</span>
        </div>
            
        <ul class="notif-list">
            <?php view_notif($_SESSION['uid']) ?>
        </ul>
        <p id="noNotifsMessage" style="display: none;">There are currently no notifications.</p>
    </div>
</div>

<div id="notifContent" class="overlay-notif" style="display: none;">
    <div class="content-notif">
        <div class="header-notif">
            <span class="back-btn" onclick="backToNotif()"><img src="images/previous.png" alt="Previous"></span>
            <h2 id="notifTitle"></h2>
            <span class="closeOverlay" onclick="closeNotif()">&times;</span>
        </div>
            
        <p id="notifDate"></p><br>
        <p id="notifContents"></p>

        <button id="deleteNotifButton" class="delete-btn">
            <ion-icon name="trash-outline"></ion-icon> Delete
        </button>
    </div>
</div>

<input type="hidden" id="userId" value="<?php echo $_SESSION['uid']; ?>">