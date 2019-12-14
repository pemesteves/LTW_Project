/*Script to exchange long descriptions by ...*/
let el = document.getElementsByClassName('description');
let string_max_size = 180;

for (let i = 0; i < el.length; i++) {
    if(el[i].textContent.length > string_max_size) {
        el[i].textContent = el[i].textContent.substr(0, string_max_size) + '...';
    }
}