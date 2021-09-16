<?php 
    define('TITLE','Requester Profile');
    include("includesfile/header.php");
?>
<?php
    include("../dbconnection.php");
    session_start();
    if($_SESSION['is_login'])
    {
        $remail = $_SESSION['rEmail'];
    }
    else
    {
        echo "<script>location.href = 'requesterlogin.php'</script>";
    }
    $sql = "SELECT * FROM userregistration WHERE s_email = '$remail'";
    $result = $con->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_Assoc();
        $rname = $row["s_name"];
    }
    if(isset($_REQUEST['nameupdate']))
    {
        if(($_REQUEST['rname'] == ""))
        {
            $msg = "<div class='alert alert-danger'>Name Element Is Empty Please Give A Name To The Current User</div>";
        }
        else
        {
            $rname = $_REQUEST['rname'];
            $sql = "UPDATE userregistration SET s_name = '$rname' WHERE s_email = '$remail'";
                if($con->query($sql) == TRUE)
                {
                    $msg = "<div class='alert alert-success'> Name Updated Successfully</div>";
                }
                else
                {
                    $msg = "<div class='alert alert-danger'> Name Not Updated Due To Technical Error</div>";
                }   
        }
    }
?>

<!-- Start Profile Section -->
<div class="col-sm-6 mx-5">
    <form action="" method="POST" class="pt-3">
        <div class="form-group">
            <label for="emailid" class="my-2">User Email</label>
            <input type="email" class="form-control" name="remail" value="<?php echo $remail;?>" readonly>
        </div>
        <div class="form-group">
            <label for="emailid" class="my-2">User Name</label>
            <input type="text" class="form-control" name="rname" value="<?php echo $rname;?>">
        </div>
        <button type="submit" class="btn btn-success mt-4" name="nameupdate">Update</button>
        <?php
            if(isset($msg))
            {
                echo $msg;
            }
        ?>
    </form>
</div>
<!-- End Profile Section -->
<?php
include("includesfile/footer.php");
    ?>