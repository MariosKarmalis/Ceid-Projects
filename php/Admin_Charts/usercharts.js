/** STANDARD ADMIN CHARTS 
* TODO : All queries and then integrate with admin page dashboard.
* [x]: Chart Activity Percentage Per Type,
* [x]: Sum of Entries Per User,
* [x]: Sum of Entries Per Month,
* [x]: Sum of Entries Per Day,
* [x]: Sum of Entries Per Hour,
* [x]: Sum of Entries Per Year
*/

// AJAX QUERIES
$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "activity_per_type"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let act_count = [response.length];
            let act_labels = [response.length];
            let act_colours = [response.length];
            for(let step = 0; step < response.length; step++){
                act_count[step] = response[step]['Count']; 
                act_labels[step] = response[step]['Type']; 
                colour = getRandomColorHex();
                act_colours[step] = colour;
            }
            bar_chart(act_count,act_labels,act_colours,'PerActType','#Per Activity Type','bar');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "sum_per_user"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let usr_count = [response.length];
            let usr_lbl = [response.length];
            let usr_colours = [response.length];
            for(let step = 0; step < response.length; step++){
                usr_count[step] = response[step]['COUNT(*)']; 
                usr_lbl[step] = "User " + response[step]['userid']; 
                colour = getRandomColorHex();
                usr_colours[step] = colour;
            }
            bar_chart(usr_count,usr_lbl,usr_colours,'PerUserChart','#Per User','bar');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "sum_per_month"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let month_count = [response.length];
            let month_lbl = [response.length];
            let month_colours = [response.length];
            let months = ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEPT","OCT","NOV","DEC"];
            for(let step = 0; step < response.length; step++){
                month_count[step] = response[step]['Count']; 
                month_lbl[step] = months[response[step]['Month'] -1];
                colour = getRandomColorHex();
                month_colours[step] = colour;
            }
            bar_chart(month_count,month_lbl,month_colours,'PerMonthChart','#Per Month','bar');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "sum_per_day"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let day_count = [response.length];
            let day_lbl = [response.length];
            let day_colours = [response.length];
            // ! Note: 1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thursday, 6=Friday, 7=Saturday.
            let days = ["Sunday","Monday","Tueday","Wednesday","Thursday","Friday","Saturday"];
            for(let step = 0; step < response.length; step++){
                day_count[step] = response[step]['Count']; 
                day_lbl[step] = days[response[step]['Day'] -1];
                colour = getRandomColorHex();
                day_colours[step] = colour;
            }
            bar_chart(day_count,day_lbl,day_colours,'PerDayChart','#Per Day','bar');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "sum_per_hour"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let hour_count = [response.length];
            let hour_lbl = [response.length];
            let hour_colours = [response.length];
            for(let step = 0; step < response.length; step++){
                hour_count[step] = response[step]['Count']; 
                hour_lbl[step] = response[step]['Hour'];
                colour = getRandomColorHex();
                hour_colours[step] = colour;
            }
            bar_chart(hour_count,hour_lbl,hour_colours,'PerHourChart','#Per Hour','horizontalBar');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "sum_per_year"},
        url: "test.php",             
        dataType: "json",                
        success: function(response){
            let year_count = [response.length];
            let year_lbl = [response.length];
            let year_colours = [response.length];
            for(let step = 0; step < response.length; step++){
                year_count[step] = response[step]['Count']; 
                year_lbl[step] = response[step]['Year'];
                colour = getRandomColorHex();
                year_colours[step] = colour;
            }
            bar_chart(year_count,year_lbl,year_colours,'PerYearChart','#Per Year','horizontalBar');
        }
    });
});



// CHART MAKING FUNCTIONS

/**
 * * BAR CHART PASSE-PARTOUT FUNCTION *
 * @param {Array} mydata 
 * @param {Array} mylabels : Names of Columns.
 * @param {Array} mycolours : Random Gen Hex Colours.
 * @param {String} cont_id : Canvas id in which we want to display the graph.
 * @param {String} chart_lbl : Chart Title.
 * @param {String} bartype : bar or horizontal bar.
 */
function bar_chart(mydata,mylabels,mycolours,cont_id,chart_lbl,bartype) {
    var ctx = document.getElementById(cont_id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: bartype,
        data: {
            labels: mylabels,
            datasets: [{
                label: chart_lbl,
                data: mydata,
                backgroundColor: mycolours,
                borderColor: mycolours,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
