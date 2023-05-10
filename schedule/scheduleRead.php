
<?php
//Read From appointmet Table

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 
        include_once("../dbConnection.php");
if( $_SESSION['userType']=='doctor' ){
            $readSql = "select * from doctorschedule where docId=$_SESSION[NId] order by sId desc"; 
}else{   $readSql = "select * from doctorschedule order by sId desc "; }
        $readResult = mysqli_query($connection, $readSql);
        while($data = mysqli_fetch_array($readResult)) {
            echo "<tr>";    
                echo "<td>".$data['sId']."</td>";
                echo" <td>".$data['docName']."</td>";
                echo "<td>".$data['depName']."</td>";
                echo "<td>".$data["sDate"]."</td>";
                echo "<td>".$data["startHour"]."</td>";
                echo "<td>".$data["endHour"]."</td>";
                if(  $_SESSION['userType']!='doctor' ){   

                echo "<td> <a href='scheduleDelete.php?sId=$data[sId]'>  <i class='bi bi-trash-fill'></i>  </a> </td>";
                echo "<td> <a href='schUpdateForm.html?sId=$data[sId]'> <i class='bi bi-pencil-square'></i>  </a> </td>";}
            echo "</tr>";  
         }
         } else{
            header("Location: ../login.html?acesserror=Access Denied Please Log In");
          } 
  ?>
