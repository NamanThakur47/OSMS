<?php
    define('TITLE','Update Technician ');
    include("includesfile/header.php");
    include("../dbconnection.php");
    session_start();
    if($_SESSION['is_alogin']){
        $remail = $_SESSION['aEmail'];}
    else{
        echo "<script>location.href='adminlogin.php'</script>";}
?>
    <?php
    if(isset($_REQUEST['empupdate'])){
        if(($_REQUEST['empName'] == "") || ($_REQUEST['empEmail'] == "") || ($_REQUEST['empCity'] == "")|| ($_REQUEST['empMobile'] == "")){
            $msg = '<div class="alert alert-warning col-sm-12 ml-5 mt-2" role = "alert">Fill All Fields</div>';
        }else{
            $eId = $_REQUEST['empId'];
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];

            $sql = "UPDATE technician_tb SET empName = '$eName',empCity = '$eCity',empMobile = '$eMobile',empEmail = '$eEmail' WHERE empid = '$eId'";

            if($con->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-12 ml-5 mt-2" role="alert">Updated Successfully </div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-12 ml-5 mt-2" role="alert">Unable To    Update</div>';
            }
        }
    }
    ?>
<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
        if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM technician_tb WHERE empid = {$_REQUEST['id']}";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="empId">Emp ID</label>
            <input type="text" class="form-control" id = "empId" name="empId" value="<?php if(isset($row['empid'])){echo $row['empid'];}?>" readonly>
        </div>

        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName" value="<?php if(isset($row['empName'])){echo $row['empName'];}?>">
        </div>

        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if(isset($row['empCity'])){echo $row['empCity'];}?>">
        </div>

        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if(isset($row['empMobile'])){echo $row['empMobile'];}?>" onkeypress="isInputNumber(event">
        </div>


        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="text" class="form-control" id="empEmail" name="empEmail" value="<?php if(isset($row['empEmail'])){echo $row['empEmail'];}?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
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