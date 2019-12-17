import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let form = document.getElementById('account_form');
    form.onsubmit = checkLogin;
});

function checkLogin(event) {
    let username = document.querySelector('input[name="username"]');
    let password = document.querySelector('input[name="password"]');

    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_check_login.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onload = function() {
        let response;
        try {
            response = JSON.parse(this.responseText);
        } catch(e) {
            console.log("Error parsing");
            return false;
        }

        let error_box = document.getElementById('login_error');
    
        if (response.successful) {
            console.log("Valid username and password");

            error_box.style.display = "none";
            
            let form = document.getElementById('account_form');
            form.submit();

            return true;
        } else {
            console.log("Invalid username or password");

            error_box.style.display = "block";
            
            return false;
        } 
    }
    request.send(encodeForAjax({
        "username": username.value,
        "password": password.value
    }));

    return false;
}

