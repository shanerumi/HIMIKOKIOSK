<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="himikoaddprod.css">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <br><br>
    <div class="himikocon">
        <div class="himikocard">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan='2'><input type="file" name="img" style="padding: 5px; font-size: 15px;"></td>
                        </tr>
                        <tr>
                            <td><p>Product Name: </p></td>
                            <td><input type="text" name="himikoprodname" required></td>
                        </tr>
                        <tr>
                            <td><p>Unit: </p></td>
                            <td><input type="text" name="himikounit" required></td>
                        </tr>
                        <tr>
                            <td><p>Price per Unit: </p></td>
                            <td><input type="text" name="himikopriceunit" required></td>
                        </tr>
                        <tr>
                            <td><button class="himikoviewbtn" name="himikoaddbtn" type="submit" style="background-color: green">Add</button></td>
                            <td><button class="himikoviewbtn" style="background-color: blue" onclick="window.location.href='himikoAdminProduct.php'">Cancel</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>

    <?php
        session_start();
        include "himikoConnection.php";

        if (isset($_POST['himikoaddbtn']) && isset($_FILES['img'])) {
            $himikoprodname = $_POST['himikoprodname'];
            $himikounit = $_POST['himikounit'];
            $himikopriceunit = $_POST['himikopriceunit'];
            $himikoimage = file_get_contents($_FILES['img']['tmp_name']);

            $stmt = $himikoConn->prepare("INSERT INTO himikoproducts (himiko_ProductName, himiko_Unit, himiko_PriceperUnit, himiko_Image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssb", $himikoprodname, $himikounit, $himikopriceunit, $null);

            $null = NULL;
            $stmt->send_long_data(3, $himikoimage);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Added successfully');
                        setTimeout(() => { window.location.href = 'himikoAddProduct.php'; }, 3000);
                    </script>";
            }
            $stmt->close();
        }
    ?>
</body>
</html>
