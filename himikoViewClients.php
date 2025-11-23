<?php
session_start();
include "himikoConnection.php";

if (!isset($_SESSION['himikousername'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clients</title>
    <link rel="stylesheet" href="himikoview.css">
</head>
<body>
    <h1>Clients List</h1>
    <br>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM himikoregistration WHERE himiko_Type = 0"; 
            $result = mysqli_query($himikoConn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['himiko_Status'] == 1 ? "Approved" : "Pending";
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['uname']}</td>
                        <td>$status</td>
                        <td>
                            <a href='himikoapproveClient.php?himikoid={$row['id']}'><button>Approve</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No clients found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
