import {encodeForAjax} from './utils.js';

window.addEventListener('load', function() {
    let form = document.getElementById('search_form');
    form.onsubmit = function() {

        let date1 = document.querySelector('input[name="start_date"]').value;
        let date2 = document.querySelector('input[name="end_date"]').value;
        let guests = document.querySelector('input[name="sleeps"]').value;
        
        let parts = window.location.search.substr(1).split("&");
        let $_GET = {};
        for (let i = 0; i < parts.length; i++) {
            let temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }

        let property_id = $_GET['property'];

        let request = new XMLHttpRequest();
        request.open("post", "../actions/action_check_reservation.php", true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onload = checkReservation;
        request.send(encodeForAjax({
            "property": property_id,
            "start": date1,
            "end": date2,
            "guests": guests
        }));        

        return false;
    };

    let start_date = document.querySelector('input[name="start_date"]');
    start_date.onchange = function(event) { 
        let end_date = document.querySelector('input[name="end_date"]');

        let new_end_date = addDays(event.target.value, 1);
        end_date.min = new_end_date;

        if(end_date.value <= event.target.value) {
            end_date.value = new_end_date;
        }
    };
});


function checkReservation() {
    let response;
    try {
        response = JSON.parse(this.responseText);
    } catch(e) {
        console.log("Error parsing");
        return false;
    }

    let dates=document.querySelectorAll('input[type="date"]');

    if(response.exists) {
        dates.forEach(element => {
            element.style.borderColor = "red";
        });
    }
    if(response.over_limit) {
        document.querySelector('input[name="sleeps"]').style.borderColor = "red";
    }


    if(!response.exists) {
        dates.forEach(element => {
            element.style.borderColor = null;
        });
    }

    if(!response.over_limit) {
        document.querySelector('input[name="sleeps"]').style.borderColor = null;
    }

    if(!response.exists && !response.over_limit) {
        let form = document.getElementById('search_form');
        form.submit();
        return true;
    }

    return false;
}

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return formatDate(result);
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}