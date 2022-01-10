<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
if( isset($_POST['seen']) ){
	$id = $_POST['seen'];
	$sql = "UPDATE admin_notif_receiver SET status = '1'";
        $connect->query($sql);
}
session_start();

$query = "
SELECT admin_notif_receiver.*, register.department as dept_receiver, register.fullname as name_receiver, file_upload.file_name as document, file_upload.tracking_no as trrak FROM admin_notif_receiver INNER JOIN register ON admin_notif_receiver.receiver_id = register.id INNER JOIN file_upload ON admin_notif_receiver.tracking_no = file_upload.tracking_no order By admin_notif_receiver.id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM admin_notif_receiver where status = '0'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################### Received Documents Notif by Admin from Receiving Officer ##########################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="#">
				  <small><b style="color: #0000FF; font-weight: 500">'.$row['trrak'].' </b> <i style="color: gray;">'.$row['dept_receiver'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name_receiver'].'</b> <i style="color: gray;">Received document: </i><b style="color: #444444; font-weight: 500;"> "'.$row['document'].'"</b></small><small><br> From: <b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['releaser'].'</b></small><br>
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