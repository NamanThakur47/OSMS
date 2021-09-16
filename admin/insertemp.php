<?php
    define('TITLE','Technician');
    include("includesfile/header.php");
    include("../dbConnection.php");
    session_start();
    if($_SESSION['is_alogin']){
        $remail = $_SESSION['aEmail'];
    }else{
        echo "<script>location.href='adminlogin.php'</script>";
    }
    if(isset($_REQUEST['empsubmit'])){
        if(($_REQUEST['empName'] == "") || ($_REQUEST['empEmail'] == "") || ($_REQUEST['empCity'] == "")|| ($_REQUEST['empMobile'] == "")){
            $msg = '<div class="alert alert-warning col-sm-12 ml-5 mt-2" role = "alert">Fill All Fields</div>';
        }else{
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];

            $sql = "INSERT INTO technician_tb (empName,empCity,empMobile,empEmail) VALUES ('$eName','$eCity','$eMobile','$eEmail')";

            if($con->query($sql) == TRUE){
                $msg = '<div class = "alert alert-success col-sm-12 ml-5 mt-2" role="alert">Added Successfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable To Add</div>';
            }
        }
    }    
?>
<div class="col-sm-6 mt-5 mx-5 bg-light">
    <h3 class="text-center p-3 text-light bg-dark">Add New Techniciam</h3>
    <form action="" class="form-control bg-light p-3" method="POST">
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName">
        </div>
        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity">
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="text" class="form-control" id="empEmail" name="empEmail">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark m-2" id="empsubmit" name="empsubmit">Submit</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;}?>
    </form>
</div>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
<?php
    include("includesfile/footer.php");
?>