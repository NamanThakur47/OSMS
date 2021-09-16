<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_alogin'])){
  if(isset($_REQUEST['adminlogin'])){
    $aEmail = mysqli_real_escape_string($con,trim($_REQUEST['aEmail']));
    $aPassword = mysqli_real_escape_string($con,trim($_REQUEST['aPassword']));
    $sql = "SELECT a_email, a_password FROM adminlogin WHERE a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1";
    $result = $con->query($sql);
    if($result->num_rows == 1){
      
      $_SESSION['is_alogin'] = true;
      $_SESSION['aEmail'] = $aEmail;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script>location.href='dashboard.php'</script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} else {
  echo "<script> location.href='adminlogin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="../images/fevicon.jpg" type="image/icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- custom  CSS -->
  <link rel="stylesheet" href="requesterloginstyle.css">
  <title>Admin Login Portal</title>
</head>
<body class="bg-info">
  <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Service Managment System</span>
  </div>
  <p class="text-center bg-warning w-25 mx-auto py-1 mt-4 col-sm-3"  style="font-size: 30px;"> <i class="fas fa-user-secret text-danger"></i> <span class="">ADMIN PANEL </span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4 mt-5">
        <form action="" class="shadow-lg p-5 bg-dark text-light border border-light border-5" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold py-3">Email</label><input type="email"
              class="form-control" placeholder="Email" name="aEmail">
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold py-3">Password</label><input type="password"
              class="form-control" placeholder="Password" name="aPassword">
          </div>
          <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" name="adminlogin">Login</button>
        
        </form>
        <?php
          if(isset($msg))
          {
            echo $msg;
          }
        ?>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>