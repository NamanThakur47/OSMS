<?php
    define('TITLE','Work Order');
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
<div class="col-sm-9 col-md-10 mt-5">
    <?php
        $sql = "SELECT * FROM workasign";
        $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">REQ ID</th>
                        <th scope="col">REQ INFO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">CITY</th>
                        <th scope="col">MOBILE</th>
                        <th scope="col">TECHNICIAN</th>
                        <th scope="col">DATE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc())
                    {
                        echo '<tr?>
                        <th scope="row">'.$row["req_id"].'</th>
                        <td>'.$row["req_info"].'</td>
                        <td>'.$row["req_name"].'</td>
                        <td>'.$row["req_adds1"].'</td>
                        <td>'.$row["req_city"].'</td>
                        <td>'.$row["req_mobile"].'</td>
                        <td>'.$row["asigntech"].'</td>
                        <td>'.$row["asigndate"].'</td>
                        <td>
                        <form action="" class="d-inline" method="POST"><input type="hidden" name="id" value='.$row["req_id"].'>

                        <button type="submit" class="btn btn-danger text-white" name="delete"><i class="fas fa-trash"></i></button></form>

                        <form action="viewasignwork.php" class="d-inline" method="POST">
                        <input type="hidden" name="id" value='.$row["req_id"].'>

                        <button type="submit" class="btn btn-success text-white" name="view">
                        <i class="fas fa-eye"></i>
                        </button>
                        </form>
                        </td>
                        </tr>';
                    }

                    echo '</tbody></table>';
                }
                else
                {
                    echo '<div class="alert alert-primary mt-2" role="alert">No Assigned Work Order Found Yet</div>';
                }  

                if(isset($_REQUEST['delete']))
                {
                    $sql = "DELETE FROM workasign WHERE req_id = {$_REQUEST['id']}";
                    if($con->query($sql) == TRUE)
                    {
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    }
                    else
                    {
                        echo "Unable To Delete Data";
                    }
                }
    ?>
</div>
<?php
    include("includesfile/footer.php");
?>