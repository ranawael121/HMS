<?php
include_once("../dbConnection.php");
$depId = intval($_GET['depId']);
$query    = "SELECT * FROM `doctorschedule` WHERE docId='$depId' and sDate>=CURDATE()";
$doctors = mysqli_query($connection, $query) or die(mysql_error());

if (mysqli_num_rows($doctors) > 0) {
while($row = mysqli_fetch_assoc($doctors)){
    echo '<option value="'.$row['sId'].'">'.$row['sDate']."  ".$row['startHour']." to ".$row['endHour'].'</option>';
    };
}
else{ 
    echo '<option value="">Not Avaliable Schedule For This Doctor </option>'; 
} 

// $json = file_get_contents('php://input');

?>