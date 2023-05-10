<?php 
session_start();

if(isset( $_SESSION['NId'])   ){ 

     include_once("../dbConnection.php");
    $sId = $_GET["sId"];
    //delet the prescription
     $sql = "delete from schedule where id = $sId"; 
     $result = mysqli_query($connection, $sql);

     //delete the related prescription line
     //done By cascading Delete
     header("Location:scheduleList.html?delete=Schedule Deleted!");
} 
else{
     header("Location: ../login.html?acesserror=Access Denied Please Log In");
   } 
     
 

    ?>