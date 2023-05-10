<?php
include_once("../dbConnection.php");
$depId = intval($_GET['depId']);
$query    = "SELECT DISTINCT * FROM `doctorschedule` WHERE depId='$depId' and sDate>=CURDATE() order by sDate  ";
$shedule = mysqli_query($connection, $query) or die(mysql_error());

if (mysqli_num_rows($shedule) > 0) {
    echo "<thead>
    <tr style='color:rgba(0, 183, 255, 0.692); font-size: 18px;'>
      <th scope='col'>Doctor</th>
      <th scope='col'>Department</th>
      <th scope='col'>Date</th>
      <th scope='col'>Start Hour</th>
      <th scope='col'>End Hour</th>
    </tr>
  </thead>";
    while($row = mysqli_fetch_assoc($shedule)){
        echo "<tr>";
        echo "<td>".$row["docName"]."</td>";
        echo "<td>".$row["depName"]."</td>";
        echo "<td>".$row["sDate"]."</td>";
        echo "<td>".$row["startHour"]."</td>";
        echo "<td>".$row["endHour"]."</td>";
        echo "</tr>";
        };
}
else{ 
    echo '<option value="">Not Avaliable Schedule IN This Deparment</option>'; 
} 

// $json = file_get_contents('php://input');

?>