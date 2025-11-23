<?php
$himikoConn = mysqli_connect("localhost", "root", "", "himikotogaDB");

if (!$himikoConn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($himikoConn, "utf8");
?>
