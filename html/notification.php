<div id="notifOverlay" class="overlay-notif">
    <div class="content-notif">
        <div class="header-notif">
            <h2>Notifications</h2>
            <span class="close-btn" onclick="closeOverlay()"><img src="images/close.png" alt="Close"></span>
        </div>
            
        <ul class="notif-list">
            <li class="notif-item" onclick="openNotif('Notification 1', 'April 29, 2024', 'Content...')">
                Notification 1 <br>
            </li>
            <li class="notif-item" onclick="openNotif('Notification 2', 'April 30, 2024', 'Content...')">
                Notification 2 <br>
            </li>
            <li class="notif-item" onclick="openNotif('Notification 3', 'May 1, 2024', 'Content...')">
                Notification 3 <br>
            </li>
        </ul>
    </div>
</div>

<div id="notifContent" class="overlay-notif">
    <div class="content-notif">
        <div class="header-notif">
            <span class="back-btn" onclick="backToNotif()"><img src="images/previous.png" alt="Previous"></span>
            <h2 id="notifTitle"></h2>
            <span class="close-btn" onclick="closeNotif()"><img src="images/close.png" alt="Close"></span>
        </div>
            
        <p id="notifDate"></p><br>
        <p id="notifContents"></p>
    </div>
</div>