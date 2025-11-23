<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoviewprod.css">
    <title>Document</title>
</head>
<body>
    <h1>Admin Product</h1>
    <br><br>
    <div class="cruzcon">
        <?php
        session_start();
        include "himikoConnection.php";
        
        $himikoprodid = $_GET['himikoprodid'];

        $sql = "SELECT * FROM himikoproducts WHERE himikoprodid = '$himikoprodid'";
        $ressql = mysqli_query($himikoConn, $sql);

        if(mysqli_num_rows($ressql)===1){
            $himikoprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="himikocard">
                        <img src="data:image/jpeg;base64,' . base64_encode($himikoprod['himiko_Image']) . '" width="200">
                        <div>
                            <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="himikoprodname" value="'. $himikoprod['himiko_ProductName'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="himikounit" value="'. $himikoprod['himiko_Unit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="himikopriceunit" value="'. $himikoprod['himiko_PriceperUnit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><button class="himikoviewbtn" style="background-color: green" onclick="window.location.href=\'himikoEditProduct.php?himikoprodid='. $himikoprod['himikoprodid'] .'\'">Edit</button></td>
                                    <td><button class="himikoviewbtn" onclick="window.location.href=\'himikoDeleteProduct.php?himikoprodid='. $himikoprod['himikoprodid'] .'\'">Delete</button></td>
                                </tr>
                                <tr>
                                    <td><button class="himikoviewbtn" style="background-color: blue" onclick="window.location.href=\'himikoAdminProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>
