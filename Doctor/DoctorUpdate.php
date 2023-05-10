<?php

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 
include("../dbConnection.php");
//read Doctor data
$doctortId = $_GET["national_id"];
// echo $doctortId;
$usersql = "SELECT * FROM users INNER JOIN adress ON users.national_id=adress.user_id WHERE national_id = $doctortId";
$userresult = mysqli_query($connection, $usersql);
$Udata = mysqli_fetch_array($userresult);
$Doctorsql="SELECT * FROM doctor INNER JOIN department ON doctor.department_id=department.id WHERE user_id = $doctortId";
$Doctorresult = mysqli_query($connection, $Doctorsql);
$Ddata = mysqli_fetch_array($Doctorresult);


if(isset($_POST["savebtn"])){

    //check if the Doctor is male or female
    if ( isset($_POST['gender']) ){
        $gender = $_POST['gender'];
        if ( $gender == 'M' ){
            $gender="M";
        }else if ( $gender == 'F' ){
            $gender="F";
            }

        }

        $doctorName = $_POST["DoctorName"];
        $mobile = $_POST["mobile"];
        $nationalId = $_POST["nationalId"];
        $Birthdate = $_POST["Birthdate"];
        $street=$_POST["street"];
        $apartment=$_POST["apartment"];
        $city=$_POST["city"];
        $country=$_POST["country"];
        $Email=$_POST["Email"];
        $Password=sha1($_POST["Password"]);
        $RepeatPassword=sha1($_POST["RepeatPassword"]);
        $department=$_POST["department"];
        $type="doctor";
        if (preg_match('/^[a-zA-z ]+$/', $doctorName)){
            $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]{5}+\.[a-zA-Z0-9-.]{3}+$/";
            if(preg_match($pattern,$Email)){
    if ($Password==$RepeatPassword){
        //update  user 
        $updateUsersSql = "update users set name='$doctorName', mobile='$mobile', password='$Password', 
        national_id='$nationalId',birthDate='$Birthdate', Email='$Email', gender='$gender' where national_id =$doctortId";
        $usersResult = mysqli_query($connection, $updateUsersSql);
    
        $updateAdressSql= "update adress set user_id='$nationalId', apartment='$apartment', city='$city', country='$country', street='$street' where user_id=$doctortId";
        $adressResult = mysqli_query($connection, $updateAdressSql);

        $updatePatientSql= "update doctor set  user_id='$nationalId',department_id='$department' where user_id=$doctortId";
        $adressResult = mysqli_query($connection, $updatePatientSql);
        header("Location: Doctor.html");
    }else{
        header("Location: editdoctor.html?national_id=$doctortId&acesserror=Password Must Be Matched");

    }
}else{
    header("Location: editdoctor.html?national_id=$doctortId&acesserror=Please Enter Valid Email");

}
}else{
header("Location: editdoctor.html?national_id=$doctortId&acesserror=Please Enter Valid Name");

}
}
}else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  } 
?>

