<?php
session_start();
include "himikoConnection.php";

if(isset($_POST['himikobuybtn'])){
    $himikousername = $_SESSION['himikousername'];

    $himikobuyername = $_POST['himikobuyername'];
    $himikoquantity = $_POST['himikoquantity'];
    $himikoprodid = $_GET['id'];

    $sql = "SELECT * FROM himikoproducts WHERE himikoprodid ='$himikoprodid'";
    $himikobuyq = mysqli_query($himikoConn, $sql);

    if(mysqli_num_rows($himikobuyq) === 1){
        $himikoprod = mysqli_fetch_assoc($himikobuyq);

        $himikoproductname = $himikoprod['himiko_ProductName'];
        $himikopriceperunit = $himikoprod['himiko_PriceperUnit'];

        $himikototalprice = $himikopriceperunit * $himikoquantity;

        $himikoinsertbuy = "INSERT INTO himikoorders 
            (himiko_BuyerName, himiko_ProductName, himiko_ProductPrice, himiko_Quantity, himiko_TotalPrice, himiko_Account) 
            VALUES 
            ('$himikobuyername','$himikoproductname','$himikopriceperunit','$himikoquantity','$himikototalprice','$himikousername')";

        if(mysqli_query($himikoConn, $himikoinsertbuy)){
            header("location: himikoClientProduct.php");
        }
        else{
            header("location: himikoClientProduct.php");
        }
    }
}
?>
