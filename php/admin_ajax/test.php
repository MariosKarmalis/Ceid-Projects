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
    elseif((isset($_POST["query"]))&&($_POST["query"] == "type_sum_per_user")) {
        $result = mysqli_query($link,"SELECT userid,COUNT(*) FROM locations GROUP BY userid ORDER BY COUNT(*) DESC");
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
            }
        echo json_encode($dbdata);
    }
    elseif ((isset($_POST["query"]))&&($_POST["query"] == "activity_per_type")) {
        $result = mysqli_query($link,"SELECT COUNT(*) AS Count , type AS Type FROM `activity_type` GROUP BY Type");
        while ( $row = $result->fetch_assoc())  {
            $dbdata[]=$row;
        }
    echo json_encode($dbdata);
    }
    elseif ((isset($_POST["query"]))&&($_POST["query"] == "activity_per_type")) {
        
    }
?>