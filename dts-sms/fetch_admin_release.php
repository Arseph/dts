<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");
$conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");
if( isset($_POST['seen']) ){
	$id = $_POST['seen'];
	$sql = "UPDATE admin_notif_releaser SET status = '1'";
        $connect->query($sql);
}
session_start();

$query = "
SELECT admin_notif_releaser.*, register.fullname as name_receiver, register.usertype as dept_receiver FROM admin_notif_releaser INNER JOIN register ON admin_notif_releaser.receiver_id = register.id order By admin_notif_releaser.id desc";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query2 = "
SELECT * FROM admin_notif_releaser where status = '0'";
$result2 = mysqli_query($conn, $query2);
$notif = mysqli_num_rows($result2);

$output = '';

###################################################################################################################
############################### Released Documents Notif by Admin from Releasing Officer ##########################
###################################################################################################################

foreach($result as $row) {
	$output .= '<a class="dropdown-item" href="#">
				  <small><b style="color: #0000FF; font-weight: 500">'.$row['tracking_no'].' </b> <i style="color: gray;">'.$row['dept_releaser'].'</i></small><br>
                  <small><b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name_releaser'].' ('.$row['position'].')</b> <i style="color: gray;"><br>
                  Released document </i></small> <small>
                  To: <b style="color: #444444; font-weight: 600"><i class="fas fa-user" style="color: #999999;"></i>&nbsp;'.$row['name_receiver'].' ('.$row['dept_receiver'].')</b></small> <br>
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