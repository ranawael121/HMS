
     <?php

// id	
// date	
// time	
// patient_Id	
// doctor_id	
// consultation_type	
// booked_online	
// state	
//date time consultationt BookedOnline status patientname doctorName

    $con =include_once("../dbConnection.php");
    $patientId = $_GET["user"];
    $getPatienData = "select name from users where national_id = $patientId";
    $getresult = mysqli_query($connection, $getPatienData);
    // $currentDate = date("d-m-Y");
    $patientName;
    while($data = mysqli_fetch_array($getresult)) {
        $GLOBALS['patientName']= $data["name"];
    //   echo  $GLOBALS['patientName'], $GLOBALS['age'];
    }
    function setPatientName(){
        echo  "<input type='text' id='patientname' name='patientname' class='form-control bg-light border-0' style='height: 55px;' readonly value=  '$GLOBALS[patientName]' >";
    }
    function setPatientId(){

        echo "<input type='text' id='patientage' name='patientage' class='form-control bg-light border-0' style='height: 55px;'  readonly value=  '$GLOBALS[patientId]' >"; 

    }
   $doctorData="select national_id,name from users WHERE type ='doctor'";
   $docresult=mysqli_query($connection, $doctorData);
   $depData="select * from department ";
   $depresult=mysqli_query($connection, $depData);
   
//    $docdata = mysqli_fetch_array($docresult);
   
//     if (mysqli_num_rows($docresult) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($docresult)) {
//       echo "id: " . $row["national_id"]. " - Name: " . $row["name"]. "<br>";
//     }
//   }
    



    if(isset($_POST["savebtn"])){
        //record to set in prescrition table
        // print_r($_POST);
        $patientId = $_GET["user"];
        $doctorId = $_POST["doctorName"]; //get doctor name 
        $appdatetime = $_POST["datetime"];
        $consType = $_POST["consultationt"];
        $BookedOnline = 1;
        $status="Draft";


       //insert new appontment to app table
        $sql = "insert into appointment 
        (patient_Id	, doctor_id, datetime, consultation_type, booked_online, state)
        values ('$patientId','$doctorId','$appdatetime','$consType','$BookedOnline','$status' )";
        $result = mysqli_query($connection, $sql);
        header("Location:registedAppointment.html?national_id=$patientId");


    
    }

?>
