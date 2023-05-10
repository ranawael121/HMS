<?php
if(isset( $_SESSION['NId'])   ){  
include("../dbConnection.php");
//read patient data
$patientId = $_GET["national_id"];
//echo $patientId;
$usersql = "SELECT * FROM users WHERE national_id=$patientId";
$userresult = mysqli_query($connection, $usersql);
$Udata = mysqli_fetch_array($userresult);
$patientsql="SELECT * FROM patient WHERE user_id=$patientId";
$Patientresult = mysqli_query($connection, $patientsql);
$Pdata = mysqli_fetch_array($Patientresult);
$adresssql="SELECT * FROM adress WHERE user_id=$patientId";
$adressresult = mysqli_query($connection, $adresssql);
$Adata = mysqli_fetch_array($adressresult);


if(isset($_POST["savebtn"])){

    //check if the patient is male or female
    if ( isset($_POST['gender']) ){
        $gender = $_POST['gender'];
        if ( $gender == 'M' ){
            $gender="M";
        }else if ( $gender == 'F' ){
            $gender="F";
            }
        else $gender=$Udata['gender'];
        }
    //know the blood type of the patient
    if ( isset($_POST['Blood']) ){
        $Blood = $_POST['Blood'];
        if ( $Blood == 'A' ){
            $Blood="A";
            }else if ( $Blood == 'B' ){
                $Blood="B";
            }else if ( $Blood == 'AB' ){
                $Blood="AB";
            }else if ( $Blood == 'O' ){
                $Blood="O";
            }
            else $Blood=$Pdata['blood_type'];
        }
    if ( isset($_POST['company']) ){
        $company = $_POST['company'];
        if ( $company == 'a' ){
                $company="sugarCanel";
            }else if ( $company == 'b' ){
                $company="Department2";
            }else if ( $company == 'c' ){
                $company="Department3";
            }
        }
    $patientName = $_POST["patientName"];
    $mobile = $_POST["mobile"];
    $nationalId = $_POST["nationalId"];
    $BirthDate = $_POST["BirthDate"];
    $employeeId=$_POST["employeeId"];
    $ChronicDisease=$_POST["ChronicDisease"];
    $PastSurger=$_POST["PastSurger"];
    $street=$_POST["street"];
    $apartment=$_POST["apartment"];
    $city=$_POST["city"];
    $country=$_POST["country"];
    $Email=$_POST["Email"];
    $Password=sha1($_POST["Password"]);
    $RepeatPassword=sha1($_POST["RepeatPassword"]);
    $type="patient";
    if (preg_match('/^[a-zA-Z ]+$/', $patientName)){
        $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]{5}+\.[a-zA-Z0-9-.]{3}+$/";
        if(preg_match($pattern,$Email)){
        if ($Password==$RepeatPassword){
            //update  user 
            $updateUsersSql = "update users set name='$patientName', mobile='$mobile', password='$password' ,
            national_id='$nationalId',birthDate='$BirthDate', Email='$Email', gender='$gender' where national_id =$patientId";
            $usersResult = mysqli_query($connection, $updateUsersSql);
    
            $updateAdressSql= "update adress set user_id='$nationalId', apartment='$apartment', city='$city', country='$country', street='$street' where user_id='$patientId'";
            $adressResult = mysqli_query($connection, $updateAdressSql);

            $updatePatientSql= "update patient set  chronic_disease='$ChronicDisease',past_surgery='$PastSurger',user_id='$nationalId', 
            employee_id='$employeeId', blood_type='$Blood', company='$company' where user_id=$patientId";
            $adressResult = mysqli_query($connection, $updatePatientSql);
            header("Location: Patient.html?done=Patient Edit Sucssessfuly ");

        }
        else{
            header("Location: editpatient.html?national_id=$patientId&acesserror=Password must be matched");
        }
    }else{header("Location: editpatient.html?national_id=$patientId&acesserror=Pleaes Enter Valid Email");
    }
}else{header("Location: editpatient.html?national_id=$patientId&acesserror=Pleaes Enter Valid Name");
}
}
}else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  }
?>

