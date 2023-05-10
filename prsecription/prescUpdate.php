<?php
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 


    include_once("../dbConnection.php");
    $prescid = $_GET["user"];

    //read related appointment data to set in prescription
    $relatedAppsql = "select * from appointmentusers where id = $prescid";
    $RAresult = mysqli_query($connection, $relatedAppsql);
    $RAdata = mysqli_fetch_array($RAresult);
    $currentDate = date("d-m-Y");
    $getage = date_diff(date_create($RAdata["birthDate"]), date_create($currentDate));
    $age=$getage->format("%y");
    //read prescription form data
    $prescsql = "select * from prescription where appointment_id = $prescid";
    $prescresult = mysqli_query($connection, $prescsql);
    $data = mysqli_fetch_array($prescresult);


    //read related prescription line
    $prescLinesql = "select medicine_name,dosage_detail,comment from prescription_line
    where prescription_id  = $prescid";
    $prescLineresult = mysqli_query($connection, $prescLinesql);
    function drawPrescriptionLine(){
        if( $GLOBALS['prescLineresult']) {
            while($row =  mysqli_fetch_assoc($GLOBALS['prescLineresult'])){
            
                echo "<tr class='case'>"; 
                // echo "<td><span id='snum'>".$row['id']."</span></td>" ;  
                echo "<td> <input type='text' name='medicineName[]' value='$row[medicine_name]'> </td>";
                echo "<td ><input type='text' name='dosage[]' value=$row[dosage_detail]></td>";
                echo"<td><input type='text' name ='comment[]' value=$row[comment]></td>";
                echo"<td ><input type='checkbox' name ='allowSubsistuation[]'value='1' ></td>";
                echo "<tr>";    
                    }}
    }

        if(isset($_POST["savebtn"])){
            //record to set in prescrition table
            // print_r($_POST);
            //get appointment id from appointment page
            // $appoitmentId = $_GET["user"];
            // $appoitmentId = 1;

            //get current time 
        
            $prescription_time=$_POST["PrescriptionDate"];

            $disease = $_POST["disease"];
            $medicalTest = $_POST["medicalTest"];
            $xray = $_POST["xrays"];
            $followUpDate=$_POST["follwdate"];
            $notes=$_POST["notes"];

            //record to set in precription line
            // $prescrptionId = $_GET["user"];
            //$prescrptionId =1;
            $medicineName = $_POST["medicineName"];
            $dosage = $_POST["dosage"];
            $allowSubsistuation=$_POST["allowSubsistuation"];
            $comment=$_POST["comment"];


        //update  Prescription 
        $updatePrescsql = "update prescription set prescription_time='$prescription_time',
            disease='$disease', medical_test='$medicalTest',x_rays='$xray', followup_date='$followUpDate',
            notes='$notes' where appointment_id=$prescid";
            $prescResult = mysqli_query($connection, $updatePrescsql);

            //Update prescription lines 
            for($i=0;$i<count($medicineName);$i++){
            
                if($medicineName[$i]){
                    if (!isset($_POST["allowSubsistuation"][$i])){
                        $allowSubsistuation[$i] = 0; }
                    else{$allowSubsistuation[$i] = $_POST["allowSubsistuation"][$i];} 
                $updatePrescLinesql = "update prescription_line set medicine_name='$medicineName[$i]'
                ,dosage_detail='$dosage[$i]',allow_subsistuation=$allowSubsistuation[$i], comment='$comment[$i]' where prescription_id=$prescid";
                $updatePrescLineResult = mysqli_query($connection, $updatePrescLinesql);}
                header("Location:prescUpdateForm.html?user=$prescid&done=Prescription Updated Successfully");



            }
        }

    } else{
        header("Location: ../login.html?acesserror=Access Denied Please Log In");
      } 
// $presclinedata = mysqli_fetch_assoc($prescLineresult);
// if($prescLineresult) {
//     while($row =  mysqli_fetch_assoc($prescLineresult)){
//         echo $row['medicine_name'];
//          echo $row['dosage_detail'];
//          echo $row['comment'];

//     }
// }



?>

