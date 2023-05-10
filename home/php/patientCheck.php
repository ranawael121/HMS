<?php
include_once("../dbConnection.php");
// $sql = "select user_id FROM patient";
// $allPatientsIds = mysqli_query($connection, $sql);
// $patiensIds=array();

// if (mysqli_num_rows($allPatientsIds) > 0) {
// while($row = mysqli_fetch_assoc($allPatientsIds)) {
//     array_push($patiensIds,$row["user_id"]); 
// }
// } else {
// echo "0 results";
// }

 if(isset($_POST["savebtn"])){
    if (is_numeric($_POST["national_id"])){

    $patientId = $_POST["national_id"];
    $sql = "select * FROM patient where user_id=$patientId";
    $Patient = mysqli_query($connection, $sql);
    if (mysqli_num_rows($Patient) == 1) {
        header("Location:appointment_form.html?user=$patientId");}
        else{ echo "<p style='color: red;'> No Matching National Id ,<br>Please Check your Enterd Nationa_id </p>  
            <span style='margin-top: -10px'>or</span>  
             <a  class='link w-50 py-3' style='margin-left: 250px;margin-top: -10px;text-decoration: revert;' href='signUp.html'> Register As a patient </a> ";}
      


    // if(in_array($patientId, $patiensIds)){
    // }
    

mysqli_close($connection);}
else {
    echo "<p style='color: red;'> Invalid Input, Please Enterd Valid National Id  </p> "; 
            
}

}

?>