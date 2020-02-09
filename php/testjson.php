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
      print_r($json2);

      // echo "<h2>Printing activities example</h2>\n";
      //   foreach ($json2['activity'] as $act) {
      //     print_r($act);
      //   }

      /** Another way to parse
        * Personally not really prefered
        */

      // echo("==================================================================================");
      // echo("==================================================================================\n");

      $jsonIterator = new RecursiveIteratorIterator(
      new RecursiveArrayIterator(json_decode($json, TRUE)),
      RecursiveIteratorIterator::SELF_FIRST);

      foreach ($jsonIterator as $key => $val) {
          if(is_array($val)) {
              echo "key : $key:\n";
          } else {
              echo "key==> val : $key => $val\n";
          }
      }

      ?>
    </pre>
  </body>
</html>
