<?php
    define('TITLE','Edit Request Form');
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
<?php
    include("includesfile/footer.php");
?>