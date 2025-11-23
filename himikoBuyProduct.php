<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikobuy.css">
    <title>Buy Product</title>
</head>
<body>
    <h1>Buy Product</h1>
    <br><br>
    <div class="himikocon">
        <?php
        session_start();
        include "himikoConnection.php";
        
        $himikoprodid = $_GET['himikoprodid'];

        $sql = "SELECT * FROM himikoproducts WHERE himikoprodid = '$himikoprodid'";
        $ressql = mysqli_query($himikoConn, $sql);

        if(mysqli_num_rows($ressql) === 1){
            $himikoprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="himikocard">
                        <img src="data:image/jpeg;base64,' . base64_encode($himikoprod['himiko_Image']) . '" width="200">
                        <div>
                            <form action="himikoSubmitBuy.php?id=' . $himikoprodid . '" method="post">
                                <table>
                                <tr>
                                    <td><p>Name: </p></td>
                                    <td><input type="text" name="himikobuyername" required></td>
                                </tr>
                                <tr>
                                    <td><p>Quantity: </p></td>
                                    <td><input type="number" name="himikoquantity" required></td>
                                </tr>   
                                <tr>
                                    <td><button class="himikoviewbtn" name="himikobuybtn" type="submit" style="background-color: green">Buy</button></td>
                                    <td><button class="himikoviewbtn" style="background-color: blue" onclick="window.location.href=\'himikoClientProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                ';
        }
        ?>
    </div>
</body>
</html>
