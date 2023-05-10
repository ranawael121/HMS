<?php 
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 

     include_once("../dbConnection.php");
     //get app id which created  this presc
     $appoitmentId = $_GET["appId"];
     //check unique prescriptions id 
     $query= "SELECT * FROM `prescription` WHERE appointment_id='$appoitmentId'";
    $presc = mysqli_query($connection, $query) or die(mysql_error());
    if (mysqli_num_rows($presc) === 1) { 
        header("Location:prescUpdateForm.html?user=$appoitmentId&done=Already Related Prescription is Founded");}

     else{
     //read related appointment data to set in prescription
     $relatedAppsql = "select * from appointmentusers where id = $appoitmentId";
     $RAresult = mysqli_query($connection, $relatedAppsql);
     $data = mysqli_fetch_array($RAresult);
     $currentDate = date("d-m-Y");
     $getage = date_diff(date_create($data["birthDate"]), date_create($currentDate));
     $age=$getage->format("%y");


    if(isset($_POST["savebtn"])){
        //record to set in prescrition table
        // print_r($_POST);       
        $prescription_time=$_POST["datetime"];

        $disease = $_POST["disease"];
        $medicalTest = $_POST["medicalTest"];
        $xray = $_POST["xrays"];
        $followUpDate=$_POST["follwdate"];
        $notes=$_POST["notes"];

        //record to set in precription line
        $medicineName = $_POST["medicineName"];
        $dosage = $_POST["dosage"];
        $comment=$_POST["comment"];
        // print_r($_POST["allowSubsistuation"]);
        //allowSubsistuation checkBox handle 
        
       //insert new Prescription to prescription table
       
        $sql = "insert into prescription 
        (appointment_id	, prescription_time, disease,medical_test, x_rays, followup_date, notes)
        values ('$appoitmentId','$prescription_time','$disease','$medicalTest','$xray','$followUpDate','$notes' )";
        $result = mysqli_query($connection, $sql);

        //insert prescription lines to prescription line table 
        for($i=0;$i<count($medicineName);$i++){
            if (!isset($_POST["allowSubsistuation"][$i])){
                $allowSubsistuation[$i] = 0; }
            else{$allowSubsistuation[$i] = $_POST["allowSubsistuation"][$i];} 
    
            if($medicineName[$i]){
            $sql2 = "insert into prescription_line 
            (prescription_id, medicine_name, dosage_detail,allow_subsistuation, comment)
             values ( '$appoitmentId', '$medicineName[$i]', '$dosage[$i]','$allowSubsistuation[$i]','$comment[$i]' )";
             $result = mysqli_query($connection, $sql2);}

            //  $sql2 = "insert into prescription_line 
            // (prescription_id, medicine_name, dosage_detail
            // ,allow_subsistuation, comment)
            //  values ( '$appoitmentId', '$medicineName[$i]', '$dosage[$i]'
            //  ,'$allowSubsistuation[$i]','$comment[$i]' )";
            //  $result = mysqli_query($connection, $sql2);


        }
        header("Location:prescriptionList.html?done=Prescription Added Successfully");

    }
}
      
} else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  } 
    

?>