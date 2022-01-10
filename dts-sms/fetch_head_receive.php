<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
session_start();
$department = $_SESSION['department'];
$fullname = $_SESSION['fullname'];
$setstat = $department.')';
if( isset($_POST['seen']) ){
	$sql = "UPDATE notif_head_send_receive set status = '1' where substr(releaser,instr(releaser,\"(\") + 1, instr(releaser,\")\")) = '$setstat'";
        $connect->query($sql);
}

$query = "
SELECT notif_head_send_receive.*, register.department as dept_receiver, register.fullname as name_receiver, file_upload.file_name as document, file_upload.tracking_no as trrak FROM notif_head_send_receive INNER JOIN register ON notif_head_send_receive.receiver_id = register.id INNER JOIN file_upload ON notif_head_send_receive.tracking_no = file_upload.tracking_no where register.department = notif_head_send_receive.department order By notif_head_send_receive.id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT notif_head_send_receive.*, register.department as dept_receiver, register.fullname as name_receiver, file_upload.file_name as document, file_upload.tracking_no as trrak FROM notif_head_send_receive INNER JOIN register ON notif_head_send_receive.receiver_id = register.id INNER JOIN file_upload ON notif_head_send_receive.tracking_no = file_upload.tracking_no where register.department = notif_head_send_receive.department and notif_head_send_receive.status = '0' order By notif_head_send_receive.id desc";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';


###################################################################################################################
############################## Received Documents Notif by Receiving Officer from Head ############################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="outgoingDocuments.php">
				  <small><b style="color: #0000FF; font-weight: 600">'.$row['trrak'].' </b> <i style="color: gray;">'.$row['dept_receiver'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name_receiver'].'</b> <i style="color: gray;">Received document: </i><b style="color: #444444; font-weight: 600"> "'.$row['document'].'"</b></small><small> <br>From: <b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['releaser'].'</b></small><br>
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