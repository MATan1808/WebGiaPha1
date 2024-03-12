<?php
session_start();
ob_start();

// Include file connectdb.php
include "./connectdb.php";

// Kết nối đến database
connectdb();

// Kiểm tra nếu đã đăng nhập và role là admin (1)
if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    header('location: Admin1.html');
    exit(); // Đảm bảo không có mã PHP nào được thực thi sau khi chuyển hướng
} 
// Kiểm tra role là 0
elseif(isset($_SESSION['role']) && $_SESSION['role'] == 0) {
    header('location: Trangchudn.html');
    exit();
} 
// Nếu không phải admin hoặc user thông thường, chuyển hướng đến trang login
else {
    header('location: login.php');
    exit();
}
?>
