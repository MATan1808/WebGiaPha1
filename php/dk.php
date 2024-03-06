<?php
// Kết nối database
$conn = mysqli_connect("localhost", "root", "", "webgiapha");

// Lấy dữ liệu từ form
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

// Kiểm tra username đã tồn tại hay chưa
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<script>alert('Tên đăng nhập đã tồn tại!'); window.location.href='.dk.html';</script>";
  exit;
}

// Thêm mới user vào database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
mysqli_query($conn, $sql);

// Thông báo đăng ký thành công
echo "<script>alert('Đăng ký thành công!'); window.location.href='dn.html';</script>";
?>