<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
session_start();
$department = $_SESSION['department'];
$id = $_SESSION['id'];
if( isset($_POST['released']) ){
	$sql = "UPDATE notif_receive_released SET status = '1' where releaser_id = '$id'";
        $connect->query($sql);
}

$query = "
SELECT notif_receive_released.*, file_upload.file_name as document FROM notif_receive_released INNER JOIN  file_upload ON notif_receive_released.tracking_no = file_upload.tracking_no where notif_receive_released.releaser_id = '$id' order By notif_receive_released.id desc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_receive_released where status = '0' and releaser_id = '$id'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';


###################################################################################################################
############################ Received Documents Notif by Receiving Officer from Releaser ##########################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="outgoingDocuments.php">
				  <small><b style="color: #0000FF; font-weight: 600">'.$row['tracking_no'].' </b> <i style="color: gray;">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['receiver_name'].'</b> <i style="color: gray;">Received your document: </i><b style="color: #444444; font-weight: 600"> "'.$row['document'].'"</b></small><br>
                  <small style="color: gray;">'.$row['date'].' '.$row['time'].'</small>
                </a>
                <div class="dropdown-divider" style="color: gray;"></div>
                ';
}

echo json_encode(array(
	'output' => $output,
	'total' => $notif
));
?>