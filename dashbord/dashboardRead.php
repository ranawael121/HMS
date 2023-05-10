<?php
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 

    include_once("../dbConnection.php");
    
    /* home dashbord */
    
    $q="select COUNT(user_id) from `patient`";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $patient=$data[0];
    function display()
    {
        global $patient;
        echo $patient;
    }
    
    $q="select COUNT(user_id) from `doctor`";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $doctor=$data[0];
    function DoctorDisplay()
    {
        global $doctor;
        echo $doctor;   
    }

    $q="select COUNT(id) from appointment";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $appointm=$data[0];
    function appointmentDisplay()
    {
        global $appointm;
        echo $appointm;   
    }
    
    /* reseptionist dashbord */
    
    $q="select COUNT(patientId) from appointmentusers WHERE booked_online=1;";
    $readResult = mysqli_query($connection, $q);
    $data = mysqli_fetch_row($readResult);
    $reseptionist=$data[0];
    function online_resp()
    {
        global $reseptionist;
        echo $reseptionist;
    }
    
    /* table */

    $q="select doctorName,patienName,id,departmentName,DATE(datetime) from appointmentusers order by id desc;";
    $result = mysqli_query($connection, $q);
    function tabledisplay()
    {
        global $result;
        while($data = mysqli_fetch_array($result)) 
        {
            echo"<tr>";
            echo "<td style='border: none;'>".$data['id']."</td>";
            echo" <td style='border: none;'>".$data['patienName']."</td>";
            echo "<td style='border: none;'>".$data['doctorName']."</td>";
            echo "<td style='border: none;'>".$data["departmentName"]."</td>";
            echo "<td style='border: none;'>".$data["DATE(datetime)"]."</td>";
            echo"</tr>";
        }
    }
    
    $q="sELECT patienName,doctorName,DATE(datetime),id FROM `appointmentusers` WHERE booked_online=1 order by id desc";
    $readResaptionist= mysqli_query($connection, $q);
    function respdashbord()
    {
        global $readResaptionist;
        while($data = mysqli_fetch_array($readResaptionist)) 
        {
            echo"<tr>";
            echo" <td style='border: none;'>".$data['patienName']."</td>";
            echo "<td style='border: none;'>".$data['doctorName']."</td>";
            echo "<td style='border: none;'>".$data["DATE(datetime)"]."</td>";
            echo "<td style='border: none;'> <a href='deleteapp.php?user=$data[id]'>  <i class='bi bi-trash-fill'></i>  </a> </td>";
            echo "<td style='border: none;'> <a href='../appointment/appUpdateForm.html?user=$data[id]'> <i class='bi bi-pencil-square'></i>  </a> </td>";
            echo"</tr>";
        }
    }
}else{
        header("Location: ../login.html?acesserror=Access Denied Please Log In");
      } 

?>