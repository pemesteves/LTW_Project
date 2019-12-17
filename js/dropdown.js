// Hides and shows dropdown's content
function dropdown_user() {
    document.getElementById("user_badge_dropdown").classList.toggle("show");
}

function dropdown_nots() {
    document.getElementById("notifications_dropdown").classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('#notifications') && !e.target.matches('#notification_number') && !e.target.matches('#notification_img')) {
        let dropdown_obj = document.getElementById("notifications_dropdown");
        
        if (dropdown_obj.classList.contains('show')) {
            dropdown_obj.classList.remove('show');
        }
    }

    if (!e.target.matches('#user_badge')) {
        let dropdown_obj = document.getElementById("user_badge_dropdown");

        if (dropdown_obj.classList.contains('show')) {
            dropdown_obj.classList.remove('show');
        }
    }
}

//Event listeners
let drop_down_user = document.getElementsByClassName("dropdown_button")[3];
let drop_down_nots = document.getElementsByClassName("dropdown_button")[0];
drop_down_user.addEventListener("click", function(){dropdown_user()});
drop_down_nots.addEventListener("click", function(){dropdown_nots()});