<?php
     define('TITLE','Technician');
    include("includesfile/header.php");
    include("../dbconnection.php");
    session_start();
    if($_SESSION['is_alogin']){
        $remail = $_SESSION['aEmail'];
    }else{
        echo "<script>location.href='adminlogin.php'</script>";
    }
?>
<div class="col-sm-8 col-md-10 mt-5 text-center">
    <p class="bg-success text-white p-2">
        List Of Technician
    </p>
    <?php
        $sql = "SELECT * FROM technician_tb";
        $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            echo '<table class="table">
            <thead>
            <tr>
            <th scope="col"> ID</th>
            <th scope="col"> Name</th>
            <th scope="col"> City</th>
            <th scope="col"> Mobile</th>
            <th scope="col"> Email</th>
            <th scope="col">Action</th>
            </tr>
            </thead>
            </tbody>';
            while($row=$result->fetch_assoc())
            {
                echo '<tr>';
                echo '<th scope = "row">'.$row["empid"].'</th>';
                echo '<td>'.$row["empName"].'</td>';
                echo '<td>'.$row["empCity"].'</td>';
                echo '<td>'.$row["empMobile"].'</td>';
                echo '<td>'.$row["empEmail"].'</td>';
                echo '<td><form action="editemp.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["empid"].'>
                <button class="btn btn-info mx-3 py-2 px-4" type="submit" name="edit"><i class="fas fa-pen"></i></button></form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["empid"].'>
                <button class="btn btn-warning mx-2 py-2 px-4" type="submit" name="delete"><i class="fas  fa-trash"></i></button>
                </form>
                </td></tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        else
        {
            echo '<div class="alert alert-primary mt-2" role="alert">No Requester Found In Database</div>';
        }
        if(isset($_REQUEST['delete']))
        {
            $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
            if($con->query($sql) == TRUE)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }
            else
            {
                echo "Unable To Delete";
            }
        }
    ?>
    <div class="container "><div class="float-right"><a href = "insertemp.php" class="btn btn-dark "><i class="fas fa-plus fa-1x "></i></a>
</div>
</div>
</div>

<?php
    include("includesfile/footer.php");
?>