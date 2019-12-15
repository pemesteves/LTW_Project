import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let username = this.document.querySelector('input[name="username"]');
    let email = this.document.querySelector('input[type="email"]');
    let password = this.document.querySelector('input[type="password"]');

    username.onchange = checkRegister('checkUsername', username.value);
    password.onchange = checkRegister('checkPassword', password.value);
    email.onchange = checkRegister('checkEmail', email.value);
});

function checkRegister(method, value) {
    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_register.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onload = processResponse;
    request.send(encodeForAjax({
        "method": method,
        "value": value
    }));

    return false;
}

function processResponse() {
    let response;
    try {
        response = JSON.parse(this.responseText);
    } catch(e) {
        console.log("Error parsing");
        return false;
    }

    if (response.valid) {
        console.log("Valid " + response.component);
        return true;
    } else {
        console.log("Invalid " + response.component);
        return false;
    }    
}