let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

//Event listeners
//Previous and next arrows
let prev = document.getElementsByClassName("prev")[0]
prev.addEventListener("click", function(){plusSlides(-1)})
let next = document.getElementsByClassName("next")[0]
next.addEventListener("click", function(){plusSlides(1)})
//Current number of the slide
let current_slide1 = document.getElementsByClassName("dot")[0]
current_slide1.addEventListener("click", function(){currentSlide(1)})
let current_slide2 = document.getElementsByClassName("dot")[1]
current_slide2.addEventListener("click", function(){currentSlide(2)})
let current_slide3 = document.getElementsByClassName("dot")[2]
current_slide3.addEventListener("click", function(){currentSlide(3)})