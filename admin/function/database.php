<?php
 $server = "localhost"; // Khai báo server
 $username = "root"; // Khai báo username
 $password = "mysql"; // Khai báo password
 $dbname = "sample"; // Khai báo database
 global $connect;
 $connect = mysqli_connect($server, $username, $password, $dbname);

 if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
}
?>