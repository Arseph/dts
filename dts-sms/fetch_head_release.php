<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
if( isset($_POST['seen']) ){
	$id = $_POST['seen'];
	$sql = "UPDATE notif_head_send_release SET status = '1'";
        $connect->query($sql);
}
session_start();
$department = $_SESSION['department'];

$query = "
SELECT * from notif_head_send_release where department = '$department' ORDER BY id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_head_send_release where status = '0' and department = '$department'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################## Pending for Release Notif by Receiving Officer from Head ###########################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="outgoingDocuments.php">
				  <small><b style="color: #0000FF; font-weight: 600;">'.$row['tracking_no'].' </b> <i style="color: gray;">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['releaser_name'].'</b> <i style="color: gray;">
                  Released document </i></small> <small><br>
                   To: <b style="color: green;"><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['receiver_name'].'</b></small> <br>
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