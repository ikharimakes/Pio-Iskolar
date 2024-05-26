<?php include('../functions/view_notif.php'); ?>

<div id="notifOverlay" class="overlay-notif" style="display: none;">
    <div class="content-notif">
        <div class="header-notif">
            <h2>Notifications</h2>
            <span class="close-btn" onclick="closeOverlay()"><img src="images/close.png" alt="Close"></span>
            <button onclick="deleteAllNotifs()">Delete All</button>
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
            <span class="close-btn" onclick="closeNotif()"><img src="images/close.png" alt="Close"></span>
            <button id="deleteNotifButton">Delete</button>
        </div>
            
        <p id="notifDate"></p><br>
        <p id="notifContents"></p>
    </div>
</div>

<input type="hidden" id="userId" value="<?php echo $_SESSION['uid']; ?>">