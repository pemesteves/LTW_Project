import {encodeForAjax} from './utils.js';

let validInputs = [];

window.addEventListener('load', function() {

    let form = document.getElementById('account_form');
    let inputs = form.elements;
    
    for(let i = 0; i < inputs.length; i++) {
                
        if(inputs[i].name != "") {
            validInputs[inputs[i].name] = false;
            inputs[i].onchange = checkRegister;
        }
    }

    form.onsubmit = checkForm;
});

function checkRegister(event) {
    let type = event.target.name;
    let value = event.target.value;

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

    if (response.valid) {
        console.log("Valid " + response.type);
        document.querySelector('input[name="'+response.type+'"]').style.borderColor = null; 
        validInputs[response.type] = true;
        return true;
    } else {
        console.log("Invalid " + response.type);
        document.querySelector('input[name="'+response.type+'"]').style.borderColor = "red";
        validInputs[response.type] = false;
        return false;
    }    
}

function checkForm() {

    for (let key in validInputs){
        if (validInputs.hasOwnProperty(key)) { 
            if(validInputs[key] === false)
                return false;
        }
    }

    return true;
}