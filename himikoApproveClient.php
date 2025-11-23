<?php
session_start();
include "himikoConnection.php";

$himikoid = $_GET['himikoid'];

$updatesql = "UPDATE himikoregistration SET himiko_Status = '1' WHERE id = '$himikoid'";
$res = mysqli_query($himikoConn, $updatesql);

if($res){
    echo "<script>
            alert('Approved');
            window.location.href='himikoViewClients.php';
          </script>";
} else {
    echo "<script>
            alert('Something went wrong, please try again.');
            window.location.href='himikoViewClients.php';
          </script>";
}
?>
