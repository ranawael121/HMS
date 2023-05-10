<?php
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 

include_once("../dbConnection.php");
//read appointment data form database
$appId = $_GET["user"];
$appsql = "select * from appointmentusers where id = $appId";
$appresult = mysqli_query($connection, $appsql);
$data = mysqli_fetch_array($appresult);
$currentDate = date("d-m-Y");
$getage = date_diff(date_create($data["birthDate"]), date_create($currentDate));
$age=$getage->format("%y");
$doctorName = $data["doctorName"];
$doctorData="select national_id,name from users WHERE type ='doctor'";
$docresult=mysqli_query($connection, $doctorData);

//get cuurent state 
$sta =$data['state'];
function btnVal(){
    if ($GLOBALS['sta']=='Draft'){echo "Confirm";}
    else if($GLOBALS['sta']=='Confirm'){echo "Waiting";} 
    else if($GLOBALS['sta']=='Waiting'){echo "In-consultation";} 
    else if($GLOBALS['sta']=='In-consultation'){echo "Done";} 
    else{echo "Done";}

}

if(isset($_POST["savebtn"])){
    //get appFormData
    $doctorId = $_POST["doctorName"];

    //get current time 
    date_default_timezone_set('Africa/Cairo');
    $t=time();
    $appdate=$_POST["date"];
    $consType = $_POST["consultationt"];
    
    if(!isset($_POST["BookedOnline"])){
        $BookedOnline=0;
    }
    else{
        $BookedOnline=$_POST["BookedOnline"];
    }

    $status=$_POST["status"];
    
   


   //udate  appointment 
   $updateAppsql = "update appointment set doctor_id='$doctorId',
   datetime='$appdate', consultation_type='$consType', booked_online='$BookedOnline',
   state='$status' where id=$appId";
   $updateResult = mysqli_query($connection, $updateAppsql);
   header("Location:appUpdateForm.html?user=$appId&done=Appointmetn Updated Sucssessfuly ");

}

      
} else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  } 
    


?>