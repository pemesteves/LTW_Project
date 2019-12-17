import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let notifications = document.getElementById('notifications');
    notifications.onclick = resetNotifications;

    updateNotifications();
    setInterval(updateNotifications, 5000);
});

function updateNotifications() {
    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_update_notifications.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onload = processResponse;
    request.send();

    return false;
}

function processResponse() {
    let response;
    try {
        response = JSON.parse(this.responseText);
    } catch(e) {
        return false;
    }

    if (response.successful) {
        document.getElementById('notification_number').innerHTML = response.notifications;
    }

    return false;
}

function resetNotifications() {
    document.getElementById('notification_number').innerHTML = 0;

    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_reset_notifications.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send();    
}