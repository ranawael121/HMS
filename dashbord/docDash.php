<?php

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  )
{
    $user=$_SESSION['NId'];
    global $user;


    include_once("../dbConnection.php");
    $q="select patienName ,consultation_type,id FROM `appointmentusers` WHERE state='In-consultation' and docId='$user'";
    $Result = mysqli_query($connection, $q);
    function display()
    {
        global $Result;
        while($data = mysqli_fetch_array($Result)) 
        {
            echo"<tr>";
            echo" <td style='border: none;'>".$data['patienName']."</td>";
            echo "<td style='border: none;'>".$data['consultation_type']."</td>";
            echo "<td style='border: none;' > <a href='../prsecription/prescriptionForm.html?appId=$data[id]'> <i class='bi bi-file-earmark-medical-fill'></i> </a> </td>";
            echo"</tr>";
        }
    }

    $q="sELECT COUNT(id) FROM `appointmentusers` WHERE state='Done'AND doctorName='$user'";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $confirm=$data[0];
    function confirm()
    {
        global $confirm;
        echo $confirm;   
    }

    $q="sELECT COUNT(id) FROM `appointmentusers` WHERE state='Waiting' AND doctorName='$user'";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $draft=$data[0];
    function draft()
    {
        global $draft;
        echo $draft;   
    }
}else{
        header("Location: ../login.html?acesserror=Access Denied Please Log In");
      }

?>