/*Script to exchange long image names by ...*/
let el = document.getElementsByClassName('image_name');
let string_max_size = 10;

for (let i = 0; i < el.length; i++) {
    if(el[i].textContent.length > string_max_size) {
        el[i].textContent = el[i].textContent.substr(0, string_max_size) + '...';
    }
}