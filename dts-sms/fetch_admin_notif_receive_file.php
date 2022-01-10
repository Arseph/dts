<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

if( isset($_POST['seen']) ){
	$seen = $_POST['seen'];
	$sql = "UPDATE admin_notif_received_file SET status = '1'";
        $connect->query($sql);
}
session_start();

$query = "
SELECT * FROM admin_notif_received_file order By id desc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM admin_notif_received_file where status = '0'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################### Incoming Documents Notif by Admin from Releasing Officer ##########################
###################################################################################################################

#"'.$row['document'].'"

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="receive_docu.php">
				  <small><b style="color: #0000FF; font-weight: 550">'.$row['tracking_no'].' </b><i style="color: gray">'.$row['department'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name'].'</b> (Releasing Officer)
                  <i style="color: gray;">sent you document. </i><b style="color: #444444; font-weight: 500;"> </b></small><br>
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

