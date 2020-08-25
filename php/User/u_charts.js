/**
 * Displays :
 *      - [ ] Ecological Transport Score. 
 *              + Past 12 months graph.
 *      - [ ] Time period of users location entries.
 *      - [ ] Last User's data upload date. 
 *      ? maybe add another field in database for last upload date.
 *      - [ ] Top 3 user leaderboard for past month + this user's ranking.
 *      ? maybe add another field in user for score.
 */

$(document).ready(function() {
    // Function for 12 month user activity display
    $.ajax({
        type: "POST",
        data: {query : "past12months"},
        url: "./usr_queries.php",             
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

$(document).ready(function(){
    $.ajax({
        type: "POST",
        data: {query : "score"},
        url : "./usr_queries.php",
        success : function(response){
            // 
        }
    })
})


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