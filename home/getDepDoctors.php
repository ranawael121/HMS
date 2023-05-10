<?php
include_once("../dbConnection.php");
$depId = intval($_GET['depId']);
$query    = "SELECT DISTINCT docId,docName FROM `doctorschedule` WHERE depId='$depId'";
$doctors = mysqli_query($connection, $query) or die(mysql_error());

if (mysqli_num_rows($doctors) > 0) {
while($row = mysqli_fetch_assoc($doctors)){
    echo '<option value="'.$row['docId'].'">'.$row['docName'].'</option>';
    };
}
else{ 
    echo '<option value="">Not Avaliable Doctor IN This Deparment</option>'; 
} 

// $json = file_get_contents('php://input');

?>