<?php
    define('TITLE','View Assign Work');
    include("includesfile/header.php");
    include("../dbconnection.php");
    session_start();
    if($_SESSION['is_alogin'])
    {
        $remail = $_SESSION['aEmail'];
    }
    else
    {
        echo "<script>location.href='adminlogin.php'</script>";
    }
?>
<div class="col-sm-6 mt-5 mx-5">
    <h3 class="text-center text-primary">Assigned Work Details</h3>
    <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM workasign WHERE req_id = {$_REQUEST['id']}";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
        }
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Request Id</td>
            <td><?php if(isset($row['req_id'])){echo $row['req_id'];}?></td>
        </tr>
        <tr>
            <td>Request Info</td>
            <td><?php if(isset($row['req_info'])){echo $row['req_info'];}?></td>
        </tr>
        <tr>
            <td>Request Desc</td>
            <td><?php if(isset($row['req_desc'])){echo $row['req_desc'];}?></td>
        </tr>
        <tr>
            <td>Request Name</td>
            <td><?php if(isset($row['req_name'])){echo $row['req_name'];}?></td>
        </tr>
        <tr>
            <td>Request Address 1</td>
            <td><?php if(isset($row['req_adds1'])){echo $row['req_adds1'];}?></td>
        </tr>
        <tr>
            <td>Request Address 2</td>
            <td><?php if(isset($row['req_adds2'])){echo $row['req_adds2'];}?></td>
        </tr>
        <tr>
            <td>Request City</td>
            <td><?php if(isset($row['req_city'])){echo $row['req_city'];}?></td>
        </tr>
        <tr>
            <td>Request state</td>
            <td><?php if(isset($row['req_state'])){echo $row['req_state'];}?></td>
        </tr>
        <tr>
            <td>Request Pincode</td>
            <td><?php if(isset($row['req_pincode'])){echo $row['req_pincode'];}?></td>
        </tr>
        <tr>
            <td>Request Email</td>
            <td><?php if(isset($row['req_email'])){echo $row['req_email'];}?></td>
        </tr>
        <tr>
            <td>Request Contact</td>
            <td><?php if(isset($row['req_mobile'])){echo $row['req_mobile'];}?></td>
        </tr>
        <tr>
            <td>Assign Date</td>
            <td><?php if(isset($row['asigndate'])){echo $row['asigndate'];}?></td>
        </tr>
    </tbody>
</table>
<div class="text-center">
    <form action="" class="d-print-none d-inline-block">
        <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
    </form>
    <form action="workorder.php" class="d-print-none d-inline-block">
        <input type="submit" class="btn btn-dark" value="Close">
    </form>
</div>
</div>
<?php
    include("includesfile/footer.php");
?>