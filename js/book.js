window.addEventListener('load', function() {
    let form = document.getElementById('search_form');
    form.onsubmit = function() {
        let date1 = document.querySelector('input[name="start_date"]').value;
        let date2 = document.querySelector('input[name="end_date"]').value;

        if(date1 < date2)
            return true;

        return false;
    };

    let start_date = document.querySelector('input[name="start_date"]');
    start_date.onchange = function(event) { 
        let end_date = document.querySelector('input[name="end_date"]');

        let new_end_date = addDays(event.target.value, 1);
        end_date.min = new_end_date;

        if(end_date.value <= event.target.value) {
            end_date.value = new_end_date;
        }
    };
});

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return formatDate(result);
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

