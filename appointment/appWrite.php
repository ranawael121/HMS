<?php
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 
// id date	time patient_Id	doctor_id consultation_type	booked_online state	
//date time consultationt BookedOnline status patientname doctorName
$currentDate = date("d-m-Y");
$patientName;
$con =include_once("../dbConnection.php");
$patientId;
$age;
    if (isset($_GET["user"])){
        $GLOBALS['patientId'] =$_GET["user"];
     
        $getPatienData = "select name,birthDate from users where national_id = $patientId";
        $getresult = mysqli_query($connection, $getPatienData);
        while($data = mysqli_fetch_array($getresult)) {
            $GLOBALS['patientName']= $data["name"];
          $getage = date_diff(date_create($data["birthDate"]), date_create($currentDate));
          $GLOBALS['age']=$getage->format("%y");    
        }
        function getPatientName(){
            echo  "<input type='text' id='patientname' name='patientname' class='form-control bg-light border-0'style='height: 55px;' readonly value=  '$GLOBALS[patientName]' >";
        }
        function getPatientAge(){
            echo "<input type='text' id='patientage' name='patientage' class='form-control bg-light border-0' style='height: 55px;' readonly value=  '$GLOBALS[age]' >"; 
    
        } }
    else {
        $patienData="select national_id,name from users WHERE type ='patient'";
        $patientresult=mysqli_query($connection, $patienData);
        if(isset($_POST["patientId"])){
        $GLOBALS['patientId'] =$_POST["patientId"];}
    }
  
   $doctorData="select national_id,name from users WHERE type ='doctor'";
   $docresult=mysqli_query($connection, $doctorData);
   $patienData="select national_id,name from users WHERE type ='patient'";
   $patienresult=mysqli_query($connection, $patienData);



    if(isset($_POST["savebtn"])){
        //record to set in prescrition table
        // print_r($_POST);
        //
        // $patientId = $_GET["user"];
        if(isset($_POST["doctorName"])&& !empty($_POST["doctorName"])){ 
        $doctorId = $_POST["doctorName"]; 
        $appdatetime = $_POST["datetime"];
        $consType = $_POST["consultationt"];

        //booked online checkBox handle 
            if (!isset($_POST["BookedOnline"])){
            $BookedOnline = 0; }
            else{$BookedOnline = $_POST["BookedOnline"];} 

        $status=$_POST["status"];


       //insert new appontment to app table
        $sql = "insert into appointment 
        (patient_Id	, doctor_id, datetime, consultation_type, booked_online, state)
        values ('$patientId','$doctorId','$appdatetime','$consType','$BookedOnline','$status' )";
        $result = mysqli_query($connection, $sql);
        header("Location:appointmentList.html?done=Appointmetn Added Sucssessfuly ");

    }   
        else{ 
            if (isset($_GET["user"])){ 
                header("Location:appointmentForm.html?user=$_GET[user]&docerror=Please Select Doctor");
            }
            else { header("Location: appointmentForm.html?docerror=Please Select Doctor ");
            }
            }

    
    }
   
      
} else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  } 
    
    

?>
