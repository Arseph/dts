<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
if( isset($_POST['seen']) ){
	$id = $_POST['seen'];
	$sql = "UPDATE admin_notif_dept_sent SET status = '1'";
        $connect->query($sql);
}
session_start();

$query = "
SELECT * FROM admin_notif_dept_sent order By id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM admin_notif_dept_sent where status = '0'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
######################################### Sent Documents Notif by Admin from Head #################################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="#">
				  <small><b style="color: #0000FF; font-weight: 500">'.$row['tracking_no'].' </b> <i style="color: gray; font-weight: 500">'.$row['dept_sender'].'</i></small>
				  <br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name_sender'].' ('.$row['position'].')</b> <i style="color: gray; font-weight: 500"><br>Sent document: </i><b style="color: #444444; font-weight: 500;"> "'.$row['document'].'"</b></small> <small><br>
                  To: &nbsp;<i class="fas fa-user" style="color: #999999;"></i>&nbsp;<b style="color: #444444; font-weight: 550">'.$row['name_releaser'].' (Releasing Officer)</b> </small><br>
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