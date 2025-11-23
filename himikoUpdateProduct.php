<?php
session_start();

include "himikoConnection.php";

if(isset($_POST['himikoupdatebtn'])){
    $himikoprodid = $_GET['himikoprodid'];
    $himikoprodname = $_POST['himikoprodname'];
    $himikounit = $_POST['himikounit'];
    $himikopriceunit = $_POST['himikopriceunit'];

    $query = "UPDATE himikoproducts 
              SET himiko_ProductName='$himikoprodname', himiko_Unit='$himikounit', himiko_PriceperUnit='$himikopriceunit' 
              WHERE himikoprodid='$himikoprodid'";

    if(mysqli_query($himikoConn, $query)){
        header("location: himikoViewProduct.php?himikoprodid={$himikoprodid}");
        exit;
    }
}
?>
