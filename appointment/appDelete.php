<?php 
session_start();

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 

     include_once("../dbConnection.php");
    $id = $_GET["user"];
    //delet the prescription
     $sql = "delete from appointment where id = $id"; 
     $result = mysqli_query($connection, $sql);

     //delete the related prescription line
     //done By cascading Delete
     header("Location:appointmentList.html?delete=Appointment Deleted!");
} else{
     header("Location: ../login.html?acesserror=Access Denied Please Log In");
   } 
     
 

    ?>