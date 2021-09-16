<?php
if(session_id() == ''){
    session_start();
}
if($_SESSION['is_alogin'])
    {
        $remail = $_SESSION['aEmail'];
    }
    else
    {
        echo "<script>location.href='adminlogin.php'</script>";
    }
    if(isset($_REQUEST['view']))
    {
        $sql = "SELECT * FROM submitrequest WHERE req_id = {$_REQUEST['id']}";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
    }

    if(isset($_REQUEST['assign']))
    {
        if(($_REQUEST['reqid']=="") || ($_REQUEST['reqinfo']=="") || ($_REQUEST['reqdesc']=="") || ($_REQUEST['reqname']=="") || ($_REQUEST['reqads1']=="") || ($_REQUEST['reqads2']=="") || ($_REQUEST['reqcity']=="") || ($_REQUEST['reqstate']=="") || ($_REQUEST['reqpincode']=="") || ($_REQUEST['reqemail']=="") || ($_REQUEST['reqmobile']=="") || ($_REQUEST['assigntech']=="") || ($_REQUEST['servicedate']==""))
        {
            $msg = '<div class="alert alert-warning mt-2" role="alert">Some Fiels Are Not Filled</div>';
        }
        else
        {
            $rid = $_REQUEST['reqid'];
            $rinfo = $_REQUEST['reqinfo'];
            $rdesc = $_REQUEST['reqdesc'];
            $rname = $_REQUEST['reqname'];
            $radds1 = $_REQUEST['reqads1'];
            $radds2 = $_REQUEST['reqads2'];
            $rcity = $_REQUEST['reqcity'];
            $rstate = $_REQUEST['reqstate'];
            $rpincode = $_REQUEST['reqpincode'];
            $remail = $_REQUEST['reqemail'];
            $rmobile = $_REQUEST['reqmobile'];
            $asigntech = $_REQUEST['assigntech'];
            $rasigndate = $_REQUEST['servicedate'];
            $sql = "INSERT INTO workasign (req_id,req_info,req_desc,req_name,req_adds1,req_adds2,req_city,req_state,req_pincode,req_email,req_mobile,asigntech,asigndate)VALUES('$rid','$rinfo','$rdesc','$rname','$radds1','$radds2','$rcity','$rstate','$rpincode','$remail','$rmobile','$asigntech','$rasigndate')";
            if($con->query($sql) == TRUE)
            {
                $msg = '<div class="alert alert-success mt-2" role="alert">Work Assign Successfully</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger mt-2" role="alert">Unable To Assign Work</div>';
            }
        }
    }
?>
<div class="col-sm-5 mt-5">
    <form action="" method="POST" class="p-5 bg-light">
        <h2 class="text-center text-dark">Assign Work Order Request</h2>
        <div class="form-group my-3">
            <label for="requestid">Request ID</label>
            <input type="text" class="form-control" name="reqid" value="<?php if(isset($row['req_id'])){echo $row['req_id'];}?>" readonly>
        </div>

        <div class="form-group my-3">
            <label for="requestinfo">Request Info</label>
            <input type="text" class="form-control" name="reqinfo" value="<?php if(isset($row['req_info'])){echo $row['req_info'];}?>">
        </div>

        <div class="form-group my-3">
            <label for="requestdesc">Request Description</label>
            <input type="text" class="form-control" name="reqdesc" value="<?php if(isset($row['req_desc'])){echo $row['req_desc'];}?>" >
        </div>

        <div class="form-group my-3">
            <label for="requestname">Requester Name</label>
            <input type="text" class="form-control" name="reqname" value="<?php if(isset($row['req_name'])){echo $row['req_name'];}?>">
        </div>

        <div class="row">
        <div class="form-group col-sm-6 my-3">
            <label for="address1">Address lin 1</label>
            <input type="text" class="form-control" name="reqads1" value="<?php if(isset($row['req_adds1'])){echo $row['req_adds1'];}?>">
        </div>

        <div class="form-group col-sm-6 my-3">
            <label for="address2">Address lin 2</label>
            <input type="text" class="form-control" name="reqads2" value="<?php if(isset($row['req_adds2'])){echo $row['req_adds2'];}?>" >
        </div>
        </div>

        <div class="row">
        <div class="form-group col-sm-6 my-3">
            <label for="city">City</label>
            <input type="text" class="form-control" name="reqcity" value="<?php if(isset($row['req_city'])){echo $row['req_city'];}?>">
        </div>

        <div class="form-group col-sm-6 my-3">
            <label for="address2">State</label>
            <input type="text" class="form-control" name="reqstate" value="<?php if(isset($row['req_state'])){echo $row['req_state'];}?>" >
        </div>
        </div>

        <div class="row">
        <div class="form-group col-sm-3 my-3">
            <label for="pincode">Pin code</label>
            <input type="text" class="form-control" name="reqpincode" value="<?php if(isset($row['req_pincode'])){echo $row['req_pincode'];}?>">
        </div>

        <div class="form-group col-sm-5 my-3">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="reqemail" value="<?php if(isset($row['req_email'])){echo $row['req_email'];}?>">
        </div>

        <div class="form-group col-sm-4 my-3">
            <label for="email">Contact</label>
            <input type="text" class="form-control" name="reqmobile" value="<?php if(isset($row['req_mobile'])){echo $row['req_mobile'];}?>">
        </div>
        </div> 

        <div class="row">
        <div class="form-group col-sm-8 my-3">
            <label for="asigntechnician">Assign A Technician</label>
            <input type="text" class="form-control" name="assigntech">
        </div>

        <div class="form-group col-sm-4 my-3">
            <label for="servicedate">Service Date</label>
            <input type="date" class="form-control" name="servicedate">
        </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-success" name="assign">Assign Work</button>
            <button type="reset" class="btn btn-dark" name="assign">Reset Data</button>
        </div>

        <?php
            if(isset($msg))
            {
                echo $msg;
            }
        ?>
    </form>
</div>