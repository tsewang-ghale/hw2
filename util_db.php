<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('138.197.17.168', 'tsewangg_finalprojectuser', 'tsewang@1103', 'tsewangg_finalproject');

    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
