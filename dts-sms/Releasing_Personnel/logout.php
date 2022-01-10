<?php
session_start();
session_destroy();
header("Location: http://localhost/dts/dts-sms/index.php");
?>
