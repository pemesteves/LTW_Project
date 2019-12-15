import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let username = this.document.querySelector('input[name="username"]');
    let email = this.document.querySelector('input[type="email"]');
    let password = this.document.querySelector('input[type="password"]');

    username.onchange = checkRegister;
    email.onchange = checkRegister;
    password.onchange = checkRegister;
});

function checkRegister(event) {
    let type = event.target.name;
    let value = event.target.value;

    console.log(type);
    console.log(value);
    console.log();

    let request = new XMLHttpRequest();

    request.open("post", "../actions/action_check_register.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onload = processResponse;
    request.send(encodeForAjax({
        "type": type,
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

    console.log(document);

    if (response.valid) {
        console.log("Valid " + response.type);
        document.querySelector('input[name="'+response.type+'"]').style.borderColor = "lightgreen";
        return true;
    } else {
        console.log("Invalid " + response.type);
        document.querySelector('input[name="'+response.type+'"]').style.borderColor = "red";
        return false;
    }    
}