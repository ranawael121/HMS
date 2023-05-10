<?php
 include_once("../dbConnection.php");
 if(isset($_GET["national_id"])){
    if(is_numeric($_GET["national_id"])){
    $patientId = $_GET["national_id"];
    $getPatienData = "select patienName,doctorName,departmentName,datetime,consultation_type,state from appointmentusers where patientId = $patientId and datetime>=now()";
    $getresult = mysqli_query($connection, $getPatienData);
    
    // Print Patient Data
    echo"<h1 class='mb-4' style='margin-top: 3rem;
    margin-bottom: 1rem;'><i class='fa-sharp fa-solid fa-circle-check'></i> Thanks For Your Registering</h1>
    <h4> Your Appointments State </h4> <br>
    <table class='table table-striped table-borderless table-hover' style='color: black;text-align: center;'>
            <thead style='background-color: #42b3e5;'>
            <tr>
                <th scope='col'>Name</th>
                <th scope='col'>Doctor</th>
                <th scope='col'>Department</th>
                <th scope='col'>Time</th>
                <th scope='col'>Consultation Type</th>
                <th scope='col'>State</th>
            </tr>
            </thead>
            <tbody>";
    while($data = mysqli_fetch_array($getresult)) {
        echo "<tr>";    
        // echo "<td>".$data['id']."</td>";
        echo" <td>".$data['patienName']."</td>";
        echo "<td>".$data['doctorName']."</td>";
        echo "<td>".$data["departmentName"]."</td>";
        echo "<td>".$data["datetime"]."</td>";
        echo "<td>".$data["consultation_type"]."</td>";
        echo "<td>".$data["state"]."</td>";
        echo "<tr>"; 
    }
    echo " </tbody>  </table>";
    echo "<br><h4>Stay Tuned For Your Appointment updates </h4>
    <div style='font-weight :600;'>Your Draft Appointment 'll Be Confirmed Soon!</div> "; }
    else{
        header("Location:registedAppointment.html?inputError=Inavlid Input");


    }
 }
 else{
    echo" <form method='post' >
            <div class='row g-3'>
            <div class='col-12'>
            <h5>Enter Your National Id To Get Your Appointments State  </h5> <br>
            <input type='text' class='form-control bg-light border-0' placeholder='Please Enter Your National ID' style='height: 55px' name='national_id' id='NationalId' >
            </div>
            <input type='submit' class='btn btn-primary w-100 py-3' name='savebtn' value='Show State' required>   
             <br>
         </form>";
    if(isset($_POST["savebtn"])){
         header("Location:registedAppointment.html?userId=$_POST[national_id]");

                            }
 }

?>
