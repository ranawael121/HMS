<?php 
session_start();

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 

     include_once("../dbConnection.php");
    $id = $_GET["user"];
    //delet the prescription
     $sql = "delete from prescription where appointment_id = $id"; 
     $result = mysqli_query($connection, $sql);

     //delete the related prescription line
     //done By cascading Delete
     header("Location:prescriptionList.html?delete=Prescription Deleted!");
} else{
     header("Location: ../login.html?acesserror=Access Denied Please Log In");
   } 

    ?>