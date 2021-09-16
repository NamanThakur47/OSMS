<?php
    define('TITLE','submit request');

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
    if(isset($_REQUEST['requestsubmit']))
    {
        if(($_REQUEST['requestinfo']=="") || ($_REQUEST['requestdescription']=="") || ($_REQUEST['requestname']=="") || ($_REQUEST['requestaddress1']=="") || ($_REQUEST['requestaddress2']=="") || ($_REQUEST['requestcity']=="") || ($_REQUEST['requeststate']=="") || ($_REQUEST['requestpincode']=="") || ($_REQUEST['requestemail']=="") || ($_REQUEST['requestmobile']=="") || ($_REQUEST['requestdate']==""))
        {
            $msg ="<div class='alert alert-danger'>All Filesds Are Required</div>";
        }
        else
        {
            $reqinfo = $_REQUEST['requestinfo'];
            $reqdesc = $_REQUEST['requestdescription'];
            $reqname = $_REQUEST['requestname'];
            $reqadds1 = $_REQUEST['requestaddress1'];
            $reqadds2 = $_REQUEST['requestaddress2'];
            $reqcity = $_REQUEST['requestcity'];
            $reqstate = $_REQUEST['requeststate'];
            $reqpincode = $_REQUEST['requestpincode'];
            $reqemail = $_REQUEST['requestemail'];
            $reqmobile = $_REQUEST['requestmobile'];
            $reqdate = $_REQUEST['requestdate'];
        
            $sql ="INSERT INTO submitrequest (req_info, req_desc, req_name, req_adds1, req_adds2, req_city, req_state, req_pincode, req_email, req_mobile, req_date)
            VALUES('$reqinfo','$reqdesc','$reqname','$reqadds1','$reqadds2','$reqcity','$reqstate','$reqpincode','$reqemail','$reqmobile','$reqdate')";
            if($con->query($sql) == TRUE)
            {
                $genid =  mysqli_insert_id($con);
                $msg ="<div class='alert alert-success'>request submitted successfully</div>";
                $_SESSION['myid']=$genid;
                echo "<script>location.href='submitrequestsuccess.php'</script>";
            }
            else
            {
                $msg ="<div class='alert alert-danger'>request unable to submit</div>";
            }
        }
    }
?>
    <div class="col-sm-10 mt-5">
        <form action="" method="POST" class="mx-5">
            <div class="form-group">
                <label for="Requestenfo" class="py-2 text-primary">Request Information</label>
                <input type="text" class="form-control" name="requestinfo" placeholder="Request Information">
            </div>
            <div class="form-group">
                <label for="Requestdescription" class="py-2 text-primary">Request Description</label>
                <input type="text" class="form-control" name="requestdescription" placeholder="description of your request">
            </div>
            <div class="form-group">
                <label for="Requestname" class="py-2 text-primary">Enter Name</label>
                <input type="text" class="form-control" name="requestname" placeholder="type your full name">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="requestlocation" class="py-2 text-primary">Address lin 1</label>
                    <input type="text"class="form-control" name="requestaddress1" placeholder="address line 1">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="requestlocation" class="py-2 text-primary">Address lin 2</label>
                    <input type="text"class="form-control" name="requestaddress2" placeholder="address line 2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="requestcity" class="py-2 text-primary">City</label>
                    <input type="text"class="form-control" name="requestcity" placeholder="City">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                    <label for="requeststate" class="py-2 text-primary">state</label>
                    <input type="text"class="form-control" name="requeststate" placeholder="state">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                    <label for="requestpincode" class="py-2 text-primary">Pin Code</label>
                    <input type="text"class="form-control" name="requestpincode" placeholder="pin">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="requestemail"class="py-2 text-primary">E-Mail</label>
                        <input type="email" class="form-control" name="requestemail" placeholder="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="requestmobile"class="py-2 text-primary">Mobile Number</label>
                        <input type="text" class="form-control" name="requestmobile" placeholder="9460XXXXX">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="requestdate"class="py-2 text-primary">Date</label>
                        <input type="date" class="form-control" name="requestdate" placeholder="dd/mm/yyyy">
                    </div>
                </div>
            </div>
            <button typ="submit" class="btn btn-success mt-3" name="requestsubmit">Submit Request</button>
            <button typ="reset" class="btn btn-danger mt-3" name="requestreset">Reset form</button>
            <?php
                if(isset($msg))
                {
                    echo $msg;
                }
            ?>
        </form>
    
    </div>


<?php
    include("includesfile/footer.php");
?>