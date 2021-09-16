<?php
     define('TITLE','dashboard');
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
    
    <div class="row mx-5">
        <div class="col-sm-4">
            <div class=" m-3 card text-white bg-dark text-center shadow-lg"style="max-width:400px;">
                <div class="card-hader bg-danger p-1"style="font-size:30px;">Requester Requests</div>
                    <div class="card-body">
                        <h1 class="card-title">100</h1> 
                        <a href="#" class="btn text-white">Show</a>
                    </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="m-3 card text-white bg-dark text-center shadow-lg"style="max-width:400px;">
                <div class="card-hader bg-warning p-1"style="font-size:30px;">Assigned Work</div>
                    <div class="card-body">
                        <h1 class="card-title">125</h1> 
                        <a href="#" class="btn text-white">Show</a>
                    </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class=" m-3 card text-white bg-dark text-center shadow-lg"style="max-width:400px;">
                <div class="card-hader bg-success p-1"style="font-size:30px;">No .Of Technician</div>
                    <div class="card-body">
                        <h1 class="card-title">45</h1> 
                        <a href="#" class="btn text-white">Show</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row  mx-5 mt-5 text-center">
    <p class="bg-info text-white p-2"style="font-size:30px;">List Of Requesters</p>
    <?php
        $sql = "SELECT * FROM userregistration";
        $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            echo '<table class="table">
            <thead>
            <tr>
            <th>Requester id</th>
            <th>Requester name</th>
            <th>Requester email</th>
            </thead>
            <tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                    echo '<td>'.$row["s_id"].'</td>';
                    echo '<td>'.$row["s_name"].'</td>';
                    echo '<td>'.$row["s_email"].'</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
        } 
        else{
            echo "no rquester data found";
        }
    ?>
    </div>
</div>
<?php
    include("includesfile/footer.php");
?>