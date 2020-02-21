/** STANDARD ADMIN CHARTS 
* TODO : All queries and then integrate with admin page dashboard.
* [x]: Chart Activity Percentage Per Type,
* [x]: Sum of Entries Per User,
* [ ]: Sum of Entries Per Month,
* [ ]: Sum of Entries Per Month,
* [ ]: Sum of Entries Per Day,
* [ ]: Sum of Entries Per Hour,
* [ ]: Sum of Entries Per Year
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
            console.log(response);
            bar_chart(act_count,act_labels,act_colours,'PerActType','#Per Activity Type');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        type: "POST",
        data: {query : "type_sum_per_user"},
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
            bar_chart(usr_count,usr_lbl,usr_colours,'PerUserChart','#Per User');
        }
    });
});

// CHART MAKING FUNCTIONS

/**
 * * BAR CHART PASSE PARTOUT FUNCTION *
 * @param {Array} mydata 
 * @param {Array} mylabels : Names of Columns.
 * @param {Array} mycolours : Random Gen Hex Colours.
 * @param {*} cont_id : Canvas id in which we want to display the graph.
 * @param {*} chart_lbl : Chart Title.
 */
function bar_chart(mydata,mylabels,mycolours,cont_id,chart_lbl) {
    var ctx = document.getElementById(cont_id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
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



