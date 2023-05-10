<?php 
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='Patient'  ){ 

include_once("../dbConnection.php");
    if(isset($_POST["savebtn"])){
        //check if the Doctoris  male or female
        if ( isset($_POST['gender']) ){
            $gender = $_POST['gender'];
            if ( $gender == 'M' ){
                $gender="M";
            }else if ( $gender == 'F' ){
                $gender="F";
            }
        }
        if ( isset($_POST['department']) )
            $department = $_POST['department'];
        
        //save data added from the Doctor
        $doctorName = $_POST["doctorName"];
        $mobile = $_POST["mobile"];
        $nationalId = $_POST["nationalId"];
        $Birthdate = $_POST["Birthdate"];
        $street=$_POST["street"];
        $apartment=$_POST["apartment"];
        $city=$_POST["city"];
        $country=$_POST["country"];
        $email=$_POST["email"];
        $Password=sha1($_POST["password"]);
        $RepeatPassword=sha1($_POST["repeatpassword"]);
        $department=$_POST["department"];
        $type="doctor";
        $readSql = "SELECT national_id FROM users where national_id=$nationalId;"; 
        $readResult1 = mysqli_query($connection, $readSql)or die(mysql_error());
        if (mysqli_num_rows($readResult1) === 1)  {header("Location: doctor_form.html?acesserror=This ID Is Already Signed");}
        else{
        if(preg_match('/^[0-9]{14}/', $nationalId)){
        if (preg_match('/^[a-zA-Z ]+$/', $doctorName)){
            $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
            if(preg_match($pattern,$email)){
        if ($Password==$RepeatPassword){
            
            //insert new user as a Doctor
            $sql = "insert into users (national_id, name, birthDate, gender, type, mobile, email, password)
            values ('$nationalId','$doctorName','$Birthdate','$gender','$type','$mobile','$email','$Password')";
            $result = mysqli_query($connection, $sql);
            //insert doctor
            $sql1 = "insert into doctor (user_id,department_id)
            values ('$nationalId','$department')";
            $result = mysqli_query($connection, $sql1);
            //insert Department data
            /*$sql2 = "insert into department (name)
            values ('$department',)";
            $result = mysqli_query($connection, $sql2);*/
            //insert Doctor adress
            $sql3 ="insert into adress (user_id, apartment, street, city, country)
            values('$nationalId', '$apartment' ,'$street', '$city', '$country')";
            $result = mysqli_query($connection, $sql3);
            header("Location: Doctor.html?done=Doctor Added Sucssessfuly ");
        }else{
            header("Location: doctor_form.html?acesserror=Wrong data entered");

        }
    }else{
        header("Location: doctor_form.html?acesserror=Please Enter Valid Email");
    
    }
}else{
    header("Location: doctor_form.html?acesserror=Please Enter Valid Name");
}
}else{
    header("Location: doctor_form.html?acesserror=Please Enter Valid ID");
}
}

}
}else{
    header("Location: ../login.html?acesserror=Access Denied Please Log In");
  } 
?>
