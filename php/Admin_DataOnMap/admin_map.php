<?php 

// Establish link with database.
include "../config.php";

// Handle Time,Activity_Type Query from admin.
if(isset($_POST)){

    // TODO EXTRACT VARIABLES SENT, THEN INTEGRATE WITH AUTOMATED QUERY MAKER FROM "./test.php"
    // ? JSON ENCODED? MAYBE CSV XML JSON AT THIS STAGE?   

    $timedata = $_POST["time_data"];

    $dsta = $timedata[0];
    $dend = $timedata[1];
    $msta = $timedata[2];
    $mend = $timedata[3];
    $ysta = $timedata[4];
    $yend = $timedata[5];
    $tsta = $timedata[6];
    $tend = $timedata[7];
    
    $types = [];
    if (isset($_POST["types_data"])){
        $types = $_POST["types_data"];
    }


    $query_prefix = "SELECT location_id AS Location_ID,loc_timestamp AS Location_DateTime,
            latE7 AS Latitude,longE7 AS Longitude,accuracy AS Accuracy,velocity AS Velocity,altitude AS Altitude,
            heading AS Heading,l_acc_timestampMs AS Activity_DT,type AS Type,confidence AS Confidence,
            userid AS UserID 
            FROM locations 
            LEFT JOIN location_activities ON location_id = location_activities.loc_id 
            LEFT JOIN activity_type ON location_activities.loc_act_id = activity_type.activities_id " ;
    
    $query_postfix = "ORDER BY location_id";

    $clauses = array();

    // Checking Days 
    if($dsta != ""){
        if ($dend == ""){
            $day_clause = " ( DAYOFWEEK(loc_timestamp) = $dsta ) ";
        }else{
            if($dsta > $dend){
                $day_clause = " ( NOT (DAYOFWEEK(loc_timestamp) > $dsta AND DAYOFWEEK(loc_timestamp) < $dend) ) ";
                $clauses[] = $day_clause;
            }
            elseif ($dsta == $dend) {
                $day_clause = " (DAYOFWEEK(loc_timestamp) = $dsta) ";
                $clauses[] = $day_clause;
            }
            else{
                $day_clause = " (DAYOFWEEK(loc_timestamp) BETWEEN $dsta AND $dend) ";
                $clauses[] = $day_clause;
            }
        }
    }

    // Checking Months
    if($msta != ""){
        if ($mend == ""){
            $mon_clause = " ( MONTH(loc_timestamp) = $msta ) ";
        }else{
            if($dsta > $dend){
                $mon_clause = " ( NOT (MONTH(loc_timestamp) > $msta AND MONTH(loc_timestamp) < $mend) ) ";
                $clauses[] = $mon_clause;
            }
            elseif ($dsta == $dend) {
                $mon_clause = " (MONTH(loc_timestamp) = $msta) ";
                $clauses[] = $mon_clause;
            }
            else{
                $mon_clause = " (MONTH(loc_timestamp) BETWEEN $msta AND $mend) ";
                $clauses[] = $mon_clause;
            }
        }
    }

    // Checking Years
    if($ysta != ""){
        if ($yend == ""){
            $year_clause = " ( YEAR(loc_timestamp) = $ysta ) ";
            $clauses[] = $year_clause;
        }else{
            if ($ysta == $yend) {
                $year_clause = " (YEAR(loc_timestamp) = $ysta) ";
                $clauses[] = $year_clause;
            }
            else{
                $year_clause = " (YEAR(loc_timestamp) BETWEEN $ysta AND $yend) ";
                $clauses[] = $year_clause;
            }
        }
    }

    // Checking Times
    if($tsta != ""){
        if ($tend == ""){
            $time_clause = " ( HOUR(loc_timestamp) = $tsta ) ";
            $clauses[] = $time_clause;
        }else{
            if($dsta > $dend){
                $time_clause = " ( NOT (HOUR(loc_timestamp) > $tsta AND HOUR(loc_timestamp) < $tend) ) ";
                $clauses[] = $time_clause;
            }
            elseif ($dsta == $dend) {
                $time_clause = " (HOUR(loc_timestamp) = $tsta) ";
                $clauses[] = $time_clause;
            }
            else{
                $time_clause = " (HOUR(loc_timestamp) BETWEEN $tsta AND $tend) ";
                $clauses[] = $time_clause;
            }
        }
    }

    // Checking Types
    $type_clause = "";
    if (!empty($types)) {
        if (count($types) > 1) {
            for ($i=0; $i <= count($types) - 1; $i++) {
                if ($i != count($types) - 1) {
                    $type_clause .= " (type = '$types[$i]') OR ";
                }else{
                    $type_clause .= " (type = '$types[$i]') ";
                }
            }
        }else{
            $type_clause = "(type = '$types[0]')";
        }
    }
    
    if (!empty($type_clause)){
        $type_clause = " (" . $type_clause . ") ";
        $clauses[] = $type_clause;
    }
    

    // Constructing final clauses string.
    $cq = "";
    if(!empty($clauses)){
        if(count($clauses) > 1){
            for ($i=0; $i <= count($clauses) - 1; $i++) { 
                if ($i != (count($clauses) -1 )){
                    $cq .= $clauses[$i] . " AND ";
                }else {
                    $cq .= $clauses[$i];
                }
            }
        }else {
            $cq .= $clauses[0];
        }
        $final_query = $query_prefix ." WHERE " . $cq . $query_postfix;
    }else{
        $final_query = $query_prefix . $query_postfix;
    }
    
    // Executing query and returning data.
    $result = mysqli_query($link, $final_query);
    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
        }

    if (isset($dbdata)){
        // Return the data in JSON format.
        $return = json_encode($dbdata);
        echo $return;
        // Save to files.
        toFiles($dbdata);
    }else{
        echo json_encode("");
    }
}

function toFiles(Array $data)
{
    // TO JSON

    file_put_contents("./results/results.json",json_encode($data));
    // TO XML
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><Locations></Locations>');
    array_to_xml($data,$xml_data);
    $result = $xml_data->asXML("./results/results.xml");
    // TO CSV
    $filename = "results.csv";
    $output = fopen("./results/results.csv","w");
    $header = array_keys($data[0]);
    fputcsv($output,$header);
    foreach ($data as $row ) {
        fputcsv($output,$row);
    }
    fclose($output);
}

function array_to_xml($data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'location'.$key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
     }
}

?>