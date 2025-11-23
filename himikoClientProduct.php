<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoprods.css">
    <title>Client Product</title>
</head>
<body>
    <h1>Available Products</h1>
    <br><br>
    <div class="himikocon">
        <?php
        session_start();
        include "himikoConnection.php";

        $sql = "SELECT * FROM himikoproducts";
        $ressql = mysqli_query($himikoConn, $sql);

        if(mysqli_num_rows($ressql) > 0){
            while($himikoprod = mysqli_fetch_assoc($ressql)){
                echo '
                    <div class="himikocard">
                        <img src="data:image/jpeg;base64,' . base64_encode($himikoprod['himiko_Image']) . '" width="200">
                        <h5><p>' . $himikoprod['himiko_ProductName'] . '</p></h5>
                        <button class="himikoviewbtn" onclick="window.location.href=\'himikoBuyProduct.php?himikoprodid='. $himikoprod['himikoprodid'] .'\'">Buy</button>
                    </div>
                ';
            }
        }
        ?>
    </div>
</body>
</html>
