'use strict'

let search_bar_dates = document.querySelectorAll('#search_form .search_box .date');

if(search_bar_dates.length == 2){
    const now = new Date(Date.now());
    let day = now.getDate();
    let year = now.getFullYear();
    let month = now.getMonth() + 1; 

    let date = year + '-';
    if(month < 10){
        date += '0' + month;
    }else{
        date += month;
    }

    date += '-';

    if(day < 10){
        date += '0' + day;
    }else{
        date += day;
    }

    search_bar_dates[0].setAttribute("value", date);
    search_bar_dates[0].setAttribute("min", date);

    const tomorrow = new Date(now);
    tomorrow.setDate(tomorrow.getDate()+1);

    day = tomorrow.getDate();
    year = tomorrow.getFullYear();
    month = tomorrow.getMonth() + 1; 

    date = year + '-';
    if(month < 10){
        date += '0' + month;
    }else{
        date += month;
    }

    date += '-';

    if(day < 10){
        date += '0' + day;
    }else{
        date += day;
    }

    search_bar_dates[1].setAttribute("value", date);
    search_bar_dates[1].setAttribute("min", date);
}