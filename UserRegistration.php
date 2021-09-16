<?php
  include('dbconnection.php');
  if(isset($_REQUEST['rSignup'])){
    // Checking for Empty Fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT s_email FROM userregistration WHERE s_email='".$_REQUEST['rEmail']."'";
      $result = $con->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
        $sql = "INSERT INTO userregistration(s_name, s_email, s_password) VALUES ('$rName','$rEmail', '$rPassword')";
        if($con->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
  }
?>
<div class="container-fluid bg-light" id="registration">
<div class="container pt-5 bg-light">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-0  mb-4">
    <div class="col-sm-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group mt-3 mb-3">
        <i class="fas fa-user"></i>
          <label for="name" class="pl-2 font-weight-bold">Name</label>
          <input type="text" class="form-control pt-2 pb-2" placeholder="Name" name="rName">
        </div>
        <div class="form-group mt-3 mb-3">
        <i class="fas fa-envelope"></i>
          <label for="email" class="pl-2 font-weight-bold">Email</label>
          <input type="text" class="form-control pt-2 pb-2" placeholder="Email" name="rEmail">
        
        <!-- Add text-white below if want text color white -->
        <small class="form-text"> we'll never share your email anyone else.</small>
        </div>
        <div class="form-group mt-3 mb-2">
        <i class="fas fa-key"></i>
          <label for="pass" class="pl-2 font-weight-bold"> new password</label>
          <input type="password" class="form-control pt-2 pb-2" placeholder="password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">sign up</button>
        <em style="font-size:10px;">Note - by clicking sign up, you agree to our terms, Data policy and Cookiie policy</em>
        <?php if(isset($regmsg)) {echo $regmsg; }?>
      </form>
    </div>
    </div>
    </div>
    </div>
