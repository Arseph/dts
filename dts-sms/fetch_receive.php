<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

session_start();
$id = $_SESSION['id'];
$_SESSION['releaser_id_daw'] = '';
if( isset($_POST['seen']) ){
	$seen = $_POST['seen'];
	$sql = "UPDATE notif_receive SET status = '1' and receiver_id = '$id'";
        $connect->query($sql);
}

$query = "
SELECT * FROM notif_receive where receiver_id = '$id' order By id desc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM notif_receive where status = '0' AND receiver_id = '$id'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);


############################## Receiving Officer - Received documents ##############################

$output = '';
foreach($result as $row) {
	$_SESSION['releaser_id_daw'] = $row['releaser_id'];
	$output .= '<a class="dropdown-item" href="receive_docu.php">
				  <small><b style="color: #0000FF;">'.$row['tracking_no'].' </b><i style="color: gray">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600">'.$row['releaser_name'].'</b> <i style="color: #999999;">sent you document. </i></small><br>
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