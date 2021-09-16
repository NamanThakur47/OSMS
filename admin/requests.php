<?php
    define('TITLE','Requests');
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
<div class="col-sm-4 mx-5">
    <?php
        $sql = "SELECT req_id,req_info,req_desc,req_date FROM submitrequest";
        $result = $con->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo '<div class = "card mt-5 mx-5 mb-5">';
                echo '<div class = "card-header bg-dark text-white">';
                echo 'Requester ID : '.$row['req_id'];
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">Request Info :'.$row['req_info'].'</h6>';
                echo '<p class="card-text">'.$row['req_desc'].'</p>';
                echo '<p class="card-text">Request Date : '.$row['req_date'].'</p>';
                echo '<div class="float-right">';
                echo '<form action="" method="POST">
                <input type="hidden" name="id" value='.$row["req_id"].'><input type="submit" class="btn btn-primary me-2" name="view" value="View"><input type="submit" class="btn btn-dark" name="close" value="Close"></form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    ?>
    <?php
        if(isset($_REQUEST['close']))
        {
            $sql = "DELETE FROM submitrequest WHERE req_id ={$_REQUEST['id']}";
            if($con->query($sql) == TRUE)
            {
                echo '<div class="alert alert-success mt-2" role="alert">Work Assigned Request deleted</div>';
            }
            else
            {
                echo '<div class="alert alert-danger mt-2" role="alert">Unable To Delete Requests</div>';
            }
        }
    ?>
</div>
<?php
    include("workasignform.php");
    include("includesfile/footer.php");
?>