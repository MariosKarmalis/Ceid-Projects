<?php
include "config.php"
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    Ohh wee
    <pre>
      <?php
      $json = file_get_contents("../0_Demo_data/sample.json");
      $json2 = json_decode($json,TRUE);
      $id = 0;
        foreach ($json2['locations'] as $loc) {
          $timestampMs = NULL;
          $latitudeE7 = NULL;
          $longitudeE7 = NULL; 
          $accuracy = NULL;
          $velocity = NULL; 
          $heading= NULL;
          $altitude = NULL;
          if (array_key_exists('timestampMs', $loc)){
              $timestampMs = $loc['timestampMs'];
            }
          if (array_key_exists('latitudeE7', $loc)){
              $latitudeE7 = $loc['latitudeE7'];
            }
          if (array_key_exists('longitudeE7', $loc)){
              $longitudeE7 = $loc['longitudeE7'];
            }
          if (array_key_exists('accuracy', $loc)){
              $accuracy = $loc['accuracy'];
            }
          if (array_key_exists('velocity', $loc)){
              $velocity = $loc['velocity'];
            }
          if (array_key_exists('heading', $loc)){
              $heading = $loc['heading'];
            }
          if (array_key_exists('altitude', $loc)){
              $altitude = $loc['altitude'];
            }

          $sql = "INSERT INTO locations (location_id,loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading) 
            VALUES ('$id','$timestampMs','$latitudeE7','$longitudeE7','$accuracy','$velocity','$heading','$altitude')";

          // TODO change location_id to auto increment in db.
          // TODO change timestampMs type in db.
          // TODO generally check type correspondance for database.

          if ($link->query($sql) === TRUE) {
            $last_id = $link->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id;
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }

          foreach($loc['activity'] as $loc_ac){
            if (array_key_exists('timestampMs', $loc_ac)){
                $loc_ac_timestampMs = $loc_ac['timestampMs'];
            }
            foreach($loc_ac['activity'] as $loc_ac_type_conf){
                if (array_key_exists('type', $loc_ac_type_conf)){
                    $type = $loc_ac_type_conf['type'];
                }
                if (array_key_exists('confidence', $loc_ac_type_conf)){
                    $confidence = $loc_ac_type_conf['confidence'];
                }
            }
        }
        $id += 1;
    }


      ?>
    </pre>
  </body>
</html>
