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

    foreach ($json2['locations'] as $loc) {
        // $values = array_values($loc);
        echo("\n");
        if (array_key_exists('timestampMs', $loc)){
            $timestampMs = $loc['timestampMs'];
            echo "timestampMs " .$loc['timestampMs']. "\n";
        }
        if (array_key_exists('latitudeE7', $loc)){
            $latitudeE7 = $loc['latitudeE7'];
            echo "latitudeE7 " .$loc['latitudeE7']. "\n";
        }
        if (array_key_exists('longitudeE7', $loc)){
            $longitudeE7 = $loc['longitudeE7'];
            echo "longitudeE7 " .$loc['longitudeE7']. "\n";
        }
        if (array_key_exists('accuracy', $loc)){
            $accuracy = $loc['accuracy'];
            echo "accuracy " .$loc['accuracy']. "\n";
        }
        if (array_key_exists('velocity', $loc)){
            $velocity = $loc['velocity'];
            echo "velocity " .$loc['velocity']. "\n";
        }
        if (array_key_exists('heading', $loc)){
            $heading = $loc['heading'];
            echo "heading " .$loc['heading']. "\n";
        }
        if (array_key_exists('altitude', $loc)){
            $altitude = $loc['altitude'];
            echo "altitude " .$loc['altitude']. "\n";
        }
        echo("\n");
        // print_r($loc['activity']);

        foreach($loc['activity'] as $loc_ac){
            if (array_key_exists('timestampMs', $loc_ac)){
                $loc_ac_timestampMs = $loc_ac['timestampMs'];
                echo "  loc_ac_timestampMs " .$loc_ac['timestampMs']. "\n";
            }
            echo("\n");
            // print_r($loc_ac['activity']);

            foreach($loc_ac['activity'] as $loc_ac_type_conf){
                if (array_key_exists('type', $loc_ac_type_conf)){
                    $type = $loc_ac_type_conf['type'];
                    echo "      type " .$loc_ac_type_conf['type']. "\n";
                }
                if (array_key_exists('confidence', $loc_ac_type_conf)){
                    $confidence = $loc_ac_type_conf['confidence'];
                    echo "      confidence " .$loc_ac_type_conf['confidence']. "\n";
                }
            }

            echo("\n");

        }

        // print_r($values);
        // print_r($loc);
    }


      ?>
    </pre>
  </body>
</html>