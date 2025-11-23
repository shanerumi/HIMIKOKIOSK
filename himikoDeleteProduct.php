<?php
include "himikoConnection.php";
session_start();

$himikoprodid = $_GET['himikoprodid'];

$sql = "DELETE FROM himikoproducts WHERE himikoprodid = '$himikoprodid'";

if(mysqli_query($himikoConn, $sql)){
    header("location: himikoAdminProduct.php");
    exit();
}
?>
