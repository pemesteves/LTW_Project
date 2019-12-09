'use strict';

let uploadImageOnClick = () => {
    document.getElementById("fileToUpload").click();
};

let image = document.querySelector('#fit_crop img');

image.setAttribute("onclick", "uploadImageOnClick()");

document.getElementById("fileToUpload").onchange = function() {
    document.getElementById("upload_image_form").submit();
};