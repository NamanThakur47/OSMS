<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['rEmail'])){
        $rEmail = mysqli_real_escape_string($con,trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($con,trim($_REQUEST['rPassword']));
        $sql = "SELECT s_email,s_password FROM userregistration WHERE s_email = '".$rEmail."' AND s_password='".$rPassword."' limit 1";
        $result = $con->query($sql);
        if($result->num_rows == 1){
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            // REdirecting To RequesterProfile Page On Correct Email And Pass //
            echo "<script>location.href = 'requesterprofile.php'; </script>";
            exit;
        }else{
            $msg = '<div class="alert alert-warning mt-2" role="alert">Enter Valid Email And Password</div>';
        }
    }
}else{
    echo "<script>location.href='requesterprofile.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="requesterloginstyle.css">
    <style>
        .custom-margin{
            margin-top:8vh;
        }
    </style>
    <title>User Login Portal</title>
    <link rel="icon" href="../images/fevicon.jpg" type="image/icon">
</head>
<body>
    <div class="mb-3 text-center mt-5" style="font-size:30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Maintenance Management System</span>
</div>
<p class="text-center" style="font-size:20px;">
<i class="fas fa-user-secret text-danger"></i>
<span>Requester Area(Demo)</span>
</p>
<div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail" >
                    <!-- Add Text-White Below IF Want Text Color White -->
                    <small class="form-text">
                        We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="rPassword">
                </div>

                <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Login</button>
                <?php if(isset($msg)) {echo $msg;}?>
            </form>
            <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>