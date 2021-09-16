<?php
    define('TITLE','Request Success Output');
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
    $sql = "SELECT * FROM submitrequest WHERE req_id = {$_SESSION['myid']}";
    $result = $con->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        echo "<div class='col-sm-6 ml-5 mt-5'>
        <h1 class='text-success'> REQUEST REPORT SLIP.......</h1>
        <table class='table'>
        <thead>
        <tr>
        <th>Object</th>
        <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>REQUESTER ID</td>
        <td>".$row['req_id']."</td>
        </tr>

        <tr>
        <td>REQUESTER NAME</td>
        <td>".$row['req_name']."</td>
        </tr>

        <tr>
        <td>REQUESTER EMAIL</td>
        <td>".$row['req_email']."</td>
        </tr>

        <tr>
        <td>REQUESTER ADDRESS</td>
        <td>".$row['req_adds1']."</td>
        </tr>

        <tr>
        <td>REQUESTER CONTACT</td>
        <td>".$row['req_mobile']."</td>
        </tr>

        <tr>
        <td>REQUESTER INFORMATION</td>
        <td>".$row['req_info']."</td>
        </tr>

        <tr>
        <td>REQUESTER DATE</td>
        <td>".$row['req_date']."</td>
        </tr>

        <tr>
        <td>REQUEST DATE</td>
        <td>".$row['req_date']."</td>
        </tr>
        <tr>
            <td>
            <form action='' method='POST'>
                <input type='submit' class='w-25 btn btn-success form-control' value='PRINT' onclick='window.print()'>
            </form>
            </td>
        </tr>
        </tbody>
        </table>
        </div>";
    }
    else
    {
        echo "Unable To Process";
    }
?>
<?php
    include("includesfile/footer.php");
    $con->close();
?>