fetch_report.php
Who has access

A
A
D
U
System properties
Type
PHP
Size
3 KB
Storage used
3 KB
Location
Admin_dashboard
Owner
Nicole Haylynn Mancao
Modified
1:45 AM by Nicole Haylynn Mancao
Opened
10:29 AM by me
Created
9:04 AM
Add a description
Viewers can download
<?php
session_start();
//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");

if($_POST["date_range"] != '' && $_POST["query"] != '') {
    $search_dept = $_POST["query"];
    $date = explode("-", $_POST["date_range"]);
    $start_date = date("Y-m-d", strtotime($date[0])).' 00:00:00';
    $end_date = date("Y-m-d", strtotime($date[1])).' 00:00:00';
     $query = "
    SELECT reports.*, file_upload.*, register.fullname as fullname, register.department as dept FROM reports INNER JOIN file_upload ON reports.tracking_no = file_upload.tracking_no INNER JOIN register ON register.username = file_upload.user WHERE file_upload.created_at>='$start_date' and file_upload.created_at<='$end_date' AND register.department = '$search_dept' ORDER BY file_upload.id desc
    ";
}
else if($_POST["date_range"] != '')
{
    $date = explode("-", $_POST["date_range"]);
    $start_date = date("Y-m-d", strtotime($date[0])).' 00:00:00';
    $end_date = date("Y-m-d", strtotime($date[1])).' 00:00:00';
    $query = "
    SELECT reports.*, file_upload.*, register.fullname as fullname, register.department as dept FROM reports INNER JOIN file_upload ON reports.tracking_no = file_upload.tracking_no INNER JOIN register ON register.username = file_upload.user WHERE file_upload.created_at>='$start_date' and file_upload.created_at<='$end_date' ORDER BY file_upload.id desc
    ";
}
else if($_POST["query"] != '')
{
    $search_dept = $_POST["query"];
    
    $query = "
    SELECT reports.*, file_upload.*, register.fullname as fullname, register.department as dept FROM reports INNER JOIN  file_upload ON reports.tracking_no = file_upload.tracking_no INNER JOIN  register ON register.username = file_upload.user WHERE register.department = '$search_dept' ORDER BY file_upload.id desc
    ";
}
else
{
    $query =  "SELECT reports.*, file_upload.*, register.fullname as fullname, register.department as dept FROM reports INNER JOIN  file_upload ON reports.tracking_no = file_upload.tracking_no INNER JOIN  register ON register.username = file_upload.user ORDER BY file_upload.id desc
    ";
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '';
if($total_row > 0)
{
    foreach($result as $row)
    {
        $output .= '
        <tr style="font-size: 12px">
            <td>'.$row["select_date"].'</td>
            <td>'.$row["tracking_no"].'</td>
            <td>'.$row["fullname"].'</td>
            <td>'.$row["type_document"].'</td>
            <td>'.$row["file_name"].'</td>
            <td>'.$row["date_and_time"].'</td>
            <td>'.$row["receiver_name"].' ('.$row["dept"].')</td>
        </tr>
        ';
    }
}
else
{
    $output .= '
    <tr>
        <td colspan="5" align="center">No Data Found</td>
    </tr>
    ';
}
echo $output;
?>

<style>
    td{
        font-size: 12px;
    }
</style>