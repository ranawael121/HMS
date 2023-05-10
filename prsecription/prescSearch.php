
<?php 
session_start();
if(isset( $_SESSION['NId']) && $_SESSION['userType']!='patient'  ){ 
  // if (is_numeric($_GET['searchNid'])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prescription List</title>
  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../Doctor/Doctor.css">
  <link rel="stylesheet" href="../generalView.css">
  <link rel="icon" type="image/png" href="logo.png">


<style>
  .searchbtn{
    color: #42b3e5;
    border: 1px solid #42b3e5;
  }
  .searchbtn:hover{
    color: white;
    background-color: #42b3e5;
  }
</style>

</head>

<body>

  <!-- navbar -->
  <div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
        <a href="" class="navbar-brand">
          <img src="logo.png" alt=""> </a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto py-0">
            <?php 
            if(  $_SESSION['userType']=='admin'  ){   ?>
            <a href="../dashbord/index.html" class="nav-item nav-link">Home</a>
            <a href="../Doctor/Doctor.html" class="nav-item nav-link">Doctor</a>
            <?php }else if ($_SESSION['userType']==='doctor'){?>
              <a href="../dashbord/docDashbord.html" class="nav-item nav-link">Home</a>
              <?php }else{  ?>
                <a href="../dashbord/recepDashbord.html" class="nav-item nav-link">Home</a>
              <?php } ?>
              
                <a href="../schedule/scheduleList.html" class="nav-item nav-link">Schedule</a>
                
            <a href="../Patient/Patient.html" class="nav-item nav-link">Patient</a>
            <a href="../appointment/appointmentList.html" class="nav-item nav-link">Appoinment</a>
            <a href="../prsecription/prescriptionList.html" class="nav-item nav-link active">Prescription</a>
            <div>
              <!-- <label for="user" class="nav-item nav-link" style="color:#6c757d">username</label> -->
              <div  class="nav-link" style="font-size: 15px;width: fit-content;font-weight: 500; color:#6c757d"><?php echo $_SESSION['userName'].' '.'('.$_SESSION['userType'].')'; ?></div>
            </div>
            <a href="../authLog/logout.php" class="nav-item nav-link"><i class="bi bi-box-arrow-right"></i></a>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- Prescription List -->
  <div class="container">
    <div class="row form bg-light fixed rounded" style="width: 120%;margin-left: -10%;">
      
      <div class="row bg-light" style="position: fixed; width:100% ; ">
        <?php if (isset($_GET['done'])) { ?>
          <span class="alert alert-success" role="alert" style="text-align: center;display:inline" >
            <?=$_GET['done']?>
          </span>
        <?php } ?>

        <?php if (isset($_GET['delete'])) { ?>
          <span class="alert alert-danger" role="alert" style="text-align: center;display:inline" >
            <?=$_GET['delete']?>
          </span>
        <?php } ?>
        <h1 class="mb-4 text-center"><br>Prescription</h1>
        <br>
     
        <form action="prescSearch.php" method="GET" class="row" style="width: 100%">
          <div class="col-2 col-sm-3"></div>
          <div class="col-2 col-sm-3"></div>
          <div class="col-2 col-sm-5">
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" name='searchNid' placeholder="Search" />
                <span class="input-group-btn">
                  <button class="btn btn-info btn-lg" type="submit" value="Search" name="search" style="color: white;"><i class="bi bi-search"></i></button>
                </span>
              </div>
              <br>
            </div>
          </div>
        </form>
        
      </div>
      
      <div>
      <br><br><br><br><br>
      <br><br><br><br>
      <br>
      <div class="table-responsive d-flex justify-content-center">
        <table class="table table-striped table-borderless table-hover " style="width: 95%;">
          <thead style="background-color: #42b3e5;">
            <tr>
              <th>Prescription ID</th>
              <th>Patient</th>
              <th>Department</th>
              <th>Doctor</th>
              <th>Prescription Date</th>
              <th>Followup Date</th>
              <?php 
              if(  $_SESSION['userType']!='receptionist' ){   ?>
                 <th>Delete</th>
              <th>Edit</th>
              <?php } ?>
              <th>View</th>
            </tr>
          </thead>
          <?php
//Read From Prescription Table

        include_once("../dbConnection.php");
        if( $_SESSION['userType']=='doctor' ){
         $readSql = "select * from presusers where docId=$_SESSION[NId] and 
         (pID like '%$_GET[searchNid]' or patienName like '%$_GET[searchNid]'
          or departmentName like '%$_GET[searchNid]' or doctorName like '%$_GET[searchNid]')
         order by appointment_id desc "; 
        }else{
        $readSql = "select * from presusers  where
        pID like '%$_GET[searchNid]' or patienName like '%$_GET[searchNid]'
        or departmentName like '%$_GET[searchNid]' or doctorName like '%$_GET[searchNid]'
         order by appointment_id desc "; }
        $readResult = mysqli_query($connection, $readSql);
        
        while($data = mysqli_fetch_array($readResult)) {
            echo "<tr>";    
                echo "<td>".$data['appointment_id']."</td>";
                echo"<td>".$data['patienName']."</td>";
                echo" <td>".$data['departmentName']."</td>";
                echo" <td>".$data['doctorName']."</td>";
                echo "<td>".$data["prescription_time"]."</td>";
                echo "<td>".$data["followup_date"]."</td>";
                if(  $_SESSION['userType']!='receptionist' ){
                echo "<td> <a href='prescDelete.php?user=$data[appointment_id]'> <i class='bi bi-trash-fill'></i> </a> </td>";
                echo "<td> <a href='prescUpdateForm.html?user=$data[appointment_id]'> <i class='bi bi-pencil-square'></i>  </a> </td>";}
                echo "<td> <a href='prescUpdateForm.html?user=$data[appointment_id]&state=read'> <i class='bi bi-box-arrow-up-right'></i> </a> </td>";
            echo "</tr>";   }
    
      
  ?>

          <tbody>
           
          </tbody>
        </table>

      </div>
    </div>
    </div>
  </div>

  <script src="bootstrap.bundle.min.js"></script>

</body>

</html>
<?php 
// }else{
//   header("Location:prescriptionList.html?searcherror=Invalid Search Input");

// }
} else{
  header("Location: ../login.html?acesserror=Access Denied Please Log In");
} ?>