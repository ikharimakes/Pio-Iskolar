//NOTIFICATION
function openOverlay() {
    document.getElementById('notifOverlay').style.display = 'block';
}
function closeOverlay() {
    document.getElementById('notifOverlay').style.display = 'none';
}

function openNotif(title, date, content) {
    document.getElementById('notifOverlay').style.display = 'none';
    document.getElementById('notifContent').style.display = 'block';
    document.getElementById('notifTitle').innerText = title;
    document.getElementById('notifDate').innerText = date;
    document.getElementById('notifContents').innerText = content;
}
function closeNotif() {
    document.getElementById('notifContent').style.display = 'none';
}
function backToNotif() {
    document.getElementById('notifContent').style.display = 'none';
    document.getElementById('notifOverlay').style.display = 'block';
}