<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOINS SQL TESTING</title>
</head>
<body>
    <pre>
    <?php 
        include("../config.php");
        $sql = "SELECT location_id,loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading,l_acc_timestampMs,type,confidence,userid 
                FROM locations 
                LEFT JOIN location_activities ON location_id = location_activities.loc_id 
                LEFT JOIN activity_type ON location_activities.loc_act_id = activity_type.activities_id 
                ORDER BY location_id ";
        $result = mysqli_query($link,$sql);

        print_r($result);
        
        while ( $row = $result->fetch_assoc())  {
            $dbdata[]=$row;
          }
        print_r($dbdata);
        echo json_encode($dbdata);        

    ?>
    </pre>
</body>
</html>

        <!-- $sql = "SELECT location_id,loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading,l_acc_timestampMs,type,confidence,userid 
                FROM locations 
                LEFT JOIN location_activities ON location_id = location_activities.loc_id 
                LEFT JOIN activity_type ON location_activities.loc_act_id = activity_type.activities_id 
                ORDER BY location_id "; -->