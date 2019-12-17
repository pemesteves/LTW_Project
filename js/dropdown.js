// Hides and shows dropdown's content
function dropdown_user() {
    document.getElementById("user_badge_dropdown").classList.toggle("show");
}

function dropdown_nots() {
    document.getElementById("notifications_dropdown").classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('.dropdown_button')) {
        let dropdown_obj1 = document.getElementById("user_badge_dropdown");
        let dropdown_obj2 = document.getElementById("notifications_dropdown");

        if (dropdown_obj1.classList.contains('show')) {
            dropdown_obj1.classList.remove('show');
        }
        if (dropdown_obj2.classList.contains('show')) {
            dropdown_obj2.classList.remove('show');
        }
    }
}

//Event listeners
let drop_down_user = document.getElementsByClassName("dropdown_button")[3];
let drop_down_nots = document.getElementsByClassName("dropdown_button")[0];
drop_down_user.addEventListener("click", function(){dropdown_user()});
drop_down_nots.addEventListener("click", function(){dropdown_nots()});