/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : all the location entries.
*/
$(document).ready(function() {

    $("#display").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned
        success: function(response){                    
            $("#all_container").html(response); 
        }

    });
});
});
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Locations' activity type percentages.
*/
$(document).ready(function() {

    $("#type_act_per").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "act_per"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#act_perc_container").html(response); 
        }

    });
});
}); 
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Sum of entries per user.
*/
$(document).ready(function() {

    $("#type_sum_per_user").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "type_sum_per_user"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#sum_entr_container").html(response); 
        }

    });
});
}); 
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Sum of entries per month.
*/
$(document).ready(function() {

    $("#type_sum_per_month").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "type_sum_per_month"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#sum_per_month_container").html(response); 
        }

    });
});
}); 
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Sum of entries per day of week.
*/
$(document).ready(function() {

    $("#type_sum_per_day").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "type_sum_per_day"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#sum_per_day_container").html(response); 
        }

    });
});
}); 
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Sum of entries per hour.
*/
$(document).ready(function() {

    $("#type_sum_per_hour").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "type_sum_per_hour"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#sum_per_hour_container").html(response); 
        }

    });
});
}); 
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Sum of entries per year.
*/
$(document).ready(function() {

    $("#type_sum_per_year").click(function() {                

    $.ajax({    //create an ajax request to adminqueries.php
        type: "GET",
        data: {query : "type_sum_per_year"},
        url: "adminqueries.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#sum_per_year_container").html(response); 
        }

    });
});
});
/*
* When the button with id display is clicked :
* this ajax request will be sent to adminqueries.php 
* @returns : Json Format data for 1 location.
*/
$(document).ready(function() {

    $("#json_test").click(function() {                

    $.ajax({    
        type: "GET",
        data: {query : "json"},
        url: "adminqueries.php",             
        dataType: "json",   //expect JSON to be returned              
        success: function(response){  
            var test = JSON.stringify(response); 
            test = JSON.parse(test);          
            let len = response.length;
            for(let i=0; i<len; i++){
                let location_id = response[i].location_id
                let timestamp = response[i].loc_timestamp;
                let latitude = response[i].latE7;
                let longitude = response[i].longE7;
                let accuracy = response[i].accuracy;
                let velocity = response[i].velocity;
                let altitude = response[i].altitude;
                let heading = response[i].heading;
                let l_act_timestamp = response[i].l_acc_timestamp;
                let act_type = response[i].type;
                let act_confidence = response[i].confidence;
                let userid = response[i].userid;

                var tr_str = "<tr>" +
                "<td align='center'>" + location_id + "</td>" +
                "<td align='center'>" + timestamp + "</td>" +
                "<td align='center'>" + latitude + "</td>" +
                "<td align='center'>" + longitude + "</td>" +
                "<td align='center'>" + accuracy + "</td>" +
                "<td align='center'>" + velocity + "</td>" +
                "<td align='center'>" + altitude + "</td>" +
                "<td align='center'>" + heading + "</td>" +
                "<td align='center'>" + l_act_timestamp + "</td>" +
                "<td align='center'>" + act_type + "</td>" +
                "<td align='center'>" + act_confidence + "</td>" +
                "<td align='center'>" + userid + "</td>" +
                "</tr>";

                // $("#json_container").append(tr_str); 
            }
            console.log(test);
        }
    });
});
});

