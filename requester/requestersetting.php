<?php
    define('TITLE','Customize Setting');
    include("includesfile/header.php");
    include("../dbconnection.php");
    session_start();

    if($_SESSION['is_login'])
    {
        $remail = $_SESSION['rEmail'];
    }
    else
    {
        echo "<script>location.href='requesterlogin.php'</script>";
    }

    if(isset($_REQUEST['passwordupdate']))
    {
        if(($_REQUEST['reqpassword'] == ""))
        {
            $msg = "<div class='alert alert-warning my-3'>Password Must Be Entered</div>";
        }
        else
        {
            $sql = "SELECT * FROM userregistration WHERE r_email = '$remail'";
            $result = $con->query($sql);
            if($result->num_rows == 1)
            {
                $rpass = $_REQUEST['reqpassword'];
                $sql = "UPDATE userregistration SET r_password = '$rpass' WHERE r_email = '$remail'";
                if($con->query($sql) == TRUE)
                {
                    $msg = "<div class='alert alert-success my-3'>Password Has Changed Successfully <div>";
                }
                else
                {
                    $msg = "<div class='alert alert-danger my-3'>Unable To Change Password</div>";
                }
            } 
        }
    }
?>
<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-primary">Change Password</h3>
            <form action="" method="POST" class="mt-3 mx-5 shadow-lg p-3">
                <div class="form-group">
                    <label for="requesteremail" class="my-3">E-mail</label>
                    <input type="email" class="form-control" value="<?php echo $remail;?>" readonly>
                </div>
                <div class="form-group">
                    <label for="requesterpassword" class="my-3">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter The Password" name="reqpassword">
                </div>
                <button type="submit" class="btn btn-danger mt-5" name="passwordupdate">Update</button>
                <button type="reset" class="btn btn-dark mt-5" name="">Reset</button>
                <?php
                    if(isset($msg))
                    {
                        echo $msg;
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
    include("includesfile/footer.php");
?>