<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
session_start();
$department = $_SESSION['department'];
if( isset($_POST['released']) ){
	$id = $_POST['released'];
	$sql = "UPDATE notif_admin_receive_release SET status = '1' where department = '$department'";
        $connect->query($sql);
}
$query = "
SELECT notif_admin_receive_release.*, file_upload.file_name as document FROM notif_admin_receive_release INNER JOIN file_upload ON notif_admin_receive_release.tracking_no = file_upload.tracking_no order by notif_admin_receive_release.id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_admin_receive_release where status = '0' and department = '$department'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################### Outgoing Documents Notif by Admin from Releaser ###################################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="#">
				  <small><b style="color: #0000FF; font-weight: 600">'.$row['tracking_no'].' </b> Administrator </small><br>
                  <small><b style="color: #444444; font-weight: 600">'.$row['name'].'</b> <i style="color: gray;">Received your document: </i><b style="color: black"> "'.$row['document'].'"</b></small><br>
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