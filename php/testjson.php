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
      $json = file_get_contents("../0_Demo_data/sample2.json");
      $json2 = json_decode($json,TRUE);
        foreach ($json2['locations'] as $loc) {
          $timestampMs = NULL;
          $latitudeE7 = NULL;
          $longitudeE7 = NULL; 
          $accuracy = "NULL";
          $velocity = "NULL";
          $heading = "NULL";
          $altitude = "NULL";
          if (array_key_exists('timestampMs', $loc)){
              $timestampMs = date('Y-m-d h:i:s', (float)$loc['timestampMs'] / 1000);
            }
          if (array_key_exists('latitudeE7', $loc)){
              $latitudeE7 = (float)$loc['latitudeE7']/1e7;
            }
          if (array_key_exists('longitudeE7', $loc)){
              $longitudeE7 = (float)$loc['longitudeE7']/1e7;
            }
          if (array_key_exists('accuracy', $loc)){
              $accuracy = (int)$loc['accuracy'];
            }
          if (array_key_exists('velocity', $loc)){
              $velocity = (int)$loc['velocity'];
            }
          if (array_key_exists('heading', $loc)){
              $heading = (int)$loc['heading'];
            }
          if (array_key_exists('altitude', $loc)){
              $altitude = (int)$loc['altitude'];
            }
          
            // TODO Implement a connection with front-end --> grabbing the user_id from the logged in user --> passing it to the sql insertion. 

          $sql = "INSERT INTO locations (loc_timestamp,latE7,longE7,accuracy,velocity,altitude,heading,userid) 
            VALUES ('$timestampMs','$latitudeE7','$longitudeE7','$accuracy',$velocity,$heading,$altitude,'5')";

          if ($link->query($sql) === TRUE) {
            $last_loc_id = $link->insert_id;
            echo "New record created successfully. Last location inserted ID is: " . $last_loc_id. "\n";
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
          if(array_key_exists('activity',$loc)){
            foreach($loc['activity'] as $loc_ac){
              if (array_key_exists('timestampMs', $loc_ac)){
                  $loc_ac_timestampMs = date('Y-m-d h:i:s', (float)$loc_ac['timestampMs'] / 1000);
                  
                  $sql = "INSERT INTO location_activities (l_acc_timestampMs,loc_id)
                    VALUES ('$loc_ac_timestampMs','$last_loc_id')";

                  if ($link->query($sql) === TRUE) {
                    $last_l_acc_id = $link->insert_id;
                    echo "New record created successfully. Last location activity inserted ID is: " . $last_l_acc_id. "\n";
                  } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                  }
              }
              if(array_key_exists('activity',$loc)){
                foreach($loc_ac['activity'] as $loc_ac_type_conf){
                  if (array_key_exists('type', $loc_ac_type_conf)){
                      $type = $loc_ac_type_conf['type'];
                  }
                  if (array_key_exists('confidence', $loc_ac_type_conf)){
                      $confidence = (int)$loc_ac_type_conf['confidence'];
                  }

                  $sql = "INSERT INTO activity_type (type,confidence,activities_id)
                  VALUES ('$type','$confidence','$last_l_acc_id')";

                  if ($link->query($sql) === TRUE) {
                    $last_l_acc_tc_id = $link->insert_id;
                    echo "New record created successfully. Last location activity type-confidence inserted ID is: " . $last_l_acc_tc_id. "\n";
                  } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                  }
                }
              }
          }
        }
    }

      ?>
    </pre>
  </body>
</html>
