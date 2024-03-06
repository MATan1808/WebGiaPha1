<?php
$servername = "localhost";  // Đối với SQL Server, bạn có thể sử dụng 'localhost' hoặc tên máy chủ SQL Server
$username = "root";  // Tên đăng nhập của bạn
$password = "_";  // Mật khẩu của bạn
$dbname = "web_giapha";  // Tên cơ sở dữ liệu SQL Server của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("bị lỗi kết nối: " . $conn->connect_error);
    exit();
}
?>
 <!-- #region -->