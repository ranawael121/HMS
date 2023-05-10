<?php
// echo"hhhhhhhhh";
session_start();
include_once("dbConnection.php");
if (isset($_POST['national_id']) && isset($_POST['pass'])) {
    //form validation
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $NId = test_input( $_POST['national_id']);
    $pass = test_input($_POST['pass']);

    if (empty($NId)){
        header("Location: login.html?error=National Id is required");
    }else if(empty($pass)){
        header("Location: login.html?error=Password is required");
    }else{
    // Check user is exist in the database
    $query    = "SELECT * FROM `users` WHERE national_id='$NId'
                 AND password=sha1($pass)";
    $users = mysqli_query($connection, $query) or die(mysql_error());
    
    if (mysqli_num_rows($users) === 1) {
         $user = mysqli_fetch_assoc($users);
        //  print_r ($user);

        $_SESSION['NId'] = $user['national_id'];
        $_SESSION['userName'] = $user['name'];
        $_SESSION['userType']=$user['type'];
        // echo  $_SESSION['NId'];
        // Redirect to user dashboard page
        if ($user['type']=='admin'){header("Location: dashbord/index.html");}
        else if($user['type']=='doctor') {header("Location: dashbord/docDashbord.html");}
        else if($user['type']=='receptionist') {header("Location: dashbord/recepDashbord.html");}
        else {header("Location:login.html?acesserror=Access Denied Not Allowed User");}
        
    } else {
        header("Location: login.html?error=Incorrect National Id Or Password");
    }
}
} else 
?>