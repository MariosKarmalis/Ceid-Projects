<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="admin_queries.js"></script>

</head>
<body>
    <h3 align="center">Manage Student Details</h3>
    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="display" value="Display All Data" /> </td>
    </tr>
    </table>
    <div id="all_container" align="center"></div>
    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_act_per" value="Display Activity Percentage Per Type" /> </td>
    </tr>
    </table>
    <div id="act_perc_container" align="center"></div>

    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_sum_per_user" value="Display Sum of Entries Per User" /> </td>
    </tr>
    </table>
    <div id="sum_entr_container" align="center"></div>
    
    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_sum_per_month" value="Display Sum of Entries Per Month" /> </td>
    </tr>
    </table>
    <div id="sum_per_month_container" align="center"></div>
    
    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_sum_per_day" value="Display Sum of Entries Per Day" /> </td>
    </tr>
    </table>
    <div id="sum_per_day_container" align="center"></div>

    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_sum_per_hour" value="Display Sum of Entries Per Hour" /> </td>
    </tr>
    </table>
    <div id="sum_per_hour_container" align="center"></div>

    <table border="1" align="center">
    <tr>
        <td> <input type="button" id="type_sum_per_year" value="Display Sum of Entries Per Year" /> </td>
    </tr>
    </table>
    <div id="sum_per_year_container" align="center"></div>
</body>
</html>
