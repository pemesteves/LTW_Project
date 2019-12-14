/*Script to exchange long descriptions by ...*/
let el = document.getElementById('description');
let string_max_size = 200;

if(el.textContent.length > string_max_size) {
    el.textContent = el.textContent.substr(0, string_max_size) + '...';
}