import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let form = document.getElementById('account_form');
    form.onsubmit = checkRegister.bind(form);
});

function checkRegister() {
    let username = this.querySelector('input[name="username"]').value;
    let email = this.querySelector('input[type="email"]').value;
    let password = this.querySelector('input[type="password"]').value;

    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_register.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onload = processRegisterResponse;
    request.send(encodeForAjax({
        username: username,
        email: email,
        password: password
    }));

    console.log("HEY");

    return false;
}

// ajax handler
function processRegisterResponse() {
    let response;
    try {
        response = JSON.parse(this.responseText);
    } catch(e) {
        console.log("Error parsing");
        return false;
    }

    if (response.indexOf("SUCCESS") === 0) {
        window.location.replace("index.php");
        return true;
    } else {
        alert(response);
        return false;
    }    
}