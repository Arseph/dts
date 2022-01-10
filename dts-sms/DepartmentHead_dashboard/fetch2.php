<?php
require_once "connection_db/connection.php";
if (isset($_GET['term'])) {
     
  $query = "SELECT * FROM batch_upload WHERE fullname LIKE '{$_GET['term']}%' LIMIT 25";
  
  $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['fullname'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>
