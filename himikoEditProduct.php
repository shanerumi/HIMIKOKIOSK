<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoedit.css">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <div class="himikocon">
        <?php
        session_start();
        include "himikoConnection.php";

        if(isset($_GET['himikoprodid'])) {
            $himikoprodid = $_GET['himikoprodid'];

            $sql = "SELECT * FROM himikoproducts WHERE himikoprodid = '$himikoprodid'";
            $ressql = mysqli_query($himikoConn, $sql);

            if(!$ressql) {
                die("Query failed: " . mysqli_error($himikoConn));
            }

            if(mysqli_num_rows($ressql) === 1){
                $himikoprod = mysqli_fetch_assoc($ressql);
                echo '
                <div class="himikocard">
                    <img src="data:image/jpeg;base64,' . base64_encode($himikoprod['himiko_Image']) . '" alt="Product Image">
                    <div>
                        <form action="himikoUpdateProduct.php?himikoprodid='. $himikoprod['himikoprodid'] .'" method="post">
                            <table>
                                <tr>
                                    <td><p>Product Name:</p></td>
                                    <td><input type="text" name="himikoprodname" value="'. $himikoprod['himiko_ProductName'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Unit:</p></td>
                                    <td><input type="text" name="himikounit" value="'. $himikoprod['himiko_Unit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit:</p></td>
                                    <td><input type="text" name="himikopriceunit" value="'. $himikoprod['himiko_PriceperUnit'] .'"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center;">
                                        <button class="himikoviewbtn" name="himikoupdatebtn" type="submit" style="background-color: green">Update</button>
                                        <button class="himikoviewbtn" type="button" style="background-color: blue" onclick="window.location.href=\'himikoAdminProduct.php\'">Cancel</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>';
            } else {
                echo "<p style='color:red;'>Product not found.</p>";
            }
        } else {
            echo "<p style='color:red;'>No product selected.</p>";
        }
        ?>
    </div>
</body>
</html>
