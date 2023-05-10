<?php 

if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 
       include_once("../dbConnection.php");
        //Read From Doctor
        $readSql = "SELECT *, users.name AS doc_name FROM users 
        INNER JOIN adress ON users.national_id=adress.user_id 
        INNER JOIN doctor ON doctor.user_id=users.national_id
        INNER JOIN department on doctor.department_id=department.id WHERE type='Doctor' ORDER BY users.createDate desc"; 
        $readResult1 = mysqli_query($connection, $readSql);

        while($data = mysqli_fetch_array($readResult1)) {
            echo "<tr>";
            echo "<td>".$data["national_id"]."</td>";
            echo "<td>".$data["doc_name"]."</td>";
            echo "<td>".$data["name"]."</td>";
            echo "<td>".$data["gender"]."</td>";
            echo "<td>".$data["mobile"]."</td>";
            echo "<td>".$data["email"]."</td>";

            echo "<td> <a href='editdoctor.html?national_id=$data[national_id]'> <i class='bi bi-pencil-square'></i></a> </td>";
            echo "<td> <a href='../schedule/schedule.html?user=$data[national_id]'><i class='bi bi-calendar'></i></a></td>";
            echo "<td> <a href='DoctorDelete.php?national_id=$data[national_id]'><i class='bi bi-trash-fill'></i></a> </td>";

            echo "</tr>";
        
        }
    }else{
        header("Location: ../login.html?acesserror=Access Denied Please Log In");
      } 

?>
