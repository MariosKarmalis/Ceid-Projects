<?php 
    include "../config.php"
?>

<?php 
if (!isset($_GET['query'])){
    $result = mysqli_query($link,"SELECT loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading FROM locations LIMIT 20");
    echo "<table border='1' >
    <tr>
    <td align=center><b>DateTime</b></td>
    <td align=center><b>Lat</b></td>
    <td align=center><b>Long</b></td>
    <td align=center><b>Accuracy</b></td></td>
    <td align=center><b>Velocity</b></td
    <td align=center><b>Altitude</b></td>
    <td align=center><b>Heading</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "<td align=center>$data[2]</td>";
        echo "<td align=center>$data[3]</td>";
        echo "<td align=center>$data[4]</td>";
        echo "<td align=center>$data[5]</td>";
        echo "<td align=center>$data[6]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "act_per")){
    $still = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'STILL'");
    $on_foot = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'ON_FOOT' ");
    $running = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'RUNNING' ");
    $on_bicycle = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'ON_BICYCLE' ");
    $in_vehicle = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'IN_VEHICLE' ");
    $tilting = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'TILTING' ");
    $walking = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'UNKNOWN' ");
    $exiting_vehicle = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'WALKING' ");
    $unkown = mysqli_query($link,"SELECT COUNT(type) FROM activity_type WHERE type = 'EXITING_VEHICLE' ");
    $sum = mysqli_query($link,"SELECT COUNT(type) FROM activity_type");

    echo "<table border='1' >
    <tr>
    <td align=center><b>Still</b></td>
    <td align=center><b>On Foot</b></td>
    <td align=center><b>Running</b></td>
    <td align=center><b>On Bicycle</b></td>
    <td align=center><b>In Vehicle</b></td>
    <td align=center><b>Tilting</b></td>
    <td align=center><b>Walking</b></td>
    <td align=center><b>Exiting Vehicle</b></td>
    <td align=center><b>Unkown</b></td>";

    $still = mysqli_fetch_row($still);
    $on_foot = mysqli_fetch_row($on_foot);
    $running = mysqli_fetch_row($running);
    $on_bicycle = mysqli_fetch_row($on_bicycle);
    $in_vehicle = mysqli_fetch_row($in_vehicle);
    $tilting = mysqli_fetch_row($tilting);
    $walking = mysqli_fetch_row($walking);
    $exiting_vehicle = mysqli_fetch_row($exiting_vehicle);
    $unkown = mysqli_fetch_row($unkown);
    $sum = mysqli_fetch_row($sum);

    $still = round(($still[0]/$sum[0])*100,2);
    $on_foot = round(($on_foot[0]/$sum[0])*100,2);
    $running = round(($running[0]/$sum[0])*100,2);
    $on_bicycle = round(($on_bicycle[0]/$sum[0])*100,2);
    $in_vehicle = round(($in_vehicle[0]/$sum[0])*100,2);
    $tilting = round(($tilting[0]/$sum[0])*100,2);
    $walking = round(($walking[0]/$sum[0])*100,2);
    $exiting_vehicle = round(($exiting_vehicle[0]/$sum[0])*100,2);
    $unkown = round(($unkown[0]/$sum[0])*100,2);

    echo "<tr>";
    echo "<td align=center>$still</td>";
    echo "<td align=center>$on_foot</td>";
    echo "<td align=center>$running</td>";
    echo "<td align=center>$on_bicycle</td>";
    echo "<td align=center>$in_vehicle</td>";
    echo "<td align=center>$tilting</td>";
    echo "<td align=center>$walking</td>";
    echo "<td align=center>$exiting_vehicle</td>";
    echo "<td align=center>$unkown</td>";
    echo "</tr>";
    
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "type_sum_per_user")){
    $result = mysqli_query($link,"SELECT userid,COUNT(*) FROM locations GROUP BY userid ORDER BY COUNT(*) DESC");
    // TODO Add join to display username , email maybe.
    echo "<table border='1' >
    <tr>
    <td align=center><b>User</b></td>
    <td align=center><b>Count</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "type_sum_per_month")){
    $result = mysqli_query($link,"SELECT MONTH(loc_timestamp) AS month,COUNT(*) FROM locations GROUP BY month ");
    echo "<table border='1' >
    <tr>
    <td align=center><b>Month</b></td>
    <td align=center><b>Count</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "type_sum_per_day")){
    $result = mysqli_query($link,"SELECT DAYOFWEEK(loc_timestamp) AS Day,COUNT(*) FROM locations GROUP BY Day ");
    echo "<table border='1' >
    <tr>
    <td align=center><b>Day</b></td>
    <td align=center><b>Count</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "type_sum_per_hour")){
    $result = mysqli_query($link,"SELECT HOUR(loc_timestamp) AS Hour,COUNT(*) FROM locations GROUP BY Hour ");
    echo "<table border='1' >
    <tr>
    <td align=center><b>Hour</b></td>
    <td align=center><b>Count</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if ((isset($_GET['query'])) && ($_GET['query'] == "type_sum_per_year")){
    $result = mysqli_query($link,"SELECT YEAR(loc_timestamp) AS Year,COUNT(*) FROM locations GROUP BY Year ");
    echo "<table border='1' >
    <tr>
    <td align=center><b>Year</b></td>
    <td align=center><b>Count</b></td>";

    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>