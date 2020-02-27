<?php 

include "../config.php";

$query_prefix = "SELECT location_id, loc_timestamp, 
latE7, longE7, accuracy, velocity, altitude,
heading, l_acc_timestampMs, type, confidence,
userid
FROM locations 
LEFT JOIN location_activities ON location_id = location_activities.loc_id 
LEFT JOIN activity_type ON location_activities.loc_act_id = activity_type.activities_id " ;

$query_postfix = "ORDER BY location_id";

$dsta = "";
$dend = "";
$msta = "";
$mend = "";
$ysta = "";
$yend = "";
$tsta = "";
$tend = "";
$types = [];
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

echo "<br>";
echo "<br>";
echo("Final : <br>" . $final_query);
echo "<br>";

?>