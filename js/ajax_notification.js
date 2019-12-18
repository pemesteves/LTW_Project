import {encodeForAjax} from './utils.js';

let seen = true;
let open = false;

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
        let content = document.getElementById('notifications_dropdown');

        if(response.notifications) {

            seen = false;

            while(content.firstChild) {
                content.removeChild(content.firstChild);
            }

            if(response.date1 && response.description1) {
                let tag = document.createElement('a');
                tag.setAttribute('href',"../actions/action_notification.php");

                let p_date = document.createElement('p');
                p_date.innerText = response.date1;

                let p_description = document.createElement('p');
                p_description.innerText = response.description1;    
                
                tag.appendChild(p_date);
                tag.appendChild(p_description);

                content.appendChild(tag);
            }

            if(response.date2 && response.description2) {
                let tag = document.createElement('a');
                tag.setAttribute('href',"../actions/action_notification.php");

                let p_date = document.createElement('p');
                p_date.innerText = response.date2;

                let p_description = document.createElement('p');
                p_description.innerText = response.description2;    
                
                tag.appendChild(p_date);
                tag.appendChild(p_description);

                content.appendChild(tag);
            }
            
            if(response.date3 && response.description3) {
                let tag = document.createElement('a');
                tag.setAttribute('href',"../actions/action_notification.php");

                let p_date = document.createElement('p');
                p_date.innerText = response.date3;

                let p_description = document.createElement('p');
                p_description.innerText = response.description3;    
                
                tag.appendChild(p_date);
                tag.appendChild(p_description);

                content.appendChild(tag);
            }            
        }

        else if(!open && seen) {
            
            while(content.firstChild) {
                content.removeChild(content.firstChild);
            }

            let p_zero = document.createElement('p');
            p_zero.innerText = "You don't have notifications";
            p_zero.id = "zero_nots";

            content.appendChild(p_zero);
        }
    }

    return false;
}

function resetNotifications() {
    document.getElementById('notification_number').innerHTML = 0;

    if(open) {
        open = false;
    }
    else {
        open = true;
    }

    if(!seen && open) {
        seen = true;
    }

    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_reset_notifications.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send();    
}