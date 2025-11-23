<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoview.css">
    <title>View Orders</title>
</head>
<body>
    <h1>View Orders</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "himikoConnection.php";

                $himikosql = "SELECT * FROM himikoorders";
                $himikores = mysqli_query($himikoConn, $himikosql);

                if(mysqli_num_rows($himikores) > 0){
                    while($himikousers = mysqli_fetch_assoc($himikores)){
                        echo "<tr>
                        <td><p>{$himikousers['order_id']}</p></td>
                        <td><p>{$himikousers['himiko_BuyerName']}</p></td>
                        <td><p>{$himikousers['himiko_ProductName']}</p></td>
                        <td><p>{$himikousers['himiko_ProductPrice']}</p></td>
                        <td><p>{$himikousers['himiko_Quantity']}</p></td>
                        <td><p>{$himikousers['himiko_TotalPrice']}</p></td>
                        <td><p>{$himikousers['himiko_Account']}</p></td>
                        </tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='7'>No clients found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
