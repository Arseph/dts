<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
session_start();
$department = $_SESSION['department'];
if( isset($_POST['seen']) ){
	$id = $_POST['seen'];
	$sql = "UPDATE notif_admin_receive_head SET status = '1' where department = '$department'";
        $connect->query($sql);
}
$query = "
SELECT notif_admin_receive_head.*, file_upload.file_name as document FROM notif_admin_receive_head INNER JOIN file_upload ON notif_admin_receive_head.tracking_no = file_upload.tracking_no order by notif_admin_receive_head.id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_admin_receive_head where status = '0' and department = '$department'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
################################## Received Documents Notif by Admin from Head ####################################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="#">
				  <small><b style="color: #0000FF; font-weight: 600">'.$row['tracking_no'].' </b></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name'].'</b> <i style="color: gray;">Received document: </i><b style="color: black"> "'.$row['document'].'"</b></small><br>
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