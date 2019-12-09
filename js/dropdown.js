// Hides and shows dropdown's content
function dropdown() {
    document.getElementById("user_badge_dropdown").classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('.dropdown_button')) {
        let dropdown_obj = document.getElementById("user_badge_dropdown");

        if (dropdown_obj.classList.contains('show')) {
            dropdown_obj.classList.remove('show');
        }
    }
}

//Event listeners
let drop_down = document.getElementsByClassName("dropdown_button")[0];
drop_down.addEventListener("click", function(){dropdown()});