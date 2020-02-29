<?php 

include "../config.php";

$del_query = "DELETE FROM locations";

$result = mysqli_query($link, $del_query);

echo $result;

?>