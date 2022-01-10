<?php
session_start();
//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");

if($_POST["query"] != '')
{
    $search_array = explode(",", $_POST["query"]);
    $search_text = "'" . implode("', '", $search_array) . "'";
    $query = "
    SELECT * FROM register 
    WHERE department IN (".$search_text.") 
    ORDER BY id DESC
    ";
}
else
{
    $query = "SELECT * FROM register WHERE usertype IN ('Employee', 'Department Head', 'Releasing Officer', 'Receiving Officer') ORDER BY fullname, department ASC";
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
            <td>'.$row["fullname"].'</td>
            <td>'.$row["usertype"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["department"].'</td>
            <td> 
                <a href="#view_'.$row["id"].'" class="btn btn-info btn-sm m-0" data-toggle="modal" style="font-size: 11px">View Details</a> 
            </td>
        </tr>
        ';
        include('viewUserDetails.php');
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

