<?php  
if(isset( $_SESSION['NId'])  ){   
  
       include_once("../dbConnection.php");
        //Read From Patient
        $readSql = "SELECT * FROM users INNER JOIN patient ON users.national_id=patient.user_id 
        INNER JOIN adress ON users.national_id=adress.user_id WHERE users.type='patient' ORDER BY users.createDate desc"; 
        $readResult1 = mysqli_query($connection, $readSql);
        $currentDate = date("d-m-Y");

        while($data = mysqli_fetch_array($readResult1)) {
            echo "<tr>";
            echo "<td>".$data["national_id"]."</td>";
            echo "<td>".$data["name"]."</td>";
            echo "<td>".$data["gender"]."</td>";
            echo "<td>".$data["mobile"]."</td>";
            $age = date_diff(date_create($data["birthDate"]), date_create($currentDate));
            echo "<td>".$age->format("%y")."</td>";
            echo "<td>".$data["blood_type"]."</td>";
            echo "<td> <a href='editpatient.html?national_id=$data[national_id]'><i class='bi bi-pencil-square'></i></a></td>";
            echo "<td> <a href='../appointment/appointmentForm.html?user=$data[user_id]'><i class='bi bi-calendar'></i></a></td>";
            echo "<td> <a href='PatientDelete.php?national_id=$data[national_id]'><i class='bi bi-trash-fill '></i></a></td>";

            echo "</tr>";
        
        }
    }
    else{
        header("Location: ../login.html?acesserror=Access Denied Please Log In");
      }
?>
