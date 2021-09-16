<?php
    define('TITLE','Requester Status');
    include("includesfile/header.php");
    include("../dbconnection.php");
    session_start();
    if($_SESSION['is_login']){
        $remail = $_SESSION['rEmail'];
    }
    else
    {
        echo "<script>location.href='requesterlogin.php'</script>";
    }
?>
<div class="col-sm-4 mx-4">
    <form action="" method="POST" class="d-print-none">
        <div class="form-group ms-5">
            <label for="reqid" class="mb-3"> Check Request Status</label>
            <input type="text" class="form-control" name="checkid">
        </div>
        <button type="submit" class="btn btn-dark ms-5 mt-3">Check</button>
    </form>
    <?php
        if(isset($_REQUEST['checkid']))
        {
            $sql = "SELECT * FROM workasign WHERE req_id = {$_REQUEST['checkid']}";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if(($row['req_id']) == $_REQUEST['checkid']){?>
                <h3 class="text-center primary">Assigned Work Detail</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Request id</td>
                            <td><?php if(isset($row['req_id'])){echo $row['req_id'];}?></td>
                        </tr>
                        <tr>
                            <td>Request info</td>
                            <td><?php if(isset($row['req_info'])){echo $row['req_info'];}?></td>
                        </tr>
                        <tr>
                            <td>Request desc.</td>
                            <td><?php if(isset($row['req_desc'])){echo $row['req_desc'];}?></td>
                        </tr>
                        <tr>
                            <td>Request name</td>
                            <td><?php if(isset($row['req_name'])){echo $row['req_name'];}?></td>
                        </tr>
                        <tr>
                            <td>Request address 1</td>
                            <td><?php if(isset($row['req_adds1'])){echo $row['req_adds1'];}?></td>
                        </tr>
                        <tr>
                            <td>Request address 2</td>
                            <td><?php if(isset($row['req_adds2'])){echo $row['req_adds2'];}?></td>
                        </tr>
                        <tr>
                            <td>Request city</td>
                            <td><?php if(isset($row['req_city'])){echo $row['req_city'];}?></td>
                        </tr>
                        <tr>
                            <td>Request state</td>
                            <td><?php if(isset($row['req_state'])){echo $row['req_state'];}?></td>
                        </tr>
                        <tr>
                            <td>Request pincode</td>
                            <td><?php if(isset($row['req_pincode'])){echo $row['req_pincode'];}?></td>
                        </tr>
                        <tr>
                            <td>Request email</td>
                            <td><?php if(isset($row['req_email'])){echo $row['req_email'];}?></td>
                        </tr>
                        <tr>
                            <td>Request contact</td>
                            <td><?php if(isset($row['req_mobile'])){echo $row['req_mobile'];}?></td>
                        </tr>
                        <tr>
                            <td>Request date</td>
                            <td><?php if(isset($row['asigndate'])){echo $row['asigndate'];}?></td>
                        </tr>
                        <tr>
                            <td>Technician Name</td>
                            <td><?php if(isset($row['asigntech'])){echo $row['asigntech'];}?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <form action="" class="d-print-none">
                        <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
                    </form>
                </div>
          <?php }
          else
          {
              echo '<div class="alert alert-warning mt-2" role="alert">No Work Assigned For This Request</div>';
          }
        }
    ?>
</div>
<?php
    include("includesfile/footer.php");
?>