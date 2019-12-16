'use strict';

window.addEventListener("scroll", function () {
    //set scroll position in session storage
    sessionStorage.scrollPos = window.scrollY;
});

var init = function () {
    //get scroll position in session storage
    window.scrollY = sessionStorage.scrollPos || 0;
};
window.onload = init;