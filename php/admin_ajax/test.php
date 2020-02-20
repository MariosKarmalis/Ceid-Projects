<?php 
    include "../config.php";
    if ((isset($_POST["type"]))&&($_POST["type"] == 1)){
        $result = mysqli_query($link," SELECT location_id,loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading,l_acc_timestampMs,type,confidence,userid 
        FROM locations 
        LEFT JOIN location_activities ON location_id = location_activities.loc_id 
        LEFT JOIN activity_type ON location_activities.loc_act_id = activity_type.activities_id 
        ORDER BY location_id LIMIT 10");
        while ( $row = $result->fetch_assoc())  {
            $dbdata[]=$row;
            }
        echo json_encode($dbdata);
    }
    else {
        echo "5555555555555555555";
    }
?>