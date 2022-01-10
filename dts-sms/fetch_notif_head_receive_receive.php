<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

session_start();
$department = $_SESSION['department'];
$_SESSION['releaser_id_daw'] = '';
if( isset($_POST['seen']) ){
	$seen = $_POST['seen'];
	$sql = "UPDATE notif_head_receive_receive as Gone, register as Userss SET Gone.status = '1' where Gone.receiver_id = Userss.id and Userss.department = '$department'";
        $connect->query($sql);
}

$query = "
SELECT notif_head_receive_receive.*, register.department as dept_receiver, register.fullname as name_receiver, file_upload.file_name as document, file_upload.tracking_no as trrak FROM notif_head_receive_receive INNER JOIN register ON notif_head_receive_receive.receiver_id = register.id INNER JOIN file_upload ON notif_head_receive_receive.tracking_no = file_upload.tracking_no where register.department = '$department' order By notif_head_receive_receive.id desc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT notif_head_receive_receive.*, register.department as dept_receiver, register.fullname as name_receiver, file_upload.file_name as document, file_upload.tracking_no as trrak FROM notif_head_receive_receive INNER JOIN register ON notif_head_receive_receive.receiver_id = register.id INNER JOIN file_upload ON notif_head_receive_receive.tracking_no = file_upload.tracking_no where register.department = '$department' and notif_head_receive_receive.status = '0' order By notif_head_receive_receive.id desc";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);


############################## Receiving Officer - Received documents ##############################

$output = '';
foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="receive_docu.php">
				  <small><b style="color: #0000FF;">'.$row['tracking_no'].' </b><i style="color: gray">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600">'.$row['releaser_name'].'</b> <i style="color: #999999;">sent you document: </i><b>'.$row['document'].'</b></small><br>
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