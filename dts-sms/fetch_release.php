<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

session_start();
$id = $_SESSION['id'];
if( isset($_POST['seen']) ){
	$seen = $_POST['seen'];
	$sql = "UPDATE notif_release SET status = '1' and releaser_id = '$id'";
        $connect->query($sql);
}

$query = "
SELECT * FROM notif_release where releaser_id = '$id' order By id desc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_release where status = '0' AND releaser_id = '$id'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################## Pending for Release Notif by Receiving Officer from Head ###########################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="pending_docu.php">
				  <small><b style="color: #0000FF; font-weight: 600;">'.$row['tracking_no'].' </b><i style="color: gray">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;&nbsp;'.$row['name'].'</b> <i style="color: gray;">sent you document: </i><b style="color: black"> "'.$row['document'].'"</b></small><br>
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