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